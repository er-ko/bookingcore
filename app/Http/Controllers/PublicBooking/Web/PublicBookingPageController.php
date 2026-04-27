<?php

namespace App\Http\Controllers\PublicBooking\Web;

use App\Application\PublicBooking\Queries\PublicBookingPageQuery;
use App\Http\Controllers\Controller;
use App\Support\Translations\PublicBookingTranslations;
use Inertia\Inertia;
use Inertia\Response;

final class PublicBookingPageController extends Controller
{
    /**
     * Display the public booking page for the given user slug.
     */
    public function __invoke(
        string $slug,
        PublicBookingPageQuery $publicBookingPageQuery,
    ): Response {
        return Inertia::render('PublicBooking/Show', [
            'translations' => PublicBookingTranslations::show(),
            ...$publicBookingPageQuery->get($slug),
        ]);
    }
}