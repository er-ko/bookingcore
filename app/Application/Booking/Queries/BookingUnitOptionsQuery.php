<?php

namespace App\Application\Booking\Queries;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Query object responsible for retrieving active unit options
 * for the booking creation form.
 */
final class BookingUnitOptionsQuery
{
    /**
     * Retrieve active units for the selected branch that have
     * at least one active priced activity.
     *
     * @return Collection<int, Unit>
     */
    public function getList(
        int $branchId
    ): Collection {
        return Unit::query()
            ->active()
            ->where('branch_id', $branchId)
            ->whereHas('activities', function (Builder $query) {
                $query->active();
            })
            ->orderBy('name')
            ->get(['id', 'branch_id', 'name']);
    }
}