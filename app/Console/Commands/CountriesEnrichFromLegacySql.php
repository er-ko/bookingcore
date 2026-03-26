<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountriesEnrichFromLegacySql extends Command
{
    protected $signature = 'countries:enrich-from-legacy
                            {path : Absolute or relative path to legacy countries SQL dump}';

    protected $description = 'Enrich normalized countries table from legacy SQL dump';

    public function handle(): int
    {
        $path = $this->argument('path');

        if (! file_exists($path)) {
            $relativePath = base_path($path);

            if (! file_exists($relativePath)) {
                $this->error("SQL file not found: {$path}");
                return self::FAILURE;
            }

            $path = $relativePath;
        }

        $sql = file_get_contents($path);

        if ($sql === false || trim($sql) === '') {
            $this->error('SQL file is empty or unreadable.');
            return self::FAILURE;
        }

        $rows = $this->extractInsertRows($sql);

        if ($rows === []) {
            $this->error('No INSERT rows found in legacy SQL dump.');
            return self::FAILURE;
        }

        $legacyByAlpha2 = [];

        foreach ($rows as $row) {
            if (! isset($row['iso_code_2'])) {
                continue;
            }

            $alpha2 = strtoupper(trim((string) $row['iso_code_2']));

            if ($alpha2 === '' || strlen($alpha2) !== 2) {
                continue;
            }

            $legacyByAlpha2[$alpha2] = [
                'official_name' => $this->normalizeNullableString($row['name'] ?? null),
                'local_name' => $this->normalizeNullableString($row['localname'] ?? null),
                'default_language_code' => $this->normalizeLanguageCode($row['language_code'] ?? null),
                'default_currency_code' => $this->normalizeCurrencyCode($row['currency_code'] ?? null),
                'phone_code' => $this->normalizePhoneCode($row['phonecode'] ?? null),
            ];
        }

        if ($legacyByAlpha2 === []) {
            $this->error('No usable legacy rows mapped by iso_code_2.');
            return self::FAILURE;
        }

        $countries = DB::table('countries')
            ->select(['id', 'iso_alpha2', 'name', 'official_name', 'local_name', 'default_language_code', 'default_currency_code', 'phone_code'])
            ->get();

        $updated = 0;

        foreach ($countries as $country) {
            $alpha2 = strtoupper($country->iso_alpha2);
            $legacy = $legacyByAlpha2[$alpha2] ?? null;

            $officialName = $country->official_name;
            $localName = $country->local_name;
            $languageCode = $country->default_language_code;
            $currencyCode = $country->default_currency_code;
            $phoneCode = $country->phone_code;

            if ($legacy) {
                $officialName = $legacy['official_name'] ?: $officialName;
                $localName = $legacy['local_name'] ?: $localName;
                $languageCode = $legacy['default_language_code'] ?: $languageCode;
                $currencyCode = $legacy['default_currency_code'] ?: $currencyCode;
                $phoneCode = $legacy['phone_code'] ?: $phoneCode;
            }

            // Safe production fallback only for human-readable names
            $officialName = $officialName ?: $country->name;
            $localName = $localName ?: $officialName;

            $payload = [
                'official_name' => $officialName,
                'local_name' => $localName,
                'default_language_code' => $languageCode,
                'default_currency_code' => $currencyCode,
                'phone_code' => $phoneCode,
                'updated_at' => now(),
            ];

            DB::table('countries')
                ->where('id', $country->id)
                ->update($payload);

            $updated++;
        }

        $this->info("Countries enriched successfully. Updated rows: {$updated}");

        $remaining = DB::table('countries')
            ->whereNull('official_name')
            ->orWhereNull('local_name')
            ->orWhereNull('default_language_code')
            ->orWhereNull('default_currency_code')
            ->orWhereNull('phone_code')
            ->count();

        $this->line("Rows still containing some NULL metadata: {$remaining}");

        return self::SUCCESS;
    }

    /**
     * Extract rows from:
     * INSERT INTO `countries` (...) VALUES (...),(...),(...);
     *
     * @return array<int, array<string, mixed>>
     */
    private function extractInsertRows(string $sql): array
    {
        if (! preg_match('/INSERT INTO\s+`countries`\s*\((.*?)\)\s*VALUES\s*(.*?);/si', $sql, $matches)) {
            return [];
        }

        $columnsRaw = $matches[1];
        $valuesRaw = $matches[2];

        $columns = array_map(
            static fn (string $column): string => trim($column, " \t\n\r\0\x0B`"),
            explode(',', $columnsRaw)
        );

        $tuples = $this->splitTuples($valuesRaw);

        $rows = [];

        foreach ($tuples as $tuple) {
            $values = str_getcsv($tuple, ',', "'", '\\');

            if (count($values) !== count($columns)) {
                continue;
            }

            $row = [];

            foreach ($columns as $index => $column) {
                $value = $values[$index];

                if ($value === 'NULL') {
                    $value = null;
                }

                $row[$column] = $value;
            }

            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * Split "(...),(...),(...)" into individual tuple contents without outer parentheses.
     *
     * @return array<int, string>
     */
    private function splitTuples(string $valuesRaw): array
    {
        $tuples = [];
        $buffer = '';
        $depth = 0;
        $inString = false;
        $length = strlen($valuesRaw);

        for ($i = 0; $i < $length; $i++) {
            $char = $valuesRaw[$i];
            $prev = $i > 0 ? $valuesRaw[$i - 1] : null;

            if ($char === "'" && $prev !== '\\') {
                $inString = ! $inString;
            }

            if (! $inString) {
                if ($char === '(') {
                    if ($depth === 0) {
                        $buffer = '';
                    } else {
                        $buffer .= $char;
                    }

                    $depth++;
                    continue;
                }

                if ($char === ')') {
                    $depth--;

                    if ($depth === 0) {
                        $tuples[] = $buffer;
                        $buffer = '';
                        continue;
                    }
                }
            }

            if ($depth > 0) {
                $buffer .= $char;
            }
        }

        return $tuples;
    }

    private function normalizeNullableString(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string) $value);

        return $value !== '' ? $value : null;
    }

    private function normalizeLanguageCode(mixed $value): ?string
    {
        $value = $this->normalizeNullableString($value);

        if (! $value) {
            return null;
        }

        $value = strtolower($value);

        return preg_match('/^[a-z]{2,3}$/', $value) ? substr($value, 0, 2) : null;
    }

    private function normalizeCurrencyCode(mixed $value): ?string
    {
        $value = $this->normalizeNullableString($value);

        if (! $value) {
            return null;
        }

        $value = strtoupper($value);

        return preg_match('/^[A-Z]{3}$/', $value) ? $value : null;
    }

    private function normalizePhoneCode(mixed $value): ?string
    {
        $value = $this->normalizeNullableString($value);

        if (! $value) {
            return null;
        }

        $value = preg_replace('/[^0-9+]/', '', $value);

        return $value !== '' ? $value : null;
    }
}