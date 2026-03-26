<?php

namespace App\Application\Region\Queries;

use App\Models\Region\Country;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving country data
 * required by country-related UI pages.
 */
final class CountryPageQuery
{
    /**
     * Retrieve country list data for the country index page.
     *
     * @return LengthAwarePaginator<int, Country>
     */
    public function getList(): LengthAwarePaginator
    {
        return Country::query()
            ->orderBy('official_name')
            ->paginate(20);
    }
}