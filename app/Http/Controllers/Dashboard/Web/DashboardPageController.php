<?php

namespace App\Http\Controllers\Dashboard\Web;

use App\Application\Booking\Queries\BookingPageQuery;
use App\Application\Booking\Queries\BookingFormOptionsQuery;
use App\Support\Translations\DashboardTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Booking\BookingResource;
use Inertia\Inertia;
use Inertia\Response;

final class DashboardPageController extends Controller
{
    /**
     * Display the dashboard page.
     */
    public function index(BookingPageQuery $bookingPageQuery): Response
    {
        $bookings = $bookingPageQuery->getList($this->user());

        return Inertia::render('Dashboard/Index', [
            'translations' => DashboardTranslations::index(),
            'bookings' => BookingResource::collection($bookings),
        ]);
    }

	/**
     * Show the booking creation page.
     */
    public function create(BookingFormOptionsQuery $bookingFormOptionsQuery): Response
    {
        return Inertia::render('Dashboard/Create', [
            'translations' => DashboardTranslations::create(),
            ...$bookingFormOptionsQuery->getCreateFormData(),
        ]);
    }
}