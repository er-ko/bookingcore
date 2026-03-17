<?php

namespace App\Http\Controllers\Booking\Api;

use App\Domain\Booking\Actions\UpdateBookingStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\UpdateBookingStatusRequest;
use App\Models\Booking\Booking;
use Illuminate\Http\JsonResponse;

final class UpdateBookingStatusController extends Controller
{
    /**
     * Update the status of the given booking.
     */
    public function __invoke(
        Booking $booking,
        UpdateBookingStatusRequest $request,
        UpdateBookingStatus $updateBookingStatus,
    ): JsonResponse {
        $booking = $updateBookingStatus(
            $booking,
            $request->toStatus(),
        );

        return response()->json([
            'message' => __('booking/messages.status_updated'),
            'data' => $booking,
        ], 200);
    }
}