<?php

namespace App\Support;

final class LegalDocuments
{
    /**
     * @return array<string, mixed>
     */
    public static function privacyPolicy(): array
    {
        return [
            'meta' => [
                'title' => 'Privacy Policy | BookingCore',
                'description' => 'Privacy Policy for BookingCore, including calendar integration and public booking data handling.',
            ],
            'badge' => 'Privacy Policy',
            'title' => 'Privacy Policy',
            'updated' => 'Last updated: May 2, 2026',
            'intro' => 'BookingCore is an open source booking and scheduling application. This policy explains what information BookingCore processes, how it is used, and how Google Calendar data is handled when a user connects a calendar integration.',
            'sections' => [
                [
                    'title' => 'Who Operates BookingCore',
                    'body' => [
                        'BookingCore is provided as an open source scheduling application at bookingcore.link. For privacy questions, data requests, or calendar integration questions, contact privacy@bookingcore.link.',
                    ],
                ],
                [
                    'title' => 'Information We Process',
                    'body' => [
                        'Account users may provide identity settings, branch details, units, activities, prices, working hours, time-off settings, customer booking records, and calendar integration settings.',
                        'Public visitors who create a booking may provide booking details such as name, contact details, selected service, selected time, and optional notes.',
                        'The application may also process standard technical information needed to run the service, such as session cookies, request metadata, timestamps, and security logs.',
                    ],
                ],
                [
                    'title' => 'How Information Is Used',
                    'body' => [
                        'BookingCore uses the information to provide scheduling features, display available booking slots, manage bookings, send or store booking records, and keep connected calendars synchronized when that feature is enabled.',
                        'Information is not sold. BookingCore does not use Google user data for advertising, profiling, or unrelated analytics.',
                    ],
                ],
                [
                    'title' => 'Google Calendar Integration',
                    'body' => [
                        'When an account user connects Google Calendar, BookingCore requests access only to support calendar synchronization for bookings created or managed in BookingCore.',
                        'BookingCore may create, update, read, or select calendar information needed to place booking events into the connected calendar and keep those booking events aligned with the BookingCore schedule.',
                        'Google Calendar data is used only to provide the calendar integration requested by the user. It is not transferred to third parties except as necessary to provide or maintain the application, comply with law, or protect the service.',
                    ],
                ],
                [
                    'title' => 'Data Sharing',
                    'body' => [
                        'Booking data may be visible to the account user or organization that owns the public booking page where the booking was created.',
                        'Service providers that host, secure, or operate the application may process data only as needed to provide the service.',
                        'Data may be disclosed if required by law, legal process, or necessary to protect users, the application, or the public.',
                    ],
                ],
                [
                    'title' => 'Retention and Deletion',
                    'body' => [
                        'BookingCore keeps data for as long as needed to provide the service, maintain booking records, support connected calendar functionality, and meet legal or operational requirements.',
                        'Users may request deletion of their account data or disconnect Google Calendar access. When calendar access is disconnected, BookingCore stops using that Google authorization for future calendar synchronization.',
                    ],
                ],
                [
                    'title' => 'Security',
                    'body' => [
                        'BookingCore uses reasonable technical and organizational measures to protect data, including authenticated access for administration features and OAuth-based authorization for Google integrations.',
                        'No method of transmission or storage is perfectly secure, but the application is designed to limit access to data according to the user role and feature being used.',
                    ],
                ],
                [
                    'title' => 'Your Choices',
                    'body' => [
                        'Account users can manage booking data in the application, disconnect calendar integrations, and request account deletion where available.',
                        'You can also revoke BookingCore access from your Google Account security settings.',
                    ],
                ],
                [
                    'title' => 'Changes',
                    'body' => [
                        'This policy may be updated as BookingCore evolves. The updated date above shows when the latest version took effect.',
                    ],
                ],
            ],
            'links' => [
                ['label' => 'Home', 'href' => '/'],
                ['label' => 'Terms of Service', 'href' => '/terms-of-service'],
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public static function termsOfService(): array
    {
        return [
            'meta' => [
                'title' => 'Terms of Service | BookingCore',
                'description' => 'Terms of Service for BookingCore, an open source booking and scheduling application.',
            ],
            'badge' => 'Terms of Service',
            'title' => 'Terms of Service',
            'updated' => 'Last updated: May 2, 2026',
            'intro' => 'These terms describe the basic conditions for using BookingCore at bookingcore.link. By using the application, you agree to use it responsibly and only for lawful booking and scheduling purposes.',
            'sections' => [
                [
                    'title' => 'The Service',
                    'body' => [
                        'BookingCore provides scheduling tools for branches, units, activities, prices, availability, public booking pages, booking management, and optional calendar integrations.',
                        'The project is open source, but the hosted service at bookingcore.link may include operational rules, security limits, and availability constraints required to run the application.',
                    ],
                ],
                [
                    'title' => 'Accounts and Access',
                    'body' => [
                        'You are responsible for the activity that happens through your account and for keeping access to your account secure.',
                        'You must provide accurate information where it is needed to operate booking pages, manage bookings, and connect integrations.',
                    ],
                ],
                [
                    'title' => 'Calendar Integrations',
                    'body' => [
                        'If you connect Google Calendar or another calendar provider, you authorize BookingCore to use that connection to support booking-related calendar synchronization.',
                        'You can disconnect calendar access when you no longer want BookingCore to use that integration.',
                    ],
                ],
                [
                    'title' => 'Acceptable Use',
                    'body' => [
                        'You may not use BookingCore to violate laws, abuse public booking forms, attempt unauthorized access, interfere with the service, or process data that you do not have the right to process.',
                        'Public booking pages should represent real services, availability, and contact details.',
                    ],
                ],
                [
                    'title' => 'Customer and Booking Data',
                    'body' => [
                        'If you operate a public booking page, you are responsible for the booking information you collect from your customers and for using it in a lawful and transparent way.',
                        'You should only request information that is necessary for the appointment or service being booked.',
                    ],
                ],
                [
                    'title' => 'Availability and Changes',
                    'body' => [
                        'BookingCore may change, improve, pause, or discontinue parts of the hosted service. Reasonable care is taken to keep the application useful and reliable, but uninterrupted availability is not guaranteed.',
                    ],
                ],
                [
                    'title' => 'Open Source Code',
                    'body' => [
                        'BookingCore source code may be available under its open source license. The license for the code is separate from these terms for the hosted service.',
                    ],
                ],
                [
                    'title' => 'Disclaimer',
                    'body' => [
                        'BookingCore is provided on an as-is and as-available basis. To the fullest extent permitted by law, warranties are disclaimed and liability is limited for indirect, incidental, or consequential damages.',
                    ],
                ],
                [
                    'title' => 'Contact',
                    'body' => [
                        'Questions about these terms can be sent to roman.kocian@gmail.com.',
                    ],
                ],
            ],
            'links' => [
                ['label' => 'Home', 'href' => '/'],
                ['label' => 'Privacy Policy', 'href' => '/privacy-policy'],
            ],
        ];
    }
}
