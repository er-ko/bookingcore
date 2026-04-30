<?php

return [
    'messages' => [
        'failed' => 'Impossible de traiter la demande d’intégration de calendrier.',
        'calendar_selected' => 'Le calendrier a été sélectionné avec succès.',
        'settings_updated' => 'Les paramètres de synchronisation du calendrier ont été mis à jour avec succès.',
        'invalid_calendar_id' => 'L’ID du calendrier sélectionné n’est pas valide.',
        'integration_user_mismatch' => 'L’intégration sélectionnée n’appartient pas à l’utilisateur authentifié.',
        'integration_not_calendar' => 'L’intégration sélectionnée n’est pas une intégration de calendrier.',
        'integration_inactive' => 'L’intégration sélectionnée est inactive.',
        'missing_refresh_token' => 'L’intégration de calendrier ne contient pas de jeton d’actualisation.',
        'missing_access_token' => 'L’intégration de calendrier ne contient pas de jeton d’accès.',
        'not_google_integration' => 'L’intégration sélectionnée n’est pas une intégration Google Calendar.',
        'invalid_sync_mode' => 'Le mode de synchronisation sélectionné n’est pas valide.',
        'google_refresh_failed' => 'Impossible d’actualiser le jeton d’accès Google Calendar.',
        'google_refresh_missing_access_token' => 'Impossible d’actualiser le jeton d’accès Google Calendar, car la réponse ne contient pas de jeton d’accès.',
        'connection_error' => 'BookingCore n’a pas pu vérifier votre connexion au calendrier. Veuillez reconnecter votre compte Google Calendar et réessayer.',
    ],

    'validation' => [
        'calendar_id_required' => 'L’identifiant du calendrier est obligatoire.',
        'calendar_id_string' => 'L’identifiant du calendrier doit être une chaîne de caractères.',
        'calendar_id_max' => 'L’identifiant du calendrier ne peut pas dépasser 255 caractères.',

        'sync_mode_required' => 'Le mode de synchronisation est obligatoire.',
        'sync_mode_string' => 'Le mode de synchronisation doit être une chaîne de caractères.',
        'sync_mode_in' => 'Le mode de synchronisation sélectionné n’est pas valide.',
    ],

    'view' => [
        'title' => 'Intégrations de calendrier',
        'description' => 'Connectez votre compte de calendrier externe et choisissez où BookingCore doit créer les événements de réservation.',

        'overview' => [
            'connected_account_title' => 'Compte connecté',
            'provider_title' => 'Fournisseur',
            'name_title' => 'Nom',
            'email_title' => 'E-mail',
            'timezone_title' => 'Fuseau horaire',
            'status_title' => 'Statut',
            'active_title' => 'Actif',
            'calendar_settings_title' => 'Paramètres du calendrier',
            'available_calendars_title' => 'Calendriers disponibles',
            'timezone_prefix' => 'Fuseau horaire :',
        ],

        'form' => [
            'sync_mode_title' => 'Mode de synchronisation',
            'sync_mode_soft_title' => 'Souple',
            'sync_mode_strict_title' => 'Strict',
            'sync_mode_help' => 'Le mode souple maintient BookingCore opérationnel même si la synchronisation du calendrier échoue. Le mode strict est destiné à offrir une cohérence plus forte.',
        ],

        'actions' => [
            'connect_google' => 'Connecter Google Calendar',
            'reconnect_google' => 'Reconnecter Google Calendar',
            'save_settings' => 'Enregistrer les paramètres',
            'select_calendar' => 'Sélectionner le calendrier',
            'selected' => 'Sélectionné',
        ],

        'states' => [
            'connection_expired_title' => 'La connexion Google Calendar a expiré',
            'connection_expired_text' => 'Votre connexion Google Calendar n’est plus valide. Veuillez reconnecter votre compte pour continuer à synchroniser les calendriers et les événements de réservation.',
            'no_calendar_connected_title' => 'Aucun calendrier connecté',
            'no_calendar_connected_text' => 'Vous n’avez encore connecté aucun calendrier. Connectez Google Calendar pour commencer à synchroniser les événements de réservation.',
            'no_calendars_found_title' => 'Aucun calendrier trouvé',
            'no_calendars_found_text' => 'Le compte connecté n’expose actuellement aucun calendrier.',
            'primary_badge' => 'Principal',
            'read_only_badge' => 'Lecture seule',
            'selected_badge' => 'Sélectionné',
            'calendar_count_suffix' => 'calendrier(s)',
        ],
    ],
];
