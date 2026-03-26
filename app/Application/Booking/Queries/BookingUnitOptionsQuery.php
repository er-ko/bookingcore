<?php

namespace App\Application\Booking\Queries;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

/**
 * Query object responsible for retrieving active unit options
 * for the booking creation form.
 */
final class BookingUnitOptionsQuery
{
    /**
     * Retrieve active units for the selected branch.
     *
     * @return Collection<int, Unit>
     */
    public function getList(int $branchId): Collection
    {
        return Unit::query()
            ->active()
            ->where('branch_id', $branchId)
            ->orderBy('name')
            ->get(['id', 'branch_id', 'name']);
    }
}