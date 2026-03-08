<?php

return [
    'activity_inactive' => 'The selected activity does not exist or is inactive.',
    'resource_invalid' => 'The selected resource does not exist, is inactive, or does not belong to the given branch.',
    'activity_not_assigned' => 'The selected activity is not assigned to the selected resource.',
    'resource_already_booked' => 'The selected resource is already booked for the given time range.',
    'booking_conflict' => 'The booking conflicts with an existing reservation.',
    'slot_overlap' => 'The selected booking slot overlaps an existing reservation.',
    'outside_working_hours' => 'The selected booking slot is outside working hours.',
    'during_time_off' => 'The selected booking slot falls within a blocked time-off period.',
    'already_cancelled' => 'The booking is already cancelled.',
    'cancelled_cannot_be_updated' => 'Cancelled bookings cannot be updated.',
    'same_status' => 'The booking is already marked as :status.',
    'use_cancel_action' => 'Use the cancel booking action to cancel a booking.',
    'invalid_activity_minutes' => 'Activity minutes must be greater than zero.',
    'negative_buffer_minutes' => 'Buffer minutes cannot be negative.',
    'invalid_slot_block' => 'Total slot block must be greater than zero.',
    'invalid_total_slot_block' => 'Total slot block must be greater than zero.',
    'invalid_time_range' => 'TimeRange start must be earlier than end.',
    'invalid_day_of_week' => 'Invalid day of week: :value',
    'invalid_booking_status' => 'Invalid booking status: :value',

    'messages' => [
        'branch_required' => 'Branch is required.',
        'branch_invalid' => 'Branch identifier is invalid.',
        'branch_not_found' => 'Selected branch does not exist.',

        'resource_required' => 'Resource is required.',
        'resource_invalid' => 'Resource identifier is invalid.',
        'resource_not_found' => 'Selected resource does not exist.',

        'activity_required' => 'Activity is required.',
        'activity_invalid' => 'Activity identifier is invalid.',
        'activity_not_found' => 'Selected activity does not exist.',

        'starts_at_required' => 'Start time is required.',
        'starts_at_invalid' => 'Start time format is invalid.',

        'customer_required' => 'Customer information is required.',
        'customer_invalid' => 'Customer data format is invalid.',

        'customer_first_name_required' => 'Customer first name is required.',
        'customer_first_name_invalid' => 'Customer first name must be a string.',
        'customer_first_name_too_long' => 'Customer first name is too long.',

        'customer_last_name_invalid' => 'Customer last name must be a string.',
        'customer_last_name_too_long' => 'Customer last name is too long.',

        'customer_email_required' => 'Customer email is required.',
        'customer_email_invalid' => 'Customer email must be a valid email address.',
        'customer_email_too_long' => 'Customer email is too long.',

        'customer_phone_code_invalid' => 'Phone code must be a string.',
        'customer_phone_code_too_long' => 'Phone code is too long.',

        'customer_phone_invalid' => 'Phone number must be a string.',
        'customer_phone_too_long' => 'Phone number is too long.',

        'note_invalid' => 'Note must be a string.',

        'status_required' => 'Booking status is required.',
        'status_invalid' => 'Booking status format is invalid.',
        'status_not_allowed' => 'Selected booking status is not allowed.',

        'date_required' => 'Date is required.',
        'date_invalid' => 'Date format is invalid.',
    ]
];