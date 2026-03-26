<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;

class CountriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $names = Countries::getNames('en');
        $alpha3Codes = Countries::getAlpha3Codes();
        $numericCodes = Countries::getNumericCodes();

        $rows = [];

        foreach ($names as $alpha2 => $name) {
            $alpha2 = strtoupper($alpha2);

            $rows[] = [
                'iso_numeric' => $numericCodes[$alpha2] ?? null,
                'iso_alpha2' => $alpha2,
                'iso_alpha3' => $alpha3Codes[$alpha2] ?? null,
                'name' => $name,
                'official_name' => null,
                'local_name' => null,
                'flag_emoji' => $this->flagFromAlpha2($alpha2),
                'default_language_code' => null,
                'default_currency_code' => null,
                'phone_code' => null,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('countries')->upsert(
            $rows,
            ['iso_alpha2'],
            [
                'iso_numeric',
                'iso_alpha3',
                'name',
                'official_name',
                'local_name',
                'flag_emoji',
                'default_language_code',
                'default_currency_code',
                'phone_code',
                'is_active',
                'updated_at',
            ]
        );
    }

    private function flagFromAlpha2(string $alpha2): ?string
    {
        if (!preg_match('/^[A-Z]{2}$/', $alpha2)) {
            return null;
        }

        $first = mb_chr(0x1F1E6 + (ord($alpha2[0]) - ord('A')), 'UTF-8');
        $second = mb_chr(0x1F1E6 + (ord($alpha2[1]) - ord('A')), 'UTF-8');

        return $first . $second;
    }
}