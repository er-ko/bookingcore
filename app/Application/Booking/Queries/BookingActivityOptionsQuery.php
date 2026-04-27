<?php

namespace App\Application\Booking\Queries;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Query object responsible for retrieving active activity options
 * available for the selected unit in the booking form.
 */
final class BookingActivityOptionsQuery
{
    /**
     * Retrieve active activities priced for the selected unit.
     *
     * @return Collection<int, Activity>
     */
    public function getList(
        int $unitId
    ): Collection {
        return Activity::query()
            ->active()
            ->whereHas('units', function (Builder $query) use ($unitId) {
                $query->where('units.id', $unitId);
            })
            ->orderBy('name')
            ->get(['activities.id', 'activities.name', 'activities.duration_minutes']);
    }
}