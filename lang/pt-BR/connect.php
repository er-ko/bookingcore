<?php

return [
    'view' => [
        'title' => 'Conectar ao BookingCore',
        'heading' => 'Conecte seu calendário',
        'description' => 'Comece com o Google e conecte seu calendário para gerenciar a disponibilidade das reservas em um fluxo claro e open source.',
        'meta_title' => 'Conecte seu calendário | BookingCore',
        'meta_description' => 'Conecte o Google Calendar ao BookingCore e mantenha sincronizados os eventos de reserva, a disponibilidade e os fluxos de planejamento com OAuth seguro.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Continuar com o Google',
            'description' => 'Autorize o BookingCore a acessar sua conta de calendário e manter os eventos de reserva sincronizados.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Conectar',
        ],

        'flow' => [
            'title' => 'Fluxo de conexão',
            'step_1' => 'Faça login com sua conta Google.',
            'step_2' => 'Escolha o calendário que o BookingCore deve usar.',
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
