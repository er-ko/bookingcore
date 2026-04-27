<?php

namespace App\Http\Controllers\Price\Web;

use App\Application\Price\Queries\PricePageQuery;
use App\Http\Controllers\Controller;
use App\Support\Translations\PriceTranslations;
use Inertia\Inertia;
use Inertia\Response;

final class PricePageController extends Controller
{
    /**
     * Display the prices page.
     */
    public function index(
        PricePageQuery $pricePageQuery
    ): Response {
        return Inertia::render('Price/Index', [
            'translations' => PriceTranslations::index(),
            ...$pricePageQuery->get($this->user()),
        ]);
    }
}