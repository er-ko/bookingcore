<?php

return [
    'messages' => [
        'updated' => 'Stato del paese aggiornato con successo.',
    ],

    'validation' => [
        'scope_required' => 'L’ambito è obbligatorio.',
        'scope_in' => 'Ambito di aggiornamento non valido.',

        'country_ids_array' => 'La selezione dei paesi deve essere un array valido.',
        'country_ids_integer' => 'Ogni identificatore di paese deve essere un numero intero.',
        'country_ids_exists' => 'Uno o più paesi selezionati non esistono.',
        'country_ids_required' => 'Deve essere selezionato almeno un paese.',
        'country_ids_single' => 'Per l’ambito singolo deve essere fornito esattamente un paese.',

        'is_active_required' => 'L’indicatore di stato è obbligatorio.',
        'is_active_boolean' => 'L’indicatore di stato deve essere vero o falso.',
    ],

    'view' => [
        'countries' => 'Paesi',
        'description' => 'Gestisca i paesi disponibili nel suo spazio di prenotazione.',

        'table' => [
            'official_name' => 'Nome ufficiale',
            'language' => 'Lingua',
            'currency' => 'Valuta',
            'phone_code' => 'Prefisso telefonico',
            'status' => 'Stato',
            'action' => 'Azione',
            'active' => 'Attivo',
            'inactive' => 'Inattivo',
            'activate' => 'Attiva',
            'deactivate' => 'Disattiva',
        ],

        'actions' => [
            'selected' => 'selezionato/i',
            'activate_selected' => 'Attiva selezionati',
            'deactivate_selected' => 'Disattiva selezionati',
            'set_all_active' => 'Attiva tutti',
            'set_all_inactive' => 'Disattiva tutti',
        ],
        
        'alerts' => [
            'future_behavior_note' => 'Queste impostazioni dei paesi sono preparate per future funzionalità regionali. Per ora non influiscono sul comportamento attuale del suo spazio di prenotazione.',
        ],
    ],
];
