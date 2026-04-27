<?php

namespace App\Application\Unit\Actions;

use App\Models\Booking\WorkingHour;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RuntimeException;

final class UpdateUnitWorkingHours
{
    /**
     * Replace the weekly working hours for the given unit.
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

        DB::transaction(function () use ($unit, $normalizedDays): void {
            WorkingHour::query()
                ->where('unit_id', $unit->id)
                ->delete();

            $rows = [];

            foreach ($normalizedDays as $interval) {
                if (! $interval) {
                    continue
                ;}

                $rows[] = [
                    'unit_id' => $unit->id,
                    'day_of_week' => $interval['day_of_week'],
                    'start_time' => $interval['start_time'] . ':00',
                    'end_time' => $interval['end_time'] . ':00',
                    'is_active' => (bool) $interval['is_active'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if ($rows !== []) {
                WorkingHour::query()->insert($rows);
            }
        });

        return $unit->fresh(['workingHours']);
    }

    /**
     * @param array<int|string, array<int, array<string, mixed>>> $days
     * @return array<int, array<string, mixed>|null>
     */
    private function normalizeDays(
        array $days
    ): array {
        $normalized = [];

        foreach (range(1, 7) as $dayOfWeek) {
            $intervals = $days[$dayOfWeek] ?? $days[(string) $dayOfWeek] ?? [];

            if (! is_array($intervals)) {
                throw new RuntimeException(__('unit.exceptions.working_hours_payload_invalid', ['day' => $dayOfWeek]));
            }

            $intervals = array_values($intervals);

            if (count($intervals) > 1) {
                throw new RuntimeException(__('unit.exceptions.working_hours_day_limit', ['day' => $dayOfWeek]));
            }

            $interval = $intervals[0] ?? null;

            $normalized[$dayOfWeek] = $interval
                ? [
                    'day_of_week' => $interval['day_of_week'],
                    'start_time' => $interval['start_time'],
                    'end_time' => $interval['end_time'],
                    'is_active' => (bool) $interval['is_active'],
                ]
                : null;
        }

        return $normalized;
    }
}
