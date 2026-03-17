<?php

namespace App\Application\Integration\Actions;

use App\Enums\IntegrationType;
use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;
use App\Models\User;
use RuntimeException;

final class UpdateIntegrationCalendarSettings
{
    /**
     * Update calendar sync settings for the given integration.
     */
    public function __invoke(
        User $user,
        Integration $integration,
        bool $syncBookings,
        string $syncMode,
    ): Integration {
        if ($integration->user_id !== $user->id) {
            throw new RuntimeException('The selected integration does not belong to the authenticated user.');
        }

        if ($integration->type !== IntegrationType::Calendar) {
            throw new RuntimeException('The selected integration is not a calendar integration.');
        }

        if (! $integration->is_active) {
            throw new RuntimeException('The selected integration is inactive.');
        }

        if (! in_array($syncMode, ['soft', 'strict'], true)) {
            throw new RuntimeException('The selected sync mode is invalid.');
        }

        IntegrationCalendarSetting::query()->updateOrCreate(
            [
                'integration_id' => $integration->id,
            ],
            [
                'selected_calendar_id' => $integration->calendarSettings?->selected_calendar_id,
                'sync_bookings' => $syncBookings,
                'sync_mode' => $syncMode,
            ],
        );

        return $integration->fresh('calendarSettings');
    }
}