<?php

namespace App\Console\Commands;

use App\Models\Region\Timezone;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncTimezoneCountryPivot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Use --truncate to clear the pivot table before syncing.
     */
    protected $signature = 'app:sync-timezone-country-pivot {--truncate : Truncate country_timezone before sync}';

    /**
     * The console command description.
     */
    protected $description = 'Sync timezone-country relations from legacy timezones.country_id into country_timezone pivot table';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if ($this->option('truncate')) {
            DB::table('country_timezone')->truncate();
            $this->info('country_timezone table truncated.');
        }

        $inserted = 0;
        $skipped = 0;

        Timezone::query()
            ->select(['id', 'country_id'])
            ->orderBy('id')
            ->chunkById(100, function ($timezones) use (&$inserted, &$skipped): void {
                foreach ($timezones as $timezone) {
                    $countryIds = $this->extractCountryIds($timezone->country_id);

                    if ($countryIds === []) {
                        $skipped++;
                        continue;
                    }

                    foreach ($countryIds as $countryId) {
                        $exists = DB::table('countries')
                            ->where('id', $countryId)
                            ->exists();

                        if (! $exists) {
                            $this->warn("Skipped missing country_id={$countryId} for timezone_id={$timezone->id}");
                            continue;
                        }

                        $created = DB::table('country_timezone')->updateOrInsert(
                            [
                                'country_id' => $countryId,
                                'timezone_id' => $timezone->id,
                            ],
                            []
                        );

                        if ($created) {
                            $inserted++;
                        }
                    }
                }
            });

        $this->info("Done. Inserted/ensured relations: {$inserted}");
        $this->info("Skipped timezones without valid country mapping: {$skipped}");

        return self::SUCCESS;
    }

    /**
     * Extract country IDs from the legacy timezones.country_id column.
     *
     * Supported formats:
     * - '0'
     * - null
     * - '["223"]'
     * - '["223","231"]'
     *
     * @return array<int>
     */
    private function extractCountryIds(mixed $rawValue): array
    {
        if ($rawValue === null) {
            return [];
        }

        $value = trim((string) $rawValue);

        if ($value === '' || $value === '0') {
            return [];
        }

        $decoded = json_decode($value, true);

        if (! is_array($decoded)) {
            return [];
        }

        $countryIds = [];

        foreach ($decoded as $item) {
            if (is_numeric($item)) {
                $countryIds[] = (int) $item;
            }
        }

        return array_values(array_unique($countryIds));
    }
}