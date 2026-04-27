<?php

namespace App\Infrastructure\Integration\Providers;

use App\Application\Integration\DTO\CalendarAccountData;
use App\Application\Integration\DTO\CalendarEventData;
use App\Application\Integration\DTO\RefreshedAccessTokenData;
use App\Domain\Integration\Contracts\CalendarProvider;
use App\Models\Integration\Integration;

final class MicrosoftCalendarProvider implements CalendarProvider
{
    public function getAccount(Integration $integration): CalendarAccountData
    {
        throw new \RuntimeException('Microsoft calendar provider is not implemented yet.');
    }

    public function listCalendars(Integration $integration): array
    {
        throw new \RuntimeException('Microsoft calendar provider is not implemented yet.');
    }

    public function createEvent(
        Integration $integration,
        string $calendarId,
        CalendarEventData $eventData,
    ): string {
        throw new \RuntimeException('Microsoft calendar provider is not implemented yet.');
    }

    public function updateEvent(
        Integration $integration,
        string $calendarId,
        string $eventId,
        CalendarEventData $eventData,
    ): void {
        throw new \RuntimeException('Microsoft calendar provider is not implemented yet.');
    }

    public function deleteEvent(
        Integration $integration,
        string $calendarId,
        string $eventId,
    ): void {
        throw new \RuntimeException('Microsoft calendar provider is not implemented yet.');
    }

    public function refreshAccessToken(Integration $integration): RefreshedAccessTokenData
    {
        throw new \RuntimeException('Microsoft calendar provider refresh is not implemented yet.');
    }
}