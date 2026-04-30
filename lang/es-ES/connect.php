<?php

return [
    'view' => [
        'title' => 'Conectar con BookingCore',
        'heading' => 'Conecte su calendario',
        'description' => 'Empiece con Google y conecte su calendario para gestionar la disponibilidad de reservas en un flujo de trabajo claro y de código abierto.',
        'meta_title' => 'Conecte su calendario | BookingCore',
        'meta_description' => 'Conecte Google Calendar con BookingCore y mantenga sincronizados los eventos de reserva, la disponibilidad y los flujos de programación mediante OAuth seguro.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Continuar con Google',
            'description' => 'Autorice a BookingCore a acceder a su cuenta de calendario y mantener sincronizados los eventos de reserva.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Conectar',
        ],

        'flow' => [
            'title' => 'Flujo de conexión',
            'step_1' => 'Inicie sesión con su cuenta de Google.',
            'step_2' => 'Elija el calendario que BookingCore debe utilizar.',
            'step_3' => 'Empiece a sincronizar eventos de reserva y disponibilidad.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#SincronizacionCalendario',
            'availability' => '#Disponibilidad',
            'booking_events' => '#EventosReserva',
        ],
    ],
];
