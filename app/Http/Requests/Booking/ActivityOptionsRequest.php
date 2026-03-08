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
            'resource_id' => ['bail', 'required', 'integer', 'exists:resources,id'],
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
            'resource_id.required' => __('booking/errors.messages.resource_required'),
            'resource_id.integer' => __('booking/errors.messages.resource_invalid'),
            'resource_id.exists' => __('booking/errors.messages.resource_not_found'),
        ];
    }

    /**
     * Get the validated resource identifier.
     */
    public function resourceId(): int
    {
        return (int) $this->validated('resource_id');
    }
}