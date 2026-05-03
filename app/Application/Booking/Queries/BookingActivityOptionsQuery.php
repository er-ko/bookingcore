<?php

namespace App\Application\Booking\Queries;

use App\Models\Activity;
use App\Models\Identity\UserIdentitySettings;
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
     * @return Collection<string, Activity>
     */
    public function getList(
        string $slug,
        string $unitPublicId
    ): Collection {
        $identity = UserIdentitySettings::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $userId = $identity->user_id;

        return Activity::query()
            ->active()
            ->where('user_id', $userId)
            ->whereHas('units', function (Builder $query) use ($unitPublicId, $userId) {
                $query->where('units.public_id', $unitPublicId)
                    ->where('units.user_id', $userId);
            })
            ->orderBy('name')
            ->get(['activities.id', 'activities.public_id', 'activities.name', 'activities.duration_minutes']);
    }
}