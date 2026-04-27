<?php

namespace App\Application\Integration\Actions;

use App\Domain\Integration\Services\RefreshIntegrationService;
use App\Models\Integration\Integration;
use RuntimeException;

final class RefreshIntegrationAccessToken
{
    public function __construct(
        private readonly RefreshIntegrationService $refreshIntegrationService,
    ) {
    }

    /**
     * Refresh the access token for the given integration.
     */
    public function __invoke(
        Integration $integration
    ): Integration {
        if (! $integration->is_active) {
            throw new RuntimeException(__('integration/calendar.messages.integration_inactive'));
        }

        if (! $integration->hasRefreshToken()) {
            throw new RuntimeException(__('integration/calendar.messages.missing_refresh_token'));
        }

        return $this->refreshIntegrationService->refresh($integration);
    }
}
