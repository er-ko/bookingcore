<?php

namespace App\Console\Commands;

use App\Models\Region\Timezone;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SyncTimezonesFromIana extends Command
{
    protected $signature = 'timezones:sync-iana {--fresh : Truncate table before import}';
    protected $description = 'Import canonical IANA timezones from zone1970.tab';

    public function handle(): int
    {
        $url = 'https://data.iana.org/time-zones/tzdb/zone1970.tab';

        $response = Http::timeout(60)->get($url);

        if (! $response->successful()) {
            $this->error('Nepodařilo se stáhnout IANA zone1970.tab');
            return self::FAILURE;
        }

        $rows = $this->parseZone1970($response->body());

        if (empty($rows)) {
            $this->error('IANA import vrátil 0 timezone záznamů.');
            return self::FAILURE;
        }

        DB::beginTransaction();

        try {
            if ($this->option('fresh')) {
                DB::table('timezones')->truncate();
                $this->warn('Tabulka timezones byla vyprázdněna.');
            }

            $now = now();
            $inserted = 0;
            $updated = 0;

            foreach ($rows as $row) {
                $existing = Timezone::query()
                    ->where('name', $row['name'])
                    ->first();

                if ($existing) {
                    $existing->update([
                        'display_name' => $row['display_name'],
                        'region'       => $row['region'],
                        'city'         => $row['city'],
                        'latitude'     => $row['latitude'],
                        'longitude'    => $row['longitude'],
                        'sort_order'   => $row['sort_order'],
                        'updated_at'   => $now,
                    ]);

                    $updated++;
                } else {
                    Timezone::query()->create([
                        'name'         => $row['name'],
                        'display_name' => $row['display_name'],
                        'region'       => $row['region'],
                        'city'         => $row['city'],
                        'latitude'     => $row['latitude'],
                        'longitude'    => $row['longitude'],
                        'sort_order'   => $row['sort_order'],
                        'created_at'   => $now,
                        'updated_at'   => $now,
                    ]);

                    $inserted++;
                }
            }

            DB::commit();

            $this->info("Hotovo. Inserted: {$inserted}, Updated: {$updated}, Total parsed: " . count($rows));
            return self::SUCCESS;
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->error('Import selhal: ' . $e->getMessage());
            return self::FAILURE;
        }
    }

    /**
     * Parse IANA zone1970.tab
     *
     * Format:
     * CC[,...]\tcoordinates\tTZ\tcomments
     */
    protected function parseZone1970(string $content): array
    {
        $result = [];

        $lines = preg_split('/\r\n|\r|\n/', $content);

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            $parts = preg_split('/\t+/', $line);

            if (count($parts) < 3) {
                continue;
            }

            $coordinates = trim($parts[1]);
            $timezone = trim($parts[2]);

            [$latitude, $longitude] = $this->parseCoordinates($coordinates);
            [$region, $city] = $this->extractRegionAndCity($timezone);

            $result[] = [
                'name'         => $timezone,
                'display_name' => $this->makeDisplayName($city, $timezone),
                'region'       => $region,
                'city'         => $city,
                'latitude'     => $latitude,
                'longitude'    => $longitude,
                'sort_order'   => $this->resolveSortOrder($region),
            ];
        }

        usort($result, fn (array $a, array $b) => strcmp($a['name'], $b['name']));

        return $result;
    }

    /**
     * Parse compact ISO6709 coordinates used by tzdb.
     *
     * Examples:
     * +5003+01426
     * +512930-0000731
     * -3456-05827
     */
    protected function parseCoordinates(string $value): array
    {
        $matches = [];

        if (! preg_match('/^([+-]\d+)([+-]\d+)$/', $value, $matches)) {
            return [null, null];
        }

        $latitude = $this->parseCoordinatePart($matches[1], true);
        $longitude = $this->parseCoordinatePart($matches[2], false);

        return [$latitude, $longitude];
    }

    /**
     * Latitude:
     *  ±DDMM
     *  ±DDMMSS
     *
     * Longitude:
     *  ±DDDMM
     *  ±DDDMMSS
     */
    protected function parseCoordinatePart(string $value, bool $isLatitude): ?float
    {
        $sign = str_starts_with($value, '-') ? -1 : 1;
        $digits = ltrim($value, '+-');

        if ($isLatitude) {
            if (strlen($digits) === 4) {
                $deg = (int) substr($digits, 0, 2);
                $min = (int) substr($digits, 2, 2);
                $sec = 0;
            } elseif (strlen($digits) === 6) {
                $deg = (int) substr($digits, 0, 2);
                $min = (int) substr($digits, 2, 2);
                $sec = (int) substr($digits, 4, 2);
            } else {
                return null;
            }
        } else {
            if (strlen($digits) === 5) {
                $deg = (int) substr($digits, 0, 3);
                $min = (int) substr($digits, 3, 2);
                $sec = 0;
            } elseif (strlen($digits) === 7) {
                $deg = (int) substr($digits, 0, 3);
                $min = (int) substr($digits, 3, 2);
                $sec = (int) substr($digits, 5, 2);
            } else {
                return null;
            }
        }

        $decimal = $deg + ($min / 60) + ($sec / 3600);

        return round($decimal * $sign, 7);
    }

    protected function extractRegionAndCity(string $timezone): array
    {
        $parts = explode('/', $timezone, 2);

        $region = $parts[0] ?? null;
        $cityPart = $parts[1] ?? $timezone;

        $segments = explode('/', $cityPart);
        $lastSegment = end($segments);

        $city = str_replace('_', ' ', $lastSegment);

        return [$region, $city];
    }

    protected function makeDisplayName(?string $city, string $timezone): string
    {
        return $city ?: $timezone;
    }

    protected function resolveSortOrder(?string $region): int
    {
        return match ($region) {
            'Europe'     => 10,
            'America'    => 20,
            'Asia'       => 30,
            'Africa'     => 40,
            'Australia'  => 50,
            'Pacific'    => 60,
            'Atlantic'   => 70,
            'Indian'     => 80,
            'Antarctica' => 90,
            'Arctic'     => 100,
            default      => 999,
        };
    }
}