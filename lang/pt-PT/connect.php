<?php

return [
    'view' => [
        'title' => 'Ligar ao BookingCore',
        'heading' => 'Ligue o seu calendário',
        'description' => 'Comece com o Google e ligue o seu calendário para gerir a disponibilidade das reservas num fluxo claro e open source.',
        'meta_title' => 'Ligue o seu calendário | BookingCore',
        'meta_description' => 'Ligue o Google Calendar ao BookingCore e mantenha sincronizados os eventos de reserva, a disponibilidade e os fluxos de planeamento com OAuth seguro.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Continuar com o Google',
            'description' => 'Autorize o BookingCore a aceder à sua conta de calendário e a manter os eventos de reserva sincronizados.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Ligar',
        ],

        'flow' => [
            'title' => 'Fluxo de ligação',
            'step_1' => 'Inicie sessão com a sua conta Google.',
            'step_2' => 'Escolha o calendário que o BookingCore deve utilizar.',
            'step_3' => 'Comece a sincronizar eventos de reserva e disponibilidade.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#SincronizacaoCalendario',
            'availability' => '#Disponibilidade',
            'booking_events' => '#EventosReserva',
        ],
    ],
];
