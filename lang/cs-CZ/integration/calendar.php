<?php

return [
    'messages' => [
        'failed' => 'Požadavek na zpracování integrace kalendáře se nezdařil.',
        'calendar_selected' => 'Kalendář byl úspěšně vybrán.',
        'settings_updated' => 'Nastavení synchronizace kalendáře bylo úspěšně aktualizováno.',
        'invalid_calendar_id' => 'Vybrané ID kalendáře není platné.',
        'integration_user_mismatch' => 'Vybraná integrace nepatří přihlášenému uživateli.',
        'integration_not_calendar' => 'Vybraná integrace není integrací kalendáře.',
        'integration_inactive' => 'Vybraná integrace není aktivní.',
        'missing_refresh_token' => 'Integrace kalendáře neobsahuje obnovovací token.',
        'missing_access_token' => 'Integrace kalendáře neobsahuje přístupový token.',
        'not_google_integration' => 'Vybraná integrace není integrací Google Kalendáře.',
        'invalid_sync_mode' => 'Vybraný režim synchronizace není platný.',
        'google_refresh_failed' => 'Obnovení přístupového tokenu Google Kalendáře se nezdařilo.',
        'google_refresh_missing_access_token' => 'Přístupový token Google Kalendáře se nepodařilo obnovit, protože odpověď neobsahovala přístupový token.',
        'connection_error' => 'BookingCore nemohl ověřit připojení vašeho kalendáře. Připojte prosím svůj účet Google Kalendáře znovu a zkuste to znovu.',
    ],

    'validation' => [
        'calendar_id_required' => 'Identifikátor kalendáře je povinný.',
        'calendar_id_string' => 'Identifikátor kalendáře musí být text.',
        'calendar_id_max' => 'Identifikátor kalendáře nesmí být delší než 255 znaků.',

        'sync_mode_required' => 'Režim synchronizace je povinný.',
        'sync_mode_string' => 'Režim synchronizace musí být text.',
        'sync_mode_in' => 'Vybraný režim synchronizace není platný.',
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
            'calendar_settings_title' => 'Nastavení kalendáře',
            'available_calendars_title' => 'Dostupné kalendáře',
            'timezone_prefix' => 'Časové pásmo:',
        ],

        'form' => [
            'sync_mode_title' => 'Režim synchronizace',
            'sync_mode_soft_title' => 'Volný',
            'sync_mode_strict_title' => 'Přísný',
            'sync_mode_help' => 'Volný režim umožňuje, aby BookingCore fungoval i v případě selhání synchronizace kalendáře. Přísný režim je určen pro vyšší konzistenci.',
        ],

        'actions' => [
            'connect_google' => 'Připojit Google Kalendář',
            'reconnect_google' => 'Znovu připojit Google Kalendář',
            'save_settings' => 'Uložit nastavení',
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