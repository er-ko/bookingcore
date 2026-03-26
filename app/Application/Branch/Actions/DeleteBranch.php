<?php

namespace App\Application\Branch\Actions;

use App\Models\Branch;
use App\Models\User;
use RuntimeException;

final class DeleteBranch
{
    /**
     * Delete an existing branch for the given user.
     */
    public function __invoke(User $user, string $branchPublicId): void
    {
        $branch = Branch::query()
            ->where('public_id', $branchPublicId)
            ->where('user_id', $user->id)
            ->first();

        if (! $branch) {
            throw new RuntimeException(__('branch.messages.not_found'));
        }

        if ($branch->units()->exists()) {
            throw new RuntimeException(__('branch.messages.has_units'));
        }

        if ($branch->bookings()->exists()) {
            throw new RuntimeException(__('branch.messages.has_bookings'));
        }

        $branch->delete();
    }
}