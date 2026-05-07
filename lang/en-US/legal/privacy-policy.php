<?php

return [
    'meta' => [
        'title' => 'Privacy Policy | BookingCore',
        'description' => 'Privacy Policy for BookingCore, including calendar integration and public booking data handling.',
    ],
    'badge' => 'Privacy Policy',
    'title' => 'Privacy Policy',
    'updated' => 'Last updated: May 7, 2026',
    'intro' => 'BookingCore is an open source booking and scheduling application. This policy explains what information BookingCore processes, how it is used, and how Google Calendar data is handled when a user connects a calendar integration.',
    'sections' => [
        'who_operates' => [
            'title' => 'Who Operates BookingCore',
            'body_1' => 'BookingCore is provided as an open source scheduling application at bookingcore.link. For privacy questions, data requests, or calendar integration questions, contact roman.kocian@gmail.com.',
        ],
        'information_we_process' => [
            'title' => 'Information We Process',
            'body_1' => 'Account users may provide identity settings, branch details, units, activities, prices, working hours, time-off settings, customer booking records, and calendar integration settings.',
            'body_2' => 'Public visitors who create a booking may provide booking details such as name, contact details, selected service, selected time, and optional notes.',
            'body_3' => 'The application may also process standard technical information needed to run the service, such as session cookies, request metadata, timestamps, and security logs.',
        ],
        'how_information_is_used' => [
            'title' => 'How Information Is Used',
            'body_1' => 'BookingCore uses the information to provide scheduling features, display available booking slots, manage bookings, send or store booking records, and keep connected calendars synchronized when that feature is enabled.',
            'body_2' => 'Information is not sold. BookingCore does not use Google user data for advertising, profiling, or unrelated analytics.',
        ],
        'google_calendar_integration' => [
            'title' => 'Google Calendar Integration',
            'body_1' => 'When an account user connects Google Calendar, BookingCore requests access only to support calendar synchronization for bookings created or managed in BookingCore.',
            'body_2' => 'BookingCore may create, update, read, or select calendar information needed to place booking events into the connected calendar and keep those booking events aligned with the BookingCore schedule.',
            'body_3' => 'Google Calendar data is used only to provide the calendar integration requested by the user. It is not transferred to third parties except as necessary to provide or maintain the application, comply with law, or protect the service.',
        ],
        'data_sharing' => [
            'title' => 'Data Sharing',
            'body_1' => 'Booking data may be visible to the account user or organization that owns the public booking page where the booking was created.',
            'body_2' => 'Service providers that host, secure, or operate the application may process data only as needed to provide the service.',
            'body_3' => 'Data may be disclosed if required by law, legal process, or necessary to protect users, the application, or the public.',
        ],
        'retention_and_deletion' => [
            'title' => 'Retention and Deletion',
            'body_1' => 'BookingCore keeps data for as long as needed to provide the service, maintain booking records, support connected calendar functionality, and meet legal or operational requirements.',
            'body_2' => 'Users may request deletion of their account data or disconnect Google Calendar access. When calendar access is disconnected, BookingCore stops using that Google authorization for future calendar synchronization.',
        ],
        'security' => [
            'title' => 'Security',
            'body_1' => 'BookingCore uses reasonable technical and organizational measures to protect data, including authenticated access for administration features and OAuth-based authorization for Google integrations.',
            'body_2' => 'No method of transmission or storage is perfectly secure, but the application is designed to limit access to data according to the user role and feature being used.',
        ],
        'your_choices' => [
            'title' => 'Your Choices',
            'body_1' => 'Account users can manage booking data in the application, disconnect calendar integrations, and request account deletion where available.',
            'body_2' => 'You can also revoke BookingCore access from your Google Account security settings.',
        ],
        'changes' => [
            'title' => 'Changes',
            'body_1' => 'This policy may be updated as BookingCore evolves. The updated date above shows when the latest version took effect.',
        ],
    ],
    'links' => [
        'home' => 'Home',
        'terms_of_service' => 'Terms of Service',
    ],
];
