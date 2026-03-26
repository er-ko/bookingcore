<?php

namespace App\Http\Resources\Region;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Resource representing a country linked to a branch.
 *
 * This resource provides a stable frontend contract for country-related
 * branch data, including code, display name, and flag.
 */
class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array{code: string|null, name: string|null, flag: string|null}
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->resource?->iso_alpha2,
            'name' => $this->resource?->name,
            'official_name' => $this->resource?->official_name,
			'local_name' => $this->resource?->local_name,
            'flag_emoji' => $this->resource?->flag_emoji,
            'lang_code' => $this->resource?->default_language_code,
            'currency_code' => $this->resource?->default_currency_code,
            'phone_code' => $this->resource?->phone_code,
            'is_active' => $this->resource?->is_active,
        ];
    }
}