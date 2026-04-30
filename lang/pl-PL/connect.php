<?php

return [
    'view' => [
        'title' => 'Połącz z BookingCore',
        'heading' => 'Połącz swój kalendarz',
        'description' => 'Zacznij od Google i połącz swój kalendarz, aby zarządzać dostępnością rezerwacji w przejrzystym, otwartoźródłowym procesie pracy.',
        'meta_title' => 'Połącz swój kalendarz | BookingCore',
        'meta_description' => 'Połącz Kalendarz Google z BookingCore i synchronizuj wydarzenia rezerwacji, dostępność oraz procesy harmonogramowania za pomocą bezpiecznego OAuth.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Kontynuuj z Google',
            'description' => 'Autoryzuj BookingCore, aby uzyskał dostęp do Państwa konta kalendarza i synchronizował wydarzenia rezerwacji.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Połącz',
        ],

        'flow' => [
            'title' => 'Proces połączenia',
            'step_1' => 'Zaloguj się przy użyciu swojego konta Google.',
            'step_2' => 'Wybierz kalendarz, którego BookingCore ma używać.',
            'step_3' => 'Rozpocznij synchronizację wydarzeń rezerwacji i dostępności.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#SynchronizacjaKalendarza',
            'availability' => '#Dostępność',
            'booking_events' => '#WydarzeniaRezerwacji',
        ],
    ],
];