<?php

namespace App\Http\Requests\Price;

use Illuminate\Foundation\Http\FormRequest;

final class UpdatePriceRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for updating a price.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
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
            'price.required' => __('price.validation.price_required'),
            'price.numeric' => __('price.validation.price_invalid'),
            'price.min' => __('price.validation.price_min'),
        ];
    }

    /**
     * Get normalized validated payload.
     *
     * @return array{
     *     price:string
     * }
     */
    public function validatedData(): array
    {
        $validated = $this->validated();

        return [
            'price' => (string) $validated['price'],
        ];
    }
}