<?php

namespace App\Domain\Booking\Services;

use App\Domain\Booking\Exceptions\SlotGenerationException;
use App\Domain\Booking\Support\TimeRange;

final class SlotGenerator
{
    /**
     * Generate booking slots for a single already-available segment.
     *
     * The provided segment is expected to represent time that remains available
     * after working hours, recurring breaks, one-time time offs, and existing
     * bookings have already been processed.
     *
     * Business rule:
     * - the first slot starts exactly at the segment start
     * - beforeBuffer is not applied before the first slot
     * - between subsequent slots, both afterBuffer and beforeBuffer are applied
     *
     * @return array<int, TimeRange>
     */
    public function generate(
        TimeRange $segment,
        int $activityMinutes,
        int $beforeBufferMinutes = 0,
        int $afterBufferMinutes = 0,
    ): array {
        if ($activityMinutes <= 0) {
            throw SlotGenerationException::invalidActivityMinutes();
        }

        if ($beforeBufferMinutes < 0 || $afterBufferMinutes < 0) {
            throw SlotGenerationException::negativeBufferMinutes();
        }

        $gapMinutes = $beforeBufferMinutes + $afterBufferMinutes;

        $slots = [];
        $currentStart = $segment->start();

        while (true) {
            $activityStart = $currentStart;
            $activityEnd = $activityStart->addMinutes($activityMinutes);

            if ($activityEnd->greaterThan($segment->end())) {
                break;
            }

            $slots[] = TimeRange::from($activityStart, $activityEnd);

            $currentStart = $activityEnd->addMinutes($gapMinutes);
        }

        return $slots;
    }
}