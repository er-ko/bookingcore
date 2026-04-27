<?php

namespace App\Domain\Region\Services;

use App\Models\User;

final class UserRegionSettingsService
{
    /**
     * Get active country codes configured for the user.
     *
     * Countries not present in the settings are considered inactive.
     *
     * @return list<string>
     */
    public function activeCountryCodes(User $user): array
    {
        return collect($user->regionSettings?->active_country_codes ?? [])
            ->filter(fn ($code) => is_string($code) && $code !== '')
            ->map(fn (string $code) => strtoupper($code))
            ->unique()
            ->sort()
            ->values()
            ->all();
    }

    /**
     * Get active language codes configured for the user.
     *
     * Languages not present in the settings are considered inactive.
     *
     * @return list<string>
     */
    public function activeLanguageCodes(User $user): array
    {
        return collect($user->regionSettings?->active_language_codes ?? [])
            ->filter(fn ($language_tag) => is_string($language_tag) && $language_tag !== '')
            ->unique()
            ->sort()
            ->values()
            ->all();
    }

    /**
     * Get active currency codes configured for the user.
     *
     * Currencies not present in the settings are considered inactive.
     *
     * @return list<string>
     */
    public function activeCurrencyCodes(User $user): array
    {
        return collect($user->regionSettings?->active_currency_codes ?? [])
            ->filter(fn ($currency_code) => is_string($currency_code) && $currency_code !== '')
            ->unique()
            ->sort()
            ->values()
            ->all();
    }
}