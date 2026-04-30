<?php

return [
    'errors' => [
        'activity_inactive' => 'Die ausgewählte Leistung existiert nicht oder ist inaktiv.',
        'unit_invalid' => 'Die ausgewählte Einheit existiert nicht, ist inaktiv oder gehört nicht zur angegebenen Niederlassung.',
        'activity_not_assigned' => 'Die ausgewählte Leistung ist der ausgewählten Einheit nicht zugeordnet.',
        'activity_not_available_for_unit' => 'Die ausgewählte Leistung ist für die ausgewählte Einheit nicht verfügbar.',
        'unit_already_booked' => 'Die ausgewählte Einheit ist für den angegebenen Zeitraum bereits gebucht.',
        'booking_conflict' => 'Die Buchung steht im Konflikt mit einer bestehenden Reservierung.',
        'slot_overlap' => 'Das ausgewählte Buchungszeitfenster überschneidet sich mit einer bestehenden Reservierung.',
        'outside_working_hours' => 'Das ausgewählte Buchungszeitfenster liegt außerhalb der Arbeitszeiten.',
        'during_time_off' => 'Das ausgewählte Buchungszeitfenster fällt in einen gesperrten Auszeitraum.',
        'already_cancelled' => 'Die Buchung wurde bereits storniert.',
        'cancelled_cannot_be_updated' => 'Stornierte Buchungen können nicht aktualisiert werden.',
        'same_status' => 'Die Buchung ist bereits als :status markiert.',
        'use_cancel_action' => 'Verwenden Sie die Aktion zum Stornieren einer Buchung, um eine Buchung zu stornieren.',
        'invalid_activity_minutes' => 'Die Leistungsdauer in Minuten muss größer als null sein.',
        'negative_buffer_minutes' => 'Pufferzeiten dürfen nicht negativ sein.',
        'invalid_slot_block' => 'Der gesamte Zeitfensterblock muss größer als null sein.',
        'invalid_total_slot_block' => 'Der gesamte Zeitfensterblock muss größer als null sein.',
        'invalid_time_range' => 'Der Beginn des Zeitraums muss vor dem Ende liegen.',
        'invalid_day_of_week' => 'Ungültiger Wochentag: :value',
        'invalid_booking_status' => 'Ungültiger Buchungsstatus: :value',
    ],

    'messages' => [
        'created' => 'Buchung wurde erfolgreich erstellt.',
        'failed' => 'Buchung konnte nicht erstellt werden.',
        'cancelled' => 'Buchung wurde erfolgreich storniert.',
        'status_updated' => 'Buchungsstatus wurde erfolgreich aktualisiert.',
        'not_found' => 'Die ausgewählte Buchung wurde nicht gefunden.',
    ],

    'validation' => [
        'branch_required' => 'Die Niederlassung ist erforderlich.',
        'branch_invalid' => 'Die Kennung der Niederlassung ist ungültig.',
        'branch_not_found' => 'Die ausgewählte Niederlassung existiert nicht.',

        'unit_required' => 'Die Einheit ist erforderlich.',
        'unit_invalid' => 'Die Kennung der Einheit ist ungültig.',
        'unit_not_found' => 'Die ausgewählte Einheit existiert nicht.',

        'activity_required' => 'Die Leistung ist erforderlich.',
        'activity_invalid' => 'Die Kennung der Leistung ist ungültig.',
        'activity_not_found' => 'Die ausgewählte Leistung existiert nicht.',
        'activity_not_available_for_unit' => 'Die ausgewählte Leistung ist für die ausgewählte Einheit nicht verfügbar.',

        'starts_at_required' => 'Die Startzeit ist erforderlich.',
        'starts_at_invalid' => 'Das Format der Startzeit ist ungültig.',

        'customer_required' => 'Kundeninformationen sind erforderlich.',
        'customer_invalid' => 'Das Format der Kundendaten ist ungültig.',

        'customer_first_name_required' => 'Der Vorname des Kunden ist erforderlich.',
        'customer_first_name_invalid' => 'Der Vorname des Kunden muss eine Zeichenkette sein.',
        'customer_first_name_too_long' => 'Der Vorname des Kunden ist zu lang.',

        'customer_last_name_required' => 'Der Nachname des Kunden ist erforderlich.',
        'customer_last_name_invalid' => 'Der Nachname des Kunden muss eine Zeichenkette sein.',
        'customer_last_name_too_long' => 'Der Nachname des Kunden ist zu lang.',

        'customer_email_required' => 'Die E-Mail-Adresse des Kunden ist erforderlich.',
        'customer_email_invalid' => 'Die E-Mail-Adresse des Kunden muss eine gültige E-Mail-Adresse sein.',
        'customer_email_too_long' => 'Die E-Mail-Adresse des Kunden ist zu lang.',

        'customer_phone_code_required' => 'Die Telefonvorwahl ist erforderlich.',
        'customer_phone_code_invalid' => 'Die Telefonvorwahl muss eine Zeichenkette sein.',
        'customer_phone_code_too_long' => 'Die Telefonvorwahl ist zu lang.',

        'customer_phone_required' => 'Die Telefonnummer ist erforderlich.',
        'customer_phone_invalid' => 'Die Telefonnummer muss eine Zeichenkette sein.',
        'customer_phone_too_long' => 'Die Telefonnummer ist zu lang.',

        'note_invalid' => 'Der Hinweis muss eine Zeichenkette sein.',

        'status_required' => 'Der Buchungsstatus ist erforderlich.',
        'status_invalid' => 'Das Format des Buchungsstatus ist ungültig.',
        'status_not_allowed' => 'Der ausgewählte Buchungsstatus ist nicht zulässig.',

        'date_required' => 'Das Datum ist erforderlich.',
        'date_invalid' => 'Das Datumsformat ist ungültig.',
    ],

    'view' => [
        'title' => 'Dashboard',
        'create_booking' => 'Buchung erstellen',
        'edit_booking' => 'Buchung bearbeiten',
        'index_description' => 'Übersicht über erstellte Buchungen einschließlich ihres aktuellen Status und der zugehörigen Einträge.',
        'create_description' => 'Erstellen Sie eine neue Buchung mit Kundendaten, Leistungsauswahl und einem verfügbaren Zeitfenster.',
        'edit_description' => 'Aktualisieren Sie Buchungsdetails, Kundeninformationen und den Buchungsstatus.',
        'back_to_dashboard' => 'Zurück zum Dashboard',
        'create_first_booking' => 'Erste Buchung erstellen',
        'no_bookings_found' => 'Keine Buchungen gefunden.',
        'no_bookings_text' => 'Es sind noch keine Buchungen vorhanden. Erstellen Sie die erste Buchung, um mit dem System zu arbeiten.',

        'table' => [
            'customer' => 'Kunde',
            'branch' => 'Niederlassung',
            'unit' => 'Einheit',
            'activity' => 'Leistung',
            'starts_at' => 'Beginnt am',
            'ends_at' => 'Endet am',
            'status' => 'Status',
            'actions' => 'Aktionen',
            'active' => 'Aktiv',
            'inactive' => 'Inaktiv',
        ],

        'overview' => [
            'title' => 'Buchungsübersicht',

            'customer_title' => 'Kundendaten',
            'customer_text' => 'Geben Sie die Kundeninformationen ein, die zum Erstellen der Buchung erforderlich sind.',

            'booking_flow_title' => 'Buchungsablauf',
            'booking_flow_text' => 'Wählen Sie eine Niederlassung, anschließend eine Einheit, danach eine Leistung, ein Datum und ein verfügbares Zeitfenster aus.',

            'availability_title' => 'Verfügbarkeit',
            'availability_text' => 'Verfügbare Zeitfenster werden auf Grundlage der ausgewählten Niederlassung, Einheit, Leistung und des Datums geladen.',

            'required_title' => 'Erforderlich',
            'required_items' => [
                'first_and_last_name' => 'Vor- und Nachname',
                'phone_code_and_number' => 'Telefonvorwahl und Telefonnummer',
                'branch' => 'Niederlassung',
                'unit' => 'Einheit',
                'activity' => 'Leistung',
                'date' => 'Datum',
                'slot' => 'Verfügbares Zeitfenster',
            ],

            'optional_title' => 'Optional',
            'optional_items' => [
                'email' => 'E-Mail',
                'note' => 'Hinweis',
            ],

            'note_title' => 'Hinweis',
            'note_text' => 'Eine Buchung kann erst erstellt werden, nachdem ein gültiges verfügbares Zeitfenster ausgewählt wurde.',
        ],

        'form' => [
            'booking_details' => 'Buchungsdetails',
            'complete_the_reservation' => 'Reservierung abschließen',
            'customer_details' => 'Kundendaten',
            'first_name_title' => 'Vorname',
            'last_name_title' => 'Nachname',
            'email_title' => 'E-Mail',
            'phone_code_title' => 'Vorwahl',
            'phone_title' => 'Telefon',
            'branch_title' => 'Niederlassung',
            'select_branch' => 'Niederlassung auswählen',
            'unit_title' => 'Einheit',
            'select_unit' => 'Einheit auswählen',
            'loading_units' => 'Einheiten werden geladen...',
            'activity_title' => 'Leistung',
            'select_activity' => 'Leistung auswählen',
            'loading_activities' => 'Leistungen werden geladen...',
            'date_title' => 'Datum',
            'available_slots_title' => 'Verfügbare Zeitfenster',
            'available_slots_count' => 'verfügbare(s) Zeitfenster',
            'loading_slots' => 'Zeitfenster werden geladen...',
            'no_available_slots' => 'Für das ausgewählte Datum wurden keine verfügbaren Zeitfenster gefunden.',
            'select_slot' => 'Zeitfenster auswählen',
            'note_title' => 'Hinweis',
        ],

        'actions' => [
            'confirm' => 'Bestätigen',
            'complete' => 'Abschließen',
            'cancel' => 'Stornieren',
            'create' => 'Buchung erstellen',
            'creating' => 'Wird erstellt...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Sind Sie sicher, dass Sie diese Buchung stornieren möchten?',
        ],

    ],
];