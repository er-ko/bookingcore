<?php

return [
    'view' => [
        'title' => 'Підключитися до BookingCore',
        'heading' => 'Підключіть свій календар',
        'description' => 'Почніть із Google і підключіть свій календар, щоб керувати доступністю для бронювань у зручному робочому процесі з відкритим кодом.',
        'meta_title' => 'Підключіть свій календар | BookingCore',
        'meta_description' => 'Підключіть Google Calendar до BookingCore і синхронізуйте події бронювань, доступність і процеси планування за допомогою безпечного OAuth.',

        'provider' => [
            'google_badge' => 'Google',
            'title' => 'Продовжити через Google',
            'description' => 'Авторизуйте BookingCore для доступу до Вашого облікового запису календаря та синхронізації подій бронювань.',
            'protocol' => 'OAuth 2.0',
            'action' => 'Підключити',
        ],

        'flow' => [
            'title' => 'Процес підключення',
            'step_1' => 'Увійдіть за допомогою Вашого облікового запису Google.',
            'step_2' => 'Оберіть календар, який має використовувати BookingCore.',
            'step_3' => 'Почніть синхронізувати події бронювань і доступність.',
        ],

        'tags' => [
            'google' => '#Google',
            'oauth' => '#OAuth',
            'calendar_sync' => '#CalendarSync',
            'availability' => '#Availability',
            'booking_events' => '#BookingEvents',
        ],
    ],
];