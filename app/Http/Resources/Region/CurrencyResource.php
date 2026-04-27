<?php

namespace App\Http\Resources\Region;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CurrencyResource extends JsonResource
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
            'currency_code' => $this->currency_code,
            'name' => $this->name,
            'flag_emoji' => $this->flag_emoji,
            'minor_unit' => $this->minor_unit,
            'symbol_prefix' => $this->symbol_prefix,
            'symbol_suffix' => $this->symbol_suffix,
            'is_active_for_user' => (bool) $this->is_active_for_user,
        ];
    }
}