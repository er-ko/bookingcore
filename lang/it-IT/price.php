<?php

return [
    'messages' => [
        'created'   => 'Prezzo creato con successo.',
        'updated'   => 'Prezzo aggiornato con successo.',
        'deleted'   => 'Prezzo eliminato con successo.',
        'failed'    => 'Impossibile elaborare la richiesta relativa al prezzo.',
    ],

    'validation' => [
        'branch_required' => 'Selezioni una sede.',
        'branch_invalid' => 'La sede selezionata non è valida.',
        'branch_not_found' => 'La sede selezionata non è stata trovata.',

        'unit_required' => 'Selezioni un’unità.',
        'unit_invalid' => 'L’unità selezionata non è valida.',
        'unit_not_found' => 'L’unità selezionata non è stata trovata.',

        'activity_required' => 'Selezioni un’attività.',
        'activity_invalid' => 'L’attività selezionata non è valida.',
        'activity_not_found' => 'L’attività selezionata non è stata trovata.',

        'price_already_exists' => 'Esiste già un prezzo per l’unità e l’attività selezionate.',
        'price_not_found' => 'Il prezzo selezionato non è stato trovato.',
        'price_required' => 'Inserisca un prezzo.',
        'price_invalid' => 'Il prezzo deve essere un numero valido.',
        'price_min' => 'Il prezzo deve essere uguale o maggiore di zero.',
    ],

    'view' => [
        'title' => 'Prezzi',
        'description' => 'Imposti il prezzo predefinito per ogni attività all’interno di un’unità specifica.',

        'form' => [
            'title' => 'Impostazioni prezzo',
            'branch_title' => 'Sede',
            'branch_placeholder' => 'Seleziona sede',
            'unit_title' => 'Unità',
            'unit_placeholder' => 'Seleziona unità',
            'activity_title' => 'Attività',
            'activity_placeholder' => 'Seleziona attività',
            'price_title' => 'Prezzo',
            'price_placeholder' => 'Inserisci prezzo',
            'currency_title' => 'Valuta',
            'currency_text' => 'I prezzi vengono salvati nella sua valuta predefinita.',
        ],

        'table' => [
            'title' => 'Prezzi salvati',
            'branch_title' => 'Sede',
            'unit_title' => 'Unità',
            'activity_title' => 'Attività',
            'price_title' => 'Prezzo',
            'actions_title' => 'Azioni',
        ],

        'actions' => [
            'save' => 'Salva prezzo',
            'saving' => 'Salvataggio...',
            'edit' => 'Modifica',
            'update' => 'Aggiorna',
            'updating' => 'Aggiornamento...',
            'delete' => 'Elimina',
            'cancel' => 'Annulla',
            'deleting' => 'Eliminazione...',
        ],

        'states' => [
            'empty_title' => 'Ancora nessun prezzo',
            'empty_text' => 'Crei il primo prezzo per una combinazione di unità e attività.',
            'no_branches_title' => 'Nessuna configurazione prezzi disponibile',
            'no_branches_text' => 'Crei prima una sede per iniziare a impostare i prezzi.',
            'no_units_text' => 'Non sono disponibili unità per la sede selezionata.',
            'no_activities_text' => 'Non sono disponibili attività.',
        ],

        'dialogs' => [
            'delete_confirm' => 'È sicuro di voler eliminare questo prezzo?',
        ],
    ],
];
