<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Queries\UnitFormOptionsQuery;
use App\Application\Unit\Queries\UnitPageQuery;
use App\Enums\DayOfWeek;
use App\Support\Translations\UnitTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Unit\UnitResource;
use App\Models\Unit;
use Inertia\Inertia;
use Inertia\Response;

final class UnitPageController extends Controller
{
    /**
     * Display a listing of units.
     */
    public function index(UnitPageQuery $unitPageQuery): Response
    {
        $units = $unitPageQuery->getList($this->user());

        return Inertia::render('Unit/Index', [
            'units' => UnitResource::collection($units),
            'translations' => UnitTranslations::index(),
        ]);
    }

    /**
     * Show the unit creation page.
     */
    public function create(UnitFormOptionsQuery $unitFormOptionsQuery): Response
    {
        return Inertia::render('Unit/Create', [
            'translations' => UnitTranslations::create(),
            ...$unitFormOptionsQuery->getCreateFormData($this->user()),
        ]);
    }

    /**
     * Show the unit edit page.
     */
    public function edit(
        Unit $unit,
        UnitFormOptionsQuery $unitFormOptionsQuery
    ): Response {
        abort_unless($unit->user_id === $this->user()->id, 404);

        $unit->load([
            'branch',
            'workingHours',
            'recurringTimeOffs',
            'timeOffs',
        ]);

        return Inertia::render('Unit/Edit', [
            'unit' => UnitResource::make($unit)->resolve(),
            'workingHours' => $this->groupWorkingHoursByDay($unit),
            'recurringTimeOffs' => $this->groupRecurringTimeOffsByDay($unit),
            'timeOffs' => $this->mapTimeOffs($unit),
            'translations' => UnitTranslations::edit(),
            ...$unitFormOptionsQuery->getCreateFormData($this->user()),
        ]);
    }

    /**
     * Group working hours by day of week for easier frontend rendering.
     *
     * @return array<int, array<int, array<string, mixed>>>
     */
    private function groupWorkingHoursByDay(Unit $unit): array
    {
        $grouped = [];

        foreach (DayOfWeek::cases() as $day) {
            $grouped[$day->value] = [];
        }

        foreach ($unit->workingHours->sortBy([
            ['day_of_week', 'asc'],
            ['start_time', 'asc'],
        ]) as $workingHour) {
            $dayValue = $workingHour->day_of_week instanceof DayOfWeek
                ? $workingHour->day_of_week->value
                : (int) $workingHour->day_of_week;

            $grouped[$dayValue][] = [
                'id' => $workingHour->id,
                'day_of_week' => $dayValue,
                'start_time' => substr((string) $workingHour->start_time, 0, 5),
                'end_time' => substr((string) $workingHour->end_time, 0, 5),
                'is_active' => (bool) $workingHour->is_active,
            ];
        }

        return $grouped;
    }

    /**
     * Group recurring time offs by day of week for easier frontend rendering.
     *
     * @return array<int, array<int, array<string, mixed>>>
     */
    private function groupRecurringTimeOffsByDay(Unit $unit): array
    {
        $grouped = [];

        foreach (DayOfWeek::cases() as $day) {
            $grouped[$day->value] = [];
        }

        foreach ($unit->recurringTimeOffs->sortBy([
            ['day_of_week', 'asc'],
            ['start_time', 'asc'],
        ]) as $timeOff) {
            $dayValue = $timeOff->day_of_week instanceof DayOfWeek
                ? $timeOff->day_of_week->value
                : (int) $timeOff->day_of_week;

            $grouped[$dayValue][] = [
                'id' => $timeOff->id,
                'day_of_week' => $dayValue,
                'start_time' => substr((string) $timeOff->start_time, 0, 5),
                'end_time' => substr((string) $timeOff->end_time, 0, 5),
                'reason' => $timeOff->reason,
                'is_active' => (bool) $timeOff->is_active,
                'valid_from' => $timeOff->valid_from?->format('Y-m-d'),
                'valid_until' => $timeOff->valid_until?->format('Y-m-d'),
            ];
        }

        return $grouped;
    }

    /**
     * Map time offs for easier frontend rendering.
     *
     * @return array<int, array<string, mixed>>
     */
    private function mapTimeOffs(Unit $unit): array
    {
        return $unit->timeOffs
            ->sortBy('starts_at')
            ->values()
            ->map(fn ($timeOff) => [
                'id' => $timeOff->id,
                'starts_at' => $timeOff->starts_at?->format('Y-m-d\TH:i'),
                'ends_at' => $timeOff->ends_at?->format('Y-m-d\TH:i'),
                'reason' => $timeOff->reason,
            ])
            ->all();
    }
}