<?php

namespace App\Application\Webhook\Actions;

use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use stdClass;

final class ValidateGoogleRiscToken
{
    private const JWKS_URI = 'https://www.googleapis.com/oauth2/v3/certs';
    private const ISSUER = 'https://accounts.google.com';
    private const MAX_IAT_AGE_SECONDS = 300;

    public function __invoke(string $token): stdClass
    {
        $keys = $this->fetchKeys();

        try {
            $payload = JWT::decode($token, $keys);
        } catch (\Throwable $e) {
            throw new RuntimeException('JWT verification failed: ' . $e->getMessage(), 0, $e);
        }

        $this->validateClaims($payload);

        return $payload;
    }

    /**
     * Fetch Google's public signing keys, cached for 1 hour.
     *
     * @return array<string, \Firebase\JWT\Key>
     */
    private function fetchKeys(): array
    {
        $jwks = Cache::remember('google_risc_jwks', 3600, function (): array {
            $response = Http::timeout(5)->get(self::JWKS_URI);

            if (! $response->successful()) {
                throw new RuntimeException('Failed to fetch Google JWKS');
            }

            return $response->json();
        });

        return JWK::parseKeySet($jwks);
    }

    private function validateClaims(stdClass $payload): void
    {
        if (($payload->iss ?? null) !== self::ISSUER) {
            throw new RuntimeException('Invalid token issuer');
        }

        if (($payload->aud ?? null) !== config('services.google.client_id')) {
            throw new RuntimeException('Invalid token audience');
        }

        $age = abs(time() - (int) ($payload->iat ?? 0));

        if ($age > self::MAX_IAT_AGE_SECONDS) {
            throw new RuntimeException('Token is too old');
        }
    }
}
