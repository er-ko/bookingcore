<?php

namespace App\Domain\Booking\Services;

use App\Domain\Booking\DTO\AvailabilityQuery;
use App\Domain\Booking\Support\TimeRange;
use App\Infrastructure\Booking\Repositories\AvailabilityRepository;
use App\Models\Booking;
use App\Models\WorkingHour;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;

final class AvailabilityService
{
    public function __construct(
        private readonly AvailabilityRepository $availabilityRepository,
        private readonly SlotGenerator $slotGenerator,
    ) {
    }

    /**
     * Get available booking slots for the given query.
     *
     * @return array<int, TimeRange>
     */
    public function getAvailableSlots(AvailabilityQuery $query): array
    {
        $activity = $this->availabilityRepository->getActiveActivity($query);

        if (! $activity) {
            return [];
        }

        $workingHours = $this->availabilityRepository->getWorkingHours($query);
        $bookings = $this->availabilityRepository->getBookings($query);

        $workingRanges = $this->buildWorkingRanges($query, $workingHours);

        if ($workingRanges === []) {
            return [];
        }

        $blockedRanges = $this->getBlockedRanges(
            query: $query,
            bookings: $bookings,
            beforeBufferMinutes: $activity->buffer_before_minutes,
            afterBufferMinutes: $activity->buffer_after_minutes,
        );

        $availableSegments = $this->subtractBlockedRanges($workingRanges, $blockedRanges);

        if ($availableSegments === []) {
            return [];
        }

        $availableSlots = [];

        foreach ($availableSegments as $segment) {
            $slots = $this->slotGenerator->generate(
                segment: $segment,
                activityMinutes: $activity->duration_minutes,
                beforeBufferMinutes: $activity->buffer_before_minutes,
                afterBufferMinutes: $activity->buffer_after_minutes,
            );

            foreach ($slots as $slot) {
                $availableSlots[] = $slot;
            }
        }

        return $availableSlots;
    }

    /**
     * Build working time ranges for the selected day.
     *
     * @param Collection<int, WorkingHour> $workingHours
     * @return array<int, TimeRange>
     */
    private function buildWorkingRanges(AvailabilityQuery $query, Collection $workingHours): array
    {
        $ranges = [];

        foreach ($workingHours as $workingHour) {
            $start = CarbonImmutable::parse(
                $query->date->toDateString() . ' ' . $workingHour->start_time
            );

            $end = CarbonImmutable::parse(
                $query->date->toDateString() . ' ' . $workingHour->end_time
            );

            $ranges[] = TimeRange::from($start, $end);
        }

        return $ranges;
    }

    /**
     * Subtract blocked ranges from available segments.
     *
     * @param array<int, TimeRange> $segments
     * @param array<int, TimeRange> $blockedRanges
     * @return array<int, TimeRange>
     */
    private function subtractBlockedRanges(array $segments, array $blockedRanges): array
    {
        foreach ($blockedRanges as $blockedRange) {
            $updatedSegments = [];

            foreach ($segments as $segment) {
                if (! $segment->overlaps($blockedRange)) {
                    $updatedSegments[] = $segment;
                    continue;
                }

                if ($blockedRange->start()->greaterThan($segment->start())) {
                    $updatedSegments[] = TimeRange::from(
                        $segment->start(),
                        $blockedRange->start(),
                    );
                }

                if ($blockedRange->end()->lessThan($segment->end())) {
                    $updatedSegments[] = TimeRange::from(
                        $blockedRange->end(),
                        $segment->end(),
                    );
                }
            }

            $segments = $updatedSegments;
        }

        return $segments;
    }

    /**
     * Build all blocked ranges for the selected day.
     *
     * Blocked ranges include:
     * - recurring time-offs
     * - one-time time-offs
     * - existing bookings including activity buffers
     *
     * @param Collection<int, Booking> $bookings
     * @return array<int, TimeRange>
     */
    private function getBlockedRanges(
        AvailabilityQuery $query,
        Collection $bookings,
        int $beforeBufferMinutes,
        int $afterBufferMinutes,
    ): array {
        return [
            ...$this->buildRecurringTimeOffRanges($query),
            ...$this->buildTimeOffRanges($query),
            ...$this->buildBookingBlockedRanges(
                bookings: $bookings,
                beforeBufferMinutes: $beforeBufferMinutes,
                afterBufferMinutes: $afterBufferMinutes,
            ),
        ];
    }

    /**
     * Build recurring time-off ranges for the selected day.
     *
     * @return array<int, TimeRange>
     */
    private function buildRecurringTimeOffRanges(AvailabilityQuery $query): array
    {
        $ranges = [];
        $recurringTimeOffs = $this->availabilityRepository->getRecurringTimeOffs($query);

        foreach ($recurringTimeOffs as $timeOff) {
            $ranges[] = TimeRange::from(
                $query->date->toDateString() . ' ' . $timeOff->start_time,
                $query->date->toDateString() . ' ' . $timeOff->end_time,
            );
        }

        return $ranges;
    }

    /**
     * Build one-time time-off ranges for the selected day.
     *
     * @return array<int, TimeRange>
     */
    private function buildTimeOffRanges(AvailabilityQuery $query): array
    {
        $ranges = [];
        $timeOffs = $this->availabilityRepository->getTimeOffs($query);

        foreach ($timeOffs as $timeOff) {
            $ranges[] = TimeRange::from(
                $timeOff->starts_at,
                $timeOff->ends_at,
            );
        }

        return $ranges;
    }

    /**
     * Build booking blocked ranges including activity buffers.
     *
     * @param Collection<int, Booking> $bookings
     * @return array<int, TimeRange>
     */
    private function buildBookingBlockedRanges(
        Collection $bookings,
        int $beforeBufferMinutes,
        int $afterBufferMinutes,
    ): array {
        $ranges = [];

        foreach ($bookings as $booking) {
            $ranges[] = TimeRange::from(
                $booking->starts_at->copy()->subMinutes($beforeBufferMinutes),
                $booking->ends_at->copy()->addMinutes($afterBufferMinutes),
            );
        }

        return $ranges;
    }
}