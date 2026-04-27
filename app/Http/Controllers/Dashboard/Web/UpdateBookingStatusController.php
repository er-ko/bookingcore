<?php

namespace App\Http\Controllers\Dashboard\Web;

use App\Application\Booking\Actions\UpdateBookingStatus;
use App\Domain\Booking\Exceptions\BookingException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\UpdateBookingStatusRequest;
use App\Models\Booking\Booking;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

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
        abort_unless($booking->branch->user_id === $this->user()->id, 403);

        try {
            $booking = $updateBookingStatus(
                $booking,
                $request->toStatus(),
            );

            return response()->json([
                'message' => __('dashboard.messages.status_updated'),
                'data' => $booking,
            ], 200);
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => __('dashboard.messages.not_found'),
            ], 404);
        } catch (BookingException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        } catch (Throwable $exception) {
            report($exception);

            return response()->json([
                'message' => __('dashboard.messages.failed'),
            ], 500);
        }
    }
}
