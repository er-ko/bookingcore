<?php

namespace App\Infrastructure\Integration\Resolvers;

use App\Domain\Integration\Contracts\CalendarProvider;
use App\Enums\IntegrationProvider;
use App\Infrastructure\Integration\Providers\AppleCalendarProvider;
use App\Infrastructure\Integration\Providers\GoogleCalendarProvider;
use App\Infrastructure\Integration\Providers\MicrosoftCalendarProvider;

final class CalendarProviderResolver
{
    public function __construct(
        private readonly GoogleCalendarProvider $googleCalendarProvider,
        private readonly MicrosoftCalendarProvider $microsoftCalendarProvider,
        private readonly AppleCalendarProvider $appleCalendarProvider,
    ) {
    }

    /**
     * Resolve the calendar provider implementation.
     */
    public function resolve(IntegrationProvider|string $provider): CalendarProvider
    {
        $provider = $provider instanceof IntegrationProvider
            ? $provider
            : IntegrationProvider::from($provider);

        return match ($provider) {
            IntegrationProvider::Google => $this->googleCalendarProvider,
            IntegrationProvider::Microsoft => $this->microsoftCalendarProvider,
            IntegrationProvider::Apple => $this->appleCalendarProvider,
        };
    }
}