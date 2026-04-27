<?php

namespace App\Http\Controllers\Region\Web;

use App\Application\Region\Currency\Queries\CurrencyPageQuery;
use App\Support\Translations\Region\CurrencyTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Region\CurrencyResource;
use Inertia\Inertia;
use Inertia\Response;

final class CurrencyPageController extends Controller
{
    /**
     * Display a listing of currencies for the authenticated user.
     */
    public function index(CurrencyPageQuery $currencyPageQuery): Response
    {
        return Inertia::render('Region/Currency/Index', [
            'translations' => CurrencyTranslations::index(),
            'currencies' => CurrencyResource::collection(
                $currencyPageQuery->getList($this->user())
            ),
        ]);
    }
}