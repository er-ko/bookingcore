<?php

namespace App\Application\Unit\Queries;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class UnitFormOptionsQuery
{
    /**
     * @return array{branches: Collection<int, Branch>}
     */
    public function getCreateFormData(User $user): array
    {
        $branches = Branch::query()
            ->active()
            ->where('user_id', $user->id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return [
            'branches' => $branches,
        ];
    }
}