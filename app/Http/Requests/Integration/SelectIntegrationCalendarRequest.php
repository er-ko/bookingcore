<?php

namespace App\Http\Requests\Integration;

use Illuminate\Foundation\Http\FormRequest;

final class SelectIntegrationCalendarRequest extends FormRequest
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
            'calendar_id' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'calendar_id.required' => __('integration/calendar.validation.calendar_id_required'),
            'calendar_id.string' => __('integration/calendar.validation.calendar_id_string'),
            'calendar_id.max' => __('integration/calendar.validation.calendar_id_max'),
        ];
    }
}
