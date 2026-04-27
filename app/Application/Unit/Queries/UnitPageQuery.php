<?php

namespace App\Application\Unit\Queries;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving unit data
 * required by unit-related UI pages.
 */
final class UnitPageQuery
{
    /**
     * Retrieve unit list data for the branch index page.
     *
     * @return LengthAwarePaginator<int, Unit>
     */
    public function getList(
        User $user
    ): LengthAwarePaginator {
        return Unit::query()
            ->with('branch')
            ->where('user_id', $user->id)
            ->orderBy('name')
            ->paginate(10);
    }
}