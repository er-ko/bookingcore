<?php

return [
    'view' => [
        'title' => 'Verbinden met BookingCore',
        'heading' => 'Verbind uw agenda',
        'description' => 'Begin met Google en verbind uw agenda om de beschikbaarheid voor boekingen te beheren in een heldere, open source workflow.',
        'meta_title' => 'Verbind uw agenda | BookingCore',
        'meta_description' => 'Verbind Google Agenda met BookingCore en houd boekingsevenementen, beschikbaarheid en planningsworkflows gesynchroniseerd via veilige OAuth.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Doorgaan met Google',
            'description' => 'Geef BookingCore toestemming om toegang te krijgen tot uw agenda-account en boekingsevenementen gesynchroniseerd te houden.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Verbinden',
        ],

        'flow' => [
            'title' => 'Verbindingsproces',
            'step_1' => 'Meld u aan met uw Google-account.',
            'step_2' => 'Kies de agenda die BookingCore moet gebruiken.',
            'step_3' => 'Start met het synchroniseren van boekingsevenementen en beschikbaarheid.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#AgendaSynchronisatie',
            'availability' => '#Beschikbaarheid',
            'booking_events' => '#Boekingsevenementen',
        ],
    ],
];