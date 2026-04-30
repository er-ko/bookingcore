<?php

return [
    'view' => [
        'title' => 'Se connecter à BookingCore',
        'heading' => 'Connectez votre calendrier',
        'description' => 'Commencez avec Google et connectez votre calendrier pour gérer la disponibilité des réservations dans un flux clair et open source.',
        'meta_title' => 'Connectez votre calendrier | BookingCore',
        'meta_description' => 'Connectez Google Calendar à BookingCore et synchronisez les événements de réservation, la disponibilité et les flux de planification grâce à OAuth sécurisé.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Continuer avec Google',
            'description' => 'Autorisez BookingCore à accéder à votre compte de calendrier et à synchroniser les événements de réservation.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Connecter',
        ],

        'flow' => [
            'title' => 'Flux de connexion',
            'step_1' => 'Connectez-vous avec votre compte Google.',
            'step_2' => 'Choisissez le calendrier que BookingCore doit utiliser.',
            'step_3' => 'Commencez à synchroniser les événements de réservation et la disponibilité.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#SynchronisationCalendrier',
            'availability' => '#Disponibilite',
            'booking_events' => '#EvenementsReservation',
        ],
    ],
];
