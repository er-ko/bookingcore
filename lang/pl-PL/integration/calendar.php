<?php

return [
    'messages' => [
        'failed' => 'Nie udało się przetworzyć żądania dotyczącego integracji kalendarza.',
        'calendar_selected' => 'Kalendarz został pomyślnie wybrany.',
        'invalid_calendar_id' => 'Wybrany identyfikator kalendarza jest nieprawidłowy.',
        'integration_user_mismatch' => 'Wybrana integracja nie należy do uwierzytelnionego użytkownika.',
        'integration_not_calendar' => 'Wybrana integracja nie jest integracją kalendarza.',
        'integration_inactive' => 'Wybrana integracja jest nieaktywna.',
        'missing_refresh_token' => 'Integracja kalendarza nie zawiera tokenu odświeżania.',
        'missing_access_token' => 'Integracja kalendarza nie zawiera tokenu dostępu.',
        'not_google_integration' => 'Wybrana integracja nie jest integracją Kalendarza Google.',
        'google_refresh_failed' => 'Nie udało się odświeżyć tokenu dostępu do Kalendarza Google.',
        'google_refresh_missing_access_token' => 'Nie udało się odświeżyć tokenu dostępu do Kalendarza Google, ponieważ odpowiedź nie zawierała tokenu dostępu.',
        'connection_error' => 'BookingCore nie mógł zweryfikować połączenia z Państwa kalendarzem. Proszę ponownie połączyć konto Kalendarza Google i spróbować jeszcze raz.',
    ],

    'validation' => [
        'calendar_id_required' => 'Identyfikator kalendarza jest wymagany.',
        'calendar_id_string' => 'Identyfikator kalendarza musi być ciągiem znaków.',
        'calendar_id_max' => 'Identyfikator kalendarza nie może być dłuższy niż 255 znaków.',
    ],

    'view' => [
        'title' => 'Integracje kalendarza',
        'description' => 'Połącz zewnętrzne konto kalendarza i wybierz, gdzie BookingCore ma tworzyć wydarzenia rezerwacji.',

        'overview' => [
            'connected_account_title' => 'Połączone konto',
            'provider_title' => 'Dostawca',
            'name_title' => 'Nazwa',
            'email_title' => 'E-mail',
            'timezone_title' => 'Strefa czasowa',
            'status_title' => 'Status',
            'active_title' => 'Aktywna',
            'available_calendars_title' => 'Dostępne kalendarze',
            'timezone_prefix' => 'Strefa czasowa:',
        ],

        'actions' => [
            'connect_google' => 'Połącz Kalendarz Google',
            'reconnect_google' => 'Połącz ponownie Kalendarz Google',
            'select_calendar' => 'Wybierz kalendarz',
            'selected' => 'Wybrano',
        ],

        'states' => [
            'connection_expired_title' => 'Połączenie z Kalendarzem Google wygasło',
            'connection_expired_text' => 'Państwa połączenie z Kalendarzem Google nie jest już ważne. Proszę ponownie połączyć konto, aby kontynuować synchronizację kalendarzy i wydarzeń rezerwacji.',
            'no_calendar_connected_title' => 'Nie połączono żadnego kalendarza',
            'no_calendar_connected_text' => 'Nie połączono jeszcze żadnego kalendarza. Połącz Kalendarz Google, aby rozpocząć synchronizację wydarzeń rezerwacji.',
            'no_calendars_found_title' => 'Nie znaleziono kalendarzy',
            'no_calendars_found_text' => 'Połączone konto obecnie nie udostępnia żadnych kalendarzy.',
            'primary_badge' => 'Główny',
            'read_only_badge' => 'Tylko do odczytu',
            'selected_badge' => 'Wybrany',
            'calendar_count_suffix' => 'kalendarz(e)',
        ],
    ],
];