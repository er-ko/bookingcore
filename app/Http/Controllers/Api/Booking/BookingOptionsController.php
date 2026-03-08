<?php

namespace App\Http\Controllers\Api\Booking;

use App\Application\Booking\Queries\BookingActivityOptionsQuery;
use App\Application\Booking\Queries\BookingResourceOptionsQuery;
use App\Application\Booking\Queries\BookingSlotOptionsQuery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\ActivityOptionsRequest;
use App\Http\Requests\Booking\ResourceOptionsRequest;
use App\Http\Requests\Booking\SlotOptionsRequest;
use Illuminate\Http\JsonResponse;

final class BookingOptionsController extends Controller
{
    /**
     * Return active resources for the selected branch.
     */
    public function resources(
        ResourceOptionsRequest $request,
        BookingResourceOptionsQuery $query,
    ): JsonResponse {
        return response()->json([
            'data' => $query->getList(
                branchId: $request->branchId(),
            ),
        ], 200);
    }

    /**
     * Return active activities assigned to the selected resource.
     */
    public function activities(
        ActivityOptionsRequest $request,
        BookingActivityOptionsQuery $query,
    ): JsonResponse {
        return response()->json([
            'data' => $query->getList(
                resourceId: $request->resourceId(),
            ),
        ], 200);
    }

    /**
     * Return available booking slots for the selected date and booking combination.
     */
    public function slots(
        SlotOptionsRequest $request,
        BookingSlotOptionsQuery $query,
    ): JsonResponse {
        return response()->json([
            'data' => $query->getList(
                branchId: $request->branchId(),
                resourceId: $request->resourceId(),
                activityId: $request->activityId(),
                date: $request->availabilityDate(),
            ),
        ], 200);
    }
}