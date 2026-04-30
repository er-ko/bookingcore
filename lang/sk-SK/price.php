<?php

return [
    'messages' => [
        'created'   => 'Cena bola úspešne vytvorená.',
        'updated'   => 'Cena bola úspešne aktualizovaná.',
        'deleted'   => 'Cena bola úspešne odstránená.',
        'failed'    => 'Požiadavku na spracovanie ceny sa nepodarilo spracovať.',
    ],

    'validation' => [
        'branch_required' => 'Vyberte pobočku.',
        'branch_invalid' => 'Vybraná pobočka je neplatná.',
        'branch_not_found' => 'Vybraná pobočka sa nenašla.',

        'unit_required' => 'Vyberte jednotku.',
        'unit_invalid' => 'Vybraná jednotka je neplatná.',
        'unit_not_found' => 'Vybraná jednotka sa nenašla.',

        'activity_required' => 'Vyberte aktivitu.',
        'activity_invalid' => 'Vybraná aktivita je neplatná.',
        'activity_not_found' => 'Vybraná aktivita sa nenašla.',

        'price_already_exists' => 'Cena pre vybranú jednotku a aktivitu už existuje.',
        'price_not_found' => 'Vybraná cena sa nenašla.',
        'price_required' => 'Zadajte cenu.',
        'price_invalid' => 'Cena musí byť platné číslo.',
        'price_min' => 'Cena musí byť nulová alebo vyššia.',
    ],

    'view' => [
        'title' => 'Ceny',
        'description' => 'Nastavte predvolenú cenu pre každú aktivitu v rámci konkrétnej jednotky.',

        'form' => [
            'title' => 'Nastavenia ceny',
            'branch_title' => 'Pobočka',
            'branch_placeholder' => 'Vyberte pobočku',
            'unit_title' => 'Jednotka',
            'unit_placeholder' => 'Vyberte jednotku',
            'activity_title' => 'Aktivita',
            'activity_placeholder' => 'Vyberte aktivitu',
            'price_title' => 'Cena',
            'price_placeholder' => 'Zadajte cenu',
            'currency_title' => 'Mena',
            'currency_text' => 'Ceny sa ukladajú vo Vašej predvolenej mene.',
        ],

        'table' => [
            'title' => 'Uložené ceny',
            'branch_title' => 'Pobočka',
            'unit_title' => 'Jednotka',
            'activity_title' => 'Aktivita',
            'price_title' => 'Cena',
            'actions_title' => 'Akcie',
        ],

        'actions' => [
            'save' => 'Uložiť cenu',
            'saving' => 'Ukladá sa...',
            'edit' => 'Upraviť',
            'update' => 'Aktualizovať',
            'updating' => 'Aktualizuje sa...',
            'delete' => 'Odstrániť',
            'cancel' => 'Zrušiť',
            'deleting' => 'Odstraňuje sa...',
        ],

        'states' => [
            'empty_title' => 'Zatiaľ nie sú žiadne ceny',
            'empty_text' => 'Vytvorte prvú cenu pre kombináciu jednotky a aktivity.',
            'no_branches_title' => 'Nastavenie cien nie je dostupné',
            'no_branches_text' => 'Najprv vytvorte pobočku, aby ste mohli začať nastavovať ceny.',
            'no_units_text' => 'Pre vybranú pobočku nie sú dostupné žiadne jednotky.',
            'no_activities_text' => 'Nie sú dostupné žiadne aktivity.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Naozaj chcete odstrániť túto cenu?',
        ],
    ],
];