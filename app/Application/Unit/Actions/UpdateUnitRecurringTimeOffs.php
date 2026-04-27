<?php

namespace App\Application\Unit\Actions;

use App\Models\Booking\RecurringTimeOff;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RuntimeException;

final class UpdateUnitRecurringTimeOffs
{
    /**
     * Replace the recurring time offs for the given unit.
     *
     * @param array<int|string, array<int, array<string, mixed>>> $days
     */
    public function __invoke(
        User $user,
        string $unitPublicId,
        array $days
    ): Unit {
        $unit = Unit::query()
            ->where('public_id', $unitPublicId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $normalizedDays = $this->normalizeDays($days);

        $this->validateOverlappingIntervals($normalizedDays);
        $this->validateDateRanges($normalizedDays);

        DB::transaction(function () use ($unit, $normalizedDays): void {
            RecurringTimeOff::query()
                ->where('unit_id', $unit->id)
                ->delete();

            $rows = [];

            foreach ($normalizedDays as $dayIntervals) {
                foreach ($dayIntervals as $interval) {
                    $rows[] = [
                        'unit_id' => $unit->id,
                        'day_of_week' => $interval['day_of_week'],
                        'start_time' => $interval['start_time'] . ':00',
                        'end_time' => $interval['end_time'] . ':00',
                        'reason' => $interval['reason'] ?: null,
                        'is_active' => (bool) $interval['is_active'],
                        'valid_from' => $interval['valid_from'] ?: null,
                        'valid_until' => $interval['valid_until'] ?: null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            if ($rows !== []) {
                RecurringTimeOff::query()->insert($rows);
            }
        });

        return $unit->fresh(['recurringTimeOffs']);
    }

    /**
     * @param array<int|string, array<int, array<string, mixed>>> $days
     * @return array<int, array<int, array<string, mixed>>>
     */
    private function normalizeDays(
        array $days
    ): array {
        $normalized = [];

        foreach (range(1, 7) as $dayOfWeek) {
            $intervals = $days[$dayOfWeek] ?? $days[(string) $dayOfWeek] ?? [];
            $normalized[$dayOfWeek] = is_array($intervals) ? array_values($intervals) : [];
        }

        return $normalized;
    }

    /**
     * @param array<int, array<int, array<string, mixed>>> $days
     */
    private function validateOverlappingIntervals(
        array $days
    ): void {
        foreach ($days as $dayOfWeek => $intervals) {
            $sorted = collect($intervals)
                ->sortBy('start_time')
                ->values()
                ->all();

            for ($index = 1; $index < count($sorted); $index++) {
                $previous = $sorted[$index - 1];
                $current = $sorted[$index];

                if ($current['start_time'] < $previous['end_time']) {
                    throw new RuntimeException(__('unit.exceptions.recurring_time_offs_overlap', [
                        'day' => $dayOfWeek,
                    ]));
                }
            }
        }
    }

    /**
     * @param array<int, array<int, array<string, mixed>>> $days
     */
    private function validateDateRanges(
        array $days
    ): void {
        foreach ($days as $dayIntervals) {
            foreach ($dayIntervals as $interval) {
                $validFrom = $interval['valid_from'] ?? null;
                $validUntil = $interval['valid_until'] ?? null;

                if ($validFrom && $validUntil && $validUntil < $validFrom) {
                    throw new RuntimeException(__('unit.exceptions.recurring_time_offs_invalid_date_range'));
                }
            }
        }
    }
}
