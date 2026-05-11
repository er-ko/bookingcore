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
		'cancelled' => 'La réservation a été annulée avec succès.',
		'status_updated' => 'Le statut de la réservation a été mis à jour avec succès.',
    ],

	'validation' => [
        'status_required' => 'Le statut de la réservation est obligatoire.',
        'status_invalid' => 'Le format du statut de la réservation n’est pas valide.',
        'status_not_allowed' => 'Le statut de réservation sélectionné n’est pas autorisé.',
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

        'actions' => [
            'confirm' => 'Confirmer',
            'complete' => 'Terminer',
            'cancel' => 'Annuler',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Êtes-vous sûr de vouloir annuler cette réservation ?',
        ],

    ],
];
