<?php

namespace App\Http\Controllers\Dashboard\Web;

use App\Application\Booking\Actions\CancelBooking;
use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use Illuminate\Http\JsonResponse;

final class CancelBookingController extends Controller
{
    /**
     * Cancel the given booking.
     */
    public function __invoke(
        Booking $booking,
        CancelBooking $cancelBooking
    ): JsonResponse {
        abort_unless($booking->branch->user_id === $this->user()->id, 403);

        $cancelBooking($booking);

        return response()->json([
            'message' => __('dashboard.messages.cancelled'),
        ], 200);
    }
}
