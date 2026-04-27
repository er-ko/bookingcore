<?php

namespace App\Application\Unit\Actions;

use App\Models\Unit;
use App\Models\User;
use RuntimeException;

final class DeleteUnit
{
    /**
     * Delete an existing unit for the given user.
     */
    public function __invoke(
        User $user,
        string $unitPublicId
    ): void {
        $unit = Unit::query()
            ->where('public_id', $unitPublicId)
            ->where('user_id', $user->id)
            ->first();

        if (! $unit) {
            throw new RuntimeException(__('unit.messages.not_found'));
        }

        $unit->delete();
    }
}