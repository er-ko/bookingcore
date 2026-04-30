<?php

return [
    'view' => [
        'title' => 'Prenoti il suo appuntamento',
        'description' => 'Scelga la sede, il servizio, la data e l’orario più adatti a lei.',

        'form' => [
            'branch_title' => 'Sede',
            'branch_placeholder' => 'Seleziona sede',

            'unit_title' => 'Unità',
            'unit_placeholder' => 'Seleziona unità',

            'activity_title' => 'Attività',
            'activity_placeholder' => 'Seleziona attività',

            'date_title' => 'Data',
            'date_placeholder' => 'Seleziona data',

            'slot_title' => 'Orario disponibile',
            'slot_placeholder' => 'Seleziona orario',

            'first_name_title' => 'Nome',
            'first_name_placeholder' => 'Mario',

            'last_name_title' => 'Cognome',
            'last_name_placeholder' => 'Rossi',

            'email_title' => 'E-mail',
            'email_placeholder' => 'mario@example.com',

            'phone_code_title' => 'Prefisso telefonico',
            'phone_code_placeholder' => '+39',

            'phone_title' => 'Telefono',
            'phone_placeholder' => '3123456789',

            'note_title' => 'Nota',
            'note_placeholder' => 'Informazioni aggiuntive per la sua prenotazione',
        ],

        'content' => [
            'form_title' => 'Completi la sua prenotazione',
            'ready' => 'pronto',

            'appointment_title' => 'Dettagli dell’appuntamento',
            'appointment_text' => 'Scelga la sede, l’unità, il servizio, la data e la fascia oraria più adatti.',

            'customer_title' => 'Dettagli del cliente',
            'customer_text' => 'Aggiunga i dati di contatto necessari per confermare e identificare la prenotazione.',

            'note_title' => 'Nota aggiuntiva',
            'note_text' => 'Condivida qualsiasi informazione utile prima dell’inizio della prenotazione.',

            'review_title' => 'Verifichi i dettagli della prenotazione e confermi quando tutto è corretto.',
            'review_text' => 'Il riepilogo della prenotazione si aggiorna in tempo reale mentre compila il modulo.',
            'review_live_text' => ':selection/4 dettagli della prenotazione, :customer/4 dati di contatto',

            'summary_badge' => 'Riepilogo',
            'summary_progress' => 'Revisione della prenotazione',

            'branch_label' => 'Sede',
            'unit_label' => 'Unità',
            'activity_label' => 'Attività',
            'date_time_label' => 'Data / ora',
            'customer_label' => 'Cliente',
            'email_label' => 'E-mail',
            'phone_label' => 'Telefono',
            'note_label' => 'Nota',

            'summary_empty_selection' => 'Non ancora selezionato',
            'summary_empty_customer' => 'Non ancora compilato',

            'branch_status_title' => 'Stato della sede',
            'service_status_title' => 'Stato del servizio',
            'schedule_status_title' => 'Stato della pianificazione',
        ],

        'states' => [
            'no_branches_title' => 'Nessuna sede disponibile',
            'no_branches_text' => 'Al momento non sono disponibili sedi pubbliche per la prenotazione.',

            'no_units_title' => 'Nessuna unità disponibile',
            'no_units_text' => 'Al momento non sono disponibili unità per la sede selezionata.',

            'no_activities_title' => 'Nessuna attività disponibile',
            'no_activities_text' => 'Al momento non sono disponibili attività per l’unità selezionata.',

            'no_slots_title' => 'Nessuna fascia disponibile',
            'no_slots_text' => 'Non ci sono fasce di prenotazione disponibili per la data selezionata.',

            'branch_default' => 'Scelga il luogo in cui deve svolgersi la prenotazione.',
            'service_default' => 'Scelga il servizio dopo aver selezionato l’unità corretta.',
            'schedule_loading' => 'Verifica della disponibilità in tempo reale per il giorno selezionato.',
            'schedule_default' => 'Selezioni una data per caricare le fasce di prenotazione disponibili.',
        ],

        'actions' => [
            'submit' => 'Crea prenotazione',
            'submitting' => 'Creazione prenotazione...',
        ],

        'messages' => [
            'created' => 'Prenotazione creata con successo.',
            'failed' => 'Impossibile creare la prenotazione.',
        ],

        'detail' => [
            'title' => 'Dettagli della prenotazione',
            'badge_created' => 'Prenotazione creata',
            'status_label' => 'Stato',
            'heading' => 'La sua prenotazione è stata salvata',
            'description' => 'Salvi questa pagina per dopo, scarichi il file del calendario o stampi la conferma.',
            'details_title' => 'Dettagli della prenotazione',
            'branch_label' => 'Sede',
            'unit_label' => 'Unità',
            'activity_label' => 'Attività',
            'date_time_label' => 'Data e ora',
            'to_label' => 'a',
            'customer_title' => 'Informazioni del cliente',
            'customer_name_label' => 'Nome e cognome',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Telefono',
            'note_label' => 'Nota',
            'actions' => [
                'back' => 'Torna alla pagina di prenotazione',
                'print' => 'Stampa pagina',
                'calendar' => 'Importa nel suo calendario',
            ],
            'fallback' => '—',
        ],
    ],
];
