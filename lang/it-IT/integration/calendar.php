<?php

return [
    'messages' => [
        'failed' => 'Impossibile elaborare la richiesta di integrazione calendario.',
        'calendar_selected' => 'Calendario selezionato con successo.',
        'settings_updated' => 'Impostazioni di sincronizzazione del calendario aggiornate con successo.',
        'invalid_calendar_id' => 'L’ID del calendario selezionato non è valido.',
        'integration_user_mismatch' => 'L’integrazione selezionata non appartiene all’utente autenticato.',
        'integration_not_calendar' => 'L’integrazione selezionata non è un’integrazione calendario.',
        'integration_inactive' => 'L’integrazione selezionata è inattiva.',
        'missing_refresh_token' => 'L’integrazione calendario non contiene un token di aggiornamento.',
        'missing_access_token' => 'L’integrazione calendario non contiene un token di accesso.',
        'not_google_integration' => 'L’integrazione selezionata non è un’integrazione Google Calendar.',
        'invalid_sync_mode' => 'La modalità di sincronizzazione selezionata non è valida.',
        'google_refresh_failed' => 'Impossibile aggiornare il token di accesso di Google Calendar.',
        'google_refresh_missing_access_token' => 'Impossibile aggiornare il token di accesso di Google Calendar perché la risposta non includeva un token di accesso.',
        'connection_error' => 'BookingCore non ha potuto verificare la connessione al calendario. Ricolleghi il suo account Google Calendar e riprovi.',
    ],

    'validation' => [
        'calendar_id_required' => 'L’identificatore del calendario è obbligatorio.',
        'calendar_id_string' => 'L’identificatore del calendario deve essere un testo valido.',
        'calendar_id_max' => 'L’identificatore del calendario non può superare 255 caratteri.',

        'sync_mode_required' => 'La modalità di sincronizzazione è obbligatoria.',
        'sync_mode_string' => 'La modalità di sincronizzazione deve essere un testo valido.',
        'sync_mode_in' => 'La modalità di sincronizzazione selezionata non è valida.',
    ],

    'view' => [
        'title' => 'Integrazioni calendario',
        'description' => 'Connetta il suo account calendario esterno e scelga dove BookingCore deve creare gli eventi di prenotazione.',

        'overview' => [
            'connected_account_title' => 'Account connesso',
            'provider_title' => 'Fornitore',
            'name_title' => 'Nome',
            'email_title' => 'E-mail',
            'timezone_title' => 'Fuso orario',
            'status_title' => 'Stato',
            'active_title' => 'Attivo',
            'calendar_settings_title' => 'Impostazioni calendario',
            'available_calendars_title' => 'Calendari disponibili',
            'timezone_prefix' => 'Fuso orario:',
        ],

        'form' => [
            'sync_mode_title' => 'Modalità di sincronizzazione',
            'sync_mode_soft_title' => 'Flessibile',
            'sync_mode_strict_title' => 'Rigida',
            'sync_mode_help' => 'La modalità flessibile mantiene BookingCore operativo anche se la sincronizzazione del calendario non riesce. La modalità rigida è pensata per una maggiore coerenza.',
        ],

        'actions' => [
            'connect_google' => 'Connetti Google Calendar',
            'reconnect_google' => 'Riconnetti Google Calendar',
            'save_settings' => 'Salva impostazioni',
            'select_calendar' => 'Seleziona calendario',
            'selected' => 'Selezionato',
        ],

        'states' => [
            'connection_expired_title' => 'Connessione a Google Calendar scaduta',
            'connection_expired_text' => 'La sua connessione a Google Calendar non è più valida. Ricolleghi il suo account per continuare a sincronizzare calendari ed eventi di prenotazione.',
            'no_calendar_connected_title' => 'Nessun calendario connesso',
            'no_calendar_connected_text' => 'Non ha ancora connesso alcun calendario. Connetta Google Calendar per iniziare a sincronizzare gli eventi di prenotazione.',
            'no_calendars_found_title' => 'Nessun calendario trovato',
            'no_calendars_found_text' => 'L’account connesso non espone attualmente alcun calendario.',
            'primary_badge' => 'Principale',
            'read_only_badge' => 'Sola lettura',
            'selected_badge' => 'Selezionato',
            'calendar_count_suffix' => 'calendario/i',
        ],
    ],
];
