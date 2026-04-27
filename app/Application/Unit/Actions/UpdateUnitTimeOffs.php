<?php

namespace App\Application\Unit\Actions;

use App\Models\Booking\TimeOff;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RuntimeException;

final class UpdateUnitTimeOffs
{
    /**
     * Replace time offs for the given unit.
     *
     * @param array<int, array<string, mixed>> $items
     */
    public function __invoke(
        User $user,
        string $unitPublicId,
        array $items
    ): Unit {
        $unit = Unit::query()
            ->where('public_id', $unitPublicId)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $normalizedItems = $this->normalizeItems($items);

        $this->validateOverlappingItems($normalizedItems);

        DB::transaction(function () use ($unit, $normalizedItems): void {
            TimeOff::query()
                ->where('unit_id', $unit->id)
                ->delete();

            $rows = [];

            foreach ($normalizedItems as $item) {
                $rows[] = [
                    'unit_id' => $unit->id,
                    'starts_at' => str_replace('T', ' ', $item['starts_at']) . ':00',
                    'ends_at' => str_replace('T', ' ', $item['ends_at']) . ':00',
                    'reason' => $item['reason'] ?: null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if ($rows !== []) {
                TimeOff::query()->insert($rows);
            }
        });

        return $unit->fresh(['timeOffs']);
    }

    /**
     * @param array<int, array<string, mixed>> $items
     * @return array<int, array<string, mixed>>
     */
    private function normalizeItems(
        array $items
    ): array {
        return array_values(array_map(
            static fn (array $item): array => [
                'id' => $item['id'] ?? null,
                'starts_at' => (string) $item['starts_at'],
                'ends_at' => (string) $item['ends_at'],
                'reason' => $item['reason'] ?? '',
            ],
            $items
        ));
    }

    /**
     * @param array<int, array<string, mixed>> $items
     */
    private function validateOverlappingItems(array $items): void
    {
        $sorted = collect($items)
            ->sortBy('starts_at')
            ->values()
            ->all();

        for ($index = 1; $index < count($sorted); $index++) {
            $previous = $sorted[$index - 1];
            $current = $sorted[$index];

            if ($current['starts_at'] < $previous['ends_at']) {
                throw new RuntimeException(__('unit.exceptions.time_offs_overlap'));
            }
        }
    }
}
