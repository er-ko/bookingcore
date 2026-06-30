<?php

namespace App\Http\Resources\Property;

use App\Http\Resources\Region\CountryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'public_id' => $this->public_id,

            'name'        => $this->name,
            'description' => $this->description,

            'rental_type'       => $this->rental_type->value,
            'rental_type_label' => $this->rental_type->label(),
            'property_type'     => $this->property_type->value,
            'property_type_label' => $this->property_type->label(),

            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'city'           => $this->city,
            'postcode'       => $this->postcode,
            'country_code'   => $this->country_code,
            'country'        => CountryResource::make($this->whenLoaded('country')),
            'timezone'       => $this->timezone,

            'max_guests' => $this->max_guests,
            'size_sqm'   => $this->size_sqm,

            'price_per_night' => $this->price_per_night,
            'min_nights'      => $this->min_nights,
            'check_in_time'   => $this->check_in_time,
            'check_out_time'  => $this->check_out_time,
            'cleaning_fee'    => $this->cleaning_fee,

            'price_per_month'    => $this->price_per_month,
            'min_months'         => $this->min_months,
            'deposit_amount'     => $this->deposit_amount,
            'available_from'     => $this->available_from?->format('Y-m-d'),
            'utilities_included' => $this->utilities_included,

            'is_active' => $this->is_active,

            'address_label' => $this->buildAddressLabel(),

            'created_at' => $this->created_at?->format('Y-m-d H:i A'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i A'),
        ];
    }

    private function buildAddressLabel(): ?string
    {
        $parts = array_filter([
            $this->address_line_1,
            $this->address_line_2,
            $this->city,
            $this->postcode,
            $this->country?->name ?? $this->country_code,
        ], static fn ($value): bool => filled($value));

        if ($parts === []) {
            return null;
        }

        return implode(', ', $parts);
    }
}
