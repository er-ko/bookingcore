<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateUnitRecurringTimeOffsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'days' => ['present', 'array', 'size:7'],
            'days.*' => ['present', 'array'],

            'days.*.*.id' => ['nullable', 'integer'],
            'days.*.*.day_of_week' => ['required', 'integer', 'between:1,7'],
            'days.*.*.start_time' => ['required', 'date_format:H:i'],
            'days.*.*.end_time' => ['required', 'date_format:H:i', 'after:days.*.*.start_time'],
            'days.*.*.reason' => ['nullable', 'string', 'max:255'],
            'days.*.*.is_active' => ['required', 'boolean'],
            'days.*.*.valid_from' => ['nullable', 'date_format:Y-m-d'],
            'days.*.*.valid_until' => ['nullable', 'date_format:Y-m-d', 'after_or_equal:days.*.*.valid_from'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'days.required' => __('unit.validation.recurring_time_offs_days_required'),
            'days.array' => __('unit.validation.recurring_time_offs_days_array'),
            'days.size' => __('unit.validation.recurring_time_offs_days_size'),
            'days.*.array' => __('unit.validation.recurring_time_offs_day_array'),
            'days.*.*.day_of_week.required' => __('unit.validation.recurring_time_offs_day_of_week_required'),
            'days.*.*.day_of_week.between' => __('unit.validation.recurring_time_offs_day_of_week_between'),
            'days.*.*.start_time.required' => __('unit.validation.recurring_time_offs_start_time_required'),
            'days.*.*.start_time.date_format' => __('unit.validation.recurring_time_offs_start_time_format'),
            'days.*.*.end_time.required' => __('unit.validation.recurring_time_offs_end_time_required'),
            'days.*.*.end_time.date_format' => __('unit.validation.recurring_time_offs_end_time_format'),
            'days.*.*.end_time.after' => __('unit.validation.recurring_time_offs_end_time_after'),
            'days.*.*.reason.max' => __('unit.validation.recurring_time_offs_reason_max'),
            'days.*.*.is_active.required' => __('unit.validation.recurring_time_offs_is_active_required'),
            'days.*.*.is_active.boolean' => __('unit.validation.recurring_time_offs_is_active_boolean'),
            'days.*.*.valid_from.date_format' => __('unit.validation.recurring_time_offs_valid_from_format'),
            'days.*.*.valid_until.date_format' => __('unit.validation.recurring_time_offs_valid_until_format'),
            'days.*.*.valid_until.after_or_equal' => __('unit.validation.recurring_time_offs_valid_until_after_or_equal'),
        ];
    }
}
