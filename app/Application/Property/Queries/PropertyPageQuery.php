<?php

namespace App\Application\Property\Queries;

use App\Models\Property\Property;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class PropertyPageQuery
{
    /**
     * Retrieve property list data for the property index page.
     *
     * @return LengthAwarePaginator<int, Property>
     */
    public function getList(User $user): LengthAwarePaginator
    {
        return Property::query()
            ->with('country')
            ->where('user_id', $user->id)
            ->orderBy('name')
            ->paginate(10);
    }
}
