<?php

namespace App\Application\Branch\Queries;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving branch data
 * required by branch-related UI pages.
 */
final class BranchPageQuery
{
    /**
     * Retrieve branch list data for the branch index page.
     *
     * @return LengthAwarePaginator<int, Branch>
     */
    public function getList(
        User $user
    ): LengthAwarePaginator {
        return Branch::query()
            ->with('country')
            ->where('user_id', $user->id)
            ->orderBy('name')
            ->paginate(10);
    }
}