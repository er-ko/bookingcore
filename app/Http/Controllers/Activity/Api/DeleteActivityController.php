<?php

namespace App\Http\Controllers\Activity\Api;

use App\Application\Activity\Actions\DeleteActivity;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class DeleteActivityController extends Controller
{
    /**
     * Delete the given activity.
     */
    public function __invoke(Activity $activity, DeleteActivity $deleteActivity): JsonResponse
    {
        try {
            $deleteActivity(
                $this->user(),
                $activity->public_id,
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('activity.messages.deleted'),
        ], 200);
    }
}