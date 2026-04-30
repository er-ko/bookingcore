<?php

return [
    'view' => [
        'title' => 'Připojit k BookingCore',
        'heading' => 'Připojte svůj kalendář',
        'description' => 'Začněte s Googlem a připojte svůj kalendář, abyste mohli spravovat dostupnost rezervací v přehledném open source pracovním postupu.',
        'meta_title' => 'Připojte svůj kalendář | BookingCore',
        'meta_description' => 'Připojte Google Kalendář k BookingCore a udržujte rezervační události, dostupnost a plánovací pracovní postupy synchronizované pomocí bezpečného OAuth.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Pokračovat přes Google',
            'description' => 'Autorizujte BookingCore k přístupu k vašemu kalendářovému účtu a udržujte rezervační události synchronizované.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Připojit',
        ],

        'flow' => [
            'title' => 'Průběh připojení',
            'step_1' => 'Přihlaste se pomocí svého účtu Google.',
            'step_2' => 'Vyberte kalendář, který má BookingCore používat.',
            'step_3' => 'Začněte synchronizovat rezervační události a dostupnost.',
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