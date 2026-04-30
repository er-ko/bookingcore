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
		'created' => 'Prenotazione creata con successo.',
		'failed' => 'Impossibile creare la prenotazione.',
		'cancelled' => 'Prenotazione annullata con successo.',
		'status_updated' => 'Stato della prenotazione aggiornato con successo.',
        'not_found' => 'La prenotazione selezionata non è stata trovata.',
    ],

	'validation' => [
		'branch_required' => 'La sede è obbligatoria.',
        'branch_invalid' => 'L’identificatore della sede non è valido.',
        'branch_not_found' => 'La sede selezionata non esiste.',

        'unit_required' => 'L’unità è obbligatoria.',
        'unit_invalid' => 'L’identificatore dell’unità non è valido.',
        'unit_not_found' => 'L’unità selezionata non esiste.',

        'activity_required' => 'L’attività è obbligatoria.',
        'activity_invalid' => 'L’identificatore dell’attività non è valido.',
        'activity_not_found' => 'L’attività selezionata non esiste.',
        'activity_not_available_for_unit' => 'L’attività selezionata non è disponibile per l’unità selezionata.',

        'starts_at_required' => 'L’ora di inizio è obbligatoria.',
        'starts_at_invalid' => 'Il formato dell’ora di inizio non è valido.',

        'customer_required' => 'Le informazioni del cliente sono obbligatorie.',
        'customer_invalid' => 'Il formato dei dati del cliente non è valido.',

        'customer_first_name_required' => 'Il nome del cliente è obbligatorio.',
        'customer_first_name_invalid' => 'Il nome del cliente deve essere un testo valido.',
        'customer_first_name_too_long' => 'Il nome del cliente è troppo lungo.',

        'customer_last_name_required' => 'Il cognome del cliente è obbligatorio.',
        'customer_last_name_invalid' => 'Il cognome del cliente deve essere un testo valido.',
        'customer_last_name_too_long' => 'Il cognome del cliente è troppo lungo.',

        'customer_email_required' => 'L’e-mail del cliente è obbligatoria.',
        'customer_email_invalid' => 'L’e-mail del cliente deve essere un indirizzo valido.',
        'customer_email_too_long' => 'L’e-mail del cliente è troppo lunga.',

        'customer_phone_code_required' => 'Il prefisso telefonico è obbligatorio.',
        'customer_phone_code_invalid' => 'Il prefisso telefonico deve essere un testo valido.',
        'customer_phone_code_too_long' => 'Il prefisso telefonico è troppo lungo.',

        'customer_phone_required' => 'Il numero di telefono è obbligatorio.',
        'customer_phone_invalid' => 'Il numero di telefono deve essere un testo valido.',
        'customer_phone_too_long' => 'Il numero di telefono è troppo lungo.',

        'note_invalid' => 'La nota deve essere un testo valido.',

        'status_required' => 'Lo stato della prenotazione è obbligatorio.',
        'status_invalid' => 'Il formato dello stato della prenotazione non è valido.',
        'status_not_allowed' => 'Lo stato della prenotazione selezionato non è consentito.',

        'date_required' => 'La data è obbligatoria.',
        'date_invalid' => 'Il formato della data non è valido.',
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

        'overview' => [
            'title' => 'Riepilogo della prenotazione',

            'customer_title' => 'Dettagli del cliente',
            'customer_text' => 'Inserisca le informazioni del cliente necessarie per creare la prenotazione.',

            'booking_flow_title' => 'Flusso di prenotazione',
            'booking_flow_text' => 'Selezioni una sede, poi un’unità, quindi un’attività, una data e una fascia oraria disponibile.',

            'availability_title' => 'Disponibilità',
            'availability_text' => 'Le fasce orarie disponibili vengono caricate in base alla sede, all’unità, all’attività e alla data selezionate.',

            'required_title' => 'Obbligatorio',
            'required_items' => [
                'first_and_last_name' => 'Nome e cognome',
                'phone_code_and_number' => 'Prefisso e numero di telefono',
                'branch' => 'Sede',
                'unit' => 'Unità',
                'activity' => 'Attività',
                'date' => 'Data',
                'slot' => 'Fascia disponibile',
            ],

            'optional_title' => 'Opzionale',
            'optional_items' => [
                'email' => 'E-mail',
                'note' => 'Nota',
            ],

            'note_title' => 'Nota',
            'note_text' => 'Una prenotazione può essere creata solo dopo aver selezionato una fascia oraria disponibile valida.',
        ],

        'form' => [
            'booking_details' => 'Dettagli della prenotazione',
            'complete_the_reservation' => 'Completi la prenotazione',
            'customer_details' => 'Dettagli del cliente',
            'first_name_title' => 'Nome',
            'last_name_title' => 'Cognome',
            'email_title' => 'E-mail',
            'phone_code_title' => 'Prefisso',
            'phone_title' => 'Telefono',
            'branch_title' => 'Sede',
            'select_branch' => 'Seleziona una sede',
            'unit_title' => 'Unità',
            'select_unit' => 'Seleziona un’unità',
            'loading_units' => 'Caricamento unità...',
            'activity_title' => 'Attività',
            'select_activity' => 'Seleziona un’attività',
            'loading_activities' => 'Caricamento attività...',
            'date_title' => 'Data',
            'available_slots_title' => 'Fasce disponibili',
            'available_slots_count' => 'fascia/e disponibile/i',
            'loading_slots' => 'Caricamento fasce...',
            'no_available_slots' => 'Non sono state trovate fasce disponibili per la data selezionata.',
            'select_slot' => 'Seleziona una fascia',
            'note_title' => 'Nota',
        ],

        'actions' => [
            'confirm' => 'Conferma',
            'complete' => 'Completa',
            'cancel' => 'Annulla',
            'create' => 'Crea prenotazione',
            'creating' => 'Creazione...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'È sicuro di voler annullare questa prenotazione?',
        ],

    ],
];
