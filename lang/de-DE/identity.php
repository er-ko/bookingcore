<?php

return [
    'messages' => [
        'updated' => 'Identitätseinstellungen wurden erfolgreich aktualisiert.',
        'deletion_scheduled' => 'Die Löschung Ihres Kontos wurde für in 7 Tagen geplant.',
        'deletion_canceled' => 'Die geplante Löschung Ihres Kontos wurde abgebrochen.',
    ],

    'validation' => [
        'mode_required' => 'Der Buchungsmodus ist erforderlich.',
        'mode_in' => 'Der ausgewählte Buchungsmodus ist ungültig.',

        'brand_required' => 'Der Markenname ist erforderlich.',
        'brand_max' => 'Der Markenname darf nicht länger als 160 Zeichen sein.',

        'slug_required' => 'Der Slug ist erforderlich.',
        'slug_min' => 'Der Slug muss mindestens 3 Zeichen lang sein.',
        'slug_max' => 'Der Slug darf nicht länger als 120 Zeichen sein.',
        'slug_regex' => 'Der Slug darf nur Kleinbuchstaben, Zahlen sowie einzelne Bindestriche zwischen Wörtern enthalten.',
        'slug_unique' => 'Dieser Slug wird bereits verwendet.',

        'default_lang_required' => 'Die Standardsprache ist erforderlich.',
        'default_lang_max' => 'Die Standardsprache darf nicht länger als 16 Zeichen sein.',
        'default_lang_exists' => 'Die ausgewählte Standardsprache ist ungültig.',

        'default_currency_required' => 'Die Standardwährung ist erforderlich.',
        'default_currency_size' => 'Die Standardwährung muss genau 3 Zeichen lang sein.',
        'default_currency_exists' => 'Die ausgewählte Standardwährung ist ungültig.',

        'default_country_required' => 'Das Standardland ist erforderlich.',
        'default_country_size' => 'Das Standardland muss genau 2 Zeichen lang sein.',
        'default_country_exists' => 'Das ausgewählte Standardland ist ungültig.',

        'is_public_required' => 'Der Sichtbarkeitsstatus ist erforderlich.',
        'is_public_boolean' => 'Der Sichtbarkeitsstatus muss „wahr“ oder „falsch“ sein.',
    ],

    'view' => [
        'title' => 'Identität',
        'description' => 'Verwalten Sie die öffentliche Identität Ihrer Buchungsseite, einschließlich Markenname, öffentlicher URL und regionaler Standardeinstellungen.',

        'overview' => [
            'title' => 'Übersicht',
            'brand_title' => 'Marke',
            'brand_text' => 'Legen Sie den öffentlichen Namen fest, den Besucher auf Ihrer Buchungsseite sehen.',
            'public_url_title' => 'Öffentliche URL',
            'public_url_text' => 'Wählen Sie den Slug für Ihre öffentliche Buchungsseite. Ihre Seite wird unter :slug verfügbar sein.',
            'defaults_title' => 'Standardeinstellungen',
            'defaults_text' => 'Legen Sie die Standardsprache, Standardwährung und das Standardland fest, die in Ihrem Buchungsbereich verwendet werden.',
            'visibility_title' => 'Sichtbarkeit',
            'visibility_text' => 'Diese Einstellungen bestimmen, wie Ihre Buchungsseite Besuchern angezeigt wird und wie sich Ihr Arbeitsbereich standardmäßig verhält.',
        ],

        'form' => [
            'identity_settings' => 'Identitätseinstellungen',
            'base_configuration' => 'Basiskonfiguration',
            'brand_name_title' => 'Markenname',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Öffentlicher Slug',
            'public_slug_placeholder' => 'ihr-slug',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Standardsprache',
            'select_language_title' => 'Sprache auswählen',
            'default_currency_title' => 'Standardwährung',
            'select_currency_title' => 'Währung auswählen',
            'default_country_title' => 'Standardland',
            'select_country_title' => 'Land auswählen',
            'booking_page_visibility_title' => 'Sichtbarkeit der Buchungsseite',
            'public_booking_page_title' => 'Öffentliche Buchungsseite',
            'public_booking_page_text' => 'Wenn diese Option aktiviert ist, können Besucher über die öffentliche URL auf Ihre Buchungsseite zugreifen. Wenn sie deaktiviert ist, bleibt die Seite für Besucher verborgen.',
        ],

        'actions' => [
            'cancel' => 'Abbrechen',
            'save' => 'Identität speichern',
            'saving' => 'Wird gespeichert...',
            'schedule_account_deletion' => 'Kontolöschung planen',
            'cancel_deletion' => 'Löschung abbrechen',
        ],

        'deletion' => [
            'account_removal_title' => 'Kontoentfernung',
            'scheduled_deletion_title' => 'Geplante Löschung',
            'scheduled_deletion_text' => 'Ihre öffentliche Buchungsseite wird unmittelbar nach der Planung der Löschung verborgen. Alle Kontodaten werden nach 7 Tagen dauerhaft entfernt, sofern Sie die Anfrage nicht abbrechen.',
            'recovery_period_title' => 'Wiederherstellungsfrist',
            'recovery_period_text' => 'Während der 7-tägigen Kulanzfrist können Sie die Löschanfrage weiterhin abbrechen und Ihr Konto behalten.',
            'deletion_date_title' => 'Löschdatum',
            'deletion_date_text' => 'Ihr Konto ist für die dauerhafte Löschung am :date vorgesehen.',
        ],
    ],
];