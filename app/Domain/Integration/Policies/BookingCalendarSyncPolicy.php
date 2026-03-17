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

        if (! $settings->syncEnabled()) {
            return false;
        }

        if (! $this->hasSelectedCalendar($settings)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether strict sync mode is enabled.
     */
    public function isStrict(?Integration $integration): bool
    {
        $settings = $integration?->calendarSettings;

        if (! $settings) {
            return false;
        }

        return $settings->isStrictMode();
    }

    /**
     * Determine whether soft sync mode is enabled.
     */
    public function isSoft(?Integration $integration): bool
    {
        $settings = $integration?->calendarSettings;

        if (! $settings) {
            return true;
        }

        return $settings->isSoftMode();
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