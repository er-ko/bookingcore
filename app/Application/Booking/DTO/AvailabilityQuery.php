<?php

namespace App\Application\Booking\DTO;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;

/**
 * Data transfer object representing input for availability lookup.
 *
 * The provided date is normalized to the start of the selected day.
 */
final class AvailabilityQuery
{
    public function __construct(
        public readonly int $branchId,
        public readonly int $unitId,
        public readonly int $activityId,
        public readonly CarbonImmutable $date,
    ) {
    }

    /**
     * Create an availability query DTO from raw input values.
     *
     * The provided date is normalized to the start of the selected day.
     */
    public static function from(
        int $branchId,
        int $unitId,
        int $activityId,
        CarbonInterface|string $date,
    ): self {
        return new self(
            branchId: $branchId,
            unitId: $unitId,
            activityId: $activityId,
            date: CarbonImmutable::parse($date)->startOfDay(),
        );
    }
}