<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Actions\UpdateUnitTimeOffs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\UpdateUnitTimeOffsRequest;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class UpdateUnitTimeOffsController extends Controller
{
    /**
     * Replace time offs for the given unit.
     */
    public function __invoke(
        UpdateUnitTimeOffsRequest $request,
        Unit $unit,
        UpdateUnitTimeOffs $updateUnitTimeOffs,
    ): JsonResponse {
        try {
            $updatedUnit = $updateUnitTimeOffs(
                $this->user(),
                $unit->public_id,
                $request->validated('items'),
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
            'message' => __('unit.messages.time_offs_updated'),
            'data' => $updatedUnit->timeOffs ?? [],
        ], 200);
    }
}