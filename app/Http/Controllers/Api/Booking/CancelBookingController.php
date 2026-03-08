<?php

namespace App\Http\Controllers\Api\Booking;

use App\Domain\Booking\Actions\CancelBooking;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;

final class CancelBookingController extends Controller
{
    /**
     * Cancel the given booking.
     */
    public function __invoke(Booking $booking, CancelBooking $cancelBooking): JsonResponse
    {
        $booking = $cancelBooking($booking);

        return response()->json([
            'message' => __('booking/messages.cancelled'),
            'data' => $booking,
        ], 200);
    }
}