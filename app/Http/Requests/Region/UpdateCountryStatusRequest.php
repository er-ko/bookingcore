<?php

namespace App\Http\Requests\Region;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateCountryStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $countryIds = $this->input('country_ids', []);

        $this->merge([
            'country_ids' => is_array($countryIds) ? $countryIds : [],
        ]);
    }

    /**
     * Get the validation rules for the country status update request.
     *
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'scope' => [
                'required',
                'string',
                Rule::in(['single', 'selected', 'all']),
            ],
            'country_ids' => [
                'nullable',
                'array',
            ],
            'country_ids.*' => [
                'integer',
                'exists:countries,id',
            ],
            'is_active' => [
                'required',
                'boolean',
            ],
        ];
    }

    /**
     * Configure additional validation callbacks.
     *
     * @return array<int, callable>
     */
    public function after(): array
    {
        return [
            function (Validator $validator): void {
                $scope = $this->string('scope')->value();
                $countryIds = $this->input('country_ids', []);

                if (!is_array($countryIds)) {
                    $countryIds = [];
                }

                if (in_array($scope, ['single', 'selected'], true) && count($countryIds) === 0) {
                    $validator->errors()->add(
                        'country_ids',
                        __('region/country.validation.country_ids_required')
                    );
                }

                if ($scope === 'single' && count($countryIds) !== 1) {
                    $validator->errors()->add(
                        'country_ids',
                        __('region/country.validation.country_ids_single')
                    );
                }
            },
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
            'scope.required' => __('region/country.validation.scope_required'),
            'scope.in' => __('region/country.validation.scope_in'),
            'country_ids.array' => __('region/country.validation.country_ids_array'),
            'country_ids.*.integer' => __('region/country.validation.country_ids_integer'),
            'country_ids.*.exists' => __('region/country.validation.country_ids_exists'),
            'is_active.required' => __('region/country.validation.is_active_required'),
            'is_active.boolean' => __('region/country.validation.is_active_boolean'),
        ];
    }

    public function scopeValue(): string
    {
        return (string) $this->validated('scope');
    }

    public function isActiveValue(): bool
    {
        return (bool) $this->validated('is_active');
    }

    /**
     * @return array<int, int>
     */
    public function countryIds(): array
    {
        return array_map('intval', $this->validated('country_ids', []));
    }
}
