<?php

return [
    'messages' => [
        'updated' => 'Le impostazioni dell’identità sono state aggiornate con successo.',
        'deletion_scheduled' => 'L’eliminazione del suo account è stata programmata tra 7 giorni.',
        'deletion_canceled' => 'L’eliminazione programmata del suo account è stata annullata.',
    ],

    'validation' => [
        'mode_required' => 'La modalità di prenotazione è obbligatoria.',
        'mode_in' => 'La modalità di prenotazione selezionata non è valida.',

        'brand_required' => 'Il nome del marchio è obbligatorio.',
        'brand_max' => 'Il nome del marchio non può superare 160 caratteri.',

        'slug_required' => 'Lo slug è obbligatorio.',
        'slug_min' => 'Lo slug deve contenere almeno 3 caratteri.',
        'slug_max' => 'Lo slug non può superare 120 caratteri.',
        'slug_regex' => 'Lo slug può contenere solo lettere minuscole, numeri e singoli trattini tra le parole.',
        'slug_unique' => 'Questo slug è già in uso.',

        'default_lang_required' => 'La lingua predefinita è obbligatoria.',
        'default_lang_max' => 'La lingua predefinita non può superare 16 caratteri.',
        'default_lang_exists' => 'La lingua predefinita selezionata non è valida.',

        'default_currency_required' => 'La valuta predefinita è obbligatoria.',
        'default_currency_size' => 'La valuta predefinita deve contenere esattamente 3 caratteri.',
        'default_currency_exists' => 'La valuta predefinita selezionata non è valida.',

        'default_country_required' => 'Il paese predefinito è obbligatorio.',
        'default_country_size' => 'Il paese predefinito deve contenere esattamente 2 caratteri.',
        'default_country_exists' => 'Il paese predefinito selezionato non è valido.',

        'is_public_required' => 'Lo stato di visibilità è obbligatorio.',
        'is_public_boolean' => 'Lo stato di visibilità deve essere vero o falso.',
    ],

    'view' => [
        'title' => 'Identità',
        'description' => 'Gestisca l’identità pubblica della sua pagina di prenotazione, inclusi nome del marchio, URL pubblico e impostazioni regionali predefinite.',

        'overview' => [
            'title' => 'Riepilogo',
            'brand_title' => 'Marchio',
            'brand_text' => 'Imposti il nome pubblico che i visitatori vedranno sulla sua pagina di prenotazione.',
            'public_url_title' => 'URL pubblico',
            'public_url_text' => 'Scelga lo slug per la sua pagina pubblica di prenotazione. La pagina sarà disponibile su :slug',
            'defaults_title' => 'Predefiniti',
            'defaults_text' => 'Definisca lingua, valuta e paese predefiniti usati nel suo spazio di prenotazione.',
            'visibility_title' => 'Visibilità',
            'visibility_text' => 'Queste impostazioni definiscono come la sua pagina di prenotazione viene presentata ai visitatori e come si comporta il suo spazio di lavoro per impostazione predefinita.',
        ],

        'form' => [
            'identity_settings' => 'Impostazioni identità',
            'base_configuration' => 'Configurazione base',
            'brand_name_title' => 'Nome del marchio',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Slug pubblico',
            'public_slug_placeholder' => 'il-suo-slug',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Lingua predefinita',
            'select_language_title' => 'Seleziona lingua',
            'default_currency_title' => 'Valuta predefinita',
            'select_currency_title' => 'Seleziona valuta',
            'default_country_title' => 'Paese predefinito',
            'select_country_title' => 'Seleziona paese',
            'booking_page_visibility_title' => 'Visibilità della pagina di prenotazione',
            'public_booking_page_title' => 'Pagina pubblica di prenotazione',
            'public_booking_page_text' => 'Quando è attiva, i visitatori possono accedere alla sua pagina di prenotazione tramite il relativo URL pubblico. Quando è disattivata, la pagina resta nascosta ai visitatori.',
        ],

        'actions' => [
            'cancel' => 'Annulla',
            'save' => 'Salva identità',
            'saving' => 'Salvataggio...',
            'schedule_account_deletion' => 'Programma eliminazione account',
            'cancel_deletion' => 'Annulla eliminazione',
        ],

        'deletion' => [
            'account_removal_title' => 'Eliminazione account',
            'scheduled_deletion_title' => 'Eliminazione programmata',
            'scheduled_deletion_text' => 'La sua pagina pubblica di prenotazione sarà nascosta immediatamente dopo la programmazione dell’eliminazione. Tutti i dati dell’account saranno rimossi definitivamente dopo 7 giorni, salvo annullamento della richiesta.',
            'recovery_period_title' => 'Periodo di recupero',
            'recovery_period_text' => 'Durante il periodo di tolleranza di 7 giorni, può ancora annullare la richiesta di eliminazione e mantenere il suo account.',
            'deletion_date_title' => 'Data di eliminazione',
            'deletion_date_text' => 'Il suo account è programmato per l’eliminazione definitiva il :date.',
        ],
    ],
];
