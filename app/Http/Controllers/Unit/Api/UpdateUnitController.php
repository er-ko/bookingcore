<?php

namespace App\Http\Controllers\Unit\Api;

use App\Application\Unit\Actions\UpdateUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

final class UpdateUnitController extends Controller
{
    /**
     * Update the given unit.
     */
    public function __invoke(
        UpdateUnitRequest $request,
        Unit $unit,
        UpdateUnit $updateUnit,
    ): JsonResponse {
        try {
            $updatedUnit = $updateUnit(
                $this->user(),
                $unit->public_id,
                $request->toDTO(),
            );
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => __('unit.messages.not_found'),
            ], 404);
        }

        return response()->json([
            'message' => __('unit.messages.updated'),
            'data' => $updatedUnit,
        ], 200);
    }
}