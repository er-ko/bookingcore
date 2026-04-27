<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateUnitWorkingHoursRequest extends FormRequest
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
            'days.*' => ['present', 'array', 'max:1'],

            'days.*.*.id' => ['nullable', 'integer'],
            'days.*.*.day_of_week' => ['required', 'integer', 'between:1,7'],
            'days.*.*.start_time' => ['required', 'date_format:H:i'],
            'days.*.*.end_time' => ['required', 'date_format:H:i', 'after:days.*.*.start_time'],
            'days.*.*.is_active' => ['required', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'days.required' => __('unit.validation.working_hours_days_required'),
            'days.array' => __('unit.validation.working_hours_days_array'),
            'days.size' => __('unit.validation.working_hours_days_size'),
            'days.*.array' => __('unit.validation.working_hours_day_array'),
            'days.*.max' => __('unit.validation.working_hours_day_max'),
            'days.*.*.day_of_week.required' => __('unit.validation.working_hours_day_of_week_required'),
            'days.*.*.day_of_week.between' => __('unit.validation.working_hours_day_of_week_between'),
            'days.*.*.start_time.required' => __('unit.validation.working_hours_start_time_required'),
            'days.*.*.start_time.date_format' => __('unit.validation.working_hours_start_time_format'),
            'days.*.*.end_time.required' => __('unit.validation.working_hours_end_time_required'),
            'days.*.*.end_time.date_format' => __('unit.validation.working_hours_end_time_format'),
            'days.*.*.end_time.after' => __('unit.validation.working_hours_end_time_after'),
            'days.*.*.is_active.required' => __('unit.validation.working_hours_is_active_required'),
            'days.*.*.is_active.boolean' => __('unit.validation.working_hours_is_active_boolean'),
        ];
    }
}
