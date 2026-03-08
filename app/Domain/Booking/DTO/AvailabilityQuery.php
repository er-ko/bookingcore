<?php

namespace App\Domain\Booking\DTO;

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
        public readonly int $resourceId,
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
        int $resourceId,
        int $activityId,
        CarbonInterface|string $date,
    ): self {
        return new self(
            branchId: $branchId,
            resourceId: $resourceId,
            activityId: $activityId,
            date: CarbonImmutable::parse($date)->startOfDay(),
        );
    }
}