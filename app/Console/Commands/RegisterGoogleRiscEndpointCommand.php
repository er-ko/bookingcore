<?php

namespace App\Console\Commands;

use App\Enums\RiscEventType;
use Google\Client as GoogleClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

final class RegisterGoogleRiscEndpointCommand extends Command
{
    protected $signature = 'risc:register
                            {--check : Show the current registered stream configuration instead of updating it}
                            {--verify : Send a verification event to confirm the endpoint is reachable}';

    protected $description = 'Register (or inspect) the Google RISC webhook endpoint';

    private const RISC_STREAM_UPDATE_URL = 'https://risc.googleapis.com/v1beta/stream:update';
    private const RISC_STREAM_STATUS_URL = 'https://risc.googleapis.com/v1beta/stream';
    private const RISC_STREAM_VERIFY_URL = 'https://risc.googleapis.com/v1beta/stream:verify';
    private const RISC_SCOPE_CONFIG = 'https://www.googleapis.com/auth/risc.configuration.readwrite';
    private const RISC_SCOPE_VERIFY = 'https://www.googleapis.com/auth/risc.verify';

    public function handle(): int
    {
        $serviceAccountPath = config('services.google.service_account_path');

        if (! $serviceAccountPath || ! file_exists($serviceAccountPath)) {
            $this->error('GOOGLE_SERVICE_ACCOUNT_PATH is not set or the file does not exist.');

            return self::FAILURE;
        }

        if ($this->option('verify')) {
            $accessToken = $this->fetchServiceAccountToken($serviceAccountPath, self::RISC_SCOPE_VERIFY);

            return $accessToken ? $this->verifyStream($accessToken) : self::FAILURE;
        }

        $accessToken = $this->fetchServiceAccountToken($serviceAccountPath, self::RISC_SCOPE_CONFIG);

        if ($accessToken === null) {
            return self::FAILURE;
        }

        if ($this->option('check')) {
            return $this->checkStream($accessToken);
        }

        return $this->registerStream($accessToken);
    }

    private function registerStream(string $accessToken): int
    {
        $webhookUrl = route('webhooks.google.risc');

        $this->info("Registering RISC endpoint: {$webhookUrl}");

        $response = Http::withToken($accessToken)
            ->post(self::RISC_STREAM_UPDATE_URL, [
                'delivery' => [
                    'delivery_method' => 'https://schemas.openid.net/secevent/risc/delivery-method/push',
                    'url' => $webhookUrl,
                ],
                'events_requested' => [
                    RiscEventType::SessionsRevoked->value,
                    RiscEventType::TokenRevoked->value,
                    RiscEventType::AccountDisabled->value,
                    RiscEventType::AccountEnabled->value,
                    RiscEventType::CredentialChangeRequired->value,
                ],
            ]);

        if (! $response->successful()) {
            $this->error("Registration failed ({$response->status()}): " . $response->body());

            return self::FAILURE;
        }

        $this->info('RISC endpoint registered successfully.');

        return self::SUCCESS;
    }

    private function verifyStream(string $accessToken): int
    {
        $this->info('Sending verification event to your endpoint...');

        $response = Http::withToken($accessToken)
            ->post(self::RISC_STREAM_VERIFY_URL, [
                'state' => bin2hex(random_bytes(16)),
            ]);

        if (! $response->successful()) {
            $this->error("Verification failed ({$response->status()}): " . $response->body());

            return self::FAILURE;
        }

        $this->info('Verification event sent. Google confirmed your endpoint responded with 202.');

        return self::SUCCESS;
    }

    private function checkStream(string $accessToken): int
    {
        $response = Http::withToken($accessToken)->get(self::RISC_STREAM_STATUS_URL);

        if (! $response->successful()) {
            $this->error("Could not fetch stream status ({$response->status()}): " . $response->body());

            return self::FAILURE;
        }

        $this->line(json_encode($response->json(), JSON_PRETTY_PRINT));

        return self::SUCCESS;
    }

    private function fetchServiceAccountToken(string $serviceAccountPath, string $scope): ?string
    {
        try {
            $client = new GoogleClient();
            $client->setAuthConfig($serviceAccountPath);
            $client->addScope($scope);

            $token = $client->fetchAccessTokenWithAssertion();

            if (isset($token['error'])) {
                $this->error('Service account authentication failed: ' . ($token['error_description'] ?? $token['error']));

                return null;
            }

            return $token['access_token'] ?? null;
        } catch (\Throwable $e) {
            $this->error('Failed to authenticate service account: ' . $e->getMessage());

            return null;
        }
    }
}
