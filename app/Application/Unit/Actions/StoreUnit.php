<?php

namespace App\Application\Unit\Actions;

use App\Application\Unit\DTO\StoreUnitData;
use App\Models\Unit;
use App\Models\User;
use RuntimeException;

final class StoreUnit
{
    private const MAX_UNITS_PER_USER = 50;

    /**
     * Create a new unit for the given user.
     */
    public function __invoke(User $user, StoreUnitData $data): Unit
    {
        $unitsCount = Unit::query()
            ->where('user_id', $user->id)
            ->count();

        if ($unitsCount >= self::MAX_UNITS_PER_USER) {
            throw new RuntimeException(__('unit.messages.limit_reached'));
        }

        $unit = new Unit();

        $unit->fill([
            'user_id' => $user->id,
            'branch_id' => $data->branchId,
            'name' => $data->name,
            'description' => $data->description,
            'is_active' => $data->isActive,
        ]);

        $unit->save();

        return $unit;
    }
}