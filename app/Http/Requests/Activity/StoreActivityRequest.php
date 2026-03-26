<?php

namespace App\Http\Requests\Activity;

use App\Application\Activity\DTO\StoreActivityData;
use Illuminate\Foundation\Http\FormRequest;

final class StoreActivityRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the activity creation request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'duration_minutes' => ['required', 'integer', 'min:1', 'max:1200'],
            'buffer_before_minutes' => ['nullable', 'integer', 'min:0', 'max:60'],
            'buffer_after_minutes' => ['nullable', 'integer', 'min:0', 'max:60'],
            'is_active' => ['required', 'boolean'],
        ];
    }

    /**
     * Custom validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('activity.validation.name_required'),
            'name.max' => __('activity.validation.name_max'),

            'duration_minutes.required' => __('activity.validation.duration_required'),
            'duration_minutes.integer' => __('activity.validation.duration_integer'),
            'duration_minutes.min' => __('activity.validation.duration_min'),
            'duration_minutes.max' => __('activity.validation.duration_max'),

            'buffer_before_minutes.integer' => __('activity.validation.buffer_before_integer'),
            'buffer_before_minutes.min' => __('activity.validation.buffer_before_min'),
            'buffer_before_minutes.max' => __('activity.validation.buffer_before_max'),

            'buffer_after_minutes.integer' => __('activity.validation.buffer_after_integer'),
            'buffer_after_minutes.min' => __('activity.validation.buffer_after_min'),
            'buffer_after_minutes.max' => __('activity.validation.buffer_after_max'),

            'is_active.required' => __('activity.validation.is_active_required'),
            'is_active.boolean' => __('activity.validation.is_active_boolean'),
        ];
    }

    /**
     * Convert the validated request into an activity DTO.
     */
    public function toDTO(): StoreActivityData
    {
        $validated = $this->validated();

        return StoreActivityData::from(
            name: $validated['name'],
            durationMinutes: (int) $validated['duration_minutes'],
            bufferBeforeMinutes: (int) ($validated['buffer_before_minutes'] ?? 0),
            bufferAfterMinutes: (int) ($validated['buffer_after_minutes'] ?? 0),
            isActive: (bool) $validated['is_active'],
        );
    }
}