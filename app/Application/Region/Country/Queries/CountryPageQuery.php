<?php

namespace App\Application\Region\Country\Queries;

use App\Domain\Region\Services\UserRegionSettingsService;
use App\Models\Region\Country;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving country data
 * required by country-related UI pages.
 */
final class CountryPageQuery
{
    public function __construct(
        private readonly UserRegionSettingsService $userRegionSettingsService,
    ) {
    }

    /**
     * Retrieve country list data for the country index page.
     *
     * @return LengthAwarePaginator<int, Country>
     */
    public function getList(
        User $user
    ): LengthAwarePaginator {
        $activeCountryCodes = $this->userRegionSettingsService->activeCountryCodes($user);

        $countries = Country::query()
            ->select([
                'id',
                'iso_alpha2',
                'name',
                'official_name',
                'local_name',
                'flag_emoji',
                'default_language_code',
                'default_currency_code',
                'phone_code',
            ])
            ->orderBy('official_name')
            ->paginate(15);

        $countries->getCollection()->transform(
            function (Country $country) use ($activeCountryCodes): Country {
                $country->setAttribute(
                    'is_active_for_user',
                    in_array(
                        strtoupper((string) $country->iso_alpha2),
                        $activeCountryCodes,
                        true
                    )
                );

                return $country;
            }
        );

        return $countries;
    }
}