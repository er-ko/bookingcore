<?php

namespace App\Http\Controllers\Region\Web;

use App\Application\Country\Queries\BranchFormOptionsQuery;
use App\Application\Region\Queries\CountryPageQuery;
use App\Http\Controllers\Controller;
use App\Http\Resources\Region\CountryResource;
use App\Models\Region\Country;
use Inertia\Inertia;
use Inertia\Response;

final class CountryPageController extends Controller
{
    /**
     * Display a listing of countries.
     */
    public function index(CountryPageQuery $countryPageQuery): Response
    {
        $countries = $countryPageQuery->getList();

        return Inertia::render('Region/Country/Index', [
            'countries' => CountryResource::collection($countries),
        ]);
    }

    /**
     * Show the branch creation page.
     */
    public function create(BranchFormOptionsQuery $branchFormOptionsQuery): Response
    {
        return Inertia::render('Booking/Branch/Create', [
            ...$branchFormOptionsQuery->getCreateFormData(),
        ]);
    }

    /**
     * Show the country edit page.
     */
    public function edit(
        Country $country,
        BranchFormOptionsQuery $branchFormOptionsQuery
    ): Response {
        abort_unless($branch->user_id === $this->user()->id, 404);

        $branch->load('country');

        return Inertia::render('Booking/Branch/Edit', [
            'branch' => CountryResource::make($country)->resolve(),
            ...$branchFormOptionsQuery->getCreateFormData(),
        ]);
    }
}