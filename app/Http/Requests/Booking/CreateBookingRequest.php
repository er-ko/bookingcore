<?php

namespace App\Http\Requests\Booking;

use App\Domain\Booking\DTO\CreateBookingData;
use App\Domain\Booking\DTO\CustomerData;
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
            'resource_id' => ['bail', 'required', 'integer', 'exists:resources,id'],
            'activity_id' => ['bail', 'required', 'integer', 'exists:activities,id'],
            'starts_at' => ['bail', 'required', 'date_format:Y-m-d H:i:s'],

            'customer' => ['bail', 'required', 'array'],
            'customer.first_name' => ['bail', 'required', 'string', 'max:128'],
            'customer.last_name' => ['nullable', 'string', 'max:128'],
            'customer.email' => ['bail', 'required', 'email', 'max:255'],
            'customer.phone_code' => ['nullable', 'string', 'max:5'],
            'customer.phone' => ['nullable', 'string', 'max:16'],

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

            'branch_id.required' => __('booking/errors.messages.branch_required'),
            'branch_id.integer' => __('booking/errors.messages.branch_invalid'),
            'branch_id.exists' => __('booking/errors.messages.branch_not_found'),

            'resource_id.required' => __('booking/errors.messages.resource_required'),
            'resource_id.integer' => __('booking/errors.messages.resource_invalid'),
            'resource_id.exists' => __('booking/errors.messages.resource_not_found'),

            'activity_id.required' => __('booking/errors.messages.activity_required'),
            'activity_id.integer' => __('booking/errors.messages.activity_invalid'),
            'activity_id.exists' => __('booking/errors.messages.activity_not_found'),

            'starts_at.required' => __('booking/errors.messages.starts_at_required'),
            'starts_at.date_format' => __('booking/errors.messages.starts_at_invalid'),

            'customer.required' => __('booking/errors.messages.customer_required'),
            'customer.array' => __('booking/errors.messages.customer_invalid'),

            'customer.first_name.required' => __('booking/errors.messages.customer_first_name_required'),
            'customer.first_name.string' => __('booking/errors.messages.customer_first_name_invalid'),
            'customer.first_name.max' => __('booking/errors.messages.customer_first_name_too_long'),

            'customer.last_name.string' => __('booking/errors.messages.customer_last_name_invalid'),
            'customer.last_name.max' => __('booking/errors.messages.customer_last_name_too_long'),

            'customer.email.required' => __('booking/errors.messages.customer_email_required'),
            'customer.email.email' => __('booking/errors.messages.customer_email_invalid'),
            'customer.email.max' => __('booking/errors.messages.customer_email_too_long'),

            'customer.phone_code.string' => __('booking/errors.messages.customer_phone_code_invalid'),
            'customer.phone_code.max' => __('booking/errors.messages.customer_phone_code_too_long'),

            'customer.phone.string' => __('booking/errors.messages.customer_phone_invalid'),
            'customer.phone.max' => __('booking/errors.messages.customer_phone_too_long'),

            'note.string' => __('booking/errors.messages.note_invalid'),

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
            lastName: $customerData['last_name'] ?? null,
            email: $customerData['email'],
            phoneCode: $customerData['phone_code'] ?? null,
            phone: $customerData['phone'] ?? null,
        );

        return CreateBookingData::from(
            branchId: (int) $validated['branch_id'],
            resourceId: (int) $validated['resource_id'],
            activityId: (int) $validated['activity_id'],
            startsAt: $validated['starts_at'],
            customer: $customer,
            note: $validated['note'] ?? null,
        );
    }
}