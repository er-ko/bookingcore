<?php

return [
    'messages' => [
        'updated' => 'Stav jazyka byl úspěšně aktualizován.',
    ],

    'validation' => [
        'scope_required' => 'Rozsah je povinný.',
        'scope_in' => 'Neplatný rozsah aktualizace.',

        'language_ids_array' => 'Výběr jazyků musí být platné pole.',
        'language_ids_integer' => 'Každý identifikátor jazyka musí být celé číslo.',
        'language_ids_exists' => 'Jeden nebo více vybraných jazyků neexistuje.',
        'language_ids_required' => 'Musí být vybrán alespoň jeden jazyk.',
        'language_ids_single' => 'Pro jednotlivý rozsah musí být zadán přesně jeden jazyk.',

        'is_active_required' => 'Příznak stavu je povinný.',
        'is_active_boolean' => 'Příznak stavu musí být pravda nebo nepravda.',
    ],

    'view' => [
        'languages' => 'Jazyky',
        'description' => 'Spravujte jazyky dostupné ve svém pracovním prostoru. Ve výběrech souvisejících s jazyky budou nabízeny pouze aktivní jazyky.',

        'table' => [
            'name' => 'Název',
            'local_name' => 'Místní název',
            'tag' => 'Značka',
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
            'future_behavior_note' => 'Tato nastavení jazyků jsou připravena pro budoucí vícejazyčné funkce. Prozatím neovlivňují aktuální chování vašeho rezervačního pracovního prostoru.',
        ],
    ],
];