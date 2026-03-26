<?php

namespace App\Application\Unit\Queries;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;

final class UnitFormOptionsQuery
{
    /**
     * @return array{branches: Collection<int, Branch>}
     */
    public function getCreateFormData(): array
    {
        $branches = Branch::query()
            ->active()
            ->orderBy('name')
            ->get(['id', 'name']);

        return [
            'branches' => $branches,
        ];
    }
}