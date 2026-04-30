<?php

return [
	'errors' => [
		'activity_inactive' => 'L’activité sélectionnée n’existe pas ou est inactive.',
		'unit_invalid' => 'L’unité sélectionnée n’existe pas, est inactive ou n’appartient pas à la succursale indiquée.',
		'activity_not_assigned' => 'L’activité sélectionnée n’est pas attribuée à l’unité sélectionnée.',
        'activity_not_available_for_unit' => 'L’activité sélectionnée n’est pas disponible pour l’unité sélectionnée.',
		'unit_already_booked' => 'L’unité sélectionnée est déjà réservée pour la plage horaire indiquée.',
		'booking_conflict' => 'La réservation entre en conflit avec une réservation existante.',
		'slot_overlap' => 'Le créneau de réservation sélectionné chevauche une réservation existante.',
		'outside_working_hours' => 'Le créneau de réservation sélectionné est en dehors des heures de travail.',
		'during_time_off' => 'Le créneau de réservation sélectionné se situe dans une période d’indisponibilité bloquée.',
		'already_cancelled' => 'La réservation est déjà annulée.',
		'cancelled_cannot_be_updated' => 'Les réservations annulées ne peuvent pas être mises à jour.',
		'same_status' => 'La réservation est déjà marquée comme :status.',
		'use_cancel_action' => 'Utilisez l’action d’annulation de réservation pour annuler une réservation.',
		'invalid_activity_minutes' => 'La durée de l’activité doit être supérieure à zéro minute.',
		'negative_buffer_minutes' => 'Les minutes de marge ne peuvent pas être négatives.',
		'invalid_slot_block' => 'Le bloc total du créneau doit être supérieur à zéro.',
		'invalid_total_slot_block' => 'Le bloc total du créneau doit être supérieur à zéro.',
		'invalid_time_range' => 'Le début de la plage horaire doit être antérieur à la fin.',
		'invalid_day_of_week' => 'Jour de la semaine non valide : :value',
		'invalid_booking_status' => 'Statut de réservation non valide : :value',
	],

    'messages' => [
		'created' => 'La réservation a été créée avec succès.',
		'failed' => 'Impossible de créer la réservation.',
		'cancelled' => 'La réservation a été annulée avec succès.',
		'status_updated' => 'Le statut de la réservation a été mis à jour avec succès.',
        'not_found' => 'La réservation sélectionnée est introuvable.',
    ],

	'validation' => [
		'branch_required' => 'La succursale est obligatoire.',
        'branch_invalid' => 'L’identifiant de la succursale n’est pas valide.',
        'branch_not_found' => 'La succursale sélectionnée n’existe pas.',

        'unit_required' => 'L’unité est obligatoire.',
        'unit_invalid' => 'L’identifiant de l’unité n’est pas valide.',
        'unit_not_found' => 'L’unité sélectionnée n’existe pas.',

        'activity_required' => 'L’activité est obligatoire.',
        'activity_invalid' => 'L’identifiant de l’activité n’est pas valide.',
        'activity_not_found' => 'L’activité sélectionnée n’existe pas.',
        'activity_not_available_for_unit' => 'L’activité sélectionnée n’est pas disponible pour l’unité sélectionnée.',

        'starts_at_required' => 'L’heure de début est obligatoire.',
        'starts_at_invalid' => 'Le format de l’heure de début n’est pas valide.',

        'customer_required' => 'Les informations du client sont obligatoires.',
        'customer_invalid' => 'Le format des données du client n’est pas valide.',

        'customer_first_name_required' => 'Le prénom du client est obligatoire.',
        'customer_first_name_invalid' => 'Le prénom du client doit être une chaîne de caractères.',
        'customer_first_name_too_long' => 'Le prénom du client est trop long.',

        'customer_last_name_required' => 'Le nom du client est obligatoire.',
        'customer_last_name_invalid' => 'Le nom du client doit être une chaîne de caractères.',
        'customer_last_name_too_long' => 'Le nom du client est trop long.',

        'customer_email_required' => 'L’adresse e-mail du client est obligatoire.',
        'customer_email_invalid' => 'L’adresse e-mail du client doit être valide.',
        'customer_email_too_long' => 'L’adresse e-mail du client est trop longue.',

        'customer_phone_code_required' => 'L’indicatif téléphonique est obligatoire.',
        'customer_phone_code_invalid' => 'L’indicatif téléphonique doit être une chaîne de caractères.',
        'customer_phone_code_too_long' => 'L’indicatif téléphonique est trop long.',

        'customer_phone_required' => 'Le numéro de téléphone est obligatoire.',
        'customer_phone_invalid' => 'Le numéro de téléphone doit être une chaîne de caractères.',
        'customer_phone_too_long' => 'Le numéro de téléphone est trop long.',

        'note_invalid' => 'La note doit être une chaîne de caractères.',

        'status_required' => 'Le statut de la réservation est obligatoire.',
        'status_invalid' => 'Le format du statut de la réservation n’est pas valide.',
        'status_not_allowed' => 'Le statut de réservation sélectionné n’est pas autorisé.',

        'date_required' => 'La date est obligatoire.',
        'date_invalid' => 'Le format de la date n’est pas valide.',
	],

	'view' => [
        'title' => 'Tableau de bord',
        'create_booking' => 'Créer une réservation',
        'edit_booking' => 'Modifier la réservation',
        'index_description' => 'Aperçu des réservations créées, y compris leur statut actuel et les entités associées.',
        'create_description' => 'Créez une nouvelle réservation avec les détails du client, la sélection du service et un créneau disponible.',
        'edit_description' => 'Mettez à jour les détails de la réservation, les informations du client et le statut de la réservation.',
        'back_to_dashboard' => 'Retour au tableau de bord',
        'create_first_booking' => 'Créer votre première réservation',
        'no_bookings_found' => 'Aucune réservation trouvée.',
        'no_bookings_text' => 'Aucune réservation n’est encore à afficher. Créez la première réservation pour commencer à utiliser le système.',

        'table' => [
            'customer' => 'Client',
            'branch' => 'Succursale',
            'unit' => 'Unité',
            'activity' => 'Activité',
            'starts_at' => 'Commence à',
            'ends_at' => 'Se termine à',
            'status' => 'Statut',
            'actions' => 'Actions',
            'active' => 'Actif',
            'inactive' => 'Inactif',
        ],

        'overview' => [
            'title' => 'Aperçu de la réservation',

            'customer_title' => 'Détails du client',
            'customer_text' => 'Saisissez les informations du client nécessaires pour créer la réservation.',

            'booking_flow_title' => 'Flux de réservation',
            'booking_flow_text' => 'Sélectionnez une succursale, puis une unité, une activité, une date et un créneau disponible.',

            'availability_title' => 'Disponibilité',
            'availability_text' => 'Les créneaux disponibles sont chargés selon la succursale, l’unité, l’activité et la date sélectionnées.',

            'required_title' => 'Obligatoire',
            'required_items' => [
                'first_and_last_name' => 'Prénom et nom',
                'phone_code_and_number' => 'Indicatif et numéro de téléphone',
                'branch' => 'Succursale',
                'unit' => 'Unité',
                'activity' => 'Activité',
                'date' => 'Date',
                'slot' => 'Créneau disponible',
            ],

            'optional_title' => 'Facultatif',
            'optional_items' => [
                'email' => 'E-mail',
                'note' => 'Note',
            ],

            'note_title' => 'Note',
            'note_text' => 'Une réservation ne peut être créée qu’après la sélection d’un créneau disponible valide.',
        ],

        'form' => [
            'booking_details' => 'Détails de la réservation',
            'complete_the_reservation' => 'Complétez la réservation',
            'customer_details' => 'Détails du client',
            'first_name_title' => 'Prénom',
            'last_name_title' => 'Nom',
            'email_title' => 'E-mail',
            'phone_code_title' => 'Indicatif',
            'phone_title' => 'Téléphone',
            'branch_title' => 'Succursale',
            'select_branch' => 'Sélectionner une succursale',
            'unit_title' => 'Unité',
            'select_unit' => 'Sélectionner une unité',
            'loading_units' => 'Chargement des unités...',
            'activity_title' => 'Activité',
            'select_activity' => 'Sélectionner une activité',
            'loading_activities' => 'Chargement des activités...',
            'date_title' => 'Date',
            'available_slots_title' => 'Créneaux disponibles',
            'available_slots_count' => 'créneau(x) disponible(s)',
            'loading_slots' => 'Chargement des créneaux...',
            'no_available_slots' => 'Aucun créneau disponible n’a été trouvé pour la date sélectionnée.',
            'select_slot' => 'Sélectionner un créneau',
            'note_title' => 'Note',
        ],

        'actions' => [
            'confirm' => 'Confirmer',
            'complete' => 'Terminer',
            'cancel' => 'Annuler',
            'create' => 'Créer la réservation',
            'creating' => 'Création...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Êtes-vous sûr de vouloir annuler cette réservation ?',
        ],

    ],
];
