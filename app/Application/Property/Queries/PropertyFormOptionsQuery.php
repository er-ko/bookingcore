<?php

namespace App\Application\Property\Queries;

use App\Enums\Properties\PropertyType;
use App\Enums\Properties\RentalType;
use App\Models\Region\Country;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use RuntimeException;

final class PropertyFormOptionsQuery
{
    /**
     * @return array{
     *     countries: Collection<int, Country>,
     *     rental_types: array<int, array{value: string, label: string, description: string}>,
     *     property_types: array<int, array{value: string, label: string}>,
     * }
     */
    public function getCreateFormData(): array
    {
        return [
            'countries'     => Country::query()->active()->orderBy('name')->get(['id', 'name', 'iso_alpha2', 'flag_emoji']),
            'rentalTypes'   => $this->rentalTypes(),
            'propertyTypes' => $this->propertyTypes(),
        ];
    }

    /**
     * @return array<int, array{value: string, label: string}>
     */
    public function getTimezonesForCountry(string $countryCode): array
    {
        $country = Country::query()
            ->active()
            ->where('iso_alpha2', strtoupper($countryCode))
            ->first();

        if (! $country) {
            throw new RuntimeException(__('region/country.messages.not_found'));
        }

        return $country->timezones()
            ->select('timezones.id', 'timezones.name', 'timezones.city')
            ->orderBy('timezones.name')
            ->get()
            ->map(function ($tz): array {
                $now    = Carbon::now($tz->name);
                $offset = $now->offset;
                $sign   = $offset >= 0 ? '+' : '-';
                $hours  = floor(abs($offset) / 3600);
                $mins   = floor((abs($offset) % 3600) / 60);

                return [
                    'value' => $tz->name,
                    'label' => "{$tz->name} (UTC{$sign}" . sprintf('%02d:%02d', $hours, $mins) . ')',
                ];
            })
            ->values()
            ->toArray();
    }

    /**
     * @return array<int, array{value: string, label: string, description: string}>
     */
    private function rentalTypes(): array
    {
        return array_map(fn (RentalType $type) => [
            'value'       => $type->value,
            'label'       => $type->label(),
            'description' => $type->description(),
        ], RentalType::cases());
    }

    /**
     * @return array<int, array{value: string, label: string}>
     */
    private function propertyTypes(): array
    {
        return array_map(fn (PropertyType $type) => [
            'value' => $type->value,
            'label' => $type->label(),
        ], PropertyType::cases());
    }
}
