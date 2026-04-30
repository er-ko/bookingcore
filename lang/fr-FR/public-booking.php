<?php

return [
    'view' => [
        'title' => 'Réservez votre rendez-vous',
        'description' => 'Choisissez la succursale, le service, la date et l’heure qui vous conviennent le mieux.',

        'form' => [
            'branch_title' => 'Succursale',
            'branch_placeholder' => 'Sélectionner une succursale',

            'unit_title' => 'Unité',
            'unit_placeholder' => 'Sélectionner une unité',

            'activity_title' => 'Activité',
            'activity_placeholder' => 'Sélectionner une activité',

            'date_title' => 'Date',
            'date_placeholder' => 'Sélectionner une date',

            'slot_title' => 'Horaire disponible',
            'slot_placeholder' => 'Sélectionner un horaire',

            'first_name_title' => 'Prénom',
            'first_name_placeholder' => 'Jean',

            'last_name_title' => 'Nom',
            'last_name_placeholder' => 'Dupont',

            'email_title' => 'E-mail',
            'email_placeholder' => 'jean@example.com',

            'phone_code_title' => 'Indicatif téléphonique',
            'phone_code_placeholder' => '+33',

            'phone_title' => 'Téléphone',
            'phone_placeholder' => '612345678',

            'note_title' => 'Note',
            'note_placeholder' => 'Informations complémentaires pour votre réservation',
        ],

        'content' => [
            'form_title' => 'Complétez votre réservation',
            'ready' => 'prêt',

            'appointment_title' => 'Détails du rendez-vous',
            'appointment_text' => 'Choisissez la succursale, l’unité, le service, la date et le créneau qui conviennent le mieux.',

            'customer_title' => 'Détails du client',
            'customer_text' => 'Ajoutez les coordonnées nécessaires pour confirmer et identifier la réservation.',

            'note_title' => 'Note complémentaire',
            'note_text' => 'Partagez toute information utile avant le début de la réservation.',

            'review_title' => 'Vérifiez les détails de la réservation et confirmez lorsque tout est correct.',
            'review_text' => 'Le résumé de la réservation se met à jour en direct pendant que vous remplissez le formulaire.',
            'review_live_text' => ':selection/4 détails de réservation, :customer/4 coordonnées',

            'summary_badge' => 'Résumé',
            'summary_progress' => 'Vérification de la réservation',

            'branch_label' => 'Succursale',
            'unit_label' => 'Unité',
            'activity_label' => 'Activité',
            'date_time_label' => 'Date / heure',
            'customer_label' => 'Client',
            'email_label' => 'E-mail',
            'phone_label' => 'Téléphone',
            'note_label' => 'Note',

            'summary_empty_selection' => 'Pas encore sélectionné',
            'summary_empty_customer' => 'Pas encore rempli',

            'branch_status_title' => 'Statut de la succursale',
            'service_status_title' => 'Statut du service',
            'schedule_status_title' => 'Statut du planning',
        ],

        'states' => [
            'no_branches_title' => 'Aucune succursale disponible',
            'no_branches_text' => 'Aucune succursale publique n’est actuellement disponible à la réservation.',

            'no_units_title' => 'Aucune unité disponible',
            'no_units_text' => 'Aucune unité n’est actuellement disponible pour la succursale sélectionnée.',

            'no_activities_title' => 'Aucune activité disponible',
            'no_activities_text' => 'Aucune activité n’est actuellement disponible pour l’unité sélectionnée.',

            'no_slots_title' => 'Aucun créneau disponible',
            'no_slots_text' => 'Aucun créneau de réservation n’est disponible pour la date sélectionnée.',

            'branch_default' => 'Choisissez le lieu où la réservation doit avoir lieu.',
            'service_default' => 'Choisissez le service après avoir sélectionné l’unité appropriée.',
            'schedule_loading' => 'Vérification de la disponibilité en direct pour le jour sélectionné.',
            'schedule_default' => 'Sélectionnez une date pour charger les créneaux de réservation disponibles.',
        ],

        'actions' => [
            'submit' => 'Créer la réservation',
            'submitting' => 'Création de la réservation...',
        ],

        'messages' => [
            'created' => 'La réservation a été créée avec succès.',
            'failed' => 'Impossible de créer la réservation.',
        ],

        'detail' => [
            'title' => 'Détails de la réservation',
            'badge_created' => 'Réservation créée',
            'status_label' => 'Statut',
            'heading' => 'Votre réservation est enregistrée',
            'description' => 'Enregistrez cette page pour plus tard, téléchargez le fichier de calendrier ou imprimez la confirmation.',
            'details_title' => 'Détails de la réservation',
            'branch_label' => 'Succursale',
            'unit_label' => 'Unité',
            'activity_label' => 'Activité',
            'date_time_label' => 'Date et heure',
            'to_label' => 'à',
            'customer_title' => 'Informations du client',
            'customer_name_label' => 'Prénom et nom',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Téléphone',
            'note_label' => 'Note',
            'actions' => [
                'back' => 'Retour à la page de réservation',
                'print' => 'Imprimer la page',
                'calendar' => 'Importer dans votre calendrier',
            ],
            'fallback' => '—',
        ],
    ],
];
