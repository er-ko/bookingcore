<?php

namespace App\Application\Region\Language\Actions;

use App\Models\Region\Language;
use App\Models\Region\UserRegionSetting;
use App\Models\User;
use Illuminate\Support\Collection;

final class UpdateLanguageStatus
{
    /**
     * Update user-specific language status configuration.
     *
     * @param list<int> $languageIds
     */
    public function __invoke(
        User $user, string $scope,
        bool $isActive,
        array $languageIds = []
    ): int {
        $settings = UserRegionSetting::query()->firstOrCreate(
            ['user_id' => $user->id],
            [
                'active_country_codes' => null,
                'active_language_codes' => [],
                'active_currency_codes' => null,
            ]
        );

        $currentCodes = collect($settings->active_language_codes ?? [])
            ->filter(fn ($code) => is_string($code) && $code !== '')
            ->map(fn (string $code) => trim($code))
            ->unique()
            ->values();

        $targetCodes = $this->resolveTargetLanguageCodes($scope, $languageIds);

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
            'active_language_codes' => $updatedCodes->all(),
        ]);

        return $targetCodes->count();
    }

    /**
     * Resolve target language codes for the given scope.
     *
     * @param list<int> $languageIds
     * @return Collection<int, string>
     */
    private function resolveTargetLanguageCodes(
        string $scope,
        array $languageIds
    ): Collection {
        $query = Language::query()->select(['id', 'language_tag']);

        if (in_array($scope, ['single', 'selected'], true)) {
            $query->whereIn('id', $languageIds);
        }

        return $query
            ->get()
            ->pluck('language_tag')
            ->filter(fn ($code) => is_string($code) && $code !== '')
            ->map(fn (string $code) => trim($code))
            ->unique()
            ->values();
    }
}