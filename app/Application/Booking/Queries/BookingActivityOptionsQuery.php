<?php

namespace App\Application\Booking\Queries;

use App\Models\Booking\Activity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Query object responsible for retrieving active activity options
 * for the booking creation form.
 */
final class BookingActivityOptionsQuery
{
    /**
     * Retrieve active activities assigned to the selected resource.
     *
     * @return Collection<int, Activity>
     */
    public function getList(int $resourceId): Collection
    {
        return Activity::query()
            ->active()
            ->whereHas('resources', function (Builder $query) use ($resourceId) {
                $query->where('resources.id', $resourceId);
            })
            ->orderBy('name')
            ->get(['activities.id', 'activities.name', 'activities.duration_minutes']);
    }
}