<?php

return [
    'messages' => [
        'created'   => 'Cena byla úspěšně vytvořena.',
        'updated'   => 'Cena byla úspěšně aktualizována.',
        'deleted'   => 'Cena byla úspěšně smazána.',
        'failed'    => 'Požadavek na zpracování ceny se nezdařil.',
    ],

    'validation' => [
        'branch_required' => 'Vyberte prosím pobočku.',
        'branch_invalid' => 'Vybraná pobočka není platná.',
        'branch_not_found' => 'Vybraná pobočka nebyla nalezena.',

        'unit_required' => 'Vyberte prosím jednotku.',
        'unit_invalid' => 'Vybraná jednotka není platná.',
        'unit_not_found' => 'Vybraná jednotka nebyla nalezena.',

        'activity_required' => 'Vyberte prosím aktivitu.',
        'activity_invalid' => 'Vybraná aktivita není platná.',
        'activity_not_found' => 'Vybraná aktivita nebyla nalezena.',

        'price_already_exists' => 'Cena pro vybranou jednotku a aktivitu již existuje.',
        'price_not_found' => 'Vybraná cena nebyla nalezena.',
        'price_required' => 'Zadejte prosím cenu.',
        'price_invalid' => 'Cena musí být platné číslo.',
        'price_min' => 'Cena musí být nulová nebo vyšší.',
    ],

    'view' => [
        'title' => 'Ceny',
        'description' => 'Nastavte výchozí cenu pro každou aktivitu v rámci konkrétní jednotky.',

        'form' => [
            'title' => 'Nastavení ceny',
            'branch_title' => 'Pobočka',
            'branch_placeholder' => 'Vyberte pobočku',
            'unit_title' => 'Jednotka',
            'unit_placeholder' => 'Vyberte jednotku',
            'activity_title' => 'Aktivita',
            'activity_placeholder' => 'Vyberte aktivitu',
            'price_title' => 'Cena',
            'price_placeholder' => 'Zadejte cenu',
            'currency_title' => 'Měna',
            'currency_text' => 'Ceny jsou ukládány ve vaší výchozí měně.',
        ],

        'table' => [
            'title' => 'Uložené ceny',
            'branch_title' => 'Pobočka',
            'unit_title' => 'Jednotka',
            'activity_title' => 'Aktivita',
            'price_title' => 'Cena',
            'actions_title' => 'Akce',
        ],

        'actions' => [
            'save' => 'Uložit cenu',
            'saving' => 'Ukládá se...',
            'edit' => 'Upravit',
            'update' => 'Aktualizovat',
            'updating' => 'Aktualizuje se...',
            'delete' => 'Smazat',
            'cancel' => 'Zrušit',
            'deleting' => 'Maže se...',
        ],

        'states' => [
            'empty_title' => 'Zatím nejsou nastaveny žádné ceny',
            'empty_text' => 'Vytvořte první cenu pro kombinaci jednotky a aktivity.',
            'no_branches_title' => 'Nastavení cen není k dispozici',
            'no_branches_text' => 'Nejprve vytvořte pobočku, abyste mohli začít nastavovat ceny.',
            'no_units_text' => 'Pro vybranou pobočku nejsou dostupné žádné jednotky.',
            'no_activities_text' => 'Nejsou dostupné žádné aktivity.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Opravdu chcete tuto cenu smazat?',
        ],
    ],
];