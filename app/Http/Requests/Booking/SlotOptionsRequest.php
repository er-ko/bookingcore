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
            'branch_id' => ['bail', 'required', 'integer', 'exists:branches,id'],
            'unit_id' => ['bail', 'required', 'integer', 'exists:units,id'],
            'activity_id' => ['bail', 'required', 'integer', 'exists:activities,id'],
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
            'branch_id.required' => __('booking.validation.branch_required'),
            'branch_id.integer' => __('booking.validation.branch_invalid'),
            'branch_id.exists' => __('booking.validation.branch_not_found'),

            'unit_id.required' => __('booking.validation.unit_required'),
            'unit_id.integer' => __('booking.validation.unit_invalid'),
            'unit_id.exists' => __('booking.validation.unit_not_found'),

            'activity_id.required' => __('booking.validation.activity_required'),
            'activity_id.integer' => __('booking.validation.activity_invalid'),
            'activity_id.exists' => __('booking.validation.activity_not_found'),

            'date.required' => __('booking.validation.date_required'),
            'date.date_format' => __('booking.validation.date_invalid'),
        ];
    }

    /**
     * Get the validated branch identifier.
     */
    public function branchId(): int
    {
        return (int) $this->validated('branch_id');
    }

    /**
     * Get the validated unit identifier.
     */
    public function unitId(): int
    {
        return (int) $this->validated('unit_id');
    }

    /**
     * Get the validated activity identifier.
     */
    public function activityId(): int
    {
        return (int) $this->validated('activity_id');
    }

    /**
     * Get the validated availability date.
     */
    public function availabilityDate(): string
    {
        return (string) $this->validated('date');
    }
}