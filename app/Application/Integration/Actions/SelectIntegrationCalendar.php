<?php

namespace App\Application\Integration\Actions;

use App\Enums\IntegrationType;
use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;
use App\Models\User;
use RuntimeException;

final class SelectIntegrationCalendar
{
    /**
     * Select the target calendar for the given integration.
     */
    public function __invoke(
        User $user,
        Integration $integration,
        string $calendarId
    ): Integration {
        $calendarId = trim($calendarId);

        if ($calendarId === '') {
            throw new RuntimeException(__('integration/calendar.messages.invalid_calendar_id'));
        }

        if ($integration->user_id !== $user->id) {
            throw new RuntimeException(__('integration/calendar.messages.integration_user_mismatch'));
        }

        if ($integration->type !== IntegrationType::Calendar) {
            throw new RuntimeException(__('integration/calendar.messages.integration_not_calendar'));
        }

        if (! $integration->is_active) {
            throw new RuntimeException(__('integration/calendar.messages.integration_inactive'));
        }

        IntegrationCalendarSetting::query()->updateOrCreate(
            [
                'integration_id' => $integration->id,
            ],
            [
                'selected_calendar_id' => $calendarId,
                'sync_mode' => $integration->calendarSettings?->sync_mode ?? 'soft',
            ],
        );

        return $integration->fresh('calendarSettings');
    }
}
