<?php

return [
    'messages' => [
        'updated' => 'Stav meny bol úspešne aktualizovaný.',
    ],

    'validation' => [
        'scope_required' => 'Rozsah je povinný.',
        'scope_in' => 'Neplatný rozsah aktualizácie.',

        'currency_ids_array' => 'Výber mien musí byť platné pole.',
        'currency_ids_integer' => 'Každý identifikátor meny musí byť celé číslo.',
        'currency_ids_exists' => 'Jedna alebo viac vybraných mien neexistuje.',
        'currency_ids_required' => 'Musí byť vybraná aspoň jedna mena.',
        'currency_ids_single' => 'Pre jednotlivý rozsah musí byť zadaná presne jedna mena.',

        'is_active_required' => 'Príznak stavu je povinný.',
        'is_active_boolean' => 'Príznak stavu musí byť pravda alebo nepravda.',
    ],

    'view' => [
        'currencies' => 'Meny',
        'description' => 'Spravujte meny dostupné vo Vašom pracovnom priestore. Vo výberoch súvisiacich s menami sa budú ponúkať iba aktívne meny.',

        'table' => [
            'name' => 'Názov',
            'decimal' => 'Desatinné miesta',
            'symbol' => 'Symbol',
            'status' => 'Stav',
            'action' => 'Akcia',
            'active' => 'Aktívne',
            'inactive' => 'Neaktívne',
            'activate' => 'Aktivovať',
            'deactivate' => 'Deaktivovať',
        ],

        'actions' => [
            'selected' => 'vybrané',
            'activate_selected' => 'Aktivovať vybrané',
            'deactivate_selected' => 'Deaktivovať vybrané',
            'set_all_active' => 'Nastaviť všetky ako aktívne',
            'set_all_inactive' => 'Nastaviť všetky ako neaktívne',
        ],

        'alerts' => [
            'future_behavior_note' => 'Tieto nastavenia mien sú pripravené pre budúce cenové a regionálne funkcie. Zatiaľ neovplyvňujú aktuálne správanie Vášho rezervačného pracovného priestoru.',
        ],
    ],
];