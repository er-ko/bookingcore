<?php

return [
    'messages' => [
        'created'   => 'Preis wurde erfolgreich erstellt.',
        'updated'   => 'Preis wurde erfolgreich aktualisiert.',
        'deleted'   => 'Preis wurde erfolgreich gelöscht.',
        'failed'    => 'Die Preisanfrage konnte nicht verarbeitet werden.',
    ],

    'validation' => [
        'branch_required' => 'Bitte wählen Sie eine Niederlassung aus.',
        'branch_invalid' => 'Die ausgewählte Niederlassung ist ungültig.',
        'branch_not_found' => 'Die ausgewählte Niederlassung wurde nicht gefunden.',

        'unit_required' => 'Bitte wählen Sie eine Einheit aus.',
        'unit_invalid' => 'Die ausgewählte Einheit ist ungültig.',
        'unit_not_found' => 'Die ausgewählte Einheit wurde nicht gefunden.',

        'activity_required' => 'Bitte wählen Sie eine Leistung aus.',
        'activity_invalid' => 'Die ausgewählte Leistung ist ungültig.',
        'activity_not_found' => 'Die ausgewählte Leistung wurde nicht gefunden.',

        'price_already_exists' => 'Für die ausgewählte Einheit und Leistung existiert bereits ein Preis.',
        'price_not_found' => 'Der ausgewählte Preis wurde nicht gefunden.',
        'price_required' => 'Bitte geben Sie einen Preis ein.',
        'price_invalid' => 'Der Preis muss eine gültige Zahl sein.',
        'price_min' => 'Der Preis muss null oder größer sein.',
    ],

    'view' => [
        'title' => 'Preise',
        'description' => 'Legen Sie den Standardpreis für jede Leistung innerhalb einer bestimmten Einheit fest.',

        'form' => [
            'title' => 'Preiseinstellungen',
            'branch_title' => 'Niederlassung',
            'branch_placeholder' => 'Niederlassung auswählen',
            'unit_title' => 'Einheit',
            'unit_placeholder' => 'Einheit auswählen',
            'activity_title' => 'Leistung',
            'activity_placeholder' => 'Leistung auswählen',
            'price_title' => 'Preis',
            'price_placeholder' => 'Preis eingeben',
            'currency_title' => 'Währung',
            'currency_text' => 'Preise werden in Ihrer Standardwährung gespeichert.',
        ],

        'table' => [
            'title' => 'Gespeicherte Preise',
            'branch_title' => 'Niederlassung',
            'unit_title' => 'Einheit',
            'activity_title' => 'Leistung',
            'price_title' => 'Preis',
            'actions_title' => 'Aktionen',
        ],

        'actions' => [
            'save' => 'Preis speichern',
            'saving' => 'Wird gespeichert...',
            'edit' => 'Bearbeiten',
            'update' => 'Aktualisieren',
            'updating' => 'Wird aktualisiert...',
            'delete' => 'Löschen',
            'cancel' => 'Abbrechen',
            'deleting' => 'Wird gelöscht...',
        ],

        'states' => [
            'empty_title' => 'Noch keine Preise',
            'empty_text' => 'Erstellen Sie den ersten Preis für eine Kombination aus Einheit und Leistung.',
            'no_branches_title' => 'Keine Preiseinrichtung verfügbar',
            'no_branches_text' => 'Erstellen Sie zuerst eine Niederlassung, um Preise festzulegen.',
            'no_units_text' => 'Für die ausgewählte Niederlassung sind keine Einheiten verfügbar.',
            'no_activities_text' => 'Es sind keine Leistungen verfügbar.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Sind Sie sicher, dass Sie diesen Preis löschen möchten?',
        ],
    ],
];