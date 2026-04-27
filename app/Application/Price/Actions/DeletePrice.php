<?php

namespace App\Application\Price\Actions;

use App\Models\Price;
use App\Models\User;
use RuntimeException;

final class DeletePrice
{
    /**
     * Delete the given price for the given user.
     */
    public function __invoke(User $user, Price $price): void
    {
        $ownedPrice = Price::query()
            ->whereKey($price->id)
            ->whereHas('unit', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->first();

        if (! $ownedPrice) {
            throw new RuntimeException(__('price.validation.price_not_found'));
        }

        $ownedPrice->delete();
    }
}