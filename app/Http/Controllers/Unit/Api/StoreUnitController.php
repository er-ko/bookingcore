<?php

namespace App\Http\Controllers\Unit\Api;

use App\Application\Unit\Actions\StoreUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\StoreUnitRequest;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class StoreUnitController extends Controller
{
    /**
     * Create a new unit.
     */
    public function __invoke(StoreUnitRequest $request, StoreUnit $storeUnit): JsonResponse
    {
        try {
            $unit = $storeUnit(
                $this->user(),
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('unit.messages.created'),
            'data' => $unit,
        ], 201);
    }
}