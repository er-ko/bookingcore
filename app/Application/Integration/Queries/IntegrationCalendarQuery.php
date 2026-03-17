<?php

namespace App\Application\Integration\Queries;

use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Infrastructure\Integration\Repositories\IntegrationRepository;
use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\User;

final class IntegrationCalendarQuery
{
    public function __construct(
        private readonly IntegrationRepository $integrations,
        private readonly CalendarProviderResolver $calendarProviderResolver,
    ) {
    }

    /**
     * Get calendar integration data for the given user.
     *
     * @return array<string, mixed>
     */
    public function __invoke(User $user): array
    {
        $integration = $this->integrations->findPrimary(
            userId: $user->id,
            type: IntegrationType::Calendar,
            provider: IntegrationProvider::Google,
        );

        if (! $integration) {
            return [
                'integration' => null,
                'account' => null,
                'calendars' => [],
            ];
        }

        $integration->loadMissing('calendarSettings');

        $calendarSettings = $integration->calendarSettings;

        $provider = $this->calendarProviderResolver->resolve($integration->provider);

        $account = $provider->getAccount($integration);
        $calendars = $provider->listCalendars($integration);

        return [
            'integration' => [
                'id' => $integration->id,
                'type' => $integration->type->value,
                'provider' => $integration->provider->value,
                'email' => $integration->email,
                'name' => $integration->name,
                'is_active' => $integration->is_active,
                'is_primary' => $integration->is_primary,
                'meta' => $integration->meta,
                'calendar_settings' => $calendarSettings ? [
                    'selected_calendar_id' => $calendarSettings->selected_calendar_id,
                    'sync_bookings' => $calendarSettings->sync_bookings,
                    'sync_mode' => $calendarSettings->sync_mode,
                ] : null,
            ],
            'account' => $account->toArray(),
            'calendars' => array_map(
                static fn ($calendar) => $calendar->toArray(),
                $calendars,
            ),
        ];
    }
}