<?php

namespace App\Http\Controllers\Dashboard\Web;

use App\Application\Booking\Actions\CreateBooking;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateBookingRequest;
use Illuminate\Http\JsonResponse;

final class CreateBookingController extends Controller
{
    /**
     * Create a new booking.
     */
    public function __invoke(
        CreateBookingRequest $request,
        CreateBooking $createBooking
    ): JsonResponse {
        $createBooking($request->toDTO());

        return response()->json([
            'message' => __('dashboard.messages.created'),
        ], 201);
    }
}
