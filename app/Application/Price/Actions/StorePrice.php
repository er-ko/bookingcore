<?php

namespace App\Application\Price\Actions;

use App\Models\Activity;
use App\Models\Branch;
use App\Models\Price;
use App\Models\Unit;
use App\Models\User;
use RuntimeException;

final class StorePrice
{
    /**
     * Store a new price for the given user.
     *
     * @param array{
     *     branch_id:int,
     *     unit_id:int,
     *     activity_id:int,
     *     price:string
     * } $data
     */
    public function __invoke(User $user, array $data): Price
    {
        $branch = Branch::query()
            ->where('user_id', $user->id)
            ->find($data['branch_id']);

        if (! $branch) {
            throw new RuntimeException(__('price.validation.branch_not_found'));
        }

        $unit = Unit::query()
            ->where('user_id', $user->id)
            ->where('branch_id', $branch->id)
            ->find($data['unit_id']);

        if (! $unit) {
            throw new RuntimeException(__('price.validation.unit_not_found'));
        }

        $activity = Activity::query()
            ->where('user_id', $user->id)
            ->find($data['activity_id']);

        if (! $activity) {
            throw new RuntimeException(__('price.validation.activity_not_found'));
        }

        $existingPrice = Price::query()
            ->where('unit_id', $unit->id)
            ->where('activity_id', $activity->id)
            ->exists();

        if ($existingPrice) {
            throw new RuntimeException(__('price.validation.price_already_exists'));
        }

        return Price::create([
            'unit_id' => $unit->id,
            'activity_id' => $activity->id,
            'price' => $data['price'],
        ]);
    }
}