<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SyncTimezoneCountryIds extends Command
{
    protected $signature = 'timezones:sync-country-ids {--limit=0} {--only=}';
    protected $description = 'Sync timezones.country_id from IANA zone1970.tab and countries.iso_code_2';

    public function handle(): int
    {
        $query = DB::table('timezones')->select('id', 'timezone', 'country_code', 'country_id');

        if ($only = $this->option('only')) {
            $timezones = array_map('trim', explode(',', $only));
            $query->whereIn('timezone', $timezones);
        }

        if ((int) $this->option('limit') > 0) {
            $query->limit((int) $this->option('limit'));
        }

        $zone1970 = Http::timeout(30)->get('https://data.iana.org/time-zones/tzdb/zone1970.tab');
        $backward = Http::timeout(30)->get('https://data.iana.org/time-zones/tzdb/backward');
        $zoneTab  = Http::timeout(30)->get('https://data.iana.org/time-zones/tzdb/zone.tab');

        if (! $zone1970->successful() || ! $backward->successful() || ! $zoneTab->successful()) {
            $this->error('Nepodařilo se stáhnout IANA data.');
            return self::FAILURE;
        }

        $timezoneMap = $this->parseZoneTab($zone1970->body());
        $legacyMap   = $this->parseZoneTab($zoneTab->body());
        $aliases     = $this->parseBackward($backward->body());

        $timezones = $query->get();

        foreach ($timezones as $tzRow) {
            $lookupTimezone = $this->resolveAlias($tzRow->timezone, $aliases);

            $isoCodes = $timezoneMap[$lookupTimezone] ?? null;

            if (! $isoCodes) {
                $isoCodes = $legacyMap[$lookupTimezone] ?? null;
            }

            if (! $isoCodes && ! empty($tzRow->country_code)) {
                $isoCodes = [$tzRow->country_code];
            }

            if (! is_array($isoCodes) || empty($isoCodes)) {
                $this->warn("Přeskakuji {$tzRow->timezone} — nenašel jsem ISO2 mapování.");
                continue;
            }

            $isoCodes = array_values(array_unique(array_filter(array_map('trim', $isoCodes))));

            if (empty($isoCodes)) {
                $this->warn("Přeskakuji {$tzRow->timezone} — po vyčištění nezůstalo žádné ISO2.");
                continue;
            }

            $countryIds = DB::table('countries')
                ->whereIn('iso_code_2', $isoCodes)
                ->orderBy('id')
                ->pluck('id')
                ->map(fn ($id) => (string) $id)
                ->values()
                ->all();

            if (empty($countryIds)) {
                $this->warn("Přeskakuji {$tzRow->timezone} — ISO2 existuje, ale countries.id nebyly nalezeny: " . implode(',', $isoCodes));
                continue;
            }

            DB::table('timezones')
                ->where('id', $tzRow->id)
                ->update([
                    'country_id' => json_encode($countryIds, JSON_UNESCAPED_UNICODE),
                    'updated_at' => now(),
                ]);

            $this->info("{$tzRow->timezone} => " . json_encode($countryIds));
        }

        $this->info('Hotovo.');
        return self::SUCCESS;
    }

    protected function parseBackward(string $content): array
    {
        $aliases = [];

        foreach (preg_split('/\r\n|\r|\n/', $content) as $line) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            // odstranění komentáře za daty
            $line = preg_replace('/\s+#.*$/', '', $line);

            if (! str_starts_with($line, 'Link ')) {
                continue;
            }

            // Link TARGET LINK-NAME
            $parts = preg_split('/\s+/', $line);

            if (count($parts) >= 3) {
                $target = $parts[1];
                $linkName = $parts[2];

                $aliases[$linkName] = $target;
            }
        }

        return $aliases;
    }

    protected function resolveAlias(string $timezone, array $aliases): string
    {
        $seen = [];

        while (isset($aliases[$timezone]) && ! isset($seen[$timezone])) {
            $seen[$timezone] = true;
            $timezone = $aliases[$timezone];
        }

        return $timezone;
    }

    protected function parseZoneTab(string $content): array
    {
        $map = [];

        foreach (preg_split('/\r\n|\r|\n/', $content) as $line) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            $parts = preg_split('/\t+/', $line);

            if (count($parts) < 3) {
                continue;
            }

            $countryCodes = explode(',', trim($parts[0]));
            $timezone = trim($parts[2]);

            $map[$timezone] = $countryCodes;
        }

        return $map;
    }
}