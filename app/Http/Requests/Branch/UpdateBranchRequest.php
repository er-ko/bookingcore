<?php

namespace App\Http\Requests\Branch;

use App\Application\Branch\DTO\UpdateBranchData;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateBranchRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->filled('country_code')) {
            $this->merge([
                'country_code' => strtoupper((string) $this->input('country_code')),
            ]);
        }
    }

    /**
     * Get the validation rules for the branch update request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address_line_1' => ['nullable', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'postcode' => ['nullable', 'string', 'max:32'],
            'country_code' => ['nullable', 'string', 'size:2'],
            'timezone' => ['required', 'string', 'max:64'],
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
            'name.required' => __('branch.validation.name_required'),
            'name.max' => __('branch.validation.name_max'),
            'address_line_1.max' => __('branch.validation.address_line_1_max'),
            'address_line_2.max' => __('branch.validation.address_line_2_max'),
            'city.max' => __('branch.validation.city_max'),
            'postcode.max' => __('branch.validation.postcode_max'),
            'country_code.size' => __('branch.validation.country_code_size'),
            'timezone.required' => __('branch.validation.timezone_required'),
            'timezone.max' => __('branch.validation.timezone_max'),
            'is_active.required' => __('branch.validation.is_active_required'),
            'is_active.boolean' => __('branch.validation.is_active_boolean'),
        ];
    }

    /**
     * Convert the validated request into a branch DTO.
     */
    public function toDTO(): UpdateBranchData
    {
        $validated = $this->validated();

        return UpdateBranchData::from(
            name: $validated['name'],
            addressLine1: $validated['address_line_1'] ?? null,
            addressLine2: $validated['address_line_2'] ?? null,
            city: $validated['city'] ?? null,
            postcode: $validated['postcode'] ?? null,
            countryCode: $validated['country_code'] ?? null,
            timezone: $validated['timezone'],
            isActive: (bool) $validated['is_active'],
        );
    }
}