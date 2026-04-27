<?php

namespace App\Application\Region\Currency\Actions;

use App\Models\Region\Currency;
use App\Models\Region\UserRegionSetting;
use App\Models\User;
use Illuminate\Support\Collection;

final class UpdateCurrencyStatus
{
    /**
     * Update user-specific currency status configuration.
     *
     * @param list<int> $currencyIds
     */
    public function __invoke(
        User $user,
        string $scope, 
        bool $isActive,
        array $currencyIds = []
    ): int {
        $settings = UserRegionSetting::query()->firstOrCreate(
            ['user_id' => $user->id],
            [
                'active_country_codes' => null,
                'active_language_codes' => null,
                'active_currency_codes' => [],
            ]
        );

        $currentCodes = collect($settings->active_currency_codes ?? [])
            ->filter(fn ($code) => is_string($code) && $code !== '')
            ->map(fn (string $code) => trim($code))
            ->unique()
            ->values();

        $targetCodes = $this->resolveTargetCurrencyCodes($scope, $currencyIds);

        if ($isActive) {
            $updatedCodes = $currentCodes
                ->merge($targetCodes)
                ->unique()
                ->sort()
                ->values();
        } else {
            $updatedCodes = $currentCodes
                ->reject(fn (string $code) => $targetCodes->contains($code))
                ->values();
        }

        $settings->update([
            'active_currency_codes' => $updatedCodes->all(),
        ]);

        return $targetCodes->count();
    }

    /**
     * Resolve target currency codes for the given scope.
     *
     * @param list<int> $currencyIds
     * @return Collection<int, string>
     */
    private function resolveTargetCurrencyCodes(
        string $scope,
        array $currencyIds
    ): Collection {
        $query = Currency::query()->select(['id', 'currency_code']);

        if (in_array($scope, ['single', 'selected'], true)) {
            $query->whereIn('id', $currencyIds);
        }

        return $query
            ->get()
            ->pluck('currency_code')
            ->filter(fn ($code) => is_string($code) && $code !== '')
            ->map(fn (string $code) => trim($code))
            ->unique()
            ->values();
    }
}