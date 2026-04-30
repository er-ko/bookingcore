<?php

return [
    'messages' => [
        'created'   => 'Attività creata con successo.',
        'updated'   => 'Attività aggiornata con successo.',
        'deleted'   => 'Attività eliminata con successo.',
        'failed'    => 'Impossibile elaborare la richiesta relativa all’attività.',
        'not_found' => 'Attività non trovata.',
        'limit_reached' => 'Ha raggiunto il numero massimo consentito di attività.',
    ],

    'validation' => [
        'name_required' => 'Il nome dell’attività è obbligatorio.',
        'name_max' => 'Il nome dell’attività non può superare 255 caratteri.',

        'duration_required' => 'La durata è obbligatoria.',
        'duration_integer' => 'La durata deve essere un numero intero di minuti.',
        'duration_min' => 'La durata deve essere di almeno 1 minuto.',
        'duration_max' => 'La durata non può superare 1200 minuti.',

        'buffer_before_integer' => 'Il margine precedente deve essere un numero intero di minuti.',
        'buffer_before_min' => 'Il margine precedente deve essere di almeno 0 minuti.',
        'buffer_before_max' => 'Il margine precedente non può superare 60 minuti.',

        'buffer_after_integer' => 'Il margine successivo deve essere un numero intero di minuti.',
        'buffer_after_min' => 'Il margine successivo deve essere di almeno 0 minuti.',
        'buffer_after_max' => 'Il margine successivo non può superare 60 minuti.',

        'is_active_required' => 'Lo stato attivo è obbligatorio.',
        'is_active_boolean' => 'Lo stato attivo deve essere vero o falso.',
    ],

    'view' => [
        'title' => 'Attività',
        'activities' => 'Attività',
        'create_activity' => 'Crea attività',
        'edit_activity' => 'Modifica attività',
        'index_description' => 'Gestisca le attività che possono essere prenotate nelle sue unità.',
        'create_description' => 'Definisca una nuova attività, incluse durata, margini e stato attivo.',
        'edit_description' => 'Aggiorni i dettagli di un’attività esistente, incluse durata, margini e stato attivo.',
        'back_to_activities' => 'Torna alle attività',
        'create_first_activity' => 'Crea la sua prima attività',
        'no_activities_found' => 'Nessuna attività trovata.',
        'no_activities_text' => 'Non ci sono ancora attività da visualizzare. Crei la prima attività per iniziare a organizzare la sua struttura di prenotazione.',

        'table' => [
            'name' => 'Nome',
            'status' => 'Stato',
            'updated' => 'Aggiornato',
            'actions' => 'Azioni',
            'duration' => 'Durata',
            'min' => 'min',
            'active' => 'Attiva',
            'inactive' => 'Inattiva',
        ],

        'overview' => [
            'title' => 'Riepilogo dell’attività',
            'activity_id_title' => 'ID attività',
            'duration_title' => 'Durata',
            'duration_text' => 'Imposti la durata dell’attività in minuti.',
            'buffer_time_title' => 'Tempo di margine',
            'buffer_time_text' => 'Aggiunga tempo opzionale prima e dopo l’attività per evitare sovrapposizioni troppo ravvicinate tra prenotazioni.',
            'required_title' => 'Obbligatorio',
            'optional_title' => 'Opzionale',
            'status_title' => 'Stato',
            'status_text' => 'Le attività inattive restano salvate nel sistema, ma non possono essere usate per nuove prenotazioni.',
            'active_title' => 'Attiva',
            'inactive_title' => 'Inattiva',
            'note_title' => 'Nota',
            'note_text' => 'L’aggiornamento di questa attività non influirà sulle altre attività nel sistema.',
        ],

        'form' => [
            'activity_details' => 'Dettagli dell’attività',
            'complete_the_form' => 'Completi il modulo',
            'update_the_form' => 'Aggiorni il modulo',
            'name_title' => 'Nome',
            'duration_title' => 'Durata (minuti)',
            'buffer_before_title' => 'Tempo di margine precedente (minuti)',
            'buffer_after_title' => 'Tempo di margine successivo (minuti)',
            'active_title' => 'Attività attiva',
            'active_text' => 'Le attività inattive restano salvate nel sistema, ma non possono essere usate per nuove prenotazioni.',
        ],

        'actions' => [
            'edit' => 'Modifica',
            'delete' => 'Elimina',
            'cancel' => 'Annulla',
            'create' => 'Crea attività',
            'creating' => 'Creazione...',
            'save' => 'Salva modifiche',
            'saving' => 'Salvataggio...',
        ],

        'alerts' => [
            'delete_confirmation' => 'È sicuro di voler eliminare questa attività?',
        ],

    ],
];
