<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Actions\UpdateUnitWorkingHours;
use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\UpdateUnitWorkingHoursRequest;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class UpdateUnitWorkingHoursController extends Controller
{
    /**
     * Replace the working hours for the given unit.
     */
    public function __invoke(
        UpdateUnitWorkingHoursRequest $request,
        Unit $unit,
        UpdateUnitWorkingHours $updateUnitWorkingHours,
    ): JsonResponse {
        try {
            $updatedUnit = $updateUnitWorkingHours(
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
            'message' => __('unit.messages.working_hours_updated'),
            'data' => $updatedUnit->workingHours ?? [],
        ], 200);
    }
}