<?php

return [
    'messages' => [
        'updated' => 'Länderstatus wurde erfolgreich aktualisiert.',
    ],

    'validation' => [
        'scope_required' => 'Der Bereich ist erforderlich.',
        'scope_in' => 'Ungültiger Aktualisierungsbereich.',

        'country_ids_array' => 'Die Länderauswahl muss ein gültiges Array sein.',
        'country_ids_integer' => 'Jede Länderkennung muss eine ganze Zahl sein.',
        'country_ids_exists' => 'Ein oder mehrere ausgewählte Länder existieren nicht.',
        'country_ids_required' => 'Mindestens ein Land muss ausgewählt werden.',
        'country_ids_single' => 'Für den Einzelbereich muss genau ein Land angegeben werden.',

        'is_active_required' => 'Das Statuskennzeichen ist erforderlich.',
        'is_active_boolean' => 'Das Statuskennzeichen muss „wahr“ oder „falsch“ sein.',
    ],

    'view' => [
        'countries' => 'Länder',
        'description' => 'Verwalten Sie die Länder, die in Ihrem Buchungsbereich verfügbar sind.',

        'table' => [
            'official_name' => 'Offizieller Name',
            'language' => 'Sprache',
            'currency' => 'Währung',
            'phone_code' => 'Telefonvorwahl',
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
            'future_behavior_note' => 'Diese Ländereinstellungen sind für zukünftige regionale Funktionen vorbereitet. Derzeit haben sie keine Auswirkungen auf das aktuelle Verhalten Ihres Buchungsbereichs.',
        ],
    ],
];