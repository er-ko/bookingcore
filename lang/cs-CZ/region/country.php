<?php

return [
    'messages' => [
        'updated' => 'Stav země byl úspěšně aktualizován.',
    ],

    'validation' => [
        'scope_required' => 'Rozsah je povinný.',
        'scope_in' => 'Neplatný rozsah aktualizace.',

        'country_ids_array' => 'Výběr zemí musí být platné pole.',
        'country_ids_integer' => 'Každý identifikátor země musí být celé číslo.',
        'country_ids_exists' => 'Jedna nebo více vybraných zemí neexistuje.',
        'country_ids_required' => 'Musí být vybrána alespoň jedna země.',
        'country_ids_single' => 'Pro jednotlivý rozsah musí být zadána přesně jedna země.',

        'is_active_required' => 'Příznak stavu je povinný.',
        'is_active_boolean' => 'Příznak stavu musí být pravda nebo nepravda.',
    ],

    'view' => [
        'countries' => 'Země',
        'description' => 'Spravujte země dostupné ve vašem rezervačním pracovním prostoru.',

        'table' => [
            'official_name' => 'Oficiální název',
            'language' => 'Jazyk',
            'currency' => 'Měna',
            'phone_code' => 'Telefonní předvolba',
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
            'future_behavior_note' => 'Tato nastavení zemí jsou připravena pro budoucí regionální funkce. Prozatím neovlivňují aktuální chování vašeho rezervačního pracovního prostoru.',
        ],
    ],
];