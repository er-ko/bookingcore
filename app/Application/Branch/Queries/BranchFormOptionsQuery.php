<?php

namespace App\Application\Branch\Queries;

use App\Models\Region\Country;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use RuntimeException;

final class BranchFormOptionsQuery
{
    /**
     * @return array{countries: Collection<int, Country>}
     */
    public function getCreateFormData(): array
    {
        $countries = Country::query()
            ->active()
            ->orderBy('name')
            ->get(['id', 'name', 'iso_alpha2', 'flag_emoji']);

        return [
            'countries' => $countries,
        ];
    }

    /**
     * @return array<int, array{value: string, label: string}>
     */
    public function getTimezonesForCountry(
        string $countryCode
    ): array {
        $countryCode = strtoupper($countryCode);

        $country = Country::query()
            ->active()
            ->where('iso_alpha2', $countryCode)
            ->first();

        if (! $country) {
            throw new RuntimeException(__('region/country.messages.not_found'));
        }

        $timezones = $country->timezones()
            ->select('timezones.id', 'timezones.name', 'timezones.city')
            ->orderBy('timezones.name')
            ->get();

        return $timezones
            ->map(function ($tz): array {
                $now = Carbon::now($tz->name);

                $offsetSeconds = $now->offset;
                $sign = $offsetSeconds >= 0 ? '+' : '-';
                $hours = floor(abs($offsetSeconds) / 3600);
                $minutes = floor((abs($offsetSeconds) % 3600) / 60);

                $offsetLabel = sprintf('UTC%s%02d:%02d', $sign, $hours, $minutes);

                return [
                    'value' => $tz->name,
                    'label' => "{$tz->name} ({$offsetLabel})",
                ];
            })
            ->values()
            ->toArray();
    }
}