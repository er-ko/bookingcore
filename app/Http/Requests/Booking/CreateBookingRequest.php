<?php

namespace App\Http\Requests\Booking;

use App\Application\Booking\DTO\CreateBookingData;
use App\Application\Booking\DTO\CustomerData;
use Illuminate\Foundation\Http\FormRequest;

final class CreateBookingRequest extends FormRequest
{
    /**
     * Determine whether the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules for the booking creation request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'branch_id' => ['bail', 'required', 'integer', 'exists:branches,id'],
            'unit_id' => ['bail', 'required', 'integer', 'exists:units,id'],
            'activity_id' => ['bail', 'required', 'integer', 'exists:activities,id'],
            'starts_at' => ['bail', 'required', 'date_format:Y-m-d H:i:s'],

            'customer' => ['bail', 'required', 'array'],
            'customer.first_name' => ['bail', 'required', 'string', 'max:128'],
            'customer.last_name' => ['bail', 'required', 'string', 'max:128'],
            'customer.email' => ['nullable', 'required', 'email', 'max:255'],
            'customer.phone_code' => ['bail', 'required', 'string', 'max:5'],
            'customer.phone' => ['bail', 'required', 'string', 'max:16'],

            'note' => ['nullable', 'string'],
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

            'branch_id.required' => __('booking.validation.branch_required'),
            'branch_id.integer' => __('booking.validation.branch_invalid'),
            'branch_id.exists' => __('booking.validation.branch_not_found'),

            'unit_id.required' => __('booking.validation.unit_required'),
            'unit_id.integer' => __('booking.validation.unit_invalid'),
            'unit_id.exists' => __('booking.validation.unit_not_found'),

            'activity_id.required' => __('booking.validation.activity_required'),
            'activity_id.integer' => __('booking.validation.activity_invalid'),
            'activity_id.exists' => __('booking.validation.activity_not_found'),

            'starts_at.required' => __('booking.validation.starts_at_required'),
            'starts_at.date_format' => __('booking.validation.starts_at_invalid'),

            'customer.required' => __('booking.validation.customer_required'),
            'customer.array' => __('booking.validation.customer_invalid'),

            'customer.first_name.required' => __('booking.validation.customer_first_name_required'),
            'customer.first_name.string' => __('booking.validation.customer_first_name_invalid'),
            'customer.first_name.max' => __('booking.validation.customer_first_name_too_long'),

            'customer.last_name.required' => __('booking.validation.customer_last_name_required'),
            'customer.last_name.string' => __('booking.validation.customer_last_name_invalid'),
            'customer.last_name.max' => __('booking.validation.customer_last_name_too_long'),

            'customer.email.email' => __('booking.validation.customer_email_invalid'),
            'customer.email.max' => __('booking.validation.customer_email_too_long'),

            'customer.phone_code.required' => __('booking.validation.customer_phone_code_required'),
            'customer.phone_code.string' => __('booking.validation.customer_phone_code_invalid'),
            'customer.phone_code.max' => __('booking.validation.customer_phone_code_too_long'),

            'customer.phone.required' => __('booking.validation.customer_phone_required'),
            'customer.phone.string' => __('booking.validation.customer_phone_invalid'),
            'customer.phone.max' => __('booking.validation.customer_phone_too_long'),

            'note.string' => __('booking.validation.note_invalid'),

        ];
    }

    /**
     * Convert the validated request into a booking DTO.
     */
    public function toDTO(): CreateBookingData
    {
        $validated = $this->validated();
        $customerData = $validated['customer'];

        $customer = CustomerData::from(
            firstName: $customerData['first_name'],
            lastName: $customerData['last_name'],
            email: $customerData['email'] ?? null,
            phoneCode: $customerData['phone_code'],
            phone: $customerData['phone'],
        );

        return CreateBookingData::from(
            branchId: (int) $validated['branch_id'],
            unitId: (int) $validated['unit_id'],
            activityId: (int) $validated['activity_id'],
            startsAt: $validated['starts_at'],
            customer: $customer,
            note: $validated['note'] ?? null,
        );
    }
}