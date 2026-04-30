<?php

return [
    'view' => [
        'title' => 'Connettersi a BookingCore',
        'heading' => 'Connetta il suo calendario',
        'description' => 'Inizi con Google e connetta il suo calendario per gestire la disponibilità delle prenotazioni in un flusso chiaro e open source.',
        'meta_title' => 'Connetta il suo calendario | BookingCore',
        'meta_description' => 'Connetta Google Calendar a BookingCore e mantenga sincronizzati eventi di prenotazione, disponibilità e flussi di pianificazione tramite OAuth sicuro.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Continua con Google',
            'description' => 'Autorizzi BookingCore ad accedere al suo account calendario e a mantenere sincronizzati gli eventi di prenotazione.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Connetti',
        ],

        'flow' => [
            'title' => 'Flusso di connessione',
            'step_1' => 'Acceda con il suo account Google.',
            'step_2' => 'Scelga il calendario che BookingCore deve utilizzare.',
            'step_3' => 'Inizi a sincronizzare eventi di prenotazione e disponibilità.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#SincronizzazioneCalendario',
            'availability' => '#Disponibilità',
            'booking_events' => '#EventiPrenotazione',
        ],
    ],
];
