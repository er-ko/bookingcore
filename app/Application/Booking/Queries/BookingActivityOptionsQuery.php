<?php

namespace App\Application\Booking\Queries;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Query object responsible for retrieving active activity options
 * for the booking creation form.
 */
final class BookingActivityOptionsQuery
{
    /**
     * Retrieve active activities assigned to the selected unit.
     *
     * @return Collection<int, Activity>
     */
    public function getList(int $unitId): Collection
    {
        return Activity::query()
            ->active()
            ->whereHas('units', function (Builder $query) use ($unitId) {
                $query->where('units.id', $unitId);
            })
            ->orderBy('name')
            ->get(['activities.id', 'activities.name', 'activities.duration_minutes']);
    }
}