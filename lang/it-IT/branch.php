<?php

return [
    'messages' => [
        'created'   => 'Sede creata con successo.',
        'updated'   => 'Sede aggiornata con successo.',
        'deleted'   => 'Sede eliminata con successo.',
        'failed'    => 'Impossibile elaborare la richiesta relativa alla sede.',
        'not_found' => 'Sede non trovata.',
        'has_units' => 'La sede non può essere eliminata perché contiene ancora unità.',
        'has_bookings' => 'La sede non può essere eliminata perché contiene ancora prenotazioni.',
		'limit_reached' => 'Ha raggiunto il numero massimo consentito di sedi.',
    ],

    'validation' => [
        'name_required' => 'Il nome della sede è obbligatorio.',
        'name_max' => 'Il nome della sede non può superare 255 caratteri.',

        'address_line_1_max' => 'La riga indirizzo 1 non può superare 255 caratteri.',
        'address_line_2_max' => 'La riga indirizzo 2 non può superare 255 caratteri.',

        'city_max' => 'La città non può superare 255 caratteri.',
        'postcode_max' => 'Il codice postale non può superare 32 caratteri.',

        'country_code_size' => 'Il codice paese deve contenere esattamente 2 caratteri.',

        'timezone_required' => 'Il fuso orario è obbligatorio.',
        'timezone_max' => 'Il fuso orario non può superare 64 caratteri.',

        'is_active_required' => 'Lo stato attivo è obbligatorio.',
        'is_active_boolean' => 'Lo stato attivo deve essere vero o falso.',
    ],

    'view' => [
        'title' => 'Sede',
        'branches' => 'Sedi',
        'create_branch' => 'Crea sede',
        'edit_branch' => 'Modifica sede',
        'index_description' => 'Gestisca le sue sedi, inclusi dettagli dell’indirizzo, fuso orario e stato attivo.',
        'create_description' => 'Crei una nuova sede con dettagli dell’indirizzo, fuso orario e stato di attivazione.',
        'edit_description' => 'Aggiorni i dettagli della sede, l’indirizzo, il fuso orario e lo stato di attivazione.',
        'back_to_branches' => 'Torna alle sedi',
        'create_first_branch' => 'Crea la sua prima sede',
        'no_branches_found' => 'Nessuna sede trovata.',
        'no_branches_text' => 'Non ci sono ancora sedi da visualizzare. Crei la prima sede per iniziare a organizzare la sua struttura di prenotazione.',

        'table' => [
            'branch' => 'Sede',
            'address' => 'Indirizzo',
            'city' => 'Città',
            'timezone' => 'Fuso orario',
            'no_address_text' => 'Nessun indirizzo specificato',
            'status' => 'Stato',
            'updated' => 'Aggiornato',
            'actions' => 'Azioni',
            'active' => 'Attiva',
            'inactive' => 'Inattiva',
        ],

        'overview' => [
            'title' => 'Riepilogo della sede',
            'branch_id_title' => 'ID sede',
            'countries_available_title' => 'Paesi disponibili',
            'city_and_postcode_title' => 'Città e codice postale',
            'country_and_timezone_title' => 'Paese e fuso orario',
            'timezone_title' => 'Fuso orario',
            'timezone_text' => 'In base al paese selezionato',
            'limit_title' => 'Limite',
            'limit_text' => 'Può creare fino a 10 sedi.',
            'duration_text' => 'Imposti la posizione della sede e le impostazioni regionali predefinite.',
            'required_title' => 'Obbligatorio',
            'optional_title' => 'Opzionale',
            'status_title' => 'Stato attuale',
            'active_title' => 'Attiva',
            'inactive_title' => 'Inattiva',
            'note_title' => 'Nota',
            'note_text' => 'L’aggiornamento di questa sede non influirà sulle altre sedi nel sistema.',
        ],

        'form' => [
            'branch_details' => 'Dettagli della sede',
            'complete_the_form' => 'Completi il modulo',
            'update_the_form' => 'Aggiorni il modulo',
            'branch_name_title' => 'Nome della sede',
            'address_line_1_title' => 'Riga indirizzo 1',
            'address_line_2_title' => 'Riga indirizzo 2',
            'city_title' => 'Città',
            'postcode_title' => 'Codice postale',
            'country_title' => 'Paese',
            'select_country' => 'Seleziona un paese',
            'timezone_title' => 'Fuso orario',
            'select_timezone' => 'Seleziona un fuso orario',
            'loading_timezones' => 'Caricamento fusi orari...',
            'active_title' => 'Sede attiva',
            'active_text' => 'Le sedi inattive possono restare salvate nel sistema senza essere utilizzate attivamente.',
        ],

        'actions' => [
            'edit' => 'Modifica',
            'delete' => 'Elimina',
            'cancel' => 'Annulla',
            'create' => 'Crea sede',
            'creating' => 'Creazione...',
            'save' => 'Salva modifiche',
            'saving' => 'Salvataggio...',
        ],

        'alerts' => [
            'delete_confirmation' => 'È sicuro di voler eliminare questa sede?',
        ],

    ],
];
