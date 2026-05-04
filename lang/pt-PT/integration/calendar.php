<?php

return [
    'messages' => [
        'failed' => 'Não foi possível processar o pedido de integração de calendário.',
        'calendar_selected' => 'O calendário foi selecionado com sucesso.',
        'invalid_calendar_id' => 'O ID do calendário selecionado é inválido.',
        'integration_user_mismatch' => 'A integração selecionada não pertence ao utilizador autenticado.',
        'integration_not_calendar' => 'A integração selecionada não é uma integração de calendário.',
        'integration_inactive' => 'A integração selecionada está inativa.',
        'missing_refresh_token' => 'A integração de calendário não contém um token de atualização.',
        'missing_access_token' => 'A integração de calendário não contém um token de acesso.',
        'not_google_integration' => 'A integração selecionada não é uma integração do Google Calendar.',
        'google_refresh_failed' => 'Não foi possível atualizar o token de acesso do Google Calendar.',
        'google_refresh_missing_access_token' => 'Não foi possível atualizar o token de acesso do Google Calendar porque a resposta não incluiu um token de acesso.',
        'connection_error' => 'O BookingCore não conseguiu verificar a sua ligação ao calendário. Volte a ligar a sua conta Google Calendar e tente novamente.',
    ],

    'validation' => [
        'calendar_id_required' => 'O identificador do calendário é obrigatório.',
        'calendar_id_string' => 'O identificador do calendário deve ser uma cadeia de caracteres.',
        'calendar_id_max' => 'O identificador do calendário não pode ter mais de 255 caracteres.',
    ],

    'view' => [
        'title' => 'Integrações de calendário',
        'description' => 'Ligue a sua conta de calendário externa e escolha onde o BookingCore deve criar eventos de reserva.',

        'overview' => [
            'connected_account_title' => 'Conta ligada',
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
            'connect_google' => 'Ligar Google Calendar',
            'reconnect_google' => 'Voltar a ligar Google Calendar',
            'select_calendar' => 'Selecionar calendário',
            'selected' => 'Selecionado',
        ],

        'states' => [
            'connection_expired_title' => 'A ligação ao Google Calendar expirou',
            'connection_expired_text' => 'A sua ligação ao Google Calendar já não é válida. Volte a ligar a sua conta para continuar a sincronizar calendários e eventos de reserva.',
            'no_calendar_connected_title' => 'Nenhum calendário ligado',
            'no_calendar_connected_text' => 'Ainda não ligou nenhum calendário. Ligue o Google Calendar para começar a sincronizar eventos de reserva.',
            'no_calendars_found_title' => 'Não foram encontrados calendários',
            'no_calendars_found_text' => 'A conta ligada não disponibiliza atualmente nenhum calendário.',
            'primary_badge' => 'Principal',
            'read_only_badge' => 'Só de leitura',
            'selected_badge' => 'Selecionado',
            'calendar_count_suffix' => 'calendário(s)',
        ],
    ],
];
