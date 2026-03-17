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
    public function __invoke(User $user, Integration $integration, string $calendarId): Integration
    {
        $calendarId = trim($calendarId);

        if ($integration->user_id !== $user->id) {
            throw new RuntimeException('The selected integration does not belong to the authenticated user.');
        }

        if ($integration->type !== IntegrationType::Calendar) {
            throw new RuntimeException('The selected integration is not a calendar integration.');
        }

        if (! $integration->is_active) {
            throw new RuntimeException('The selected integration is inactive.');
        }

        IntegrationCalendarSetting::query()->updateOrCreate(
            [
                'integration_id' => $integration->id,
            ],
            [
                'selected_calendar_id' => $calendarId,
                'sync_bookings' => true,
                'sync_mode' => 'soft',
            ],
        );

        return $integration->fresh('calendarSettings');
    }
}