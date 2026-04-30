<?php

return [
    'messages' => [
        'created'   => 'L’activité a été créée avec succès.',
        'updated'   => 'L’activité a été mise à jour avec succès.',
        'deleted'   => 'L’activité a été supprimée avec succès.',
        'failed'    => 'Impossible de traiter la demande d’activité.',
        'not_found' => 'Activité introuvable.',
        'limit_reached' => 'Vous avez atteint le nombre maximal d’activités autorisé.',
    ],

    'validation' => [
        'name_required' => 'Le nom de l’activité est obligatoire.',
        'name_max' => 'Le nom de l’activité ne peut pas dépasser 255 caractères.',

        'duration_required' => 'La durée est obligatoire.',
        'duration_integer' => 'La durée doit être un nombre entier de minutes.',
        'duration_min' => 'La durée doit être d’au moins 1 minute.',
        'duration_max' => 'La durée ne peut pas dépasser 1200 minutes.',

        'buffer_before_integer' => 'La marge avant doit être un nombre entier de minutes.',
        'buffer_before_min' => 'La marge avant doit être d’au moins 0 minute.',
        'buffer_before_max' => 'La marge avant ne peut pas dépasser 60 minutes.',

        'buffer_after_integer' => 'La marge après doit être un nombre entier de minutes.',
        'buffer_after_min' => 'La marge après doit être d’au moins 0 minute.',
        'buffer_after_max' => 'La marge après ne peut pas dépasser 60 minutes.',

        'is_active_required' => 'Le statut actif est obligatoire.',
        'is_active_boolean' => 'Le statut actif doit être vrai ou faux.',
    ],

    'view' => [
        'title' => 'Activité',
        'activities' => 'Activités',
        'create_activity' => 'Créer une activité',
        'edit_activity' => 'Modifier l’activité',
        'index_description' => 'Gérez les activités qui peuvent être réservées dans vos unités.',
        'create_description' => 'Définissez une nouvelle activité, y compris la durée, les marges et le statut actif.',
        'edit_description' => 'Mettez à jour les détails d’une activité existante, y compris la durée, les marges et le statut actif.',
        'back_to_activities' => 'Retour aux activités',
        'create_first_activity' => 'Créer votre première activité',
        'no_activities_found' => 'Aucune activité trouvée.',
        'no_activities_text' => 'Aucune activité n’est encore à afficher. Créez la première activité pour commencer à organiser votre structure de réservation.',

        'table' => [
            'name' => 'Nom',
            'status' => 'Statut',
            'updated' => 'Mis à jour',
            'actions' => 'Actions',
            'duration' => 'Durée',
            'min' => 'min',
            'active' => 'Actif',
            'inactive' => 'Inactif',
        ],

        'overview' => [
            'title' => 'Aperçu de l’activité',
            'activity_id_title' => 'ID de l’activité',
            'duration_title' => 'Durée',
            'duration_text' => 'Définissez la durée de l’activité en minutes.',
            'buffer_time_title' => 'Temps de marge',
            'buffer_time_text' => 'Ajoutez un temps facultatif avant et après l’activité afin d’éviter les chevauchements trop serrés entre réservations.',
            'required_title' => 'Obligatoire',
            'optional_title' => 'Facultatif',
            'status_title' => 'Statut',
            'status_text' => 'Les activités inactives restent enregistrées dans le système, mais ne peuvent pas être utilisées pour de nouvelles réservations.',
            'active_title' => 'Actif',
            'inactive_title' => 'Inactif',
            'note_title' => 'Note',
            'note_text' => 'La mise à jour de cette activité n’affectera pas les autres activités du système.',
        ],

        'form' => [
            'activity_details' => 'Détails de l’activité',
            'complete_the_form' => 'Complétez le formulaire',
            'update_the_form' => 'Mettez à jour le formulaire',
            'name_title' => 'Nom',
            'duration_title' => 'Durée (minutes)',
            'buffer_before_title' => 'Temps de marge avant (minutes)',
            'buffer_after_title' => 'Temps de marge après (minutes)',
            'active_title' => 'Activité active',
            'active_text' => 'Les activités inactives restent enregistrées dans le système, mais ne peuvent pas être utilisées pour de nouvelles réservations.',
        ],

        'actions' => [
            'edit' => 'Modifier',
            'delete' => 'Supprimer',
            'cancel' => 'Annuler',
            'create' => 'Créer l’activité',
            'creating' => 'Création...',
            'save' => 'Enregistrer les modifications',
            'saving' => 'Enregistrement...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Êtes-vous sûr de vouloir supprimer cette activité ?',
        ],

    ],
];
