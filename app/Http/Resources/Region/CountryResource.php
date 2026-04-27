<?php

namespace App\Http\Resources\Region;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => strtoupper((string) $this->iso_alpha2),
            'name' => $this->name,
            'official_name' => $this->official_name,
            'local_name' => $this->local_name,
            'flag_emoji' => $this->flag_emoji,
            'lang_code' => $this->default_language_code,
            'currency_code' => $this->default_currency_code,
            'phone_code' => $this->phone_code,
            'is_active_for_user' => (bool) $this->is_active_for_user,
        ];
    }
}