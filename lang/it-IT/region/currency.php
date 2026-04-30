<?php

return [
    'messages' => [
        'updated' => 'Stato della valuta aggiornato con successo.',
    ],

    'validation' => [
		'scope_required' => 'L’ambito è obbligatorio.',
		'scope_in' => 'Ambito di aggiornamento non valido.',

		'currency_ids_array' => 'La selezione delle valute deve essere un array valido.',
		'currency_ids_integer' => 'Ogni identificatore di valuta deve essere un numero intero.',
		'currency_ids_exists' => 'Una o più valute selezionate non esistono.',
		'currency_ids_required' => 'Deve essere selezionata almeno una valuta.',
		'currency_ids_single' => 'Per l’ambito singolo deve essere fornita esattamente una valuta.',

		'is_active_required' => 'L’indicatore di stato è obbligatorio.',
		'is_active_boolean' => 'L’indicatore di stato deve essere vero o falso.',
	],

    'view' => [
        'currencies' => 'Valute',
        'description' => 'Gestisca le valute disponibili nel suo spazio di lavoro. Solo le valute attive saranno offerte nelle selezioni relative alle valute.',

        'table' => [
            'name' => 'Nome',
            'decimal' => 'Decimali',
            'symbol' => 'Simbolo',
            'status' => 'Stato',
            'action' => 'Azione',
            'active' => 'Attiva',
            'inactive' => 'Inattiva',
            'activate' => 'Attiva',
            'deactivate' => 'Disattiva',
        ],

        'actions' => [
            'selected' => 'selezionata/e',
            'activate_selected' => 'Attiva selezionate',
            'deactivate_selected' => 'Disattiva selezionate',
            'set_all_active' => 'Attiva tutte',
            'set_all_inactive' => 'Disattiva tutte',
        ],

        'alerts' => [
            'future_behavior_note' => 'Queste impostazioni di valuta sono preparate per future funzionalità di prezzo e regione. Per ora non influiscono sul comportamento attuale del suo spazio di prenotazione.',
        ],
    ],
];
