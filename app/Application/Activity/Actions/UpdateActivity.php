<?php

namespace App\Application\Activity\Actions;

use App\Application\Activity\DTO\UpdateActivityData;
use App\Models\Activity;
use App\Models\User;

final class UpdateActivity
{
    /**
     * Update an existing activity for the given user.
     */
    public function __invoke(User $user, string $activityPublicId, UpdateActivityData $data): Activity
    {
        $activity = Activity::query()
            ->where('public_id', $activityPublicId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $activity->fill([
            'name' => $data->name,
            'duration_minutes' => $data->durationMinutes,
            'buffer_before_minutes' => $data->bufferBeforeMinutes,
            'buffer_after_minutes' => $data->bufferAfterMinutes,
            'is_active' => $data->isActive,
        ]);

        $activity->save();

        return $activity;
    }
}