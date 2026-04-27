<?php

namespace App\Domain\Integration\Services;

use App\Infrastructure\Integration\Repositories\IntegrationRepository;
use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\Integration\Integration;
use RuntimeException;
use Throwable;

final class RefreshIntegrationService
{
    public function __construct(
        private readonly IntegrationRepository $integrations,
        private readonly CalendarProviderResolver $calendarProviderResolver,
    ) {
    }

    /**
     * Refresh the access token for the given integration.
     */
    public function refresh(
        Integration $integration
    ): Integration {
        if (! $integration->is_active) {
            throw new RuntimeException(__('integration/calendar.messages.integration_inactive'));
        }

        if (! $integration->hasRefreshToken()) {
            throw new RuntimeException(__('integration/calendar.messages.missing_refresh_token'));
        }

        $provider = $this->calendarProviderResolver->resolve($integration->provider);

        $attemptMeta = $this->mergeMeta($integration->meta, [
            'last_token_refresh_attempt_at' => now()->toIso8601String(),
        ]);

        $integration->update([
            'meta' => $attemptMeta,
        ]);

        $integration = $integration->refresh();

        try {
            $tokenData = $provider->refreshAccessToken($integration);

            $successMeta = $this->mergeMeta($integration->meta, [
                'requires_reconnect' => false,
                'disconnect_reason' => null,
                'last_token_refresh_at' => now()->toIso8601String(),
                'last_token_refresh_error' => null,
                'last_token_refresh_failed_at' => null,
            ]);

            $integration->update([
                'access_token' => $tokenData->accessToken,
                'refresh_token' => $tokenData->refreshToken ?? $integration->refresh_token,
                'token_expires_at' => $tokenData->tokenExpiresAt,
                'meta' => $successMeta,
            ]);

            return $integration->refresh();
        } catch (Throwable $exception) {
            $errorMessage = $exception->getMessage();

            if ($this->isPermanentRefreshFailure($exception)) {
                $failureMeta = $this->mergeMeta($integration->meta, [
                    'requires_reconnect' => true,
                    'disconnect_reason' => 'invalid_grant',
                    'last_token_refresh_error' => $errorMessage,
                    'last_token_refresh_failed_at' => now()->toIso8601String(),
                ]);

                $integration->update([
                    'is_active' => false,
                    'is_primary' => false,
                    'meta' => $failureMeta,
                ]);

                throw $exception;
            }

            $failureMeta = $this->mergeMeta($integration->meta, [
                'last_token_refresh_error' => $errorMessage,
                'last_token_refresh_failed_at' => now()->toIso8601String(),
            ]);

            $integration->update([
                'meta' => $failureMeta,
            ]);

            throw $exception;
        }
    }

    /**
     * Determine whether the given refresh failure is permanent
     * and requires the user to reconnect the integration.
     */
    private function isPermanentRefreshFailure(
        Throwable $exception
    ): bool {
        return str_contains(
            strtolower($exception->getMessage()),
            'invalid_grant'
        );
    }

    /**
     * Merge integration metadata with new values.
     *
     * @param array<string, mixed>|null $currentMeta
     * @param array<string, mixed> $newMeta
     * @return array<string, mixed>
     */
    private function mergeMeta(
        ?array $currentMeta,
        array $newMeta
    ): array {
        return array_merge($currentMeta ?? [], $newMeta);
    }
}
