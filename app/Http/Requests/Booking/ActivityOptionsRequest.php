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
            'slug' => ['bail', 'required', 'string', 'exists:user_identity_settings,slug'],
            'unit_public_id' => ['bail', 'required', 'string', 'exists:units,public_id'],
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
            'unit_public_id.required' => __('booking.validation.unit_required'),
            'unit_public_id.string' => __('booking.validation.unit_invalid'),
            'unit_public_id.exists' => __('booking.validation.unit_not_found'),
        ];
    }

    public function slug(): string
    {
        return (string) $this->validated('slug');
    }

    /**
     * Get the validated unit identifier.
     */
    public function unitPublicId(): string
    {
        return (string) $this->validated('unit_public_id');
    }
}