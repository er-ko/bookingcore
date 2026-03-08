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
            'resource_id' => ['bail', 'required', 'integer', 'exists:resources,id'],
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
            'branch_id.required' => __('booking/errors.branch_required'),
            'branch_id.integer' => __('booking/errors.branch_invalid'),
            'branch_id.exists' => __('booking/errors.branch_not_found'),

            'resource_id.required' => __('booking/errors.resource_required'),
            'resource_id.integer' => __('booking/errors.resource_invalid'),
            'resource_id.exists' => __('booking/errors.resource_not_found'),

            'activity_id.required' => __('booking/errors.activity_required'),
            'activity_id.integer' => __('booking/errors.activity_invalid'),
            'activity_id.exists' => __('booking/errors.activity_not_found'),

            'date.required' => __('booking/errors.date_required'),
            'date.date_format' => __('booking/errors.date_invalid'),
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
     * Get the validated resource identifier.
     */
    public function resourceId(): int
    {
        return (int) $this->validated('resource_id');
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