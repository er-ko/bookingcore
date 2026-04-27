<?php

namespace App\Infrastructure\Integration\Providers;

use App\Application\Integration\DTO\CalendarAccountData;
use App\Application\Integration\DTO\CalendarData;
use App\Application\Integration\DTO\CalendarEventData;
use App\Application\Integration\DTO\RefreshedAccessTokenData;
use App\Domain\Integration\Contracts\CalendarProvider;
use App\Enums\IntegrationProvider;
use App\Models\Integration\Integration;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Google\Client as GoogleClient;
use Google\Service\Calendar as GoogleCalendarService;
use Google\Service\Calendar\Event as GoogleCalendarEvent;
use Google\Service\Calendar\EventAttendee as GoogleCalendarEventAttendee;
use Google\Service\Calendar\EventDateTime as GoogleCalendarEventDateTime;
use RuntimeException;

final class GoogleCalendarProvider implements CalendarProvider
{
    public function getAccount(
        Integration $integration
    ): CalendarAccountData {
        $service = $this->calendarService($integration);

        $primaryCalendar = $service->calendarList->get('primary');

        return new CalendarAccountData(
            providerAccountId: $integration->provider_account_id ?? $primaryCalendar->getId(),
            email: $integration->email,
            name: $integration->name ?? $primaryCalendar->getSummary(),
            timezone: $primaryCalendar->getTimeZone(),
            meta: [
                'primary_calendar_id' => $primaryCalendar->getId(),
                'access_role' => $primaryCalendar->getAccessRole(),
            ],
        );
    }

    public function listCalendars(
        Integration $integration
    ): array {
        $service = $this->calendarService($integration);

        $result = $service->calendarList->listCalendarList([
            'showHidden' => false,
        ]);

        $items = [];

        foreach ($result->getItems() ?? [] as $calendar) {
            $accessRole = $calendar->getAccessRole();

            $items[] = new CalendarData(
                id: $calendar->getId(),
                name: $calendar->getSummary(),
                description: $calendar->getDescription(),
                timezone: $calendar->getTimeZone(),
                isPrimary: (bool) $calendar->getPrimary(),
                isReadOnly: in_array($accessRole, ['reader', 'freeBusyReader'], true),
                meta: [
                    'access_role' => $accessRole,
                    'background_color' => $calendar->getBackgroundColor(),
                    'foreground_color' => $calendar->getForegroundColor(),
                ],
            );
        }

        return $items;
    }

    public function createEvent(
        Integration $integration,
        string $calendarId,
        CalendarEventData $eventData,
    ): string {
        $service = $this->calendarService($integration);

        $event = $this->makeEvent($eventData);

        $createdEvent = $service->events->insert($calendarId, $event);

        return $createdEvent->getId();
    }

    public function updateEvent(
        Integration $integration,
        string $calendarId,
        string $eventId,
        CalendarEventData $eventData,
    ): void {
        $service = $this->calendarService($integration);

        $event = $this->makeEvent($eventData);

        $service->events->update($calendarId, $eventId, $event);
    }

    public function deleteEvent(
        Integration $integration,
        string $calendarId,
        string $eventId,
    ): void {
        $service = $this->calendarService($integration);

        $service->events->delete($calendarId, $eventId);
    }

    public function refreshAccessToken(
        Integration $integration
    ): RefreshedAccessTokenData {
        $this->assertGoogleIntegration($integration);

        if (! $integration->is_active) {
            throw new RuntimeException(__('integration/calendar.messages.integration_inactive'));
        }

        if (! filled($integration->refresh_token)) {
            throw new RuntimeException(__('integration/calendar.messages.missing_refresh_token'));
        }

        $client = $this->makeClient();

        $tokenData = $client->fetchAccessTokenWithRefreshToken($integration->refresh_token);

        if (! is_array($tokenData) || isset($tokenData['error'])) {
            throw new RuntimeException(__('integration/calendar.messages.google_refresh_failed'));
        }

        if (! isset($tokenData['access_token']) || ! is_string($tokenData['access_token'])) {
            throw new RuntimeException(
                __('integration/calendar.messages.google_refresh_missing_access_token')
            );
        }

        $expiresAt = null;

        if (isset($tokenData['expires_in']) && is_numeric($tokenData['expires_in'])) {
            $expiresAt = CarbonImmutable::now()->addSeconds((int) $tokenData['expires_in']);
        }

        return new RefreshedAccessTokenData(
            accessToken: $tokenData['access_token'],
            refreshToken: isset($tokenData['refresh_token']) && is_string($tokenData['refresh_token'])
                ? $tokenData['refresh_token']
                : null,
            tokenExpiresAt: $expiresAt,
        );
    }

    private function calendarService(
        Integration $integration
    ): GoogleCalendarService {
        $this->assertGoogleIntegration($integration);

        if (! $integration->is_active) {
            throw new RuntimeException(__('integration/calendar.messages.integration_inactive'));
        }

        if (! filled($integration->access_token)) {
            throw new RuntimeException(__('integration/calendar.messages.missing_access_token'));
        }

        $client = $this->makeClient();
        $client->setAccessToken($integration->access_token);

        return new GoogleCalendarService($client);
    }

    private function makeClient(): GoogleClient
    {
        $client = new GoogleClient();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        return $client;
    }

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

    private function makeEvent(
        CalendarEventData $eventData
    ): GoogleCalendarEvent {
        $event = new GoogleCalendarEvent([
            'summary' => $eventData->title,
            'description' => $eventData->description,
            'location' => $eventData->location,
            'start' => $this->makeEventDateTime(
                $eventData->startsAt,
                $eventData->timezone
            ),
            'end' => $this->makeEventDateTime(
                $eventData->endsAt,
                $eventData->timezone
            ),
        ]);

        if ($eventData->attendees !== []) {
            $event->setAttendees(
                array_map(
                    static fn (string $email): GoogleCalendarEventAttendee => new GoogleCalendarEventAttendee([
                        'email' => $email,
                    ]),
                    $eventData->attendees,
                ),
            );
        }

        return $event;
    }

    private function makeEventDateTime(
        CarbonInterface $dateTime,
        ?string $timezone
    ): GoogleCalendarEventDateTime {
        $resolvedTimezone = $timezone ?: config('app.timezone');

        return new GoogleCalendarEventDateTime([
            'dateTime' => $dateTime->copy()->format('Y-m-d\TH:i:s'),
            'timeZone' => $resolvedTimezone,
        ]);
    }
}
