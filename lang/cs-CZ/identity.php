<?php

return [
    'messages' => [
        'updated' => 'Nastavení identity bylo úspěšně aktualizováno.',
        'deletion_scheduled' => 'Smazání vašeho účtu bylo naplánováno za 7 dní.',
        'deletion_canceled' => 'Naplánované smazání vašeho účtu bylo zrušeno.',
    ],

    'validation' => [
        'mode_required' => 'Režim rezervací je povinný.',
        'mode_in' => 'Vybraný režim rezervací není platný.',

        'brand_required' => 'Název značky je povinný.',
        'brand_max' => 'Název značky nesmí být delší než 160 znaků.',

        'slug_required' => 'Slug je povinný.',
        'slug_min' => 'Slug musí mít alespoň 3 znaky.',
        'slug_max' => 'Slug nesmí být delší než 120 znaků.',
        'slug_regex' => 'Slug může obsahovat pouze malá písmena, číslice a jednotlivé spojovníky mezi slovy.',
        'slug_unique' => 'Tento slug se již používá.',

        'default_lang_required' => 'Výchozí jazyk je povinný.',
        'default_lang_max' => 'Výchozí jazyk nesmí být delší než 16 znaků.',
        'default_lang_exists' => 'Vybraný výchozí jazyk není platný.',

        'default_currency_required' => 'Výchozí měna je povinná.',
        'default_currency_size' => 'Výchozí měna musí mít přesně 3 znaky.',
        'default_currency_exists' => 'Vybraná výchozí měna není platná.',

        'default_country_required' => 'Výchozí země je povinná.',
        'default_country_size' => 'Výchozí země musí mít přesně 2 znaky.',
        'default_country_exists' => 'Vybraná výchozí země není platná.',

        'is_public_required' => 'Stav viditelnosti je povinný.',
        'is_public_boolean' => 'Stav viditelnosti musí být pravda nebo nepravda.',
    ],

    'view' => [
        'title' => 'Identita',
        'description' => 'Spravujte veřejnou identitu své rezervační stránky, včetně názvu značky, veřejné URL adresy a regionálních výchozích nastavení.',

        'overview' => [
            'title' => 'Přehled',
            'brand_title' => 'Značka',
            'brand_text' => 'Nastavte veřejný název, který návštěvníci uvidí na vaší rezervační stránce.',
            'public_url_title' => 'Veřejná URL adresa',
            'public_url_text' => 'Zvolte slug pro svou veřejnou rezervační stránku. Vaše stránka bude dostupná na adrese :slug',
            'defaults_title' => 'Výchozí nastavení',
            'defaults_text' => 'Definujte výchozí jazyk, měnu a zemi používané v rámci vašeho rezervačního pracovního prostoru.',
            'visibility_title' => 'Viditelnost',
            'visibility_text' => 'Tato nastavení určují, jak se vaše rezervační stránka zobrazuje návštěvníkům a jak se váš pracovní prostor ve výchozím nastavení chová.',
        ],

        'form' => [
            'identity_settings' => 'Nastavení identity',
            'base_configuration' => 'Základní konfigurace',
            'brand_name_title' => 'Název značky',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Veřejný slug',
            'public_slug_placeholder' => 'vas-slug',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Výchozí jazyk',
            'select_language_title' => 'Vyberte jazyk',
            'default_currency_title' => 'Výchozí měna',
            'select_currency_title' => 'Vyberte měnu',
            'default_country_title' => 'Výchozí země',
            'select_country_title' => 'Vyberte zemi',
            'booking_page_visibility_title' => 'Viditelnost rezervační stránky',
            'public_booking_page_title' => 'Veřejná rezervační stránka',
            'public_booking_page_text' => 'Pokud je tato možnost povolena, návštěvníci mohou vaši rezervační stránku otevřít pomocí její veřejné URL adresy. Pokud je zakázána, stránka zůstane pro návštěvníky skrytá.',
        ],

        'actions' => [
            'cancel' => 'Zrušit',
            'save' => 'Uložit identitu',
            'saving' => 'Ukládá se...',
            'schedule_account_deletion' => 'Naplánovat smazání účtu',
            'cancel_deletion' => 'Zrušit smazání',
        ],

        'deletion' => [
            'account_removal_title' => 'Odstranění účtu',
            'scheduled_deletion_title' => 'Naplánované smazání',
            'scheduled_deletion_text' => 'Vaše veřejná rezervační stránka bude po naplánování smazání okamžitě skryta. Veškerá data účtu budou po 7 dnech trvale odstraněna, pokud žádost nezrušíte.',
            'recovery_period_title' => 'Ochranná lhůta',
            'recovery_period_text' => 'Během 7denní ochranné lhůty můžete žádost o smazání stále zrušit a svůj účet si ponechat.',
            'deletion_date_title' => 'Datum smazání',
            'deletion_date_text' => 'Trvalé smazání vašeho účtu je naplánováno na :date.',
        ],
    ],
];