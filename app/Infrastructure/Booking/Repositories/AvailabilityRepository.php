<?php

namespace App\Infrastructure\Booking\Repositories;

use App\Application\Booking\DTO\AvailabilityQuery;
use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Booking\Booking;
use App\Models\Booking\RecurringTimeOff;
use App\Models\Booking\TimeOff;
use App\Models\Booking\WorkingHour;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class AvailabilityRepository
{
    /**
     * Get the active activity for the given availability query,
     * only if it is priced for the selected unit.
     */
    public function getActiveActivity(AvailabilityQuery $query): ?Activity
    {
        return Activity::query()
            ->active()
            ->whereKey($query->activityId)
            ->whereHas('units', function (Builder $builder) use ($query) {
                $builder->where('units.id', $query->unitId);
            })
            ->first();
    }

    /**
     * Get active working hours for the unit on the selected day of week.
     *
     * @return Collection<int, WorkingHour>
     */
    public function getWorkingHours(AvailabilityQuery $query): Collection
    {
        return WorkingHour::query()
            ->forUnit($query->unitId)
            ->active()
            ->dayOfWeek($query->date->dayOfWeekIso)
            ->orderBy('start_time')
            ->get();
    }

    /**
     * Get active recurring time-off periods for the unit
     * on the selected day of week and date.
     *
     * @return Collection<int, RecurringTimeOff>
     */
    public function getRecurringTimeOffs(AvailabilityQuery $query): Collection
    {
        return RecurringTimeOff::query()
            ->forUnit($query->unitId)
            ->active()
            ->dayOfWeek($query->date->dayOfWeekIso)
            ->validForDate($query->date->toDateString())
            ->orderBy('start_time')
            ->get();
    }

    /**
     * Get one-time time-off periods overlapping the selected day.
     *
     * @return Collection<int, TimeOff>
     */
    public function getTimeOffs(AvailabilityQuery $query): Collection
    {
        $dayStart = $query->date->startOfDay();
        $dayEnd = $query->date->endOfDay();

        return TimeOff::query()
            ->forUnit($query->unitId)
            ->between($dayStart, $dayEnd)
            ->orderBy('starts_at')
            ->get();
    }

    /**
     * Get bookings for the unit overlapping the selected day.
     *
     * Cancelled bookings are excluded from availability calculations.
     *
     * @return Collection<int, Booking>
     */
    public function getBookings(AvailabilityQuery $query): Collection
    {
        $dayStart = $query->date->startOfDay();
        $dayEnd = $query->date->endOfDay();

        return Booking::query()
            ->where('unit_id', $query->unitId)
            ->where('branch_id', $query->branchId)
            ->where('status', '!=', BookingStatus::Cancelled->value)
            ->where(function (Builder $inner) use ($dayStart, $dayEnd) {
                $inner->where('starts_at', '<', $dayEnd)
                    ->where('ends_at', '>', $dayStart);
            })
            ->orderBy('starts_at')
            ->get();
    }
}