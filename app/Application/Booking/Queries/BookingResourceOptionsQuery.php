<?php

namespace App\Application\Booking\Queries;

use App\Models\Booking\Resource;
use Illuminate\Database\Eloquent\Collection;

/**
 * Query object responsible for retrieving active resource options
 * for the booking creation form.
 */
final class BookingResourceOptionsQuery
{
    /**
     * Retrieve active resources for the selected branch.
     *
     * @return Collection<int, Resource>
     */
    public function getList(int $branchId): Collection
    {
        return Resource::query()
            ->active()
            ->where('branch_id', $branchId)
            ->orderBy('name')
            ->get(['id', 'branch_id', 'name']);
    }
}