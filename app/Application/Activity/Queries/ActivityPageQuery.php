<?php

namespace App\Application\Activity\Queries;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving activity data
 * required by branch-related UI pages.
 */
final class ActivityPageQuery
{
    /**
     * Retrieve activity list data for the activity index page.
     *
     * @return LengthAwarePaginator<int, Activity>
     */
    public function getList(
        User $user
    ): LengthAwarePaginator {
        return Activity::query()
            ->where('user_id', $user->id)
            ->orderBy('name')
            ->paginate(10);
    }
}