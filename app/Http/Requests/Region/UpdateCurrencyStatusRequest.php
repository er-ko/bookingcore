<?php

namespace App\Http\Requests\Region;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateCurrencyStatusRequest extends FormRequest
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
        $currencyIds = $this->input('currency_ids', []);

        $this->merge([
            'currency_ids' => is_array($currencyIds) ? $currencyIds : [],
        ]);
    }

    /**
     * Get the validation rules for the currency status update request.
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
            'currency_ids' => [
                'nullable',
                'array',
            ],
            'currency_ids.*' => [
                'integer',
                'exists:currencies,id',
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
                $currencyIds = $this->input('currency_ids', []);

                if (!is_array($currencyIds)) {
                    $currencyIds = [];
                }

                if (in_array($scope, ['single', 'selected'], true) && count($currencyIds) === 0) {
                    $validator->errors()->add(
                        'currency_ids',
                        __('region/currency.validation.currency_ids_required')
                    );
                }

                if ($scope === 'single' && count($currencyIds) !== 1) {
                    $validator->errors()->add(
                        'currency_ids',
                        __('region/currency.validation.currency_ids_single')
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
            'scope.required' => __('region/currency.validation.scope_required'),
            'scope.in' => __('region/currency.validation.scope_in'),
            'currency_ids.array' => __('region/currency.validation.currency_ids_array'),
            'currency_ids.*.integer' => __('region/currency.validation.currency_ids_integer'),
            'currency_ids.*.exists' => __('region/currency.validation.currency_ids_exists'),
            'is_active.required' => __('region/currency.validation.is_active_required'),
            'is_active.boolean' => __('region/currency.validation.is_active_boolean'),
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
    public function currencyIds(): array
    {
        return array_map('intval', $this->validated('currency_ids', []));
    }
}
