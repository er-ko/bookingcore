<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

final class UnitOptionsRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the unit options request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'branch_id' => ['bail', 'required', 'integer', 'exists:branches,id'],
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
        ];
    }

    /**
     * Get the validated branch identifier.
     */
    public function branchId(): int
    {
        return (int) $this->validated('branch_id');
    }
}