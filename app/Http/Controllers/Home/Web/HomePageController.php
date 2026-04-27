<?php

namespace App\Http\Controllers\Home\Web;

use App\Http\Controllers\Controller;
use App\Support\Translations\HomeTranslations;
use Inertia\Inertia;
use Inertia\Response;

final class HomePageController extends Controller
{
    /**
     * Display the homepage.
     */
    public function __invoke(): Response
    {
        return Inertia::render('Home/Index', [
            'translations' => HomeTranslations::index(),
        ]);
    }
}