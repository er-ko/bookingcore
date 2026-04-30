<?php

return [
    'errors' => [
        'activity_inactive' => 'De geselecteerde activiteit bestaat niet of is inactief.',
        'unit_invalid' => 'De geselecteerde unit bestaat niet, is inactief of behoort niet tot de opgegeven vestiging.',
        'activity_not_assigned' => 'De geselecteerde activiteit is niet aan de geselecteerde unit toegewezen.',
        'activity_not_available_for_unit' => 'De geselecteerde activiteit is niet beschikbaar voor de geselecteerde unit.',
        'unit_already_booked' => 'De geselecteerde unit is al geboekt voor de opgegeven periode.',
        'booking_conflict' => 'De boeking conflicteert met een bestaande reservering.',
        'slot_overlap' => 'Het geselecteerde boekingstijdslot overlapt met een bestaande reservering.',
        'outside_working_hours' => 'Het geselecteerde boekingstijdslot valt buiten de werktijden.',
        'during_time_off' => 'Het geselecteerde boekingstijdslot valt binnen een geblokkeerde afwezigheidsperiode.',
        'already_cancelled' => 'De boeking is al geannuleerd.',
        'cancelled_cannot_be_updated' => 'Geannuleerde boekingen kunnen niet worden bijgewerkt.',
        'same_status' => 'De boeking is al gemarkeerd als :status.',
        'use_cancel_action' => 'Gebruik de actie voor het annuleren van een boeking om een boeking te annuleren.',
        'invalid_activity_minutes' => 'Het aantal minuten voor de activiteit moet groter zijn dan nul.',
        'negative_buffer_minutes' => 'Bufferminuten mogen niet negatief zijn.',
        'invalid_slot_block' => 'Het totale tijdslotblok moet groter zijn dan nul.',
        'invalid_total_slot_block' => 'Het totale tijdslotblok moet groter zijn dan nul.',
        'invalid_time_range' => 'Het begin van de periode moet eerder zijn dan het einde.',
        'invalid_day_of_week' => 'Ongeldige dag van de week: :value',
        'invalid_booking_status' => 'Ongeldige boekingsstatus: :value',
    ],

    'messages' => [
        'created' => 'Boeking succesvol aangemaakt.',
        'failed' => 'Het aanmaken van de boeking is mislukt.',
        'cancelled' => 'Boeking succesvol geannuleerd.',
        'status_updated' => 'Boekingsstatus succesvol bijgewerkt.',
        'not_found' => 'De geselecteerde boeking is niet gevonden.',
    ],

    'validation' => [
        'branch_required' => 'De vestiging is verplicht.',
        'branch_invalid' => 'De vestigings-ID is ongeldig.',
        'branch_not_found' => 'De geselecteerde vestiging bestaat niet.',

        'unit_required' => 'De unit is verplicht.',
        'unit_invalid' => 'De unit-ID is ongeldig.',
        'unit_not_found' => 'De geselecteerde unit bestaat niet.',

        'activity_required' => 'De activiteit is verplicht.',
        'activity_invalid' => 'De activiteit-ID is ongeldig.',
        'activity_not_found' => 'De geselecteerde activiteit bestaat niet.',
        'activity_not_available_for_unit' => 'De geselecteerde activiteit is niet beschikbaar voor de geselecteerde unit.',

        'starts_at_required' => 'De starttijd is verplicht.',
        'starts_at_invalid' => 'Het formaat van de starttijd is ongeldig.',

        'customer_required' => 'Klantinformatie is verplicht.',
        'customer_invalid' => 'Het formaat van de klantgegevens is ongeldig.',

        'customer_first_name_required' => 'De voornaam van de klant is verplicht.',
        'customer_first_name_invalid' => 'De voornaam van de klant moet een tekst zijn.',
        'customer_first_name_too_long' => 'De voornaam van de klant is te lang.',

        'customer_last_name_required' => 'De achternaam van de klant is verplicht.',
        'customer_last_name_invalid' => 'De achternaam van de klant moet een tekst zijn.',
        'customer_last_name_too_long' => 'De achternaam van de klant is te lang.',

        'customer_email_required' => 'Het e-mailadres van de klant is verplicht.',
        'customer_email_invalid' => 'Het e-mailadres van de klant moet een geldig e-mailadres zijn.',
        'customer_email_too_long' => 'Het e-mailadres van de klant is te lang.',

        'customer_phone_code_required' => 'De telefooncode is verplicht.',
        'customer_phone_code_invalid' => 'De telefooncode moet een tekst zijn.',
        'customer_phone_code_too_long' => 'De telefooncode is te lang.',

        'customer_phone_required' => 'Het telefoonnummer is verplicht.',
        'customer_phone_invalid' => 'Het telefoonnummer moet een tekst zijn.',
        'customer_phone_too_long' => 'Het telefoonnummer is te lang.',

        'note_invalid' => 'De opmerking moet een tekst zijn.',

        'status_required' => 'De boekingsstatus is verplicht.',
        'status_invalid' => 'Het formaat van de boekingsstatus is ongeldig.',
        'status_not_allowed' => 'De geselecteerde boekingsstatus is niet toegestaan.',

        'date_required' => 'De datum is verplicht.',
        'date_invalid' => 'Het datumformaat is ongeldig.',
    ],

    'view' => [
        'title' => 'Dashboard',
        'create_booking' => 'Boeking aanmaken',
        'edit_booking' => 'Boeking bewerken',
        'index_description' => 'Overzicht van aangemaakte boekingen, inclusief hun huidige status en gerelateerde entiteiten.',
        'create_description' => 'Maak een nieuwe boeking aan met klantgegevens, serviceselectie en een beschikbaar tijdslot.',
        'edit_description' => 'Werk boekingsgegevens, klantinformatie en boekingsstatus bij.',
        'back_to_dashboard' => 'Terug naar dashboard',
        'create_first_booking' => 'Maak uw eerste boeking aan',
        'no_bookings_found' => 'Geen boekingen gevonden.',
        'no_bookings_text' => 'Er zijn nog geen boekingen om weer te geven. Maak de eerste boeking aan om met het systeem te beginnen.',

        'table' => [
            'customer' => 'Klant',
            'branch' => 'Vestiging',
            'unit' => 'Unit',
            'activity' => 'Activiteit',
            'starts_at' => 'Begint om',
            'ends_at' => 'Eindigt om',
            'status' => 'Status',
            'actions' => 'Acties',
            'active' => 'Actief',
            'inactive' => 'Inactief',
        ],

        'overview' => [
            'title' => 'Boekingsoverzicht',

            'customer_title' => 'Klantgegevens',
            'customer_text' => 'Voer de klantinformatie in die nodig is om de boeking aan te maken.',

            'booking_flow_title' => 'Boekingsproces',
            'booking_flow_text' => 'Selecteer een vestiging, daarna een unit, vervolgens een activiteit, datum en beschikbaar tijdslot.',

            'availability_title' => 'Beschikbaarheid',
            'availability_text' => 'Beschikbare tijdsloten worden geladen op basis van de geselecteerde vestiging, unit, activiteit en datum.',

            'required_title' => 'Verplicht',
            'required_items' => [
                'first_and_last_name' => 'Voor- en achternaam',
                'phone_code_and_number' => 'Telefooncode en telefoonnummer',
                'branch' => 'Vestiging',
                'unit' => 'Unit',
                'activity' => 'Activiteit',
                'date' => 'Datum',
                'slot' => 'Beschikbaar tijdslot',
            ],

            'optional_title' => 'Optioneel',
            'optional_items' => [
                'email' => 'E-mail',
                'note' => 'Opmerking',
            ],

            'note_title' => 'Opmerking',
            'note_text' => 'Een boeking kan alleen worden aangemaakt nadat een geldig beschikbaar tijdslot is geselecteerd.',
        ],

        'form' => [
            'booking_details' => 'Boekingsgegevens',
            'complete_the_reservation' => 'Voltooi de reservering',
            'customer_details' => 'Klantgegevens',
            'first_name_title' => 'Voornaam',
            'last_name_title' => 'Achternaam',
            'email_title' => 'E-mail',
            'phone_code_title' => 'Code',
            'phone_title' => 'Telefoon',
            'branch_title' => 'Vestiging',
            'select_branch' => 'Selecteer een vestiging',
            'unit_title' => 'Unit',
            'select_unit' => 'Selecteer een unit',
            'loading_units' => 'Units worden geladen...',
            'activity_title' => 'Activiteit',
            'select_activity' => 'Selecteer een activiteit',
            'loading_activities' => 'Activiteiten worden geladen...',
            'date_title' => 'Datum',
            'available_slots_title' => 'Beschikbare tijdsloten',
            'available_slots_count' => 'beschikbaar tijdslot / beschikbare tijdsloten',
            'loading_slots' => 'Tijdsloten worden geladen...',
            'no_available_slots' => 'Er zijn geen beschikbare tijdsloten gevonden voor de geselecteerde datum.',
            'select_slot' => 'Selecteer een tijdslot',
            'note_title' => 'Opmerking',
        ],

        'actions' => [
            'confirm' => 'Bevestigen',
            'complete' => 'Voltooien',
            'cancel' => 'Annuleren',
            'create' => 'Boeking aanmaken',
            'creating' => 'Bezig met aanmaken...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Weet u zeker dat u deze boeking wilt annuleren?',
        ],

    ],
];