<?php

return [
    'messages' => [
        'updated' => 'Stato della lingua aggiornato con successo.',
    ],

    'validation' => [
		'scope_required' => 'L’ambito è obbligatorio.',
		'scope_in' => 'Ambito di aggiornamento non valido.',

		'language_ids_array' => 'La selezione delle lingue deve essere un array valido.',
		'language_ids_integer' => 'Ogni identificatore di lingua deve essere un numero intero.',
		'language_ids_exists' => 'Una o più lingue selezionate non esistono.',
		'language_ids_required' => 'Deve essere selezionata almeno una lingua.',
		'language_ids_single' => 'Per l’ambito singolo deve essere fornita esattamente una lingua.',

		'is_active_required' => 'L’indicatore di stato è obbligatorio.',
		'is_active_boolean' => 'L’indicatore di stato deve essere vero o falso.',
	],

    'view' => [
        'languages' => 'Lingue',
        'description' => 'Gestisca le lingue disponibili nel suo spazio di lavoro. Solo le lingue attive saranno offerte nelle selezioni relative alle lingue.',

        'table' => [
            'name' => 'Nome',
            'local_name' => 'Nome locale',
            'tag' => 'Tag',
            'status' => 'Stato',
            'action' => 'Azione',
            'active' => 'Attiva',
            'inactive' => 'Inattiva',
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
            'future_behavior_note' => 'Queste impostazioni linguistiche sono preparate per future funzionalità multilingue. Per ora non influiscono sul comportamento attuale del suo spazio di prenotazione.',
        ],
    ],
];
