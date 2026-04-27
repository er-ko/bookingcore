<?php

namespace App\Http\Requests\Region;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateLanguageStatusRequest extends FormRequest
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
        $languageIds = $this->input('language_ids', []);

        $this->merge([
            'language_ids' => is_array($languageIds) ? $languageIds : [],
        ]);
    }

    /**
     * Get the validation rules for the language status update request.
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
            'language_ids' => [
                'nullable',
                'array',
            ],
            'language_ids.*' => [
                'integer',
                'exists:languages,id',
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
                $languageIds = $this->input('language_ids', []);

                if (!is_array($languageIds)) {
                    $languageIds = [];
                }

                if (in_array($scope, ['single', 'selected'], true) && count($languageIds) === 0) {
                    $validator->errors()->add(
                        'language_ids',
                        __('region/language.validation.language_ids_required')
                    );
                }

                if ($scope === 'single' && count($languageIds) !== 1) {
                    $validator->errors()->add(
                        'language_ids',
                        __('region/language.validation.language_ids_single')
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
            'scope.required' => __('region/language.validation.scope_required'),
            'scope.in' => __('region/language.validation.scope_in'),
            'language_ids.array' => __('region/language.validation.language_ids_array'),
            'language_ids.*.integer' => __('region/language.validation.language_ids_integer'),
            'language_ids.*.exists' => __('region/language.validation.language_ids_exists'),
            'is_active.required' => __('region/language.validation.is_active_required'),
            'is_active.boolean' => __('region/language.validation.is_active_boolean'),
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
    public function languageIds(): array
    {
        return array_map('intval', $this->validated('language_ids', []));
    }
}
