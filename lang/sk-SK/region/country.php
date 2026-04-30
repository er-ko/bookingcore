<?php

return [
    'messages' => [
        'updated' => 'Stav krajiny bol úspešne aktualizovaný.',
    ],

    'validation' => [
        'scope_required' => 'Rozsah je povinný.',
        'scope_in' => 'Neplatný rozsah aktualizácie.',

        'country_ids_array' => 'Výber krajín musí byť platné pole.',
        'country_ids_integer' => 'Každý identifikátor krajiny musí byť celé číslo.',
        'country_ids_exists' => 'Jedna alebo viac vybraných krajín neexistuje.',
        'country_ids_required' => 'Musí byť vybraná aspoň jedna krajina.',
        'country_ids_single' => 'Pre jednotlivý rozsah musí byť zadaná presne jedna krajina.',

        'is_active_required' => 'Príznak stavu je povinný.',
        'is_active_boolean' => 'Príznak stavu musí byť pravda alebo nepravda.',
    ],

    'view' => [
        'countries' => 'Krajiny',
        'description' => 'Spravujte krajiny dostupné vo Vašom rezervačnom pracovnom priestore.',

        'table' => [
            'official_name' => 'Oficiálny názov',
            'language' => 'Jazyk',
            'currency' => 'Mena',
            'phone_code' => 'Telefónna predvoľba',
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
            'future_behavior_note' => 'Tieto nastavenia krajín sú pripravené pre budúce regionálne funkcie. Zatiaľ neovplyvňujú aktuálne správanie Vášho rezervačného pracovného priestoru.',
        ],
    ],
];