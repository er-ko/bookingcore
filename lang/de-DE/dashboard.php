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
        'cancelled' => 'Buchung wurde erfolgreich storniert.',
        'status_updated' => 'Buchungsstatus wurde erfolgreich aktualisiert.',
    ],

    'validation' => [
        'status_required' => 'Der Buchungsstatus ist erforderlich.',
        'status_invalid' => 'Das Format des Buchungsstatus ist ungültig.',
        'status_not_allowed' => 'Der ausgewählte Buchungsstatus ist nicht zulässig.',
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

        'actions' => [
            'confirm' => 'Bestätigen',
            'complete' => 'Abschließen',
            'cancel' => 'Stornieren',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Sind Sie sicher, dass Sie diese Buchung stornieren möchten?',
        ],

    ],
];