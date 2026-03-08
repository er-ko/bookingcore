<?php

namespace App\Domain\Booking\DTO;

use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;

/**
 * Data transfer object used to create a booking.
 *
 * This DTO represents validated booking input passed from
 * the application layer into the domain booking service.
 */
final class CreateBookingData
{
    public function __construct(
        public readonly int $branchId,
        public readonly int $resourceId,
        public readonly int $activityId,
        public readonly CarbonImmutable $startsAt,
        public readonly CustomerData $customer,
        public readonly ?string $note = null,
    ) {
    }

    /**
     * Create a booking DTO from raw input values.
     *
     * Accepts a Carbon instance or date-time string for the start time.
     */
    public static function from(
        int $branchId,
        int $resourceId,
        int $activityId,
        CarbonInterface|string $startsAt,
        CustomerData $customer,
        ?string $note = null,
    ): self {
        return new self(
            branchId: $branchId,
            resourceId: $resourceId,
            activityId: $activityId,
            startsAt: CarbonImmutable::parse($startsAt),
            customer: $customer,
            note: $note,
        );
    }
}