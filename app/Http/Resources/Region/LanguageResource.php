<?php

namespace App\Http\Resources\Region;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class LanguageResource extends JsonResource
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
            'language_tag' => $this->language_tag,
            'name' => $this->name,
            'local_name' => $this->local_name,
            'flag_emoji' => $this->flag_emoji,
            'is_active_for_user' => (bool) $this->is_active_for_user,
        ];
    }
}