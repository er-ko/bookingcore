<?php

return [
    'errors' => [
        'activity_inactive' => 'Die ausgewählte Leistung existiert nicht oder ist inaktiv.',
        'unit_invalid' => 'Die ausgewählte Einheit existiert nicht, ist inaktiv oder gehört nicht zur angegebenen Niederlassung.',
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
];