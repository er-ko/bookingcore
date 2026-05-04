<?php

return [
    'messages' => [
        'failed' => 'Não foi possível processar a solicitação de integração de calendário.',
        'calendar_selected' => 'O calendário foi selecionado com sucesso.',
        'invalid_calendar_id' => 'O ID do calendário selecionado é inválido.',
        'integration_user_mismatch' => 'A integração selecionada não pertence ao usuário autenticado.',
        'integration_not_calendar' => 'A integração selecionada não é uma integração de calendário.',
        'integration_inactive' => 'A integração selecionada está inativa.',
        'missing_refresh_token' => 'A integração de calendário não contém um token de atualização.',
        'missing_access_token' => 'A integração de calendário não contém um token de acesso.',
        'not_google_integration' => 'A integração selecionada não é uma integração do Google Calendar.',
        'google_refresh_failed' => 'Não foi possível atualizar o token de acesso do Google Calendar.',
        'google_refresh_missing_access_token' => 'Não foi possível atualizar o token de acesso do Google Calendar porque a resposta não incluiu um token de acesso.',
        'connection_error' => 'O BookingCore não conseguiu verificar sua conexão com o calendário. Reconecte sua conta do Google Calendar e tente novamente.',
    ],

    'validation' => [
        'calendar_id_required' => 'O identificador do calendário é obrigatório.',
        'calendar_id_string' => 'O identificador do calendário deve ser um texto válido.',
        'calendar_id_max' => 'O identificador do calendário não pode ter mais de 255 caracteres.',
    ],

    'view' => [
        'title' => 'Integrações de calendário',
        'description' => 'Conecte sua conta de calendário externa e escolha onde o BookingCore deve criar eventos de reserva.',

        'overview' => [
            'connected_account_title' => 'Conta conectada',
            'provider_title' => 'Fornecedor',
            'name_title' => 'Nome',
            'email_title' => 'E-mail',
            'timezone_title' => 'Fuso horário',
            'status_title' => 'Estado',
            'active_title' => 'Ativo',
            'available_calendars_title' => 'Calendários disponíveis',
            'timezone_prefix' => 'Fuso horário:',
        ],

        'actions' => [
            'connect_google' => 'Conectar Google Calendar',
            'reconnect_google' => 'Reconectar Google Calendar',
            'select_calendar' => 'Selecionar calendário',
            'selected' => 'Selecionado',
        ],

        'states' => [
            'connection_expired_title' => 'A conexão com o Google Calendar expirou',
            'connection_expired_text' => 'Sua conexão com o Google Calendar não é mais válida. Reconecte sua conta para continuar sincronizando calendários e eventos de reserva.',
            'no_calendar_connected_title' => 'Nenhum calendário conectado',
            'no_calendar_connected_text' => 'Você ainda não conectou nenhum calendário. Conecte o Google Calendar para começar a sincronizar eventos de reserva.',
            'no_calendars_found_title' => 'Não foram encontrados calendários',
            'no_calendars_found_text' => 'A conta conectada não disponibiliza atualmente nenhum calendário.',
            'primary_badge' => 'Principal',
            'read_only_badge' => 'Somente leitura',
            'selected_badge' => 'Selecionado',
            'calendar_count_suffix' => 'calendário(s)',
        ],
    ],
];
