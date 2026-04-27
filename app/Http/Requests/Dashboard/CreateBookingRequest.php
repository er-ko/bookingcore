<?php

namespace App\Http\Requests\Dashboard;

use App\Application\Booking\DTO\CreateBookingData;
use App\Application\Booking\DTO\CustomerData;
use Illuminate\Foundation\Http\FormRequest;

final class CreateBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
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
            'customer.email' => ['bail', 'required', 'email', 'max:255'],
            'customer.phone_code' => ['bail', 'required', 'string', 'max:5'],
            'customer.phone' => ['bail', 'required', 'string', 'max:16'],

            'note' => ['nullable', 'string'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'branch_id.required' => __('dashboard.validation.branch_required'),
            'branch_id.integer' => __('dashboard.validation.branch_invalid'),
            'branch_id.exists' => __('dashboard.validation.branch_not_found'),

            'unit_id.required' => __('dashboard.validation.unit_required'),
            'unit_id.integer' => __('dashboard.validation.unit_invalid'),
            'unit_id.exists' => __('dashboard.validation.unit_not_found'),

            'activity_id.required' => __('dashboard.validation.activity_required'),
            'activity_id.integer' => __('dashboard.validation.activity_invalid'),
            'activity_id.exists' => __('dashboard.validation.activity_not_found'),

            'starts_at.required' => __('dashboard.validation.starts_at_required'),
            'starts_at.date_format' => __('dashboard.validation.starts_at_invalid'),

            'customer.required' => __('dashboard.validation.customer_required'),
            'customer.array' => __('dashboard.validation.customer_invalid'),

            'customer.first_name.required' => __('dashboard.validation.customer_first_name_required'),
            'customer.first_name.string' => __('dashboard.validation.customer_first_name_invalid'),
            'customer.first_name.max' => __('dashboard.validation.customer_first_name_too_long'),

            'customer.last_name.required' => __('dashboard.validation.customer_last_name_required'),
            'customer.last_name.string' => __('dashboard.validation.customer_last_name_invalid'),
            'customer.last_name.max' => __('dashboard.validation.customer_last_name_too_long'),

            'customer.email.required' => __('dashboard.validation.customer_email_required'),
            'customer.email.email' => __('dashboard.validation.customer_email_invalid'),
            'customer.email.max' => __('dashboard.validation.customer_email_too_long'),

            'customer.phone_code.required' => __('dashboard.validation.customer_phone_code_required'),
            'customer.phone_code.string' => __('dashboard.validation.customer_phone_code_invalid'),
            'customer.phone_code.max' => __('dashboard.validation.customer_phone_code_too_long'),

            'customer.phone.required' => __('dashboard.validation.customer_phone_required'),
            'customer.phone.string' => __('dashboard.validation.customer_phone_invalid'),
            'customer.phone.max' => __('dashboard.validation.customer_phone_too_long'),

            'note.string' => __('dashboard.validation.note_invalid'),
        ];
    }

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
