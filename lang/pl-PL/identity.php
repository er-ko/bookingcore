<?php

return [
    'messages' => [
        'updated' => 'Ustawienia tożsamości zostały pomyślnie zaktualizowane.',
        'deletion_scheduled' => 'Państwa konto zostało zaplanowane do usunięcia za 7 dni.',
        'deletion_canceled' => 'Zaplanowane usunięcie Państwa konta zostało anulowane.',
    ],

    'validation' => [
        'mode_required' => 'Tryb rezerwacji jest wymagany.',
        'mode_in' => 'Wybrany tryb rezerwacji jest nieprawidłowy.',

        'brand_required' => 'Nazwa marki jest wymagana.',
        'brand_max' => 'Nazwa marki nie może być dłuższa niż 160 znaków.',

        'slug_required' => 'Slug jest wymagany.',
        'slug_min' => 'Slug musi mieć co najmniej 3 znaki.',
        'slug_max' => 'Slug nie może być dłuższy niż 120 znaków.',
        'slug_regex' => 'Slug może zawierać wyłącznie małe litery, cyfry oraz pojedyncze myślniki między wyrazami.',
        'slug_unique' => 'Ten slug jest już używany.',

        'default_lang_required' => 'Domyślny język jest wymagany.',
        'default_lang_max' => 'Domyślny język nie może być dłuższy niż 16 znaków.',
        'default_lang_exists' => 'Wybrany domyślny język jest nieprawidłowy.',

        'default_currency_required' => 'Domyślna waluta jest wymagana.',
        'default_currency_size' => 'Domyślna waluta musi mieć dokładnie 3 znaki.',
        'default_currency_exists' => 'Wybrana domyślna waluta jest nieprawidłowa.',

        'default_country_required' => 'Domyślny kraj jest wymagany.',
        'default_country_size' => 'Domyślny kraj musi mieć dokładnie 2 znaki.',
        'default_country_exists' => 'Wybrany domyślny kraj jest nieprawidłowy.',

        'is_public_required' => 'Status widoczności jest wymagany.',
        'is_public_boolean' => 'Status widoczności musi mieć wartość prawda lub fałsz.',
    ],

    'view' => [
        'title' => 'Tożsamość',
        'description' => 'Zarządzaj publiczną tożsamością swojej strony rezerwacji, w tym nazwą marki, publicznym adresem URL oraz ustawieniami regionalnymi.',

        'overview' => [
            'title' => 'Przegląd',
            'brand_title' => 'Marka',
            'brand_text' => 'Ustaw publiczną nazwę, którą odwiedzający zobaczą na Państwa stronie rezerwacji.',
            'public_url_title' => 'Publiczny adres URL',
            'public_url_text' => 'Wybierz slug dla swojej publicznej strony rezerwacji. Strona będzie dostępna pod adresem :slug',
            'defaults_title' => 'Ustawienia domyślne',
            'defaults_text' => 'Określ domyślny język, walutę i kraj używane w całym obszarze roboczym rezerwacji.',
            'visibility_title' => 'Widoczność',
            'visibility_text' => 'Te ustawienia określają sposób prezentowania strony rezerwacji odwiedzającym oraz domyślne działanie obszaru roboczego.',
        ],

        'form' => [
            'identity_settings' => 'Ustawienia tożsamości',
            'base_configuration' => 'Konfiguracja podstawowa',
            'brand_name_title' => 'Nazwa marki',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Publiczny slug',
            'public_slug_placeholder' => 'twoj-slug',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Domyślny język',
            'select_language_title' => 'Wybierz język',
            'default_currency_title' => 'Domyślna waluta',
            'select_currency_title' => 'Wybierz walutę',
            'default_country_title' => 'Domyślny kraj',
            'select_country_title' => 'Wybierz kraj',
            'booking_page_visibility_title' => 'Widoczność strony rezerwacji',
            'public_booking_page_title' => 'Publiczna strona rezerwacji',
            'public_booking_page_text' => 'Po włączeniu tej opcji odwiedzający mogą uzyskać dostęp do Państwa strony rezerwacji za pomocą jej publicznego adresu URL. Po wyłączeniu strona pozostaje ukryta przed odwiedzającymi.',
        ],

        'actions' => [
            'cancel' => 'Anuluj',
            'save' => 'Zapisz tożsamość',
            'saving' => 'Zapisywanie...',
            'schedule_account_deletion' => 'Zaplanuj usunięcie konta',
            'cancel_deletion' => 'Anuluj usunięcie',
        ],

        'deletion' => [
            'account_removal_title' => 'Usunięcie konta',
            'scheduled_deletion_title' => 'Zaplanowane usunięcie',
            'scheduled_deletion_text' => 'Państwa publiczna strona rezerwacji zostanie ukryta natychmiast po zaplanowaniu usunięcia. Wszystkie dane konta zostaną trwale usunięte po 7 dniach, chyba że anulują Państwo żądanie.',
            'recovery_period_title' => 'Okres przywrócenia',
            'recovery_period_text' => 'W trakcie 7-dniowego okresu karencji można nadal anulować żądanie usunięcia i zachować konto.',
            'deletion_date_title' => 'Data usunięcia',
            'deletion_date_text' => 'Państwa konto jest zaplanowane do trwałego usunięcia w dniu :date.',
        ],
    ],
];