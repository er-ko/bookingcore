<?php

namespace App\Domain\Integration\Policies;

use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;

final class BookingCalendarSyncPolicy
{
    /**
     * Determine whether the integration can sync bookings to calendar.
     */
    public function canSync(?Integration $integration): bool
    {
        if (! $integration || ! $integration->is_active) {
            return false;
        }

        $settings = $integration->calendarSettings;

        if (! $settings) {
            return false;
        }

        if (! $this->hasSelectedCalendar($settings)) {
            return false;
        }

        return true;
    }

    /**
     * Get the selected calendar identifier for the integration.
     */
    public function selectedCalendarId(?Integration $integration): ?string
    {
        $settings = $integration?->calendarSettings;

        if (! $settings || ! $this->hasSelectedCalendar($settings)) {
            return null;
        }

        return $settings->selected_calendar_id;
    }

    /**
     * Determine whether the settings contain a selected calendar.
     */
    private function hasSelectedCalendar(IntegrationCalendarSetting $settings): bool
    {
        return is_string($settings->selected_calendar_id)
            && $settings->selected_calendar_id !== '';
    }
}