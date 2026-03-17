<?php

namespace App\Http\Controllers\Booking\Web;

use App\Application\Booking\Queries\BookingPageQuery;
use App\Application\Booking\Queries\BookingFormOptionsQuery;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use Inertia\Inertia;
use Inertia\Response;

final class BookingPageController extends Controller
{
    /**
     * Display a listing of bookings.
     */
    public function index(BookingPageQuery $bookingPageQuery): Response
    {
        $bookings = $bookingPageQuery->getList();

        return Inertia::render('Booking/Index', [
            'bookings' => BookingResource::collection($bookings),
        ]);
    }

    /**
     * Show the booking creation page.
     */
    public function create(BookingFormOptionsQuery $bookingFormOptionsQuery): Response
    {
        return Inertia::render('Booking/Create', [
            ...$bookingFormOptionsQuery->getCreateFormData(),
        ]);
    }
}