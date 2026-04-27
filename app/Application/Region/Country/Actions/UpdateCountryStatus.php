<?php

namespace App\Application\Region\Country\Actions;

use App\Models\Region\Country;
use App\Models\Region\UserRegionSetting;
use App\Models\User;
use Illuminate\Support\Collection;

final class UpdateCountryStatus
{
    /**
     * Update user-specific country status configuration.
     *
     * @param list<int> $countryIds
     */
    public function __invoke(
        User $user,
        string $scope,
        bool $isActive,
        array $countryIds = []
    ): int {
        $settings = UserRegionSetting::query()->firstOrCreate(
            ['user_id' => $user->id],
            [
                'active_country_codes' => [],
                'active_language_codes' => null,
                'active_currency_codes' => null,
            ]
        );

        $currentCodes = collect($settings->active_country_codes ?? [])
            ->filter(fn ($code) => is_string($code) && $code !== '')
            ->map(fn (string $code) => strtoupper($code))
            ->unique()
            ->values();

        $targetCodes = $this->resolveTargetCountryCodes($scope, $countryIds);

        if ($isActive) {
            $updatedCodes = $currentCodes
                ->merge($targetCodes)
                ->map(fn (string $code) => strtoupper($code))
                ->unique()
                ->sort()
                ->values();
        } else {
            $updatedCodes = $currentCodes
                ->reject(fn (string $code) => $targetCodes->contains($code))
                ->map(fn (string $code) => strtoupper($code))
                ->unique()
                ->sort()
                ->values();
        }

        $settings->update([
            'active_country_codes' => $updatedCodes->all(),
        ]);

        return $targetCodes->count();
    }

    /**
     * Resolve target country codes for the given scope.
     *
     * @param list<int> $countryIds
     * @return Collection<int, string>
     */
    private function resolveTargetCountryCodes(
        string $scope,
        array $countryIds
    ): Collection
    {
        $query = Country::query()->select(['id', 'iso_alpha2']);

        if (in_array($scope, ['single', 'selected'], true)) {
            $query->whereIn('id', $countryIds);
        }

        return $query
            ->get()
            ->pluck('iso_alpha2')
            ->filter(fn ($code) => is_string($code) && $code !== '')
            ->map(fn (string $code) => strtoupper($code))
            ->unique()
            ->values();
    }
}