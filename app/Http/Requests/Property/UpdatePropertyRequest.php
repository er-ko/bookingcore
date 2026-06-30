<?php

namespace App\Http\Requests\Property;

use App\Application\Property\DTO\UpdatePropertyData;
use App\Enums\Properties\PropertyType;
use App\Enums\Properties\RentalType;
use Illuminate\Foundation\Http\FormRequest;

final class UpdatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('country_code')) {
            $this->merge([
                'country_code' => strtoupper((string) $this->input('country_code')),
            ]);
        }
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'name'               => ['required', 'string', 'max:255'],
            'description'        => ['nullable', 'string'],
            'rental_type'        => ['required', 'string', 'in:' . implode(',', RentalType::values())],
            'property_type'      => ['required', 'string', 'in:' . implode(',', PropertyType::values())],
            'address_line_1'     => ['nullable', 'string', 'max:255'],
            'address_line_2'     => ['nullable', 'string', 'max:255'],
            'city'               => ['nullable', 'string', 'max:255'],
            'postcode'           => ['nullable', 'string', 'max:32'],
            'country_code'       => ['nullable', 'string', 'size:2'],
            'timezone'           => ['required', 'string', 'max:64'],
            'max_guests'         => ['nullable', 'integer', 'min:1'],
            'size_sqm'           => ['nullable', 'integer', 'min:1'],
            'price_per_night'    => ['nullable', 'numeric', 'min:0', 'required_if:rental_type,short_term'],
            'min_nights'         => ['required', 'integer', 'min:1', 'max:255'],
            'check_in_time'      => ['nullable', 'date_format:H:i'],
            'check_out_time'     => ['nullable', 'date_format:H:i'],
            'cleaning_fee'       => ['nullable', 'numeric', 'min:0'],
            'price_per_month'    => ['nullable', 'numeric', 'min:0', 'required_if:rental_type,long_term'],
            'min_months'         => ['required', 'integer', 'min:1', 'max:255'],
            'deposit_amount'     => ['nullable', 'numeric', 'min:0'],
            'available_from'     => ['nullable', 'date'],
            'utilities_included' => ['required', 'boolean'],
            'is_active'          => ['required', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'                    => __('property.validation.name_required'),
            'name.max'                         => __('property.validation.name_max'),
            'rental_type.required'             => __('property.validation.rental_type_required'),
            'rental_type.in'                   => __('property.validation.rental_type_in'),
            'property_type.required'           => __('property.validation.property_type_required'),
            'property_type.in'                 => __('property.validation.property_type_in'),
            'timezone.required'                => __('property.validation.timezone_required'),
            'price_per_night.required_if'      => __('property.validation.price_per_night_required'),
            'price_per_month.required_if'      => __('property.validation.price_per_month_required'),
            'check_in_time.date_format'        => __('property.validation.check_in_time_format'),
            'check_out_time.date_format'       => __('property.validation.check_out_time_format'),
            'available_from.date'              => __('property.validation.available_from_date'),
            'is_active.required'               => __('property.validation.is_active_required'),
            'is_active.boolean'                => __('property.validation.is_active_boolean'),
        ];
    }

    public function toDTO(): UpdatePropertyData
    {
        return UpdatePropertyData::from($this->validated());
    }
}
