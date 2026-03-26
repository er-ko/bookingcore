<?php

namespace App\Application\Booking\Queries;

use App\Application\Booking\DTO\AvailabilityQuery;
use App\Domain\Booking\Services\AvailabilityService;
use App\Domain\Booking\Support\TimeRange;

/**
 * Query object responsible for retrieving available slot options
 * for the booking creation form.
 */
final class BookingSlotOptionsQuery
{
    public function __construct(
        private readonly AvailabilityService $availabilityService,
    ) {
    }

    /**
     * Retrieve available slots for the selected booking combination.
     *
     * @return array{
     *     items: array<int, array{
     *         start: string,
     *         end: string,
     *         label: string
     *     }>,
     *     is_empty: bool
     * }
     */
    public function getList(
        int $branchId,
        int $unitId,
        int $activityId,
        string $date,
    ): array {
        $query = AvailabilityQuery::from(
            branchId: $branchId,
            unitId: $unitId,
            activityId: $activityId,
            date: $date,
        );

        $slots = $this->availabilityService->getAvailableSlots($query);

        $items = array_map(static function (TimeRange $slot): array {
            return [
                'start' => $slot->start()->format('Y-m-d H:i:s'),
                'end' => $slot->end()->format('Y-m-d H:i:s'),
                'label' => $slot->start()->format('H:i') . ' - ' . $slot->end()->format('H:i'),
            ];
        }, $slots);

        return [
            'items' => $items,
            'is_empty' => $items === [],
        ];
    }
}