<?php

return [
    'messages' => [
        'created'   => 'Aktivita bola úspešne vytvorená.',
        'updated'   => 'Aktivita bola úspešne aktualizovaná.',
        'deleted'   => 'Aktivita bola úspešne odstránená.',
        'failed'    => 'Požiadavku na spracovanie aktivity sa nepodarilo spracovať.',
        'not_found' => 'Aktivita sa nenašla.',
        'limit_reached' => 'Dosiahli ste maximálny povolený počet aktivít.',
    ],

    'validation' => [
        'name_required' => 'Názov aktivity je povinný.',
        'name_max' => 'Názov aktivity nesmie byť dlhší ako 255 znakov.',

        'duration_required' => 'Trvanie je povinné.',
        'duration_integer' => 'Trvanie musí byť celé číslo v minútach.',
        'duration_min' => 'Trvanie musí byť aspoň 1 minúta.',
        'duration_max' => 'Trvanie nesmie byť dlhšie ako 1200 minút.',

        'buffer_before_integer' => 'Časová rezerva pred aktivitou musí byť celé číslo v minútach.',
        'buffer_before_min' => 'Časová rezerva pred aktivitou musí byť aspoň 0 minút.',
        'buffer_before_max' => 'Časová rezerva pred aktivitou nesmie byť dlhšia ako 60 minút.',

        'buffer_after_integer' => 'Časová rezerva po aktivite musí byť celé číslo v minútach.',
        'buffer_after_min' => 'Časová rezerva po aktivite musí byť aspoň 0 minút.',
        'buffer_after_max' => 'Časová rezerva po aktivite nesmie byť dlhšia ako 60 minút.',

        'is_active_required' => 'Stav aktivity je povinný.',
        'is_active_boolean' => 'Stav aktivity musí byť pravda alebo nepravda.',
    ],

    'view' => [
        'title' => 'Aktivita',
        'activities' => 'Aktivity',
        'create_activity' => 'Vytvoriť aktivitu',
        'edit_activity' => 'Upraviť aktivitu',
        'index_description' => 'Spravujte aktivity, ktoré je možné rezervovať vo Vašich jednotkách.',
        'create_description' => 'Definujte novú aktivitu vrátane trvania, časových rezerv a stavu aktivity.',
        'edit_description' => 'Aktualizujte údaje existujúcej aktivity vrátane trvania, časových rezerv a stavu aktivity.',
        'back_to_activities' => 'Späť na aktivity',
        'create_first_activity' => 'Vytvoriť prvú aktivitu',
        'no_activities_found' => 'Nenašli sa žiadne aktivity.',
        'no_activities_text' => 'Zatiaľ nie sú k dispozícii žiadne aktivity na zobrazenie. Vytvorte prvú aktivitu a začnite organizovať svoju rezervačnú štruktúru.',

        'table' => [
            'name' => 'Názov',
            'status' => 'Stav',
            'updated' => 'Aktualizované',
            'actions' => 'Akcie',
            'duration' => 'Trvanie',
            'min' => 'min',
            'active' => 'Aktívne',
            'inactive' => 'Neaktívne',
        ],

        'overview' => [
            'title' => 'Prehľad aktivity',
            'activity_id_title' => 'ID aktivity',
            'duration_title' => 'Trvanie',
            'duration_text' => 'Nastavte, ako dlho má aktivita trvať v minútach.',
            'buffer_time_title' => 'Časová rezerva',
            'buffer_time_text' => 'Pridajte voliteľný čas pred aktivitou a po nej, aby ste zabránili príliš tesnému prekrývaniu rezervácií.',
            'required_title' => 'Povinné',
            'optional_title' => 'Voliteľné',
            'status_title' => 'Stav',
            'status_text' => 'Neaktívne aktivity zostávajú uložené v systéme, ale nemožno ich použiť pre nové rezervácie.',
            'active_title' => 'Aktívne',
            'inactive_title' => 'Neaktívne',
            'note_title' => 'Poznámka',
            'note_text' => 'Aktualizácia tejto aktivity neovplyvní ostatné aktivity v systéme.',
        ],

        'form' => [
            'activity_details' => 'Údaje aktivity',
            'complete_the_form' => 'Vyplňte formulár',
            'update_the_form' => 'Aktualizujte formulár',
            'name_title' => 'Názov',
            'duration_title' => 'Trvanie (minúty)',
            'buffer_before_title' => 'Časová rezerva pred aktivitou (minúty)',
            'buffer_after_title' => 'Časová rezerva po aktivite (minúty)',
            'active_title' => 'Aktívna aktivita',
            'active_text' => 'Neaktívne aktivity zostávajú uložené v systéme, ale nemožno ich použiť pre nové rezervácie.',
        ],

        'actions' => [
            'edit' => 'Upraviť',
            'delete' => 'Odstrániť',
            'cancel' => 'Zrušiť',
            'create' => 'Vytvoriť aktivitu',
            'creating' => 'Vytvára sa...',
            'save' => 'Uložiť zmeny',
            'saving' => 'Ukladá sa...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Naozaj chcete odstrániť túto aktivitu?',
        ],
    ],
];