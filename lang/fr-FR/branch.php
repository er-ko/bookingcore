<?php

return [
    'messages' => [
        'created'   => 'La succursale a été créée avec succès.',
        'updated'   => 'La succursale a été mise à jour avec succès.',
        'deleted'   => 'La succursale a été supprimée avec succès.',
        'failed'    => 'Impossible de traiter la demande de succursale.',
        'not_found' => 'Succursale introuvable.',
        'has_units' => 'La succursale ne peut pas être supprimée, car elle contient encore des unités.',
        'has_bookings' => 'La succursale ne peut pas être supprimée, car elle contient encore des réservations.',
		'limit_reached' => 'Vous avez atteint le nombre maximal de succursales autorisé.',
    ],

    'validation' => [
        'name_required' => 'Le nom de la succursale est obligatoire.',
        'name_max' => 'Le nom de la succursale ne peut pas dépasser 255 caractères.',

        'address_line_1_max' => 'La ligne d’adresse 1 ne peut pas dépasser 255 caractères.',
        'address_line_2_max' => 'La ligne d’adresse 2 ne peut pas dépasser 255 caractères.',

        'city_max' => 'La ville ne peut pas dépasser 255 caractères.',
        'postcode_max' => 'Le code postal ne peut pas dépasser 32 caractères.',

        'country_code_size' => 'Le code pays doit contenir exactement 2 caractères.',

        'timezone_required' => 'Le fuseau horaire est obligatoire.',
        'timezone_max' => 'Le fuseau horaire ne peut pas dépasser 64 caractères.',

        'is_active_required' => 'Le statut actif est obligatoire.',
        'is_active_boolean' => 'Le statut actif doit être vrai ou faux.',
    ],

    'view' => [
        'title' => 'Succursale',
        'branches' => 'Succursales',
        'create_branch' => 'Créer une succursale',
        'edit_branch' => 'Modifier la succursale',
        'index_description' => 'Gérez vos succursales, y compris les détails d’adresse, le fuseau horaire et le statut actif.',
        'create_description' => 'Créez une nouvelle succursale avec ses détails d’adresse, son fuseau horaire et son statut d’activation.',
        'edit_description' => 'Mettez à jour les détails de la succursale, son adresse, son fuseau horaire et son statut d’activation.',
        'back_to_branches' => 'Retour aux succursales',
        'create_first_branch' => 'Créer votre première succursale',
        'no_branches_found' => 'Aucune succursale trouvée.',
        'no_branches_text' => 'Aucune succursale n’est encore à afficher. Créez la première succursale pour commencer à organiser votre structure de réservation.',

        'table' => [
            'branch' => 'Succursale',
            'address' => 'Adresse',
            'city' => 'Ville',
            'timezone' => 'Fuseau horaire',
            'no_address_text' => 'Aucune adresse indiquée',
            'status' => 'Statut',
            'updated' => 'Mis à jour',
            'actions' => 'Actions',
            'active' => 'Actif',
            'inactive' => 'Inactif',
        ],

        'overview' => [
            'title' => 'Aperçu de la succursale',
            'branch_id_title' => 'ID de la succursale',
            'countries_available_title' => 'Pays disponibles',
            'city_and_postcode_title' => 'Ville et code postal',
            'country_and_timezone_title' => 'Pays et fuseau horaire',
            'timezone_title' => 'Fuseau horaire',
            'timezone_text' => 'Selon le pays sélectionné',
            'limit_title' => 'Limite',
            'limit_text' => 'Vous pouvez créer jusqu’à 10 succursales.',
            'duration_text' => 'Définissez l’emplacement de la succursale et les valeurs régionales par défaut.',
            'required_title' => 'Obligatoire',
            'optional_title' => 'Facultatif',
            'status_title' => 'Statut actuel',
            'active_title' => 'Actif',
            'inactive_title' => 'Inactif',
            'note_title' => 'Note',
            'note_text' => 'La mise à jour de cette succursale n’affectera pas les autres succursales du système.',
        ],

        'form' => [
            'branch_details' => 'Détails de la succursale',
            'complete_the_form' => 'Complétez le formulaire',
            'update_the_form' => 'Mettez à jour le formulaire',
            'branch_name_title' => 'Nom de la succursale',
            'address_line_1_title' => 'Ligne d’adresse 1',
            'address_line_2_title' => 'Ligne d’adresse 2',
            'city_title' => 'Ville',
            'postcode_title' => 'Code postal',
            'country_title' => 'Pays',
            'select_country' => 'Sélectionner un pays',
            'timezone_title' => 'Fuseau horaire',
            'select_timezone' => 'Sélectionner un fuseau horaire',
            'loading_timezones' => 'Chargement des fuseaux horaires...',
            'active_title' => 'Succursale active',
            'active_text' => 'Les succursales inactives peuvent rester enregistrées dans le système sans être utilisées activement.',
        ],

        'actions' => [
            'edit' => 'Modifier',
            'delete' => 'Supprimer',
            'cancel' => 'Annuler',
            'create' => 'Créer la succursale',
            'creating' => 'Création...',
            'save' => 'Enregistrer les modifications',
            'saving' => 'Enregistrement...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Êtes-vous sûr de vouloir supprimer cette succursale ?',
        ],

    ],
];
