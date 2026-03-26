<?php

namespace App\Http\Controllers\Activity\Api;

use App\Application\Activity\Actions\StoreActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\StoreActivityRequest;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class StoreActivityController extends Controller
{
    /**
     * Create a new activity.
     */
    public function __invoke(StoreActivityRequest $request, StoreActivity $storeActivity): JsonResponse
    {
        try {
            $activity = $storeActivity(
                $this->user(),
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('activity.messages.created'),
            'data' => $activity,
        ], 201);
    }
}