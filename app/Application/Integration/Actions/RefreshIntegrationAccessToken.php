<?php

namespace App\Application\Integration\Actions;

use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\Integration\Integration;
use RuntimeException;

final class RefreshIntegrationAccessToken
{
    public function __construct(
        private readonly CalendarProviderResolver $calendarProviderResolver,
    ) {
    }

    /**
     * Refresh the access token for the given integration.
     */
    public function __invoke(Integration $integration): Integration
    {
        if (! $integration->is_active) {
            throw new RuntimeException('The integration is inactive.');
        }

        if (! filled($integration->refresh_token)) {
            throw new RuntimeException('The integration does not contain a refresh token.');
        }

        $provider = $this->calendarProviderResolver->resolve($integration->provider);

        return $provider->refreshAccessToken($integration);
    }
}