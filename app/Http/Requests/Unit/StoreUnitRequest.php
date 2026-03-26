<?php

namespace App\Http\Requests\Unit;

use App\Application\Unit\DTO\StoreUnitData;
use Illuminate\Foundation\Http\FormRequest;

final class StoreUnitRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the unit creation request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
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
            'branch_id.required' => __('unit.validation.branch_id_required'),
            'branch_id.integer' => __('unit.validation.branch_id_integer'),
            'branch_id.exists' => __('unit.validation.branch_id_exists'),

            'name.required' => __('unit.validation.name_required'),
            'name.max' => __('unit.validation.name_max'),

            'description.string' => __('unit.validation.description_string'),

            'is_active.required' => __('unit.validation.is_active_required'),
            'is_active.boolean' => __('unit.validation.is_active_boolean'),
        ];
    }

    /**
     * Convert the validated request into a unit DTO.
     */
    public function toDTO(): StoreUnitData
    {
        $validated = $this->validated();

        return StoreUnitData::from(
            branchId: (int) $validated['branch_id'],
            name: $validated['name'],
            description: $validated['description'] ?? null,
            isActive: (bool) $validated['is_active'],
        );
    }
}