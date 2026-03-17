<?php

namespace App\Domain\Integration\Contracts;

use App\Domain\Integration\DTO\CalendarAccountData;
use App\Domain\Integration\DTO\CalendarData;
use App\Domain\Integration\DTO\CalendarEventData;
use App\Models\Integration\Integration;

interface CalendarProvider
{
    /**
     * Get account information for the connected calendar integration.
     */
    public function getAccount(Integration $integration): CalendarAccountData;

    /**
     * List calendars available for the connected integration.
     *
     * @return array<int, CalendarData>
     */
    public function listCalendars(Integration $integration): array;

    /**
     * Create a calendar event and return the provider event identifier.
     */
    public function createEvent(
        Integration $integration,
        string $calendarId,
        CalendarEventData $eventData,
    ): string;

    /**
     * Update an existing calendar event.
     */
    public function updateEvent(
        Integration $integration,
        string $calendarId,
        string $eventId,
        CalendarEventData $eventData,
    ): void;

    /**
     * Delete an existing calendar event.
     */
    public function deleteEvent(
        Integration $integration,
        string $calendarId,
        string $eventId,
    ): void;

    /**
     * Refresh the access token for the connected integration.
     */
    public function refreshAccessToken(Integration $integration): Integration;
}