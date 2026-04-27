<?php

namespace App\Application\Activity\Actions;

use App\Application\Activity\DTO\StoreActivityData;
use App\Models\Activity;
use App\Models\User;
use RuntimeException;

final class StoreActivity
{
    private const MAX_ACTIVITIES_PER_USER = 100;

    /**
     * Create a new activity for the given user.
     */
    public function __invoke(
        User $user,
        StoreActivityData $data
    ): Activity {
        $activitiesCount = Activity::query()
            ->where('user_id', $user->id)
            ->count();

        if ($activitiesCount >= self::MAX_ACTIVITIES_PER_USER) {
            throw new RuntimeException(__('activity.messages.limit_reached'));
        }

        $activity = new Activity();

        $activity->fill([
            'user_id' => $user->id,
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