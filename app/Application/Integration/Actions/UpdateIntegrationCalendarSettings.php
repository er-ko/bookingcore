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
     * Update calendar settings for the given integration.
     */
    public function __invoke(
        User $user,
        Integration $integration,
        string $syncMode,
    ): Integration {
        if ($integration->user_id !== $user->id) {
            throw new RuntimeException(__('integration/calendar.messages.integration_user_mismatch'));
        }

        if ($integration->type !== IntegrationType::Calendar) {
            throw new RuntimeException(__('integration/calendar.messages.integration_not_calendar'));
        }

        if (! $integration->is_active) {
            throw new RuntimeException(__('integration/calendar.messages.integration_inactive'));
        }

        if (! in_array($syncMode, ['soft', 'strict'], true)) {
            throw new RuntimeException(__('integration/calendar.messages.invalid_sync_mode'));
        }

        IntegrationCalendarSetting::query()->updateOrCreate(
            [
                'integration_id' => $integration->id,
            ],
            [
                'selected_calendar_id' => $integration->calendarSettings?->selected_calendar_id,
                'sync_mode' => $syncMode,
            ],
        );

        return $integration->fresh('calendarSettings');
    }
}
