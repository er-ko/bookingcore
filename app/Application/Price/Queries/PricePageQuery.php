<?php

namespace App\Application\Price\Queries;

use App\Models\Price;
use App\Models\Branch;
use App\Models\Unit;
use App\Models\Activity;
use App\Models\User;

final class PricePageQuery
{
    /**
     * Get all data required for the prices page.
     *
     * @return array<string, mixed>
     */
    public function get(
        User $user
    ): array {
        $user->loadMissing('identitySettings');

        return [
            'default_currency_code' => $user->identitySettings?->default_currency_code,

            'branches' => Branch::query()
				->select([
					'id',
					'public_id',
					'name',
					'user_id',
				])
                ->where('user_id', $user->id)
                ->active()
                ->orderBy('name')
                ->get(),

            'units' => Unit::query()
                ->select([
                    'id',
                    'public_id',
                    'branch_id',
                    'name',
                    'user_id',
                ])
                ->where('user_id', $user->id)
                ->active()
                ->orderBy('name')
                ->get(),

            'activities' => Activity::query()
                ->select([
                    'id',
                    'public_id',
                    'name',
                    'user_id',
                ])
                ->where('user_id', $user->id)
                ->active()
                ->orderBy('name')
                ->get(),

            'prices' => Price::query()
                ->with([
                    'unit:id,public_id,branch_id,name,user_id',
                    'unit.branch:id,public_id,name,user_id',
                    'activity:id,public_id,name,user_id',
                ])
                ->whereHas('unit', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->orderByDesc('created_at')
                ->get()
                ->map(function (Price $bookingPrice) {
                    return [
                        'id' => $bookingPrice->id,
                        'price' => $bookingPrice->price,

                        'branch' => $bookingPrice->unit?->branch ? [
                            'id' => $bookingPrice->unit->branch->id,
                            'public_id' => $bookingPrice->unit->branch->public_id,
                            'name' => $bookingPrice->unit->branch->name,
                        ] : null,

                        'unit' => $bookingPrice->unit ? [
                            'id' => $bookingPrice->unit->id,
                            'public_id' => $bookingPrice->unit->public_id,
                            'name' => $bookingPrice->unit->name,
                        ] : null,

                        'activity' => $bookingPrice->activity ? [
                            'id' => $bookingPrice->activity->id,
                            'public_id' => $bookingPrice->activity->public_id,
                            'name' => $bookingPrice->activity->name,
                        ] : null,

                        'created_at' => $bookingPrice->created_at?->toDateTimeString(),
                        'updated_at' => $bookingPrice->updated_at?->toDateTimeString(),
                    ];
                })
                ->values(),
        ];
    }
}
