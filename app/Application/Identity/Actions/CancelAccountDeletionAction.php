<?php

namespace App\Application\Identity\Actions;

use App\Models\User;

final class CancelAccountDeletionAction
{
    /**
     * Cancel a previously scheduled account deletion.
     */
    public function __invoke(User $user): void
    {
        if (! $user->hasPendingDeletion()) {
            return;
        }

        $user->cancelDeletion();
    }
}