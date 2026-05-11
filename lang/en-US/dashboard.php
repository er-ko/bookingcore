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
		'cancelled' => 'Booking cancelled successfully.',
		'status_updated' => 'Booking status updated successfully.',
    ],

	'validation' => [
        'status_required' => 'Booking status is required.',
        'status_invalid' => 'Booking status format is invalid.',
        'status_not_allowed' => 'Selected booking status is not allowed.',
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

        'actions' => [
            'confirm' => 'Confirm',
            'complete' => 'Complete',
            'cancel' => 'Cancel',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Are you sure you want to cancel this booking?',
        ],

    ],
];
