<?php

return [
    'messages' => [
        'created'   => 'Leistung wurde erfolgreich erstellt.',
        'updated'   => 'Leistung wurde erfolgreich aktualisiert.',
        'deleted'   => 'Leistung wurde erfolgreich gelöscht.',
        'failed'    => 'Die Anfrage für die Leistung konnte nicht verarbeitet werden.',
        'not_found' => 'Leistung wurde nicht gefunden.',
        'limit_reached' => 'Sie haben die maximal zulässige Anzahl an Leistungen erreicht.',
    ],

    'validation' => [
        'name_required' => 'Der Name der Leistung ist erforderlich.',
        'name_max' => 'Der Name der Leistung darf nicht länger als 255 Zeichen sein.',

        'duration_required' => 'Die Dauer ist erforderlich.',
        'duration_integer' => 'Die Dauer muss als ganze Anzahl von Minuten angegeben werden.',
        'duration_min' => 'Die Dauer muss mindestens 1 Minute betragen.',
        'duration_max' => 'Die Dauer darf nicht mehr als 1200 Minuten betragen.',

        'buffer_before_integer' => 'Die Pufferzeit vor der Leistung muss als ganze Anzahl von Minuten angegeben werden.',
        'buffer_before_min' => 'Die Pufferzeit vor der Leistung muss mindestens 0 Minuten betragen.',
        'buffer_before_max' => 'Die Pufferzeit vor der Leistung darf nicht mehr als 60 Minuten betragen.',

        'buffer_after_integer' => 'Die Pufferzeit nach der Leistung muss als ganze Anzahl von Minuten angegeben werden.',
        'buffer_after_min' => 'Die Pufferzeit nach der Leistung muss mindestens 0 Minuten betragen.',
        'buffer_after_max' => 'Die Pufferzeit nach der Leistung darf nicht mehr als 60 Minuten betragen.',

        'is_active_required' => 'Der Aktivstatus ist erforderlich.',
        'is_active_boolean' => 'Der Aktivstatus muss „wahr“ oder „falsch“ sein.',
    ],

    'view' => [
        'title' => 'Leistung',
        'activities' => 'Leistungen',
        'create_activity' => 'Leistung erstellen',
        'edit_activity' => 'Leistung bearbeiten',
        'index_description' => 'Verwalten Sie die Leistungen, die in Ihren Einheiten gebucht werden können.',
        'create_description' => 'Definieren Sie eine neue Leistung einschließlich Dauer, Pufferzeiten und Aktivstatus.',
        'edit_description' => 'Aktualisieren Sie die Angaben einer bestehenden Leistung einschließlich Dauer, Pufferzeiten und Aktivstatus.',
        'back_to_activities' => 'Zurück zu den Leistungen',
        'create_first_activity' => 'Erste Leistung erstellen',
        'no_activities_found' => 'Keine Leistungen gefunden.',
        'no_activities_text' => 'Es sind noch keine Leistungen vorhanden. Erstellen Sie die erste Leistung, um Ihre Buchungsstruktur zu organisieren.',

        'table' => [
            'name' => 'Name',
            'status' => 'Status',
            'updated' => 'Aktualisiert',
            'actions' => 'Aktionen',
            'duration' => 'Dauer',
            'min' => 'Min.',
            'active' => 'Aktiv',
            'inactive' => 'Inaktiv',
        ],

        'overview' => [
            'title' => 'Leistungsübersicht',
            'activity_id_title' => 'Leistungs-ID',
            'duration_title' => 'Dauer',
            'duration_text' => 'Legen Sie fest, wie lange die Leistung in Minuten dauern soll.',
            'buffer_time_title' => 'Pufferzeit',
            'buffer_time_text' => 'Fügen Sie optional Zeit vor und nach der Leistung hinzu, um zu enge Buchungsüberschneidungen zu vermeiden.',
            'required_title' => 'Erforderlich',
            'optional_title' => 'Optional',
            'status_title' => 'Status',
            'status_text' => 'Inaktive Leistungen bleiben im System gespeichert, können jedoch nicht für neue Buchungen verwendet werden.',
            'active_title' => 'Aktiv',
            'inactive_title' => 'Inaktiv',
            'note_title' => 'Hinweis',
            'note_text' => 'Die Aktualisierung dieser Leistung hat keine Auswirkungen auf andere Leistungen im System.',
        ],

        'form' => [
            'activity_details' => 'Angaben zur Leistung',
            'complete_the_form' => 'Formular ausfüllen',
            'update_the_form' => 'Formular aktualisieren',
            'name_title' => 'Name',
            'duration_title' => 'Dauer (Minuten)',
            'buffer_before_title' => 'Pufferzeit vorher (Minuten)',
            'buffer_after_title' => 'Pufferzeit nachher (Minuten)',
            'active_title' => 'Aktive Leistung',
            'active_text' => 'Inaktive Leistungen bleiben im System gespeichert, können jedoch nicht für neue Buchungen verwendet werden.',
        ],

        'actions' => [
            'edit' => 'Bearbeiten',
            'delete' => 'Löschen',
            'cancel' => 'Abbrechen',
            'create' => 'Leistung erstellen',
            'creating' => 'Wird erstellt...',
            'save' => 'Änderungen speichern',
            'saving' => 'Wird gespeichert...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Sind Sie sicher, dass Sie diese Leistung löschen möchten?',
        ],

    ],
];