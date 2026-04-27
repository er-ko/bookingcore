<?php

namespace App\Application\Branch\Actions;

use App\Application\Branch\DTO\StoreBranchData;
use App\Models\Branch;
use App\Models\User;
use RuntimeException;

final class StoreBranch
{
    private const MAX_BRANCHES_PER_USER = 10;

    /**
     * Create a new branch for the given user.
     */
    public function __invoke(
        User $user,
        StoreBranchData $data
    ): Branch {
        $branchesCount = Branch::query()
            ->where('user_id', $user->id)
            ->count();

        if ($branchesCount >= self::MAX_BRANCHES_PER_USER) {
            throw new RuntimeException(__('branch.messages.limit_reached'));
        }

        $branch = new Branch();

        $branch->fill([
            'user_id' => $user->id,
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