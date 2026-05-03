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
            'slug' => ['bail', 'required', 'string', 'exists:user_identity_settings,slug'],
            'branch_public_id' => ['bail', 'required', 'string', 'exists:branches,public_id'],
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
}