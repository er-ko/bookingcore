<?php

namespace App\Application\Booking\Queries;

use App\Application\Booking\DTO\AvailabilityQuery;
use App\Domain\Booking\Services\AvailabilityService;
use App\Domain\Booking\Support\TimeRange;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Unit;
use App\Models\Identity\UserIdentitySettings;

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
        string $slug,
        string $branchPublicId,
        string $unitPublicId,
        string $activityPublicId,
        string $date,
    ): array {
        $identity = UserIdentitySettings::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $userId = $identity->user_id;

        $branch = Branch::query()
            ->where('user_id', $userId)
            ->where('public_id', $branchPublicId)
            ->firstOrFail();

        $unit = Unit::query()
            ->where('user_id', $userId)
            ->where('public_id', $unitPublicId)
            ->where('branch_id', $branch->id)
            ->firstOrFail();

        $activity = Activity::query()
            ->where('user_id', $userId)
            ->where('public_id', $activityPublicId)
            ->whereHas('units', function ($query) use ($unit) {
                $query->where('units.id', $unit->id);
            })
            ->firstOrFail();

        $query = AvailabilityQuery::from(
            branchId: $branch->id,
            unitId: $unit->id,
            activityId: $activity->id,
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