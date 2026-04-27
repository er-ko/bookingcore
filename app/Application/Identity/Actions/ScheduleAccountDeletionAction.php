<?php

namespace App\Application\Identity\Actions;

use App\Models\User;

final class ScheduleAccountDeletionAction
{
    /**
     * Schedule account deletion and immediately hide the public booking page.
     */
    public function __invoke(User $user, int $days = 7): void
    {
        if (! $user->hasPendingDeletion()) {
            $user->scheduleDeletion($days);
        }

        $user->identitySettings()?->update([
            'is_public' => false,
        ]);
    }
}