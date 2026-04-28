<?php

return [
	'errors' => [
		'activity_inactive' => 'The selected activity does not exist or is inactive.',
		'unit_invalid' => 'The selected unit does not exist, is inactive, or does not belong to the given branch.',
		'activity_not_assigned' => 'The selected activity is not assigned to the selected unit.',
        'activity_not_available_for_unit' => 'The selected activity is not available for the selected unit.',
		'unit_already_booked' => 'The selected unit is already booked for the given time range.',
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
		'invalid_time_range' => 'The start of the time range must be earlier than the end.',
		'invalid_day_of_week' => 'Invalid day of the week: :value',
		'invalid_booking_status' => 'Invalid booking status: :value',
	],

    'messages' => [
		'created' => 'Booking created successfully.',
		'failed' => 'Failed to create booking.',
		'cancelled' => 'Booking cancelled successfully.',
		'status_updated' => 'Booking status updated successfully.',
        'not_found' => 'The selected booking was not found.',
    ],

	'validation' => [
		'branch_required' => 'Branch is required.',
        'branch_invalid' => 'Branch identifier is invalid.',
        'branch_not_found' => 'Selected branch does not exist.',

        'unit_required' => 'Unit is required.',
        'unit_invalid' => 'Unit identifier is invalid.',
        'unit_not_found' => 'Selected unit does not exist.',

        'activity_required' => 'Activity is required.',
        'activity_invalid' => 'Activity identifier is invalid.',
        'activity_not_found' => 'Selected activity does not exist.',
        'activity_not_available_for_unit' => 'Selected activity is not available for the selected unit.',

        'starts_at_required' => 'Start time is required.',
        'starts_at_invalid' => 'Start time format is invalid.',

        'customer_required' => 'Customer information is required.',
        'customer_invalid' => 'Customer data format is invalid.',

        'customer_first_name_required' => 'Customer first name is required.',
        'customer_first_name_invalid' => 'Customer first name must be a string.',
        'customer_first_name_too_long' => 'Customer first name is too long.',

        'customer_last_name_required' => 'Customer last name is required.',
        'customer_last_name_invalid' => 'Customer last name must be a string.',
        'customer_last_name_too_long' => 'Customer last name is too long.',

        'customer_email_required' => 'Customer email is required.',
        'customer_email_invalid' => 'Customer email must be a valid email address.',
        'customer_email_too_long' => 'Customer email is too long.',

        'customer_phone_code_required' => 'Phone code is required.',
        'customer_phone_code_invalid' => 'Phone code must be a string.',
        'customer_phone_code_too_long' => 'Phone code is too long.',

        'customer_phone_required' => 'Phone number is required.',
        'customer_phone_invalid' => 'Phone number must be a string.',
        'customer_phone_too_long' => 'Phone number is too long.',

        'note_invalid' => 'Note must be a string.',

        'status_required' => 'Booking status is required.',
        'status_invalid' => 'Booking status format is invalid.',
        'status_not_allowed' => 'Selected booking status is not allowed.',

        'date_required' => 'Date is required.',
        'date_invalid' => 'Date format is invalid.',
	],

	'view' => [
        'title' => 'Dashboard',
        'create_booking' => 'Create Booking',
        'edit_booking' => 'Edit Booking',
        'index_description' => 'Overview of created bookings, including their current status and related entities.',
        'create_description' => 'Create a new booking with customer details, service selection, and an available time slot.',
        'edit_description' => 'Update booking details, customer information, and booking status.',
        'back_to_dashboard' => 'Back to Dashboard',
        'create_first_booking' => 'Create your first booking',
        'no_bookings_found' => 'No bookings found.',
        'no_bookings_text' => 'There are no bookings to display yet. Create the first booking to start working with the system.',

        'table' => [
            'customer' => 'Customer',
            'branch' => 'Branch',
            'unit' => 'Unit',
            'activity' => 'Activity',
            'starts_at' => 'Starts at',
            'ends_at' => 'Ends at',
            'status' => 'Status',
            'actions' => 'Actions',
            'active' => 'Active',
            'inactive' => 'Inactive',
        ],

        'overview' => [
            'title' => 'Booking overview',

            'customer_title' => 'Customer details',
            'customer_text' => 'Enter the customer information required to create the booking.',

            'booking_flow_title' => 'Booking flow',
            'booking_flow_text' => 'Select a branch, then a unit, then an activity, date, and available time slot.',

            'availability_title' => 'Availability',
            'availability_text' => 'Available time slots are loaded based on the selected branch, unit, activity, and date.',

            'required_title' => 'Required',
            'required_items' => [
                'first_and_last_name' => 'First and last name',
                'phone_code_and_number' => 'Phone code and number',
                'branch' => 'Branch',
                'unit' => 'Unit',
                'activity' => 'Activity',
                'date' => 'Date',
                'slot' => 'Available slot',
            ],

            'optional_title' => 'Optional',
            'optional_items' => [
                'email' => 'Email',
                'note' => 'Note',
            ],

            'note_title' => 'Note',
            'note_text' => 'A booking can only be created after a valid available time slot is selected.',
        ],

        'form' => [
            'booking_details' => 'Booking details',
            'complete_the_reservation' => 'Complete the reservation',
            'customer_details' => 'Customer details',
            'first_name_title' => 'First name',
            'last_name_title' => 'Last name',
            'email_title' => 'Email',
            'phone_code_title' => 'Code',
            'phone_title' => 'Phone',
            'branch_title' => 'Branch',
            'select_branch' => 'Select a branch',
            'unit_title' => 'Unit',
            'select_unit' => 'Select a unit',
            'loading_units' => 'Loading units...',
            'activity_title' => 'Activity',
            'select_activity' => 'Select an activity',
            'loading_activities' => 'Loading activities...',
            'date_title' => 'Date',
            'available_slots_title' => 'Available slots',
            'available_slots_count' => 'available slot(s)',
            'loading_slots' => 'Loading slots...',
            'no_available_slots' => 'No available slots were found for the selected date.',
            'select_slot' => 'Select a slot',
            'note_title' => 'Note',
        ],

        'actions' => [
            'confirm' => 'Confirm',
            'complete' => 'Complete',
            'cancel' => 'Cancel',
            'create' => 'Create Booking',
            'creating' => 'Creating...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Are you sure you want to cancel this booking?',
        ],

    ],
];
