<?php

return [
    'messages' => [
        'updated' => 'Les paramètres d’identité ont été mis à jour avec succès.',
        'deletion_scheduled' => 'La suppression de votre compte a été programmée dans 7 jours.',
        'deletion_canceled' => 'La suppression programmée de votre compte a été annulée.',
    ],

    'validation' => [
        'mode_required' => 'Le mode de réservation est obligatoire.',
        'mode_in' => 'Le mode de réservation sélectionné n’est pas valide.',

        'brand_required' => 'Le nom de marque est obligatoire.',
        'brand_max' => 'Le nom de marque ne peut pas dépasser 160 caractères.',

        'slug_required' => 'L’identifiant public est obligatoire.',
        'slug_min' => 'L’identifiant public doit contenir au moins 3 caractères.',
        'slug_max' => 'L’identifiant public ne peut pas dépasser 120 caractères.',
        'slug_regex' => 'L’identifiant public ne peut contenir que des lettres minuscules, des chiffres et des traits d’union simples entre les mots.',
        'slug_unique' => 'Cet identifiant public est déjà utilisé.',

        'default_lang_required' => 'La langue par défaut est obligatoire.',
        'default_lang_max' => 'La langue par défaut ne peut pas dépasser 16 caractères.',
        'default_lang_exists' => 'La langue par défaut sélectionnée n’est pas valide.',

        'default_currency_required' => 'La devise par défaut est obligatoire.',
        'default_currency_size' => 'La devise par défaut doit contenir exactement 3 caractères.',
        'default_currency_exists' => 'La devise par défaut sélectionnée n’est pas valide.',

        'default_country_required' => 'Le pays par défaut est obligatoire.',
        'default_country_size' => 'Le pays par défaut doit contenir exactement 2 caractères.',
        'default_country_exists' => 'Le pays par défaut sélectionné n’est pas valide.',

        'is_public_required' => 'Le statut de visibilité est obligatoire.',
        'is_public_boolean' => 'Le statut de visibilité doit être vrai ou faux.',
    ],

    'view' => [
        'title' => 'Identité',
        'description' => 'Gérez l’identité publique de votre page de réservation, y compris le nom de marque, l’URL publique et les paramètres régionaux par défaut.',

        'overview' => [
            'title' => 'Aperçu',
            'brand_title' => 'Marque',
            'brand_text' => 'Définissez le nom public que les visiteurs verront sur votre page de réservation.',
            'public_url_title' => 'URL publique',
            'public_url_text' => 'Choisissez l’identifiant de votre page publique de réservation. Votre page sera disponible à l’adresse :slug',
            'defaults_title' => 'Paramètres par défaut',
            'defaults_text' => 'Définissez la langue, la devise et le pays par défaut utilisés dans votre espace de réservation.',
            'visibility_title' => 'Visibilité',
            'visibility_text' => 'Ces paramètres déterminent la manière dont votre page de réservation est présentée aux visiteurs et le comportement par défaut de votre espace de travail.',
        ],

        'form' => [
            'identity_settings' => 'Paramètres d’identité',
            'base_configuration' => 'Configuration de base',
            'brand_name_title' => 'Nom de marque',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Identifiant public',
            'public_slug_placeholder' => 'votre-identifiant',
            'public_slug_prefix' => 'bookingcore.link/@',
            'default_language_title' => 'Langue par défaut',
            'select_language_title' => 'Sélectionner une langue',
            'default_currency_title' => 'Devise par défaut',
            'select_currency_title' => 'Sélectionner une devise',
            'default_country_title' => 'Pays par défaut',
            'select_country_title' => 'Sélectionner un pays',
            'booking_page_visibility_title' => 'Visibilité de la page de réservation',
            'public_booking_page_title' => 'Page publique de réservation',
            'public_booking_page_text' => 'Lorsque cette option est activée, les visiteurs peuvent accéder à votre page de réservation via son URL publique. Lorsqu’elle est désactivée, la page reste masquée aux visiteurs.',
        ],

        'actions' => [
            'cancel' => 'Annuler',
            'save' => 'Enregistrer l’identité',
            'saving' => 'Enregistrement...',
            'schedule_account_deletion' => 'Programmer la suppression du compte',
            'cancel_deletion' => 'Annuler la suppression',
        ],

        'deletion' => [
            'account_removal_title' => 'Suppression du compte',
            'scheduled_deletion_title' => 'Suppression programmée',
            'scheduled_deletion_text' => 'Votre page publique de réservation sera masquée immédiatement après la programmation de la suppression. Toutes les données du compte seront supprimées définitivement après 7 jours, sauf si vous annulez la demande.',
            'recovery_period_title' => 'Période de récupération',
            'recovery_period_text' => 'Pendant la période de grâce de 7 jours, vous pouvez encore annuler la demande de suppression et conserver votre compte.',
            'deletion_date_title' => 'Date de suppression',
            'deletion_date_text' => 'La suppression définitive de votre compte est programmée pour le :date.',
        ],
    ],
];
