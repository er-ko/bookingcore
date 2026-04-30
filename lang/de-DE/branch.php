<?php

return [
    'messages' => [
        'created'   => 'Niederlassung wurde erfolgreich erstellt.',
        'updated'   => 'Niederlassung wurde erfolgreich aktualisiert.',
        'deleted'   => 'Niederlassung wurde erfolgreich gelöscht.',
        'failed'    => 'Die Anfrage für die Niederlassung konnte nicht verarbeitet werden.',
        'not_found' => 'Niederlassung wurde nicht gefunden.',
        'has_units' => 'Die Niederlassung kann nicht gelöscht werden, da sie noch Einheiten enthält.',
        'has_bookings' => 'Die Niederlassung kann nicht gelöscht werden, da sie noch Buchungen enthält.',
        'limit_reached' => 'Sie haben die maximal zulässige Anzahl an Niederlassungen erreicht.',
    ],

    'validation' => [
        'name_required' => 'Der Name der Niederlassung ist erforderlich.',
        'name_max' => 'Der Name der Niederlassung darf nicht länger als 255 Zeichen sein.',

        'address_line_1_max' => 'Adresszeile 1 darf nicht länger als 255 Zeichen sein.',
        'address_line_2_max' => 'Adresszeile 2 darf nicht länger als 255 Zeichen sein.',

        'city_max' => 'Die Stadt darf nicht länger als 255 Zeichen sein.',
        'postcode_max' => 'Die Postleitzahl darf nicht länger als 32 Zeichen sein.',

        'country_code_size' => 'Der Ländercode muss genau 2 Zeichen lang sein.',

        'timezone_required' => 'Die Zeitzone ist erforderlich.',
        'timezone_max' => 'Die Zeitzone darf nicht länger als 64 Zeichen sein.',

        'is_active_required' => 'Der Aktivstatus ist erforderlich.',
        'is_active_boolean' => 'Der Aktivstatus muss „wahr“ oder „falsch“ sein.',
    ],

    'view' => [
        'title' => 'Niederlassung',
        'branches' => 'Niederlassungen',
        'create_branch' => 'Niederlassung erstellen',
        'edit_branch' => 'Niederlassung bearbeiten',
        'index_description' => 'Verwalten Sie Ihre Niederlassungen einschließlich Adressdaten, Zeitzone und Aktivstatus.',
        'create_description' => 'Erstellen Sie eine neue Niederlassung mit Adressdaten, Zeitzone und Aktivstatus.',
        'edit_description' => 'Aktualisieren Sie Angaben zur Niederlassung, Adresse, Zeitzone und Aktivstatus.',
        'back_to_branches' => 'Zurück zu den Niederlassungen',
        'create_first_branch' => 'Erste Niederlassung erstellen',
        'no_branches_found' => 'Keine Niederlassungen gefunden.',
        'no_branches_text' => 'Es sind noch keine Niederlassungen vorhanden. Erstellen Sie die erste Niederlassung, um Ihre Buchungsstruktur zu organisieren.',

        'table' => [
            'branch' => 'Niederlassung',
            'address' => 'Adresse',
            'city' => 'Stadt',
            'timezone' => 'Zeitzone',
            'no_address_text' => 'Keine Adresse angegeben',
            'status' => 'Status',
            'updated' => 'Aktualisiert',
            'actions' => 'Aktionen',
            'active' => 'Aktiv',
            'inactive' => 'Inaktiv',
        ],

        'overview' => [
            'title' => 'Niederlassungsübersicht',
            'branch_id_title' => 'Niederlassungs-ID',
            'countries_available_title' => 'Verfügbare Länder',
            'city_and_postcode_title' => 'Stadt und Postleitzahl',
            'country_and_timezone_title' => 'Land und Zeitzone',
            'timezone_title' => 'Zeitzone',
            'timezone_text' => 'Basierend auf dem ausgewählten Land',
            'limit_title' => 'Limit',
            'limit_text' => 'Sie können bis zu 10 Niederlassungen erstellen.',
            'duration_text' => 'Legen Sie den Standort der Niederlassung und regionale Standardeinstellungen fest.',
            'required_title' => 'Erforderlich',
            'optional_title' => 'Optional',
            'status_title' => 'Aktueller Status',
            'active_title' => 'Aktiv',
            'inactive_title' => 'Inaktiv',
            'note_title' => 'Hinweis',
            'note_text' => 'Die Aktualisierung dieser Niederlassung hat keine Auswirkungen auf andere Niederlassungen im System.',
        ],

        'form' => [
            'branch_details' => 'Angaben zur Niederlassung',
            'complete_the_form' => 'Formular ausfüllen',
            'update_the_form' => 'Formular aktualisieren',
            'branch_name_title' => 'Name der Niederlassung',
            'address_line_1_title' => 'Adresszeile 1',
            'address_line_2_title' => 'Adresszeile 2',
            'city_title' => 'Stadt',
            'postcode_title' => 'Postleitzahl',
            'country_title' => 'Land',
            'select_country' => 'Land auswählen',
            'timezone_title' => 'Zeitzone',
            'select_timezone' => 'Zeitzone auswählen',
            'loading_timezones' => 'Zeitzonen werden geladen...',
            'active_title' => 'Aktive Niederlassung',
            'active_text' => 'Inaktive Niederlassungen können im System gespeichert bleiben, ohne aktiv verwendet zu werden.',
        ],

        'actions' => [
            'edit' => 'Bearbeiten',
            'delete' => 'Löschen',
            'cancel' => 'Abbrechen',
            'create' => 'Niederlassung erstellen',
            'creating' => 'Wird erstellt...',
            'save' => 'Änderungen speichern',
            'saving' => 'Wird gespeichert...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Sind Sie sicher, dass Sie diese Niederlassung löschen möchten?',
        ],

    ],
];