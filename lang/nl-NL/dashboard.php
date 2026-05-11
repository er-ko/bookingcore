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
        'cancelled' => 'Boeking succesvol geannuleerd.',
        'status_updated' => 'Boekingsstatus succesvol bijgewerkt.',
    ],

    'validation' => [
        'status_required' => 'De boekingsstatus is verplicht.',
        'status_invalid' => 'Het formaat van de boekingsstatus is ongeldig.',
        'status_not_allowed' => 'De geselecteerde boekingsstatus is niet toegestaan.',
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

        'actions' => [
            'confirm' => 'Bevestigen',
            'complete' => 'Voltooien',
            'cancel' => 'Annuleren',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Weet u zeker dat u deze boeking wilt annuleren?',
        ],

    ],
];