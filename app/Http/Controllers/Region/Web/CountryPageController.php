<?php

namespace App\Http\Controllers\Region\Web;

use App\Application\Region\Country\Queries\CountryPageQuery;
use App\Support\Translations\Region\CountryTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Region\CountryResource;
use Inertia\Inertia;
use Inertia\Response;

final class CountryPageController extends Controller
{
    /**
     * Display a listing of countries for the authenticated user.
     */
    public function index(CountryPageQuery $countryPageQuery): Response
    {
        return Inertia::render('Region/Country/Index', [
            'translations' => CountryTranslations::index(),
            'countries' => CountryResource::collection(
                $countryPageQuery->getList($this->user())
            ),
        ]);
    }
}