<?php

namespace App\Application\Integration\Queries;

use App\Application\Integration\Actions\EnsureValidGoogleAccessTokenAction;
use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Infrastructure\Integration\Repositories\IntegrationRepository;
use App\Infrastructure\Integration\Resolvers\CalendarProviderResolver;
use App\Models\Integration\Integration;
use App\Models\User;
use Throwable;

final class IntegrationCalendarQuery
{
    public function __construct(
        private readonly IntegrationRepository $integrations,
        private readonly CalendarProviderResolver $calendarProviderResolver,
        private readonly EnsureValidGoogleAccessTokenAction $ensureValidGoogleAccessTokenAction,
    ) {
    }

    /**
     * Get calendar integration data for the given user.
     *
     * @return array<string, mixed>
     */
    public function __invoke(
        User $user
    ): array {
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
                'connection_error' => null,
            ];
        }

        $integration->loadMissing('calendarSettings');

        $provider = $this->calendarProviderResolver->resolve($integration->provider);

        try {
            $integration = ($this->ensureValidGoogleAccessTokenAction)($integration);
            $integration->loadMissing('calendarSettings');

            $account = $provider->getAccount($integration);
            $calendars = $provider->listCalendars($integration);
        } catch (Throwable $exception) {
            report($exception);

            return [
                'integration' => $this->formatIntegration($integration),
                'account' => null,
                'calendars' => [],
                'connection_error' => __('integration/calendar.messages.connection_error'),
            ];
        }

        return [
            'integration' => $this->formatIntegration($integration),
            'account' => $account->toArray(),
            'calendars' => array_map(
                static fn ($calendar) => $calendar->toArray(),
                $calendars,
            ),
            'connection_error' => null,
        ];
    }

    /**
     * Format integration data for the frontend.
     *
     * @return array<string, mixed>
     */
    private function formatIntegration(
        Integration $integration
    ): array {
        $calendarSettings = $integration->calendarSettings;

        return [
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
            ] : null,
        ];
    }
}
