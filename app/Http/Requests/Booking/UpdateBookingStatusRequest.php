<?php

namespace App\Http\Requests\Booking;

use App\Enums\BookingStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateBookingStatusRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the booking status update request.
     *
     * @return array<string, array<int, string|\Illuminate\Validation\Rules\In>>
     */
    public function rules(): array
    {
        return [
            'status' => [
                'bail',
                'required',
                'string',
                Rule::in(array_column(BookingStatus::cases(), 'value')),
            ],
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
            'status.required' => __('dashboard.validation.status_required'),
            'status.string' => __('dashboard.validation.status_invalid'),
            'status.in' => __('dashboard.validation.status_not_allowed'),
        ];
    }

    /**
     * Convert the validated request status into a booking status enum.
     */
    public function toStatus(): BookingStatus
    {
        return BookingStatus::from($this->validated('status'));
    }
}
