<?php

namespace App\Console\Commands;

use DateTimeZone;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncCountryTimezonePivot extends Command
{
    protected $signature = 'countries:sync-timezones
                            {--truncate : Truncate pivot table before sync}';

    protected $description = 'Sync country_timezone pivot table from IANA timezone mappings';

    public function handle(): int
    {
        $countries = DB::table('countries')
            ->select('id', 'iso_alpha2', 'name')
            ->orderBy('iso_alpha2')
            ->get();

        if ($countries->isEmpty()) {
            $this->error('Countries table is empty.');
            return self::FAILURE;
        }

        $timezones = DB::table('timezones')
            ->select('id', 'name')
            ->get()
            ->keyBy('name');

        if ($timezones->isEmpty()) {
            $this->error('Timezones table is empty.');
            return self::FAILURE;
        }

        if ($this->option('truncate')) {
            DB::table('country_timezone')->delete();
            $this->info('country_timezone table cleared.');
        }

        $rows = [];
        $missingTimezones = [];
        $countriesWithoutTimezones = [];
        $linkedCount = 0;

        foreach ($countries as $country) {
            $alpha2 = strtoupper($country->iso_alpha2);

            try {
                $ianaTimezones = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $alpha2);
            } catch (\Throwable $e) {
                $ianaTimezones = [];
            }

            if (empty($ianaTimezones)) {
                $countriesWithoutTimezones[] = "{$alpha2} - {$country->name}";
                continue;
            }

            foreach ($ianaTimezones as $timezoneName) {
                $timezone = $timezones->get($timezoneName);

                if (! $timezone) {
                    $missingTimezones[$timezoneName][] = $alpha2;
                    continue;
                }

                $rows[] = [
                    'country_id' => $country->id,
                    'timezone_id' => $timezone->id,
                ];

                $linkedCount++;
            }
        }

        if (! empty($rows)) {
            foreach (array_chunk($rows, 1000) as $chunk) {
                DB::table('country_timezone')->upsert(
                    $chunk,
                    ['country_id', 'timezone_id'],
                    []
                );
            }
        }

        $this->info('Pivot sync finished.');
        $this->line("Linked pairs prepared: {$linkedCount}");

        if (! empty($countriesWithoutTimezones)) {
            $this->warn('Countries without IANA timezones: ' . count($countriesWithoutTimezones));

            foreach ($countriesWithoutTimezones as $item) {
                $this->line(" - {$item}");
            }
        }

        if (! empty($missingTimezones)) {
            $this->warn('IANA timezone names missing in your timezones table: ' . count($missingTimezones));

            foreach ($missingTimezones as $timezoneName => $countryCodes) {
                $codes = implode(', ', array_unique($countryCodes));
                $this->line(" - {$timezoneName} (countries: {$codes})");
            }

            $this->newLine();
            $this->warn('Your timezones table should contain all canonical IANA identifiers.');
        }

        $pivotCount = DB::table('country_timezone')->count();
        $this->info("Final pivot row count: {$pivotCount}");

        return self::SUCCESS;
    }
}