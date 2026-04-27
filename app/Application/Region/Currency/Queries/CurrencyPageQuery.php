<?php

namespace App\Application\Region\Currency\Queries;

use App\Domain\Region\Services\UserRegionSettingsService;
use App\Models\Region\Currency;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving currency data
 * required by currency-related UI pages.
 */
final class CurrencyPageQuery
{
    public function __construct(
        private readonly UserRegionSettingsService $userRegionSettingsService,
    ) {
    }

    /**
     * Retrieve currency list data for the currency index page.
     *
     * @return LengthAwarePaginator<int, Currency>
     */
    public function getList(
        User $user
    ): LengthAwarePaginator {
        $activeCurrencyCodes = $this->userRegionSettingsService->activeCurrencyCodes($user);

        $currencies = Currency::query()
            ->select([
                'id',
                'currency_code',
                'name',
                'flag_emoji',
                'minor_unit',
				'symbol_prefix',
				'symbol_suffix',
            ])
            ->orderBy('name')
            ->paginate(15);

        $currencies->getCollection()->transform(
            function (Currency $currency) use ($activeCurrencyCodes): Currency {
                $currency->setAttribute(
                    'is_active_for_user',
                    in_array(
                        (string) $currency->currency_code,
                        $activeCurrencyCodes,
                        true
                    )
                );

                return $currency;
            }
        );

        return $currencies;
    }
}