<?php

return [
    'messages' => [
        'created'   => 'Le prix a été créé avec succès.',
        'updated'   => 'Le prix a été mis à jour avec succès.',
        'deleted'   => 'Le prix a été supprimé avec succès.',
        'failed'    => 'Impossible de traiter la demande de prix.',
    ],

    'validation' => [
        'branch_required' => 'Veuillez sélectionner une succursale.',
        'branch_invalid' => 'La succursale sélectionnée n’est pas valide.',
        'branch_not_found' => 'La succursale sélectionnée est introuvable.',

        'unit_required' => 'Veuillez sélectionner une unité.',
        'unit_invalid' => 'L’unité sélectionnée n’est pas valide.',
        'unit_not_found' => 'L’unité sélectionnée est introuvable.',

        'activity_required' => 'Veuillez sélectionner une activité.',
        'activity_invalid' => 'L’activité sélectionnée n’est pas valide.',
        'activity_not_found' => 'L’activité sélectionnée est introuvable.',

        'price_already_exists' => 'Un prix existe déjà pour l’unité et l’activité sélectionnées.',
        'price_not_found' => 'Le prix sélectionné est introuvable.',
        'price_required' => 'Veuillez saisir un prix.',
        'price_invalid' => 'Le prix doit être un nombre valide.',
        'price_min' => 'Le prix doit être égal ou supérieur à zéro.',
    ],

    'view' => [
        'title' => 'Prix',
        'description' => 'Définissez le prix par défaut de chaque activité au sein d’une unité spécifique.',

        'form' => [
            'title' => 'Paramètres de prix',
            'branch_title' => 'Succursale',
            'branch_placeholder' => 'Sélectionner une succursale',
            'unit_title' => 'Unité',
            'unit_placeholder' => 'Sélectionner une unité',
            'activity_title' => 'Activité',
            'activity_placeholder' => 'Sélectionner une activité',
            'price_title' => 'Prix',
            'price_placeholder' => 'Saisir le prix',
            'currency_title' => 'Devise',
            'currency_text' => 'Les prix sont enregistrés dans votre devise par défaut.',
        ],

        'table' => [
            'title' => 'Prix enregistrés',
            'branch_title' => 'Succursale',
            'unit_title' => 'Unité',
            'activity_title' => 'Activité',
            'price_title' => 'Prix',
            'actions_title' => 'Actions',
        ],

        'actions' => [
            'save' => 'Enregistrer le prix',
            'saving' => 'Enregistrement...',
            'edit' => 'Modifier',
            'update' => 'Mettre à jour',
            'updating' => 'Mise à jour...',
            'delete' => 'Supprimer',
            'cancel' => 'Annuler',
            'deleting' => 'Suppression...',
        ],

        'states' => [
            'empty_title' => 'Aucun prix pour le moment',
            'empty_text' => 'Créez le premier prix pour une combinaison d’unité et d’activité.',
            'no_branches_title' => 'Aucune configuration de prix disponible',
            'no_branches_text' => 'Créez d’abord une succursale pour commencer à définir des prix.',
            'no_units_text' => 'Aucune unité n’est disponible pour la succursale sélectionnée.',
            'no_activities_text' => 'Aucune activité n’est disponible.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Êtes-vous sûr de vouloir supprimer ce prix ?',
        ],
    ],
];
