<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateUnitTimeOffsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'items' => ['present', 'array'],
            'items.*.id' => ['nullable', 'integer'],
            'items.*.starts_at' => ['required', 'date_format:Y-m-d\TH:i'],
            'items.*.ends_at' => ['required', 'date_format:Y-m-d\TH:i', 'after:items.*.starts_at'],
            'items.*.reason' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'items.present' => __('unit.validation.time_offs_items_required'),
            'items.array' => __('unit.validation.time_offs_items_array'),
            'items.*.starts_at.required' => __('unit.validation.time_offs_starts_at_required'),
            'items.*.starts_at.date_format' => __('unit.validation.time_offs_starts_at_format'),
            'items.*.ends_at.required' => __('unit.validation.time_offs_ends_at_required'),
            'items.*.ends_at.date_format' => __('unit.validation.time_offs_ends_at_format'),
            'items.*.ends_at.after' => __('unit.validation.time_offs_ends_at_after'),
            'items.*.reason.max' => __('unit.validation.time_offs_reason_max'),
        ];
    }
}
