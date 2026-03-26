<?php

namespace App\Application\Activity\Actions;

use App\Models\Activity;
use App\Models\User;
use RuntimeException;

final class DeleteActivity
{
    /**
     * Delete an existing activity for the given user.
     */
    public function __invoke(User $user, string $activityPublicId): void
    {
        $activity = Activity::query()
            ->where('public_id', $activityPublicId)
            ->where('user_id', $user->id)
            ->first();

        if (! $activity) {
            throw new RuntimeException(__('activity.messages.not_found'));
        }

        $activity->delete();
    }
}