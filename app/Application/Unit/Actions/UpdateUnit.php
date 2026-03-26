<?php

namespace App\Application\Unit\Actions;

use App\Application\Unit\DTO\UpdateUnitData;
use App\Models\Unit;
use App\Models\User;

final class UpdateUnit
{
    /**
     * Update an existing unit for the given user.
     */
    public function __invoke(User $user, string $unitPublicId, UpdateUnitData $data): Unit
    {
        $unit = Unit::query()
            ->where('public_id', $unitPublicId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $unit->fill([
            'branch_id' => $data->branchId,
            'name' => $data->name,
            'description' => $data->description,
            'is_active' => $data->isActive,
        ]);

        $unit->save();

        return $unit;
    }
}