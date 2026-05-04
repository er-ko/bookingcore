<?php

return [
    'messages' => [
        'failed' => 'Het verwerken van het verzoek voor agenda-integratie is mislukt.',
        'calendar_selected' => 'Agenda succesvol geselecteerd.',
        'invalid_calendar_id' => 'De geselecteerde agenda-ID is ongeldig.',
        'integration_user_mismatch' => 'De geselecteerde integratie behoort niet toe aan de geauthenticeerde gebruiker.',
        'integration_not_calendar' => 'De geselecteerde integratie is geen agenda-integratie.',
        'integration_inactive' => 'De geselecteerde integratie is inactief.',
        'missing_refresh_token' => 'De agenda-integratie bevat geen vernieuwingstoken.',
        'missing_access_token' => 'De agenda-integratie bevat geen toegangstoken.',
        'not_google_integration' => 'De geselecteerde integratie is geen Google Agenda-integratie.',
        'google_refresh_failed' => 'Het vernieuwen van het toegangstoken voor Google Agenda is mislukt.',
        'google_refresh_missing_access_token' => 'Het vernieuwen van het toegangstoken voor Google Agenda is mislukt omdat het antwoord geen toegangstoken bevatte.',
        'connection_error' => 'BookingCore kon uw agendaverbinding niet verifiëren. Verbind uw Google Agenda-account opnieuw en probeer het nogmaals.',
    ],

    'validation' => [
        'calendar_id_required' => 'De agenda-ID is verplicht.',
        'calendar_id_string' => 'De agenda-ID moet een tekst zijn.',
        'calendar_id_max' => 'De agenda-ID mag niet langer zijn dan 255 tekens.',
    ],

    'view' => [
        'title' => 'Agenda-integraties',
        'description' => 'Verbind uw externe agenda-account en kies waar BookingCore boekingsevenementen moet aanmaken.',

        'overview' => [
            'connected_account_title' => 'Verbonden account',
            'provider_title' => 'Provider',
            'name_title' => 'Naam',
            'email_title' => 'E-mail',
            'timezone_title' => 'Tijdzone',
            'status_title' => 'Status',
            'active_title' => 'Actief',
            'available_calendars_title' => 'Beschikbare agenda’s',
            'timezone_prefix' => 'Tijdzone:',
        ],

        'actions' => [
            'connect_google' => 'Google Agenda verbinden',
            'reconnect_google' => 'Google Agenda opnieuw verbinden',
            'select_calendar' => 'Agenda selecteren',
            'selected' => 'Geselecteerd',
        ],

        'states' => [
            'connection_expired_title' => 'Google Agenda-verbinding verlopen',
            'connection_expired_text' => 'Uw Google Agenda-verbinding is niet langer geldig. Verbind uw account opnieuw om agenda’s en boekingsevenementen te blijven synchroniseren.',
            'no_calendar_connected_title' => 'Geen agenda verbonden',
            'no_calendar_connected_text' => 'U heeft nog geen agenda verbonden. Verbind Google Agenda om boekingsevenementen te synchroniseren.',
            'no_calendars_found_title' => 'Geen agenda’s gevonden',
            'no_calendars_found_text' => 'Het verbonden account stelt momenteel geen agenda’s beschikbaar.',
            'primary_badge' => 'Primair',
            'read_only_badge' => 'Alleen-lezen',
            'selected_badge' => 'Geselecteerd',
            'calendar_count_suffix' => 'agenda(’s)',
        ],
    ],
];