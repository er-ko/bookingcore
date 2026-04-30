<?php

return [
    'messages' => [
        'updated' => 'Le statut de la devise a été mis à jour avec succès.',
    ],

    'validation' => [
		'scope_required' => 'La portée est obligatoire.',
		'scope_in' => 'La portée de mise à jour n’est pas valide.',

		'currency_ids_array' => 'La sélection de devises doit être un tableau valide.',
		'currency_ids_integer' => 'Chaque identifiant de devise doit être un nombre entier.',
		'currency_ids_exists' => 'Une ou plusieurs devises sélectionnées n’existent pas.',
		'currency_ids_required' => 'Au moins une devise doit être sélectionnée.',
		'currency_ids_single' => 'Une seule devise doit être fournie pour la portée individuelle.',

		'is_active_required' => 'L’indicateur de statut est obligatoire.',
		'is_active_boolean' => 'L’indicateur de statut doit être vrai ou faux.',
	],

    'view' => [
        'currencies' => 'Devises',
        'description' => 'Gérez les devises disponibles dans votre espace de travail. Seules les devises actives seront proposées dans les sélections liées aux devises.',

        'table' => [
            'name' => 'Nom',
            'decimal' => 'Décimales',
            'symbol' => 'Symbole',
            'status' => 'Statut',
            'action' => 'Action',
            'active' => 'Actif',
            'inactive' => 'Inactif',
            'activate' => 'Activer',
            'deactivate' => 'Désactiver',
        ],

        'actions' => [
            'selected' => 'sélectionné(s)',
            'activate_selected' => 'Activer la sélection',
            'deactivate_selected' => 'Désactiver la sélection',
            'set_all_active' => 'Tout activer',
            'set_all_inactive' => 'Tout désactiver',
        ],

        'alerts' => [
            'future_behavior_note' => 'Ces paramètres de devise sont préparés pour de futures fonctionnalités de tarification et de région. Pour le moment, ils n’affectent pas le comportement actuel de votre espace de réservation.',
        ],
    ],
];
