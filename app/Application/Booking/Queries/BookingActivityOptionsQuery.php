<?php

namespace App\Application\Booking\Queries;

use App\Models\Activity;
use App\Models\Identity\UserIdentitySettings;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class BookingActivityOptionsQuery
{
    /**
     * Retrieve active activities priced for the selected unit.
     *
     * @return Collection<int, Activity>
     */
    public function getList(
        string $slug,
        string $unitPublicId
    ): Collection {
        $identity = UserIdentitySettings::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $userId = $identity->user_id;

        $unit = Unit::query()
            ->where('user_id', $userId)
            ->where('public_id', $unitPublicId)
            ->firstOrFail();

        return Activity::query()
            ->select([
                'activities.id',
                'activities.public_id',
                'activities.name',
                'activities.duration_minutes',
                'prices.price',
            ])
            ->selectRaw('? as currency_code', [$identity->default_currency_code])
            ->join('prices', function ($join) use ($unit) {
                $join->on('prices.activity_id', '=', 'activities.id')
                    ->where('prices.unit_id', '=', $unit->id);
            })
            ->active()
            ->where('activities.user_id', $userId)
            ->whereHas('units', function (Builder $query) use ($unit, $userId) {
                $query->where('units.id', $unit->id)
                    ->where('units.user_id', $userId);
            })
            ->orderBy('activities.name')
            ->get();
    }
}