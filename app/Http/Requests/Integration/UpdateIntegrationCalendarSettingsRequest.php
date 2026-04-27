<?php

namespace App\Http\Requests\Integration;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateIntegrationCalendarSettingsRequest extends FormRequest
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
            'sync_mode' => ['required', 'string', 'in:soft,strict'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'sync_mode.required' => __('integration/calendar.validation.sync_mode_required'),
            'sync_mode.string' => __('integration/calendar.validation.sync_mode_string'),
            'sync_mode.in' => __('integration/calendar.validation.sync_mode_in'),
        ];
    }
}
