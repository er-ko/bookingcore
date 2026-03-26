<?php

namespace App\Http\Controllers\Activity\Api;

use App\Application\Activity\Actions\UpdateActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

final class UpdateActivityController extends Controller
{
    /**
     * Update the given activity.
     */
    public function __invoke(
        UpdateActivityRequest $request,
        Activity $activity,
        UpdateActivity $updateActivity,
    ): JsonResponse {
        try {
            $updatedActivity = $updateActivity(
                $this->user(),
                $activity->public_id,
                $request->toDTO(),
            );
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => __('activity.messages.not_found'),
            ], 404);
        }

        return response()->json([
            'message' => __('activity.messages.updated'),
            'data' => $updatedActivity,
        ], 200);
    }
}