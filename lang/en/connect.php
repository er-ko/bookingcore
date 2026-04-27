<?php

return [
    'view' => [
        'title' => 'Connect to BookingCore',
        'heading' => 'Connect your calendar',
        'description' => 'Start with Google and connect your calendar to manage booking availability in a clean, open source workflow.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Continue with Google',
            'description' => 'Authorize BookingCore to access your calendar account and keep booking events in sync.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Connect',
        ],

        'flow' => [
            'title' => 'Connection flow',
            'step_1' => 'Sign in with your Google account.',
            'step_2' => 'Choose the calendar BookingCore should use.',
            'step_3' => 'Start syncing booking events and availability.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#CalendarSync',
            'availability' => '#Availability',
            'booking_events' => '#BookingEvents',
        ],
    ],
];
