<?php

namespace App\Http\Controllers\Api\Booking;

use App\Domain\Booking\Actions\CreateBooking;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\CreateBookingRequest;
use Illuminate\Http\JsonResponse;

final class CreateBookingController extends Controller
{
    /**
     * Create a new booking.
     */
    public function __invoke(CreateBookingRequest $request, CreateBooking $createBooking): JsonResponse
    {
        $booking = $createBooking($request->toDTO());

        return response()->json([
            'message' => __('booking/messages.created'),
            'data' => $booking,
        ], 201);
    }
}