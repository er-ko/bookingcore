<?php

namespace App\Http\Resources\Unit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'public_id' => $this->public_id,
            'branch_id' => $this->branch_id,

            'name' => $this->name,
            'description' => $this->description,

            'branch' => $this->whenLoaded('branch', fn () => $this->branch?->name),

            'is_active' => $this->is_active,

            'created_at' => $this->created_at?->format('Y-m-d H:i A'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i A'),
        ];
    }
}