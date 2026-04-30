<?php

return [
	'errors' => [
		'activity_inactive' => 'L’attività selezionata non esiste o è inattiva.',
		'unit_invalid' => 'L’unità selezionata non esiste, è inattiva o non appartiene alla sede indicata.',
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
];
