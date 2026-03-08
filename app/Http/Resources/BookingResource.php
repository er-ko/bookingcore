<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'branch' => $this->whenLoaded('branch', fn () => [
                'id' => $this->branch_id,
                'name' => $this->branch?->name,
            ]),

            'resource' => $this->whenLoaded('resource', fn () => [
                'id' => $this->resource_id,
                'name' => $this->getRelation('resource')?->name,
            ]),

            'activity' => $this->whenLoaded('activity', fn () => [
                'id' => $this->activity_id,
                'name' => $this->activity?->name,
            ]),

            'customer' => $this->whenLoaded('customer', fn () => [
                'id' => $this->customer_id,
                'first_name' => $this->customer?->first_name,
                'last_name' => $this->customer?->last_name,
                'email' => $this->customer?->email,
            ]),

            'status' => $this->status,
            'note' => $this->note,

            'starts_at' => $this->starts_at?->format('Y-m-d H:i'),
            'ends_at' => $this->ends_at?->format('Y-m-d H:i'),

            'starts_at_label' => $this->starts_at?->format('H:i'),
            'ends_at_label' => $this->ends_at?->format('H:i'),

            'date_label' => $this->starts_at?->format('Y-m-d'),

            'confirmed_at' => $this->confirmed_at?->format('Y-m-d H:i'),
            'cancelled_at' => $this->cancelled_at?->format('Y-m-d H:i'),

            'created_at' => $this->created_at?->format('Y-m-d H:i'),
        ];
    }
}