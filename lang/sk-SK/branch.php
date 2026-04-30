<?php

return [
    'messages' => [
        'created'   => 'Pobočka bola úspešne vytvorená.',
        'updated'   => 'Pobočka bola úspešne aktualizovaná.',
        'deleted'   => 'Pobočka bola úspešne odstránená.',
        'failed'    => 'Požiadavku na spracovanie pobočky sa nepodarilo spracovať.',
        'not_found' => 'Pobočka sa nenašla.',
        'has_units' => 'Pobočku nemožno odstrániť, pretože stále obsahuje jednotky.',
        'has_bookings' => 'Pobočku nemožno odstrániť, pretože stále obsahuje rezervácie.',
        'limit_reached' => 'Dosiahli ste maximálny povolený počet pobočiek.',
    ],

    'validation' => [
        'name_required' => 'Názov pobočky je povinný.',
        'name_max' => 'Názov pobočky nesmie byť dlhší ako 255 znakov.',

        'address_line_1_max' => 'Riadok adresy 1 nesmie byť dlhší ako 255 znakov.',
        'address_line_2_max' => 'Riadok adresy 2 nesmie byť dlhší ako 255 znakov.',

        'city_max' => 'Mesto nesmie byť dlhšie ako 255 znakov.',
        'postcode_max' => 'PSČ nesmie byť dlhšie ako 32 znakov.',

        'country_code_size' => 'Kód krajiny musí mať presne 2 znaky.',

        'timezone_required' => 'Časové pásmo je povinné.',
        'timezone_max' => 'Časové pásmo nesmie byť dlhšie ako 64 znakov.',

        'is_active_required' => 'Stav aktivity je povinný.',
        'is_active_boolean' => 'Stav aktivity musí byť pravda alebo nepravda.',
    ],

    'view' => [
        'title' => 'Pobočka',
        'branches' => 'Pobočky',
        'create_branch' => 'Vytvoriť pobočku',
        'edit_branch' => 'Upraviť pobočku',
        'index_description' => 'Spravujte svoje pobočky vrátane adresných údajov, časového pásma a aktívneho stavu.',
        'create_description' => 'Vytvorte novú pobočku s adresnými údajmi, časovým pásmom a stavom aktivity.',
        'edit_description' => 'Aktualizujte údaje pobočky, adresu, časové pásmo a stav aktivity.',
        'back_to_branches' => 'Späť na pobočky',
        'create_first_branch' => 'Vytvoriť prvú pobočku',
        'no_branches_found' => 'Nenašli sa žiadne pobočky.',
        'no_branches_text' => 'Zatiaľ nie sú k dispozícii žiadne pobočky na zobrazenie. Vytvorte prvú pobočku a začnite organizovať svoju rezervačnú štruktúru.',

        'table' => [
            'branch' => 'Pobočka',
            'address' => 'Adresa',
            'city' => 'Mesto',
            'timezone' => 'Časové pásmo',
            'no_address_text' => 'Nie je zadaná žiadna adresa',
            'status' => 'Stav',
            'updated' => 'Aktualizované',
            'actions' => 'Akcie',
            'active' => 'Aktívne',
            'inactive' => 'Neaktívne',
        ],

        'overview' => [
            'title' => 'Prehľad pobočky',
            'branch_id_title' => 'ID pobočky',
            'countries_available_title' => 'Dostupné krajiny',
            'city_and_postcode_title' => 'Mesto a PSČ',
            'country_and_timezone_title' => 'Krajina a časové pásmo',
            'timezone_title' => 'Časové pásmo',
            'timezone_text' => 'Na základe vybranej krajiny',
            'limit_title' => 'Limit',
            'limit_text' => 'Môžete vytvoriť až 10 pobočiek.',
            'duration_text' => 'Nastavte umiestnenie pobočky a predvolené regionálne nastavenia.',
            'required_title' => 'Povinné',
            'optional_title' => 'Voliteľné',
            'status_title' => 'Aktuálny stav',
            'active_title' => 'Aktívne',
            'inactive_title' => 'Neaktívne',
            'note_title' => 'Poznámka',
            'note_text' => 'Aktualizácia tejto pobočky neovplyvní ostatné pobočky v systéme.',
        ],

        'form' => [
            'branch_details' => 'Údaje pobočky',
            'complete_the_form' => 'Vyplňte formulár',
            'update_the_form' => 'Aktualizujte formulár',
            'branch_name_title' => 'Názov pobočky',
            'address_line_1_title' => 'Riadok adresy 1',
            'address_line_2_title' => 'Riadok adresy 2',
            'city_title' => 'Mesto',
            'postcode_title' => 'PSČ',
            'country_title' => 'Krajina',
            'select_country' => 'Vyberte krajinu',
            'timezone_title' => 'Časové pásmo',
            'select_timezone' => 'Vyberte časové pásmo',
            'loading_timezones' => 'Načítavajú sa časové pásma...',
            'active_title' => 'Aktívna pobočka',
            'active_text' => 'Neaktívne pobočky môžu zostať uložené v systéme bez toho, aby sa aktívne používali.',
        ],

        'actions' => [
            'edit' => 'Upraviť',
            'delete' => 'Odstrániť',
            'cancel' => 'Zrušiť',
            'create' => 'Vytvoriť pobočku',
            'creating' => 'Vytvára sa...',
            'save' => 'Uložiť zmeny',
            'saving' => 'Ukladá sa...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Naozaj chcete odstrániť túto pobočku?',
        ],
    ],
];