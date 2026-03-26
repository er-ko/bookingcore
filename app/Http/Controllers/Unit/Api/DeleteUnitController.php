<?php

namespace App\Http\Controllers\Unit\Api;

use App\Application\Unit\Actions\DeleteUnit;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class DeleteUnitController extends Controller
{
    /**
     * Delete the given unit.
     */
    public function __invoke(Unit $unit, DeleteUnit $deleteUnit): JsonResponse
    {
        try {
            $deleteUnit(
                $this->user(),
                $unit->public_id,
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('unit.messages.deleted'),
        ], 200);
    }
}