<?php

namespace App\Http\Controllers\Dashboard\Api;

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
                slug: $request->slug(),
                branchPublicId: $request->branchPublicId(),
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
                slug: $request->slug(),
                unitPublicId: $request->unitPublicId(),
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
                slug: $request->slug(),
                branchPublicId: $request->branchPublicId(),
                unitPublicId: $request->unitPublicId(),
                activityPublicId: $request->activityPublicId(),
                date: $request->availabilityDate(),
            ),
        ], 200);
    }
}