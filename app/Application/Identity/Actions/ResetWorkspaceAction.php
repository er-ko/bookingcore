<?php

namespace App\Application\Identity\Actions;

use App\Models\Activity;
use App\Models\Branch;
use App\Models\Property\Property;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class ResetWorkspaceAction
{
    /**
     * Delete all booking workspace data for the given user.
     *
     * Branches and activities are deleted directly; the database cascade
     * handles everything underneath them (units, prices, bookings,
     * working hours, time offs, and calendar events).
     *
     * Customers and calendar integrations are intentionally preserved.
     */
    public function __invoke(User $user): void
    {
        DB::transaction(function () use ($user): void {
            Branch::where('user_id', $user->id)->delete();
            Activity::where('user_id', $user->id)->delete();
            Property::where('user_id', $user->id)->delete();
        });
    }
}
