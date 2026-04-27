<?php

namespace App\Http\Requests\Price;

use Illuminate\Foundation\Http\FormRequest;

final class StorePriceRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for storing a price.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'branch_id' => ['bail', 'required', 'integer', 'exists:branches,id'],
            'unit_id' => ['bail', 'required', 'integer', 'exists:units,id'],
            'activity_id' => ['bail', 'required', 'integer', 'exists:activities,id'],
            'price' => ['bail', 'required', 'numeric', 'min:0'],
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
            'branch_id.required' => __('price.validation.branch_required'),
            'branch_id.integer' => __('price.validation.branch_invalid'),
            'branch_id.exists' => __('price.validation.branch_not_found'),

            'unit_id.required' => __('price.validation.unit_required'),
            'unit_id.integer' => __('price.validation.unit_invalid'),
            'unit_id.exists' => __('price.validation.unit_not_found'),

            'activity_id.required' => __('price.validation.activity_required'),
            'activity_id.integer' => __('price.validation.activity_invalid'),
            'activity_id.exists' => __('price.validation.activity_not_found'),

            'price.required' => __('price.validation.price_required'),
            'price.numeric' => __('price.validation.price_invalid'),
            'price.min' => __('price.validation.price_min'),
        ];
    }

    /**
     * Get normalized validated payload.
     *
     * @return array{
     *     branch_id:int,
     *     unit_id:int,
     *     activity_id:int,
     *     price:string
     * }
     */
    public function validatedData(): array
	{
		$validated = $this->validated();

		return [
			'branch_id' => (int) $validated['branch_id'],
			'unit_id' => (int) $validated['unit_id'],
			'activity_id' => (int) $validated['activity_id'],
			'price' => (string) $validated['price'],
		];
	}
}