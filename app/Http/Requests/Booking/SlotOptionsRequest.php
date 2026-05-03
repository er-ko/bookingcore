<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

final class SlotOptionsRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the slot options request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'slug' => ['bail', 'required', 'string', 'exists:user_identity_settings,slug'],
            'branch_public_id' => ['bail', 'required', 'string', 'exists:branches,public_id'],
            'unit_public_id' => ['bail', 'required', 'string', 'exists:units,public_id'],
            'activity_public_id' => ['bail', 'required', 'string', 'exists:activities,public_id'],
            'date' => ['bail', 'required', 'date_format:Y-m-d'],
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
            'branch_public_id.required' => __('booking.validation.branch_required'),
            'branch_public_id.string' => __('booking.validation.branch_invalid'),
            'branch_public_id.exists' => __('booking.validation.branch_not_found'),

            'unit_public_id.required' => __('booking.validation.unit_required'),
            'unit_public_id.string' => __('booking.validation.unit_invalid'),
            'unit_public_id.exists' => __('booking.validation.unit_not_found'),

            'activity_public_id.required' => __('booking.validation.activity_required'),
            'activity_public_id.string' => __('booking.validation.activity_invalid'),
            'activity_public_id.exists' => __('booking.validation.activity_not_found'),

            'date.required' => __('booking.validation.date_required'),
            'date.date_format' => __('booking.validation.date_invalid'),
        ];
    }

    public function slug(): string
    {
        return (string) $this->validated('slug');
    }

    /**
     * Get the validated branch identifier.
     */
    public function branchPublicId(): string
    {
        return (string) $this->validated('branch_public_id');
    }

    /**
     * Get the validated unit identifier.
     */
    public function unitPublicId(): string
    {
        return (string) $this->validated('unit_public_id');
    }

    /**
     * Get the validated activity identifier.
     */
    public function activityPublicId(): string
    {
        return (string) $this->validated('activity_public_id');
    }

    /**
     * Get the validated availability date.
     */
    public function availabilityDate(): string
    {
        return (string) $this->validated('date');
    }
}