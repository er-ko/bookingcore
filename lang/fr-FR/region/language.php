<?php

return [
    'messages' => [
        'updated' => 'Le statut de la langue a été mis à jour avec succès.',
    ],

    'validation' => [
		'scope_required' => 'La portée est obligatoire.',
		'scope_in' => 'La portée de mise à jour n’est pas valide.',

		'language_ids_array' => 'La sélection de langues doit être un tableau valide.',
		'language_ids_integer' => 'Chaque identifiant de langue doit être un nombre entier.',
		'language_ids_exists' => 'Une ou plusieurs langues sélectionnées n’existent pas.',
		'language_ids_required' => 'Au moins une langue doit être sélectionnée.',
		'language_ids_single' => 'Une seule langue doit être fournie pour la portée individuelle.',

		'is_active_required' => 'L’indicateur de statut est obligatoire.',
		'is_active_boolean' => 'L’indicateur de statut doit être vrai ou faux.',
	],

    'view' => [
        'languages' => 'Langues',
        'description' => 'Gérez les langues disponibles dans votre espace de travail. Seules les langues actives seront proposées dans les sélections liées aux langues.',

        'table' => [
            'name' => 'Nom',
            'local_name' => 'Nom local',
            'tag' => 'Balise',
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
            'future_behavior_note' => 'Ces paramètres de langue sont préparés pour de futures fonctionnalités multilingues. Pour le moment, ils n’affectent pas le comportement actuel de votre espace de réservation.',
        ],
    ],
];
