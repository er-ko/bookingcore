<?php

return [
    'messages' => [
        'created'   => 'Aktivita byla úspěšně vytvořena.',
        'updated'   => 'Aktivita byla úspěšně aktualizována.',
        'deleted'   => 'Aktivita byla úspěšně smazána.',
        'failed'    => 'Požadavek na zpracování aktivity se nezdařil.',
        'not_found' => 'Aktivita nebyla nalezena.',
        'limit_reached' => 'Dosáhli jste maximálního povoleného počtu aktivit.',
    ],

    'validation' => [
        'name_required' => 'Název aktivity je povinný.',
        'name_max' => 'Název aktivity nesmí být delší než 255 znaků.',

        'duration_required' => 'Doba trvání je povinná.',
        'duration_integer' => 'Doba trvání musí být celé číslo v minutách.',
        'duration_min' => 'Doba trvání musí být alespoň 1 minuta.',
        'duration_max' => 'Doba trvání nesmí být delší než 1200 minut.',

        'buffer_before_integer' => 'Časová rezerva před aktivitou musí být celé číslo v minutách.',
        'buffer_before_min' => 'Časová rezerva před aktivitou musí být alespoň 0 minut.',
        'buffer_before_max' => 'Časová rezerva před aktivitou nesmí být delší než 60 minut.',

        'buffer_after_integer' => 'Časová rezerva po aktivitě musí být celé číslo v minutách.',
        'buffer_after_min' => 'Časová rezerva po aktivitě musí být alespoň 0 minut.',
        'buffer_after_max' => 'Časová rezerva po aktivitě nesmí být delší než 60 minut.',

        'is_active_required' => 'Stav aktivity je povinný.',
        'is_active_boolean' => 'Stav aktivity musí být pravda nebo nepravda.',
    ],

    'view' => [
        'title' => 'Aktivita',
        'activities' => 'Aktivity',
        'create_activity' => 'Vytvořit aktivitu',
        'edit_activity' => 'Upravit aktivitu',
        'index_description' => 'Spravujte aktivity, které lze rezervovat ve vašich jednotkách.',
        'create_description' => 'Definujte novou aktivitu včetně doby trvání, časových rezerv a stavu aktivity.',
        'edit_description' => 'Aktualizujte údaje existující aktivity včetně doby trvání, časových rezerv a stavu aktivity.',
        'back_to_activities' => 'Zpět na aktivity',
        'create_first_activity' => 'Vytvořit první aktivitu',
        'no_activities_found' => 'Nebyly nalezeny žádné aktivity.',
        'no_activities_text' => 'Zatím zde nejsou žádné aktivity k zobrazení. Vytvořte první aktivitu a začněte organizovat svou rezervační strukturu.',

        'table' => [
            'name' => 'Název',
            'status' => 'Stav',
            'updated' => 'Aktualizováno',
            'actions' => 'Akce',
            'duration' => 'Doba trvání',
            'min' => 'min',
            'active' => 'Aktivní',
            'inactive' => 'Neaktivní',
        ],

        'overview' => [
            'title' => 'Přehled aktivity',
            'activity_id_title' => 'ID aktivity',
            'duration_title' => 'Doba trvání',
            'duration_text' => 'Nastavte, jak dlouho má aktivita trvat v minutách.',
            'buffer_time_title' => 'Časová rezerva',
            'buffer_time_text' => 'Přidejte volitelný čas před aktivitou a po ní, abyste předešli příliš těsnému překrývání rezervací.',
            'required_title' => 'Povinné',
            'optional_title' => 'Volitelné',
            'status_title' => 'Stav',
            'status_text' => 'Neaktivní aktivity zůstávají uložené v systému, ale nelze je používat pro nové rezervace.',
            'active_title' => 'Aktivní',
            'inactive_title' => 'Neaktivní',
            'note_title' => 'Poznámka',
            'note_text' => 'Aktualizace této aktivity neovlivní ostatní aktivity v systému.',
        ],

        'form' => [
            'activity_details' => 'Údaje aktivity',
            'complete_the_form' => 'Vyplňte formulář',
            'update_the_form' => 'Aktualizujte formulář',
            'name_title' => 'Název',
            'duration_title' => 'Doba trvání (minuty)',
            'buffer_before_title' => 'Časová rezerva před aktivitou (minuty)',
            'buffer_after_title' => 'Časová rezerva po aktivitě (minuty)',
            'active_title' => 'Aktivní aktivita',
            'active_text' => 'Neaktivní aktivity zůstávají uložené v systému, ale nelze je používat pro nové rezervace.',
        ],

        'actions' => [
            'edit' => 'Upravit',
            'delete' => 'Smazat',
            'cancel' => 'Zrušit',
            'create' => 'Vytvořit aktivitu',
            'creating' => 'Vytváří se...',
            'save' => 'Uložit změny',
            'saving' => 'Ukládá se...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Opravdu chcete tuto aktivitu smazat?',
        ],

    ],
];