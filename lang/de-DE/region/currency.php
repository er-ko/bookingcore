<?php

return [
    'messages' => [
        'updated' => 'Währungsstatus wurde erfolgreich aktualisiert.',
    ],

    'validation' => [
        'scope_required' => 'Der Bereich ist erforderlich.',
        'scope_in' => 'Ungültiger Aktualisierungsbereich.',

        'currency_ids_array' => 'Die Währungsauswahl muss ein gültiges Array sein.',
        'currency_ids_integer' => 'Jede Währungskennung muss eine ganze Zahl sein.',
        'currency_ids_exists' => 'Eine oder mehrere ausgewählte Währungen existieren nicht.',
        'currency_ids_required' => 'Mindestens eine Währung muss ausgewählt werden.',
        'currency_ids_single' => 'Für den Einzelbereich muss genau eine Währung angegeben werden.',

        'is_active_required' => 'Das Statuskennzeichen ist erforderlich.',
        'is_active_boolean' => 'Das Statuskennzeichen muss „wahr“ oder „falsch“ sein.',
    ],

    'view' => [
        'currencies' => 'Währungen',
        'description' => 'Verwalten Sie die Währungen, die in Ihrem Arbeitsbereich verfügbar sind. Nur aktive Währungen werden in währungsbezogenen Auswahllisten angeboten.',

        'table' => [
            'name' => 'Name',
            'decimal' => 'Dezimalstellen',
            'symbol' => 'Symbol',
            'status' => 'Status',
            'action' => 'Aktion',
            'active' => 'Aktiv',
            'inactive' => 'Inaktiv',
            'activate' => 'Aktivieren',
            'deactivate' => 'Deaktivieren',
        ],

        'actions' => [
            'selected' => 'ausgewählt',
            'activate_selected' => 'Ausgewählte aktivieren',
            'deactivate_selected' => 'Ausgewählte deaktivieren',
            'set_all_active' => 'Alle aktivieren',
            'set_all_inactive' => 'Alle deaktivieren',
        ],

        'alerts' => [
            'future_behavior_note' => 'Diese Währungseinstellungen sind für zukünftige Preis- und Regionalfunktionen vorbereitet. Derzeit haben sie keine Auswirkungen auf das aktuelle Verhalten Ihres Buchungsbereichs.',
        ],
    ],
];