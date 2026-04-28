<?php

return [
    'view' => [
        'title' => 'Book your appointment',
        'description' => 'Choose the branch, service, date, and time that work best for you.',

        'form' => [
            'branch_title' => 'Branch',
            'branch_placeholder' => 'Select branch',

            'unit_title' => 'Unit',
            'unit_placeholder' => 'Select unit',

            'activity_title' => 'Activity',
            'activity_placeholder' => 'Select activity',

            'date_title' => 'Date',
            'date_placeholder' => 'Select date',

            'slot_title' => 'Available time',
            'slot_placeholder' => 'Select time',

            'first_name_title' => 'First name',
            'first_name_placeholder' => 'John',

            'last_name_title' => 'Last name',
            'last_name_placeholder' => 'Doe',

            'email_title' => 'Email',
            'email_placeholder' => 'john@example.com',

            'phone_code_title' => 'Phone code',
            'phone_code_placeholder' => '+1',

            'phone_title' => 'Phone',
            'phone_placeholder' => '555123456',

            'note_title' => 'Note',
            'note_placeholder' => 'Additional information for your booking',
        ],

        'content' => [
            'form_title' => 'Complete your booking',
            'ready' => 'ready',

            'appointment_title' => 'Appointment details',
            'appointment_text' => 'Choose the branch, unit, service, date, and slot that fit best.',

            'customer_title' => 'Customer details',
            'customer_text' => 'Add the contact details needed to confirm and recognize the booking.',

            'note_title' => 'Additional note',
            'note_text' => 'Share anything helpful before the booking starts.',

            'review_title' => 'Review the booking details and confirm when everything looks right.',
            'review_text' => 'The booking summary updates live as you fill in the form.',
            'review_live_text' => ':selection/4 booking details, :customer/4 contact details',

            'summary_badge' => 'Summary',
            'summary_progress' => 'Booking review',

            'branch_label' => 'Branch',
            'unit_label' => 'Unit',
            'activity_label' => 'Activity',
            'date_time_label' => 'Date / time',
            'customer_label' => 'Customer',
            'email_label' => 'Email',
            'phone_label' => 'Phone',
            'note_label' => 'Note',

            'summary_empty_selection' => 'Not selected yet',
            'summary_empty_customer' => 'Not filled yet',

            'branch_status_title' => 'Branch status',
            'service_status_title' => 'Service status',
            'schedule_status_title' => 'Schedule status',
        ],

        'states' => [
            'no_branches_title' => 'No branches available',
            'no_branches_text' => 'There are currently no public branches available for booking.',

            'no_units_title' => 'No units available',
            'no_units_text' => 'No units are currently available for the selected branch.',

            'no_activities_title' => 'No activities available',
            'no_activities_text' => 'No activities are currently available for the selected unit.',

            'no_slots_title' => 'No available slots',
            'no_slots_text' => 'There are no available booking slots for the selected date.',

            'branch_default' => 'Choose the location where the booking should happen.',
            'service_default' => 'Pick the service after choosing the right unit.',
            'schedule_loading' => 'Checking live availability for the selected day.',
            'schedule_default' => 'Select a date to load open booking slots.',
        ],

        'actions' => [
            'submit' => 'Create booking',
            'submitting' => 'Creating booking...',
        ],

        'messages' => [
            'created' => 'Booking created successfully.',
            'failed' => 'Failed to create booking.',
        ],

        'detail' => [
            'title' => 'Booking details',
            'badge_created' => 'Booking created',
            'status_label' => 'Status',
            'heading' => 'Your booking is saved',
            'description' => 'Save this page for later, download the calendar file, or print the confirmation.',
            'details_title' => 'Booking details',
            'branch_label' => 'Branch',
            'unit_label' => 'Unit',
            'activity_label' => 'Activity',
            'date_time_label' => 'Date and time',
            'to_label' => 'to',
            'customer_title' => 'Customer information',
            'customer_name_label' => 'First and last name',
            'customer_email_label' => 'Email',
            'customer_phone_label' => 'Phone',
            'note_label' => 'Note',
            'actions' => [
                'back' => 'Back to booking page',
                'print' => 'Print page',
                'calendar' => 'Import into your calendar',
            ],
            'fallback' => '—',
        ],
    ],
];
