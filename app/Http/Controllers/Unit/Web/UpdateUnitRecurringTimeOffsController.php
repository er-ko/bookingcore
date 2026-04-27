<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Actions\UpdateUnitRecurringTimeOffs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\UpdateUnitRecurringTimeOffsRequest;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class UpdateUnitRecurringTimeOffsController extends Controller
{
    /**
     * Replace the recurring time offs for the given unit.
     */
    public function __invoke(
        UpdateUnitRecurringTimeOffsRequest $request,
        Unit $unit,
        UpdateUnitRecurringTimeOffs $updateUnitRecurringTimeOffs,
    ): JsonResponse {
        try {
            $updatedUnit = $updateUnitRecurringTimeOffs(
                $this->user(),
                $unit->public_id,
                $request->validated('days'),
            );
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => __('unit.messages.not_found'),
            ], 404);
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('unit.messages.recurring_time_offs_updated'),
            'data' => $updatedUnit->recurringTimeOffs ?? [],
        ], 200);
    }
}