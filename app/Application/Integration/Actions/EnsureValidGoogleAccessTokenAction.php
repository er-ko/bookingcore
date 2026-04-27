<?php

namespace App\Application\Integration\Actions;

use App\Enums\IntegrationProvider;
use App\Models\Integration\Integration;
use RuntimeException;

final class EnsureValidGoogleAccessTokenAction
{
    private const EXPIRING_SOON_BUFFER_SECONDS = 300;

    public function __construct(
        private readonly RefreshIntegrationAccessToken $refreshIntegrationAccessToken,
    ) {
    }

    /**
     * Ensure that the given Google integration has a valid access token.
     *
     * If the token is expired or expires soon, it will be refreshed
     * automatically and the fresh integration instance will be returned.
     */
    public function __invoke(
        Integration $integration
    ): Integration {
        $this->assertGoogleIntegration($integration);

        if (! $integration->is_active) {
            throw new RuntimeException(__('integration/calendar.messages.integration_inactive'));
        }

        if (! filled($integration->access_token)) {
            throw new RuntimeException(__('integration/calendar.messages.missing_access_token'));
        }

        if (! $integration->tokenExpiresSoon(self::EXPIRING_SOON_BUFFER_SECONDS)) {
            return $integration;
        }

        return ($this->refreshIntegrationAccessToken)($integration);
    }

    /**
     * Ensure that the given integration belongs to the Google provider.
     */
    private function assertGoogleIntegration(
        Integration $integration
    ): void {
        $provider = $integration->provider instanceof IntegrationProvider
            ? $integration->provider
            : IntegrationProvider::from($integration->provider);

        if ($provider !== IntegrationProvider::Google) {
            throw new RuntimeException(__('integration/calendar.messages.not_google_integration'));
        }
    }
}
