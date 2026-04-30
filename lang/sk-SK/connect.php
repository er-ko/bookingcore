<?php

return [
    'view' => [
        'title' => 'Pripojiť sa k BookingCore',
        'heading' => 'Pripojte svoj kalendár',
        'description' => 'Začnite s Google a pripojte svoj kalendár, aby ste mohli spravovať dostupnosť rezervácií v prehľadnom open-source pracovnom postupe.',
        'meta_title' => 'Pripojte svoj kalendár | BookingCore',
        'meta_description' => 'Pripojte Google Kalendár k BookingCore a udržiavajte rezervačné udalosti, dostupnosť a plánovacie pracovné postupy synchronizované pomocou bezpečného OAuth.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Pokračovať cez Google',
            'description' => 'Autorizujte BookingCore na prístup k Vášmu kalendárovému účtu a udržiavajte rezervačné udalosti synchronizované.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Pripojiť',
        ],

        'flow' => [
            'title' => 'Priebeh pripojenia',
            'step_1' => 'Prihláste sa pomocou svojho účtu Google.',
            'step_2' => 'Vyberte kalendár, ktorý má BookingCore používať.',
            'step_3' => 'Začnite synchronizovať rezervačné udalosti a dostupnosť.',
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