<?php

namespace App\Application\Booking\Queries;

use App\Models\Booking;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving booking data
 * required by booking-related UI pages.
 */
final class BookingPageQuery
{
    /**
     * Retrieve booking list data for the booking index page.
     *
     * Only minimal relation fields are loaded to keep the response payload
     * small and optimized for rendering the booking table in the UI.
     *
     * @return LengthAwarePaginator<int, Booking>
     */
    public function getList(): LengthAwarePaginator
    {
        return Booking::query()
            ->with([
                'branch:id,name',
                'resource:id,name,branch_id',
                'activity:id,name',
                'customer:id,first_name,last_name,email',
            ])
            ->latest('starts_at')
            ->paginate(15);
    }
}