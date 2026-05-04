<?php

return [
    'messages' => [
        'failed' => 'Požadavek na zpracování integrace kalendáře se nezdařil.',
        'calendar_selected' => 'Kalendář byl úspěšně vybrán.',
        'invalid_calendar_id' => 'Vybrané ID kalendáře není platné.',
        'integration_user_mismatch' => 'Vybraná integrace nepatří přihlášenému uživateli.',
        'integration_not_calendar' => 'Vybraná integrace není integrací kalendáře.',
        'integration_inactive' => 'Vybraná integrace není aktivní.',
        'missing_refresh_token' => 'Integrace kalendáře neobsahuje obnovovací token.',
        'missing_access_token' => 'Integrace kalendáře neobsahuje přístupový token.',
        'not_google_integration' => 'Vybraná integrace není integrací Google Kalendáře.',
        'google_refresh_failed' => 'Obnovení přístupového tokenu Google Kalendáře se nezdařilo.',
        'google_refresh_missing_access_token' => 'Přístupový token Google Kalendáře se nepodařilo obnovit, protože odpověď neobsahovala přístupový token.',
        'connection_error' => 'BookingCore nemohl ověřit připojení vašeho kalendáře. Připojte prosím svůj účet Google Kalendáře znovu a zkuste to znovu.',
    ],

    'validation' => [
        'calendar_id_required' => 'Identifikátor kalendáře je povinný.',
        'calendar_id_string' => 'Identifikátor kalendáře musí být text.',
        'calendar_id_max' => 'Identifikátor kalendáře nesmí být delší než 255 znaků.',
    ],

    'view' => [
        'title' => 'Integrace kalendářů',
        'description' => 'Připojte svůj externí kalendářový účet a zvolte, kde má BookingCore vytvářet rezervační události.',

        'overview' => [
            'connected_account_title' => 'Připojený účet',
            'provider_title' => 'Poskytovatel',
            'name_title' => 'Jméno',
            'email_title' => 'E-mail',
            'timezone_title' => 'Časové pásmo',
            'status_title' => 'Stav',
            'active_title' => 'Aktivní',
            'available_calendars_title' => 'Dostupné kalendáře',
            'timezone_prefix' => 'Časové pásmo:',
        ],

        'actions' => [
            'connect_google' => 'Připojit Google Kalendář',
            'reconnect_google' => 'Znovu připojit Google Kalendář',
            'select_calendar' => 'Vybrat kalendář',
            'selected' => 'Vybráno',
        ],

        'states' => [
            'connection_expired_title' => 'Připojení ke Google Kalendáři vypršelo',
            'connection_expired_text' => 'Vaše připojení ke Google Kalendáři již není platné. Připojte prosím svůj účet znovu, abyste mohli pokračovat v synchronizaci kalendářů a rezervačních událostí.',
            'no_calendar_connected_title' => 'Není připojen žádný kalendář',
            'no_calendar_connected_text' => 'Zatím jste nepřipojili žádný kalendář. Připojte Google Kalendář a začněte synchronizovat rezervační události.',
            'no_calendars_found_title' => 'Nebyly nalezeny žádné kalendáře',
            'no_calendars_found_text' => 'Připojený účet aktuálně neposkytuje žádné kalendáře.',
            'primary_badge' => 'Primární',
            'read_only_badge' => 'Pouze pro čtení',
            'selected_badge' => 'Vybráno',
            'calendar_count_suffix' => 'kalendář/kalendáře/kalendářů',
        ],
    ],
];