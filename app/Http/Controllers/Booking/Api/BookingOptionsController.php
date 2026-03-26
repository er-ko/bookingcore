<?php

namespace App\Http\Controllers\Booking\Api;

use App\Application\Booking\Queries\BookingActivityOptionsQuery;
use App\Application\Booking\Queries\BookingUnitOptionsQuery;
use App\Application\Booking\Queries\BookingSlotOptionsQuery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\ActivityOptionsRequest;
use App\Http\Requests\Booking\UnitOptionsRequest;
use App\Http\Requests\Booking\SlotOptionsRequest;
use Illuminate\Http\JsonResponse;

final class BookingOptionsController extends Controller
{
    /**
     * Return active units for the selected branch.
     */
    public function units(
        UnitOptionsRequest $request,
        BookingUnitOptionsQuery $query,
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
                unitId: $request->unitId(),
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
                unitId: $request->unitId(),
                activityId: $request->activityId(),
                date: $request->availabilityDate(),
            ),
        ], 200);
    }
}