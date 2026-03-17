<?php

namespace App\Application\Booking\Queries;

use App\Models\Booking\Branch;
use Illuminate\Database\Eloquent\Collection;

/**
 * Query object responsible for retrieving data
 * required for the booking creation form.
 */
final class BookingFormOptionsQuery
{
    /**
     * Retrieve initial data required for the booking creation form.
     *
     * Only active branches are returned. Resources and activities
     * are loaded dynamically based on user selection.
     *
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