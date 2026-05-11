<?php

return [
	'errors' => [
		'activity_inactive' => 'L’attività selezionata non esiste o è inattiva.',
		'unit_invalid' => 'L’unità selezionata non esiste, è inattiva o non appartiene alla sede indicata.',
		'activity_not_assigned' => 'L’attività selezionata non è assegnata all’unità selezionata.',
        'activity_not_available_for_unit' => 'L’attività selezionata non è disponibile per l’unità selezionata.',
		'unit_already_booked' => 'L’unità selezionata è già prenotata per l’intervallo di tempo indicato.',
		'booking_conflict' => 'La prenotazione è in conflitto con una prenotazione esistente.',
		'slot_overlap' => 'La fascia di prenotazione selezionata si sovrappone a una prenotazione esistente.',
		'outside_working_hours' => 'La fascia di prenotazione selezionata è fuori dagli orari di lavoro.',
		'during_time_off' => 'La fascia di prenotazione selezionata rientra in un periodo di indisponibilità bloccato.',
		'already_cancelled' => 'La prenotazione è già annullata.',
		'cancelled_cannot_be_updated' => 'Le prenotazioni annullate non possono essere aggiornate.',
		'same_status' => 'La prenotazione è già contrassegnata come :status.',
		'use_cancel_action' => 'Usi l’azione di annullamento della prenotazione per annullare una prenotazione.',
		'invalid_activity_minutes' => 'I minuti dell’attività devono essere maggiori di zero.',
		'negative_buffer_minutes' => 'I minuti di margine non possono essere negativi.',
		'invalid_slot_block' => 'Il blocco totale della fascia deve essere maggiore di zero.',
		'invalid_total_slot_block' => 'Il blocco totale della fascia deve essere maggiore di zero.',
		'invalid_time_range' => 'L’inizio dell’intervallo di tempo deve precedere la fine.',
		'invalid_day_of_week' => 'Giorno della settimana non valido: :value',
		'invalid_booking_status' => 'Stato della prenotazione non valido: :value',
	],

    'messages' => [
		'cancelled' => 'Prenotazione annullata con successo.',
		'status_updated' => 'Stato della prenotazione aggiornato con successo.',
    ],

	'validation' => [
        'status_required' => 'Lo stato della prenotazione è obbligatorio.',
        'status_invalid' => 'Il formato dello stato della prenotazione non è valido.',
        'status_not_allowed' => 'Lo stato della prenotazione selezionato non è consentito.',
	],

	'view' => [
        'title' => 'Pannello',
        'create_booking' => 'Crea prenotazione',
        'edit_booking' => 'Modifica prenotazione',
        'index_description' => 'Riepilogo delle prenotazioni create, inclusi stato attuale ed entità correlate.',
        'create_description' => 'Crei una nuova prenotazione con i dettagli del cliente, la selezione del servizio e una fascia oraria disponibile.',
        'edit_description' => 'Aggiorni i dettagli della prenotazione, le informazioni del cliente e lo stato della prenotazione.',
        'back_to_dashboard' => 'Torna al pannello',
        'create_first_booking' => 'Crea la sua prima prenotazione',
        'no_bookings_found' => 'Nessuna prenotazione trovata.',
        'no_bookings_text' => 'Non ci sono ancora prenotazioni da visualizzare. Crei la prima prenotazione per iniziare a lavorare con il sistema.',

        'table' => [
            'customer' => 'Cliente',
            'branch' => 'Sede',
            'unit' => 'Unità',
            'activity' => 'Attività',
            'starts_at' => 'Inizia alle',
            'ends_at' => 'Termina alle',
            'status' => 'Stato',
            'actions' => 'Azioni',
            'active' => 'Attiva',
            'inactive' => 'Inattiva',
        ],

        'actions' => [
            'confirm' => 'Conferma',
            'complete' => 'Completa',
            'cancel' => 'Annulla',
        ],

        'alerts' => [
            'cancel_confirmation' => 'È sicuro di voler annullare questa prenotazione?',
        ],

    ],
];
