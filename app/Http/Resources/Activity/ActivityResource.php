<?php

namespace App\Http\Resources\Activity;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            'duration_minutes' => $this->duration_minutes,

			'buffer_before_minutes' => $this->buffer_before_minutes,
			'buffer_after_minutes' => $this->buffer_after_minutes,

            'is_active' => $this->is_active,

            'created_at' => $this->created_at?->format('Y-m-d H:i A'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i A'),
        ];
    }
}