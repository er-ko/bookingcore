<?php

namespace App\Application\Auth\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;

final class DeleteUserAccountAction
{
    /**
     * Permanently delete the user account and all related data.
     */
    public function __invoke(
        User $user
    ): void {
        DB::transaction(function () use ($user): void {
            $user = User::query()->findOrFail($user->id);

            DB::table('sessions')
                ->where('user_id', $user->id)
                ->delete();

            // Optional: delete user files from storage here.
            // Optional: revoke or clean up external integrations here.

            $user->delete();
        });
    }
}