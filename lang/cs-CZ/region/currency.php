<?php

return [
    'messages' => [
        'updated' => 'Stav měny byl úspěšně aktualizován.',
    ],

    'validation' => [
        'scope_required' => 'Rozsah je povinný.',
        'scope_in' => 'Neplatný rozsah aktualizace.',

        'currency_ids_array' => 'Výběr měn musí být platné pole.',
        'currency_ids_integer' => 'Každý identifikátor měny musí být celé číslo.',
        'currency_ids_exists' => 'Jedna nebo více vybraných měn neexistuje.',
        'currency_ids_required' => 'Musí být vybrána alespoň jedna měna.',
        'currency_ids_single' => 'Pro jednotlivý rozsah musí být zadána přesně jedna měna.',

        'is_active_required' => 'Příznak stavu je povinný.',
        'is_active_boolean' => 'Příznak stavu musí být pravda nebo nepravda.',
    ],

    'view' => [
        'currencies' => 'Měny',
        'description' => 'Spravujte měny dostupné ve svém pracovním prostoru. V měnových výběrech budou nabízeny pouze aktivní měny.',

        'table' => [
            'name' => 'Název',
            'decimal' => 'Desetinná místa',
            'symbol' => 'Symbol',
            'status' => 'Stav',
            'action' => 'Akce',
            'active' => 'Aktivní',
            'inactive' => 'Neaktivní',
            'activate' => 'Aktivovat',
            'deactivate' => 'Deaktivovat',
        ],

        'actions' => [
            'selected' => 'vybráno',
            'activate_selected' => 'Aktivovat vybrané',
            'deactivate_selected' => 'Deaktivovat vybrané',
            'set_all_active' => 'Nastavit vše jako aktivní',
            'set_all_inactive' => 'Nastavit vše jako neaktivní',
        ],

        'alerts' => [
            'future_behavior_note' => 'Tato nastavení měn jsou připravena pro budoucí cenové a regionální funkce. Prozatím neovlivňují aktuální chování vašeho rezervačního pracovního prostoru.',
        ],
    ],
];