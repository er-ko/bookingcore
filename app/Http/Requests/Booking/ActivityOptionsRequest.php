<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

final class ActivityOptionsRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the activity options request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'unit_id' => ['bail', 'required', 'integer', 'exists:units,id'],
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
            'unit_id.required' => __('booking.validation.unit_required'),
            'unit_id.integer' => __('booking.validation.unit_invalid'),
            'unit_id.exists' => __('booking.validation.unit_not_found'),
        ];
    }

    /**
     * Get the validated unit identifier.
     */
    public function unitId(): int
    {
        return (int) $this->validated('unit_id');
    }
}