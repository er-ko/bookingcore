<?php

return [
    'messages' => [
        'updated' => 'Nastavenia identity boli úspešne aktualizované.',
        'deletion_scheduled' => 'Odstránenie Vášho účtu bolo naplánované o 7 dní.',
        'deletion_canceled' => 'Naplánované odstránenie Vášho účtu bolo zrušené.',
    ],

    'validation' => [
        'mode_required' => 'Režim rezervácií je povinný.',
        'mode_in' => 'Vybraný režim rezervácií je neplatný.',

        'brand_required' => 'Názov značky je povinný.',
        'brand_max' => 'Názov značky nesmie byť dlhší ako 160 znakov.',

        'slug_required' => 'Slug je povinný.',
        'slug_min' => 'Slug musí mať aspoň 3 znaky.',
        'slug_max' => 'Slug nesmie byť dlhší ako 120 znakov.',
        'slug_regex' => 'Slug môže obsahovať iba malé písmená, čísla a jednoduché spojovníky medzi slovami.',
        'slug_unique' => 'Tento slug sa už používa.',

        'default_lang_required' => 'Predvolený jazyk je povinný.',
        'default_lang_max' => 'Predvolený jazyk nesmie byť dlhší ako 16 znakov.',
        'default_lang_exists' => 'Vybraný predvolený jazyk je neplatný.',

        'default_currency_required' => 'Predvolená mena je povinná.',
        'default_currency_size' => 'Predvolená mena musí mať presne 3 znaky.',
        'default_currency_exists' => 'Vybraná predvolená mena je neplatná.',

        'default_country_required' => 'Predvolená krajina je povinná.',
        'default_country_size' => 'Predvolená krajina musí mať presne 2 znaky.',
        'default_country_exists' => 'Vybraná predvolená krajina je neplatná.',

        'is_public_required' => 'Stav viditeľnosti je povinný.',
        'is_public_boolean' => 'Stav viditeľnosti musí byť pravda alebo nepravda.',
    ],

    'view' => [
        'title' => 'Identita',
        'description' => 'Spravujte verejnú identitu svojej rezervačnej stránky vrátane názvu značky, verejnej URL adresy a predvolených regionálnych nastavení.',

        'overview' => [
            'title' => 'Prehľad',
            'brand_title' => 'Značka',
            'brand_text' => 'Nastavte verejný názov, ktorý návštevníci uvidia na Vašej rezervačnej stránke.',
            'public_url_title' => 'Verejná URL adresa',
            'public_url_text' => 'Vyberte slug pre svoju verejnú rezervačnú stránku. Vaša stránka bude dostupná na adrese :slug',
            'defaults_title' => 'Predvolené nastavenia',
            'defaults_text' => 'Definujte predvolený jazyk, menu a krajinu používané v celom Vašom rezervačnom pracovnom priestore.',
            'visibility_title' => 'Viditeľnosť',
            'visibility_text' => 'Tieto nastavenia určujú, ako sa Vaša rezervačná stránka zobrazuje návštevníkom a ako sa Váš pracovný priestor predvolene správa.',
        ],

        'form' => [
            'identity_settings' => 'Nastavenia identity',
            'base_configuration' => 'Základná konfigurácia',
            'brand_name_title' => 'Názov značky',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Verejný slug',
            'public_slug_placeholder' => 'vas-slug',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Predvolený jazyk',
            'select_language_title' => 'Vyberte jazyk',
            'default_currency_title' => 'Predvolená mena',
            'select_currency_title' => 'Vyberte menu',
            'default_country_title' => 'Predvolená krajina',
            'select_country_title' => 'Vyberte krajinu',
            'booking_page_visibility_title' => 'Viditeľnosť rezervačnej stránky',
            'public_booking_page_title' => 'Verejná rezervačná stránka',
            'public_booking_page_text' => 'Keď je táto možnosť povolená, návštevníci môžu pristupovať k Vašej rezervačnej stránke pomocou jej verejnej URL adresy. Keď je vypnutá, stránka zostane pre návštevníkov skrytá.',
        ],

        'actions' => [
            'cancel' => 'Zrušiť',
            'save' => 'Uložiť identitu',
            'saving' => 'Ukladá sa...',
            'schedule_account_deletion' => 'Naplánovať odstránenie účtu',
            'cancel_deletion' => 'Zrušiť odstránenie',
        ],

        'deletion' => [
            'account_removal_title' => 'Odstránenie účtu',
            'scheduled_deletion_title' => 'Naplánované odstránenie',
            'scheduled_deletion_text' => 'Vaša verejná rezervačná stránka bude skrytá ihneď po naplánovaní odstránenia. Všetky údaje účtu budú po 7 dňoch trvalo odstránené, pokiaľ požiadavku nezrušíte.',
            'recovery_period_title' => 'Obdobie na obnovenie',
            'recovery_period_text' => 'Počas 7-dňovej ochrannej lehoty môžete požiadavku na odstránenie stále zrušiť a svoj účet si ponechať.',
            'deletion_date_title' => 'Dátum odstránenia',
            'deletion_date_text' => 'Váš účet je naplánovaný na trvalé odstránenie dňa :date.',
        ],
    ],
];