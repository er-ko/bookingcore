<?php

namespace App\Application\Booking\Queries;

use App\Models\Unit;
use App\Models\Identity\UserIdentitySettings;
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
     * @return Collection<string, Unit>
     */
    public function getList(
        string $slug,
        string $branchPublicId
    ): Collection {
        $identity = UserIdentitySettings::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $userId = $identity->user_id;

        return Unit::query()
            ->active()
            ->where('user_id', $userId)
            ->whereHas('branch', function (Builder $query) use ($branchPublicId, $userId) {
                $query->where('branches.public_id', $branchPublicId)
                    ->where('branches.user_id', $userId);
            })
            ->whereHas('activities', function (Builder $query) {
                $query->active();
            })
            ->orderBy('name')
            ->get(['id', 'public_id', 'branch_id', 'name']);
    }
}