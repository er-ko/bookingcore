<?php

namespace App\Http\Resources\Branch;

use App\Http\Resources\Region\CountryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'public_id' => $this->public_id,

            'name' => $this->name,

            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'country_code' => $this->country_code,

            'country' => CountryResource::make($this->whenLoaded('country')),

            'timezone' => $this->timezone,
            'is_active' => $this->is_active,

            'address_label' => $this->buildAddressLabel(),

            'created_at' => $this->created_at?->format('Y-m-d H:i A'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i A'),
        ];
    }

    /**
     * Build a compact human-readable address label.
     */
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