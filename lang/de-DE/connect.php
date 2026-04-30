<?php

return [
    'view' => [
        'title' => 'Mit BookingCore verbinden',
        'heading' => 'Verbinden Sie Ihren Kalender',
        'description' => 'Starten Sie mit Google und verbinden Sie Ihren Kalender, um Buchungsverfügbarkeiten in einem klaren Open-Source-Arbeitsablauf zu verwalten.',
        'meta_title' => 'Ihren Kalender verbinden | BookingCore',
        'meta_description' => 'Verbinden Sie Google Kalender mit BookingCore und halten Sie Buchungsereignisse, Verfügbarkeiten und Terminplanungsabläufe über sicheres OAuth synchron.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Mit Google fortfahren',
            'description' => 'Autorisieren Sie BookingCore für den Zugriff auf Ihr Kalenderkonto, um Buchungsereignisse synchron zu halten.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Verbinden',
        ],

        'flow' => [
            'title' => 'Verbindungsablauf',
            'step_1' => 'Melden Sie sich mit Ihrem Google-Konto an.',
            'step_2' => 'Wählen Sie den Kalender aus, den BookingCore verwenden soll.',
            'step_3' => 'Beginnen Sie mit der Synchronisierung von Buchungsereignissen und Verfügbarkeiten.',
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