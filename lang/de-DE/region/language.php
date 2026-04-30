<?php

return [
    'messages' => [
        'updated' => 'Sprachstatus wurde erfolgreich aktualisiert.',
    ],

    'validation' => [
        'scope_required' => 'Der Bereich ist erforderlich.',
        'scope_in' => 'Ungültiger Aktualisierungsbereich.',

        'language_ids_array' => 'Die Sprachauswahl muss ein gültiges Array sein.',
        'language_ids_integer' => 'Jede Sprachkennung muss eine ganze Zahl sein.',
        'language_ids_exists' => 'Eine oder mehrere ausgewählte Sprachen existieren nicht.',
        'language_ids_required' => 'Mindestens eine Sprache muss ausgewählt werden.',
        'language_ids_single' => 'Für den Einzelbereich muss genau eine Sprache angegeben werden.',

        'is_active_required' => 'Das Statuskennzeichen ist erforderlich.',
        'is_active_boolean' => 'Das Statuskennzeichen muss „wahr“ oder „falsch“ sein.',
    ],

    'view' => [
        'languages' => 'Sprachen',
        'description' => 'Verwalten Sie die Sprachen, die in Ihrem Arbeitsbereich verfügbar sind. Nur aktive Sprachen werden in sprachbezogenen Auswahllisten angeboten.',

        'table' => [
            'name' => 'Name',
            'local_name' => 'Lokaler Name',
            'tag' => 'Tag',
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
            'future_behavior_note' => 'Diese Spracheinstellungen sind für zukünftige mehrsprachige Funktionen vorbereitet. Derzeit haben sie keine Auswirkungen auf das aktuelle Verhalten Ihres Buchungsbereichs.',
        ],
    ],
];