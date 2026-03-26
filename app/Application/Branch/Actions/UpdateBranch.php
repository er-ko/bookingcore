<?php

namespace App\Application\Branch\Actions;

use App\Application\Branch\DTO\UpdateBranchData;
use App\Models\Branch;
use App\Models\User;

final class UpdateBranch
{
    /**
     * Update an existing branch for the given user.
     */
    public function __invoke(User $user, string $branchPublicId, UpdateBranchData $data): Branch
    {
        $branch = Branch::query()
            ->where('public_id', $branchPublicId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $branch->fill([
            'name' => $data->name,
            'address_line_1' => $data->addressLine1,
            'address_line_2' => $data->addressLine2,
            'city' => $data->city,
            'postcode' => $data->postcode,
            'country_code' => $data->countryCode,
            'timezone' => $data->timezone,
            'is_active' => $data->isActive,
        ]);

        $branch->save();

        return $branch;
    }
}