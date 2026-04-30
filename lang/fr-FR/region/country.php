<?php

return [
    'messages' => [
        'updated' => 'Le statut du pays a été mis à jour avec succès.',
    ],

    'validation' => [
        'scope_required' => 'La portée est obligatoire.',
        'scope_in' => 'La portée de mise à jour n’est pas valide.',

        'country_ids_array' => 'La sélection de pays doit être un tableau valide.',
        'country_ids_integer' => 'Chaque identifiant de pays doit être un nombre entier.',
        'country_ids_exists' => 'Un ou plusieurs pays sélectionnés n’existent pas.',
        'country_ids_required' => 'Au moins un pays doit être sélectionné.',
        'country_ids_single' => 'Un seul pays doit être fourni pour la portée individuelle.',

        'is_active_required' => 'L’indicateur de statut est obligatoire.',
        'is_active_boolean' => 'L’indicateur de statut doit être vrai ou faux.',
    ],

    'view' => [
        'countries' => 'Pays',
        'description' => 'Gérez les pays disponibles dans votre espace de réservation.',

        'table' => [
            'official_name' => 'Nom officiel',
            'language' => 'Langue',
            'currency' => 'Devise',
            'phone_code' => 'Indicatif téléphonique',
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
            'future_behavior_note' => 'Ces paramètres de pays sont préparés pour de futures fonctionnalités régionales. Pour le moment, ils n’affectent pas le comportement actuel de votre espace de réservation.',
        ],
    ],
];
