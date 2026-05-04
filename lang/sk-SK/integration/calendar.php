<?php

return [
    'messages' => [
        'failed' => 'Požiadavku na spracovanie integrácie kalendára sa nepodarilo spracovať.',
        'calendar_selected' => 'Kalendár bol úspešne vybraný.',
        'invalid_calendar_id' => 'Vybrané ID kalendára je neplatné.',
        'integration_user_mismatch' => 'Vybraná integrácia nepatrí prihlásenému používateľovi.',
        'integration_not_calendar' => 'Vybraná integrácia nie je integráciou kalendára.',
        'integration_inactive' => 'Vybraná integrácia je neaktívna.',
        'missing_refresh_token' => 'Integrácia kalendára neobsahuje obnovovací token.',
        'missing_access_token' => 'Integrácia kalendára neobsahuje prístupový token.',
        'not_google_integration' => 'Vybraná integrácia nie je integráciou Google Kalendára.',
        'google_refresh_failed' => 'Nepodarilo sa obnoviť prístupový token Google Kalendára.',
        'google_refresh_missing_access_token' => 'Nepodarilo sa obnoviť prístupový token Google Kalendára, pretože odpoveď neobsahovala prístupový token.',
        'connection_error' => 'BookingCore nedokázal overiť Vaše pripojenie ku kalendáru. Znova pripojte svoj účet Google Kalendára a skúste to opäť.',
    ],

    'validation' => [
        'calendar_id_required' => 'Identifikátor kalendára je povinný.',
        'calendar_id_string' => 'Identifikátor kalendára musí byť text.',
        'calendar_id_max' => 'Identifikátor kalendára nesmie byť dlhší ako 255 znakov.',
    ],

    'view' => [
        'title' => 'Integrácie kalendára',
        'description' => 'Pripojte svoj externý kalendárový účet a vyberte, kde má BookingCore vytvárať rezervačné udalosti.',

        'overview' => [
            'connected_account_title' => 'Pripojený účet',
            'provider_title' => 'Poskytovateľ',
            'name_title' => 'Meno',
            'email_title' => 'E-mail',
            'timezone_title' => 'Časové pásmo',
            'status_title' => 'Stav',
            'active_title' => 'Aktívne',
            'available_calendars_title' => 'Dostupné kalendáre',
            'timezone_prefix' => 'Časové pásmo:',
        ],

        'actions' => [
            'connect_google' => 'Pripojiť Google Kalendár',
            'reconnect_google' => 'Znova pripojiť Google Kalendár',
            'select_calendar' => 'Vybrať kalendár',
            'selected' => 'Vybrané',
        ],

        'states' => [
            'connection_expired_title' => 'Pripojenie ku Google Kalendáru vypršalo',
            'connection_expired_text' => 'Vaše pripojenie ku Google Kalendáru už nie je platné. Znova pripojte svoj účet, aby ste mohli pokračovať v synchronizácii kalendárov a rezervačných udalostí.',
            'no_calendar_connected_title' => 'Nie je pripojený žiadny kalendár',
            'no_calendar_connected_text' => 'Zatiaľ ste nepripojili žiadny kalendár. Pripojte Google Kalendár a začnite synchronizovať rezervačné udalosti.',
            'no_calendars_found_title' => 'Nenašli sa žiadne kalendáre',
            'no_calendars_found_text' => 'Pripojený účet momentálne nesprístupňuje žiadne kalendáre.',
            'primary_badge' => 'Primárny',
            'read_only_badge' => 'Iba na čítanie',
            'selected_badge' => 'Vybrané',
            'calendar_count_suffix' => 'kalendár/kalendáre/kalendárov',
        ],
    ],
];