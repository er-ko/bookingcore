<?php

namespace App\Http\Requests\Identity;

use App\Enums\BookingMode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateIdentityRequest extends FormRequest
{
    /**
     * Determine whether the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'mode' => $this->filled('mode')
                ? trim((string) $this->mode)
                : BookingMode::Services->value,

            'brand_name' => is_string($this->brand_name)
                ? trim($this->brand_name)
                : $this->brand_name,

            'slug' => is_string($this->slug)
                ? trim($this->slug)
                : $this->slug,

            'default_language_code' => $this->filled('default_language_code')
                ? trim((string) $this->default_language_code)
                : null,

            'default_currency_code' => $this->filled('default_currency_code')
                ? strtoupper(trim((string) $this->default_currency_code))
                : null,

            'default_country_code' => $this->filled('default_country_code')
                ? strtoupper(trim((string) $this->default_country_code))
                : null,

            'is_public' => $this->boolean('is_public'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $identitySettingsId = $this->user()?->identitySettings?->id;

        return [
            'mode' => [
                'required',
                'string',
                Rule::in(BookingMode::values()),
            ],

            'brand_name' => [
                'required',
                'string',
                'max:160',
            ],

            'slug' => [
                'required',
                'string',
                'min:3',
                'max:120',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('user_identity_settings', 'slug')->ignore($identitySettingsId),
            ],

            'default_language_code' => [
                'required',
                'string',
                'max:16',
                Rule::exists('languages', 'language_tag'),
            ],

            'default_currency_code' => [
                'required',
                'string',
                'size:3',
                Rule::exists('currencies', 'currency_code'),
            ],

            'default_country_code' => [
                'required',
                'string',
                'size:2',
                Rule::exists('countries', 'iso_alpha2'),
            ],

            'is_public' => [
                'required',
                'boolean',
            ],
        ];
    }

    /**
     * Get custom validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'mode.required' => __('identity.validation.mode_required'),
            'mode.in' => __('identity.validation.mode_in'),

            'brand_name.required' => __('identity.validation.brand_required'),
            'brand_name.max' => __('identity.validation.brand_max'),

            'slug.required' => __('identity.validation.slug_required'),
            'slug.min' => __('identity.validation.slug_min'),
            'slug.max' => __('identity.validation.slug_max'),
            'slug.regex' => __('identity.validation.slug_regex'),
            'slug.unique' => __('identity.validation.slug_unique'),

            'default_language_code.required' => __('identity.validation.default_lang_required'),
            'default_language_code.max' => __('identity.validation.default_lang_max'),
            'default_language_code.exists' => __('identity.validation.default_lang_exists'),

            'default_currency_code.required' => __('identity.validation.default_currency_required'),
            'default_currency_code.size' => __('identity.validation.default_currency_size'),
            'default_currency_code.exists' => __('identity.validation.default_currency_exists'),

            'default_country_code.required' => __('identity.validation.default_country_required'),
            'default_country_code.size' => __('identity.validation.default_country_size'),
            'default_country_code.exists' => __('identity.validation.default_country_exists'),

            'is_public.required' => __('identity.validation.is_public_required'),
            'is_public.boolean' => __('identity.validation.is_public_boolean'),
        ];
    }
}
