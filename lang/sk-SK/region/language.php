<?php

return [
    'messages' => [
        'updated' => 'Stav jazyka bol úspešne aktualizovaný.',
    ],

    'validation' => [
        'scope_required' => 'Rozsah je povinný.',
        'scope_in' => 'Neplatný rozsah aktualizácie.',

        'language_ids_array' => 'Výber jazykov musí byť platné pole.',
        'language_ids_integer' => 'Každý identifikátor jazyka musí byť celé číslo.',
        'language_ids_exists' => 'Jeden alebo viac vybraných jazykov neexistuje.',
        'language_ids_required' => 'Musí byť vybraný aspoň jeden jazyk.',
        'language_ids_single' => 'Pre jednotlivý rozsah musí byť zadaný presne jeden jazyk.',

        'is_active_required' => 'Príznak stavu je povinný.',
        'is_active_boolean' => 'Príznak stavu musí byť pravda alebo nepravda.',
    ],

    'view' => [
        'languages' => 'Jazyky',
        'description' => 'Spravujte jazyky dostupné vo Vašom pracovnom priestore. Vo výberoch súvisiacich s jazykmi sa budú ponúkať iba aktívne jazyky.',

        'table' => [
            'name' => 'Názov',
            'local_name' => 'Miestny názov',
            'tag' => 'Značka',
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
            'future_behavior_note' => 'Tieto nastavenia jazykov sú pripravené pre budúce viacjazyčné funkcie. Zatiaľ neovplyvňujú aktuálne správanie Vášho rezervačného pracovného priestoru.',
        ],
    ],
];