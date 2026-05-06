<?php

namespace App\Console\Commands;

use App\Enums\RiscEventType;
use Google\Client as GoogleClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

final class RegisterGoogleRiscEndpointCommand extends Command
{
    protected $signature = 'risc:register
                            {--check : Show the current registered stream configuration instead of updating it}';

    protected $description = 'Register (or inspect) the Google RISC webhook endpoint';

    private const RISC_STREAM_UPDATE_URL = 'https://risc.googleapis.com/v1beta/stream:update';
    private const RISC_STREAM_STATUS_URL = 'https://risc.googleapis.com/v1beta/stream';
    private const RISC_SCOPE = 'https://www.googleapis.com/auth/risc.configuration.readwrite';

    public function handle(): int
    {
        $serviceAccountPath = config('services.google.service_account_path');

        if (! $serviceAccountPath || ! \file_exists($serviceAccountPath)) {
            $this->error('GOOGLE_SERVICE_ACCOUNT_PATH is not set or the file does not exist.');

            return self::FAILURE;
        }

        $accessToken = $this->fetchServiceAccountToken($serviceAccountPath);

        if ($accessToken === null) {
            return self::FAILURE;
        }

        return $this->option('check')
            ? $this->checkStream($accessToken)
            : $this->registerStream($accessToken);
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

    private function fetchServiceAccountToken(string $serviceAccountPath): ?string
    {
        try {
            $client = new GoogleClient();
            $client->setAuthConfig($serviceAccountPath);
            $client->addScope(self::RISC_SCOPE);

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
