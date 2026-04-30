<?php

return [
    'messages' => [
        'created'   => 'Pobočka byla úspěšně vytvořena.',
        'updated'   => 'Pobočka byla úspěšně aktualizována.',
        'deleted'   => 'Pobočka byla úspěšně smazána.',
        'failed'    => 'Požadavek na zpracování pobočky se nezdařil.',
        'not_found' => 'Pobočka nebyla nalezena.',
        'has_units' => 'Pobočku nelze smazat, protože stále obsahuje jednotky.',
        'has_bookings' => 'Pobočku nelze smazat, protože stále obsahuje rezervace.',
        'limit_reached' => 'Dosáhli jste maximálního povoleného počtu poboček.',
    ],

    'validation' => [
        'name_required' => 'Název pobočky je povinný.',
        'name_max' => 'Název pobočky nesmí být delší než 255 znaků.',

        'address_line_1_max' => 'Adresa 1 nesmí být delší než 255 znaků.',
        'address_line_2_max' => 'Adresa 2 nesmí být delší než 255 znaků.',

        'city_max' => 'Město nesmí být delší než 255 znaků.',
        'postcode_max' => 'PSČ nesmí být delší než 32 znaků.',

        'country_code_size' => 'Kód země musí mít přesně 2 znaky.',

        'timezone_required' => 'Časové pásmo je povinné.',
        'timezone_max' => 'Časové pásmo nesmí být delší než 64 znaků.',

        'is_active_required' => 'Stav aktivity je povinný.',
        'is_active_boolean' => 'Stav aktivity musí být pravda nebo nepravda.',
    ],

    'view' => [
        'title' => 'Pobočka',
        'branches' => 'Pobočky',
        'create_branch' => 'Vytvořit pobočku',
        'edit_branch' => 'Upravit pobočku',
        'index_description' => 'Spravujte své pobočky včetně adresních údajů, časového pásma a stavu aktivity.',
        'create_description' => 'Vytvořte novou pobočku s adresními údaji, časovým pásmem a stavem aktivity.',
        'edit_description' => 'Aktualizujte údaje pobočky, adresu, časové pásmo a stav aktivity.',
        'back_to_branches' => 'Zpět na pobočky',
        'create_first_branch' => 'Vytvořit první pobočku',
        'no_branches_found' => 'Nebyly nalezeny žádné pobočky.',
        'no_branches_text' => 'Zatím zde nejsou žádné pobočky k zobrazení. Vytvořte první pobočku a začněte organizovat svou rezervační strukturu.',

        'table' => [
            'branch' => 'Pobočka',
            'address' => 'Adresa',
            'city' => 'Město',
            'timezone' => 'Časové pásmo',
            'no_address_text' => 'Adresa není uvedena',
            'status' => 'Stav',
            'updated' => 'Aktualizováno',
            'actions' => 'Akce',
            'active' => 'Aktivní',
            'inactive' => 'Neaktivní',
        ],

        'overview' => [
            'title' => 'Přehled pobočky',
            'branch_id_title' => 'ID pobočky',
            'countries_available_title' => 'Dostupné země',
            'city_and_postcode_title' => 'Město a PSČ',
            'country_and_timezone_title' => 'Země a časové pásmo',
            'timezone_title' => 'Časové pásmo',
            'timezone_text' => 'Podle vybrané země',
            'limit_title' => 'Limit',
            'limit_text' => 'Můžete vytvořit až 10 poboček.',
            'duration_text' => 'Nastavte umístění pobočky a regionální výchozí hodnoty.',
            'required_title' => 'Povinné',
            'optional_title' => 'Volitelné',
            'status_title' => 'Aktuální stav',
            'active_title' => 'Aktivní',
            'inactive_title' => 'Neaktivní',
            'note_title' => 'Poznámka',
            'note_text' => 'Aktualizace této pobočky neovlivní ostatní pobočky v systému.',
        ],

        'form' => [
            'branch_details' => 'Údaje pobočky',
            'complete_the_form' => 'Vyplňte formulář',
            'update_the_form' => 'Aktualizujte formulář',
            'branch_name_title' => 'Název pobočky',
            'address_line_1_title' => 'Adresa 1',
            'address_line_2_title' => 'Adresa 2',
            'city_title' => 'Město',
            'postcode_title' => 'PSČ',
            'country_title' => 'Země',
            'select_country' => 'Vyberte zemi',
            'timezone_title' => 'Časové pásmo',
            'select_timezone' => 'Vyberte časové pásmo',
            'loading_timezones' => 'Načítají se časová pásma...',
            'active_title' => 'Aktivní pobočka',
            'active_text' => 'Neaktivní pobočky mohou zůstat uložené v systému, aniž by byly aktivně používány.',
        ],

        'actions' => [
            'edit' => 'Upravit',
            'delete' => 'Smazat',
            'cancel' => 'Zrušit',
            'create' => 'Vytvořit pobočku',
            'creating' => 'Vytváří se...',
            'save' => 'Uložit změny',
            'saving' => 'Ukládá se...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Opravdu chcete tuto pobočku smazat?',
        ],

    ],
];