<?php

return [
    'view' => [
        'title' => 'Buchen Sie Ihren Termin',
        'description' => 'Wählen Sie die Niederlassung, die Leistung, das Datum und die Uhrzeit aus, die für Sie am besten passen.',

        'form' => [
            'branch_title' => 'Niederlassung',
            'branch_placeholder' => 'Niederlassung auswählen',

            'unit_title' => 'Einheit',
            'unit_placeholder' => 'Einheit auswählen',

            'activity_title' => 'Leistung',
            'activity_placeholder' => 'Leistung auswählen',

            'date_title' => 'Datum',
            'date_placeholder' => 'Datum auswählen',

            'slot_title' => 'Verfügbare Uhrzeit',
            'slot_placeholder' => 'Uhrzeit auswählen',

            'first_name_title' => 'Vorname',
            'first_name_placeholder' => 'John',

            'last_name_title' => 'Nachname',
            'last_name_placeholder' => 'Doe',

            'email_title' => 'E-Mail',
            'email_placeholder' => 'john@example.com',

            'phone_code_title' => 'Telefonvorwahl',
            'phone_code_placeholder' => '+1',

            'phone_title' => 'Telefon',
            'phone_placeholder' => '555123456',

            'note_title' => 'Hinweis',
            'note_placeholder' => 'Zusätzliche Informationen zu Ihrer Buchung',
        ],

        'content' => [
            'form_title' => 'Buchung abschließen',
            'ready' => 'bereit',

            'appointment_title' => 'Termindetails',
            'appointment_text' => 'Wählen Sie die Niederlassung, die Einheit, die Leistung, das Datum und das Zeitfenster aus, die am besten passen.',

            'customer_title' => 'Kundendaten',
            'customer_text' => 'Geben Sie die Kontaktdaten ein, die zur Bestätigung und Zuordnung der Buchung erforderlich sind.',

            'note_title' => 'Zusätzlicher Hinweis',
            'note_text' => 'Teilen Sie vor Beginn des Termins alles mit, was hilfreich sein könnte.',

            'review_title' => 'Überprüfen Sie die Buchungsdetails und bestätigen Sie, wenn alles korrekt ist.',
            'review_text' => 'Die Buchungsübersicht wird live aktualisiert, während Sie das Formular ausfüllen.',
            'review_live_text' => ':selection/4 Buchungsdetails, :customer/4 Kontaktdaten',

            'summary_badge' => 'Übersicht',
            'summary_progress' => 'Buchungsprüfung',

            'branch_label' => 'Niederlassung',
            'unit_label' => 'Einheit',
            'activity_label' => 'Leistung',
            'date_time_label' => 'Datum / Uhrzeit',
            'customer_label' => 'Kunde',
            'email_label' => 'E-Mail',
            'phone_label' => 'Telefon',
            'note_label' => 'Hinweis',

            'summary_empty_selection' => 'Noch nicht ausgewählt',
            'summary_empty_customer' => 'Noch nicht ausgefüllt',

            'branch_status_title' => 'Status der Niederlassung',
            'service_status_title' => 'Status der Leistung',
            'schedule_status_title' => 'Status des Zeitplans',
        ],

        'states' => [
            'no_branches_title' => 'Keine Niederlassungen verfügbar',
            'no_branches_text' => 'Derzeit sind keine öffentlichen Niederlassungen für Buchungen verfügbar.',

            'no_units_title' => 'Keine Einheiten verfügbar',
            'no_units_text' => 'Für die ausgewählte Niederlassung sind derzeit keine Einheiten verfügbar.',

            'no_activities_title' => 'Keine Leistungen verfügbar',
            'no_activities_text' => 'Für die ausgewählte Einheit sind derzeit keine Leistungen verfügbar.',

            'no_slots_title' => 'Keine verfügbaren Zeitfenster',
            'no_slots_text' => 'Für das ausgewählte Datum sind keine verfügbaren Buchungszeitfenster vorhanden.',

            'branch_default' => 'Wählen Sie den Standort aus, an dem die Buchung stattfinden soll.',
            'service_default' => 'Wählen Sie die Leistung aus, nachdem Sie die passende Einheit ausgewählt haben.',
            'schedule_loading' => 'Die Live-Verfügbarkeit für den ausgewählten Tag wird geprüft.',
            'schedule_default' => 'Wählen Sie ein Datum aus, um freie Buchungszeitfenster zu laden.',
        ],

        'actions' => [
            'submit' => 'Buchung erstellen',
            'submitting' => 'Buchung wird erstellt...',
        ],

        'messages' => [
            'created' => 'Buchung wurde erfolgreich erstellt.',
            'failed' => 'Buchung konnte nicht erstellt werden.',
        ],

        'detail' => [
            'title' => 'Buchungsdetails',
            'badge_created' => 'Buchung erstellt',
            'status_label' => 'Status',
            'heading' => 'Ihre Buchung wurde gespeichert',
            'description' => 'Speichern Sie diese Seite für später, laden Sie die Kalenderdatei herunter oder drucken Sie die Bestätigung aus.',
            'details_title' => 'Buchungsdetails',
            'branch_label' => 'Niederlassung',
            'unit_label' => 'Einheit',
            'activity_label' => 'Leistung',
            'date_time_label' => 'Datum und Uhrzeit',
            'to_label' => 'bis',
            'customer_title' => 'Kundeninformationen',
            'customer_name_label' => 'Vor- und Nachname',
            'customer_email_label' => 'E-Mail',
            'customer_phone_label' => 'Telefon',
            'note_label' => 'Hinweis',
            'actions' => [
                'back' => 'Zurück zur Buchungsseite',
                'print' => 'Seite drucken',
                'calendar' => 'In Ihren Kalender importieren',
            ],
            'fallback' => '—',
        ],
    ],
];