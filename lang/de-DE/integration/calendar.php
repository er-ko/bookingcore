<?php

return [
    'messages' => [
        'failed' => 'Die Anfrage zur Kalenderintegration konnte nicht verarbeitet werden.',
        'calendar_selected' => 'Kalender wurde erfolgreich ausgewählt.',
        'settings_updated' => 'Einstellungen für die Kalendersynchronisierung wurden erfolgreich aktualisiert.',
        'invalid_calendar_id' => 'Die ausgewählte Kalender-ID ist ungültig.',
        'integration_user_mismatch' => 'Die ausgewählte Integration gehört nicht zum authentifizierten Benutzer.',
        'integration_not_calendar' => 'Die ausgewählte Integration ist keine Kalenderintegration.',
        'integration_inactive' => 'Die ausgewählte Integration ist inaktiv.',
        'missing_refresh_token' => 'Die Kalenderintegration enthält kein Refresh-Token.',
        'missing_access_token' => 'Die Kalenderintegration enthält kein Access-Token.',
        'not_google_integration' => 'Die ausgewählte Integration ist keine Google-Kalender-Integration.',
        'invalid_sync_mode' => 'Der ausgewählte Synchronisierungsmodus ist ungültig.',
        'google_refresh_failed' => 'Das Google-Kalender-Access-Token konnte nicht aktualisiert werden.',
        'google_refresh_missing_access_token' => 'Das Google-Kalender-Access-Token konnte nicht aktualisiert werden, da die Antwort kein Access-Token enthielt.',
        'connection_error' => 'BookingCore konnte Ihre Kalenderverbindung nicht überprüfen. Bitte verbinden Sie Ihr Google-Kalender-Konto erneut und versuchen Sie es noch einmal.',
    ],

    'validation' => [
        'calendar_id_required' => 'Die Kalenderkennung ist erforderlich.',
        'calendar_id_string' => 'Die Kalenderkennung muss eine Zeichenkette sein.',
        'calendar_id_max' => 'Die Kalenderkennung darf nicht länger als 255 Zeichen sein.',

        'sync_mode_required' => 'Der Synchronisierungsmodus ist erforderlich.',
        'sync_mode_string' => 'Der Synchronisierungsmodus muss eine Zeichenkette sein.',
        'sync_mode_in' => 'Der ausgewählte Synchronisierungsmodus ist ungültig.',
    ],

    'view' => [
        'title' => 'Kalenderintegrationen',
        'description' => 'Verbinden Sie Ihr externes Kalenderkonto und wählen Sie aus, wo BookingCore Buchungsereignisse erstellen soll.',

        'overview' => [
            'connected_account_title' => 'Verbundenes Konto',
            'provider_title' => 'Anbieter',
            'name_title' => 'Name',
            'email_title' => 'E-Mail',
            'timezone_title' => 'Zeitzone',
            'status_title' => 'Status',
            'active_title' => 'Aktiv',
            'calendar_settings_title' => 'Kalendereinstellungen',
            'available_calendars_title' => 'Verfügbare Kalender',
            'timezone_prefix' => 'Zeitzone:',
        ],

        'form' => [
            'sync_mode_title' => 'Synchronisierungsmodus',
            'sync_mode_soft_title' => 'Soft',
            'sync_mode_strict_title' => 'Strikt',
            'sync_mode_help' => 'Soft sorgt dafür, dass BookingCore weiterhin funktioniert, auch wenn die Kalendersynchronisierung fehlschlägt. Strikt ist für eine stärkere Konsistenz vorgesehen.',
        ],

        'actions' => [
            'connect_google' => 'Google Kalender verbinden',
            'reconnect_google' => 'Google Kalender erneut verbinden',
            'save_settings' => 'Einstellungen speichern',
            'select_calendar' => 'Kalender auswählen',
            'selected' => 'Ausgewählt',
        ],

        'states' => [
            'connection_expired_title' => 'Google-Kalender-Verbindung abgelaufen',
            'connection_expired_text' => 'Ihre Google-Kalender-Verbindung ist nicht mehr gültig. Bitte verbinden Sie Ihr Konto erneut, um Kalender und Buchungsereignisse weiterhin zu synchronisieren.',
            'no_calendar_connected_title' => 'Kein Kalender verbunden',
            'no_calendar_connected_text' => 'Sie haben noch keinen Kalender verbunden. Verbinden Sie Google Kalender, um mit der Synchronisierung von Buchungsereignissen zu beginnen.',
            'no_calendars_found_title' => 'Keine Kalender gefunden',
            'no_calendars_found_text' => 'Das verbundene Konto stellt derzeit keine Kalender bereit.',
            'primary_badge' => 'Primär',
            'read_only_badge' => 'Schreibgeschützt',
            'selected_badge' => 'Ausgewählt',
            'calendar_count_suffix' => 'Kalender',
        ],
    ],
];