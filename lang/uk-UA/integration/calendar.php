<?php

return [
    'messages' => [
        'failed' => 'Не вдалося обробити запит інтеграції календаря.',
        'calendar_selected' => 'Календар успішно вибрано.',
        'settings_updated' => 'Налаштування синхронізації календаря успішно оновлено.',
        'invalid_calendar_id' => 'Вибраний ідентифікатор календаря є недійсним.',
        'integration_user_mismatch' => 'Вибрана інтеграція не належить автентифікованому користувачу.',
        'integration_not_calendar' => 'Вибрана інтеграція не є інтеграцією календаря.',
        'integration_inactive' => 'Вибрана інтеграція неактивна.',
        'missing_refresh_token' => 'Інтеграція календаря не містить токена оновлення.',
        'missing_access_token' => 'Інтеграція календаря не містить токена доступу.',
        'not_google_integration' => 'Вибрана інтеграція не є інтеграцією Google Calendar.',
        'invalid_sync_mode' => 'Вибраний режим синхронізації є недійсним.',
        'google_refresh_failed' => 'Не вдалося оновити токен доступу Google Calendar.',
        'google_refresh_missing_access_token' => 'Не вдалося оновити токен доступу Google Calendar, оскільки відповідь не містила токена доступу.',
        'connection_error' => 'BookingCore не вдалося перевірити підключення до Вашого календаря. Будь ласка, повторно підключіть свій обліковий запис Google Calendar і спробуйте ще раз.',
    ],

    'validation' => [
        'calendar_id_required' => 'Ідентифікатор календаря є обов’язковим.',
        'calendar_id_string' => 'Ідентифікатор календаря має бути рядком.',
        'calendar_id_max' => 'Ідентифікатор календаря не може містити більше ніж 255 символів.',

        'sync_mode_required' => 'Режим синхронізації є обов’язковим.',
        'sync_mode_string' => 'Режим синхронізації має бути рядком.',
        'sync_mode_in' => 'Вибраний режим синхронізації є недійсним.',
    ],

    'view' => [
        'title' => 'Інтеграції календаря',
        'description' => 'Підключіть свій зовнішній обліковий запис календаря та виберіть, де BookingCore має створювати події бронювань.',

        'overview' => [
            'connected_account_title' => 'Підключений обліковий запис',
            'provider_title' => 'Постачальник',
            'name_title' => 'Ім’я',
            'email_title' => 'Електронна пошта',
            'timezone_title' => 'Часовий пояс',
            'status_title' => 'Статус',
            'active_title' => 'Активний',
            'calendar_settings_title' => 'Налаштування календаря',
            'available_calendars_title' => 'Доступні календарі',
            'timezone_prefix' => 'Часовий пояс:',
        ],

        'form' => [
            'sync_mode_title' => 'Режим синхронізації',
            'sync_mode_soft_title' => 'М’який',
            'sync_mode_strict_title' => 'Строгий',
            'sync_mode_help' => 'М’який режим дозволяє BookingCore працювати навіть у разі помилки синхронізації календаря. Строгий режим призначений для забезпечення вищої узгодженості.',
        ],

        'actions' => [
            'connect_google' => 'Підключити Google Calendar',
            'reconnect_google' => 'Повторно підключити Google Calendar',
            'save_settings' => 'Зберегти налаштування',
            'select_calendar' => 'Вибрати календар',
            'selected' => 'Вибрано',
        ],

        'states' => [
            'connection_expired_title' => 'Термін дії підключення Google Calendar минув',
            'connection_expired_text' => 'Ваше підключення до Google Calendar більше не є дійсним. Будь ласка, повторно підключіть свій обліковий запис, щоб продовжити синхронізацію календарів і подій бронювань.',
            'no_calendar_connected_title' => 'Календар не підключено',
            'no_calendar_connected_text' => 'Ви ще не підключили жодного календаря. Підключіть Google Calendar, щоб почати синхронізацію подій бронювань.',
            'no_calendars_found_title' => 'Календарів не знайдено',
            'no_calendars_found_text' => 'Підключений обліковий запис наразі не надає доступу до жодного календаря.',
            'primary_badge' => 'Основний',
            'read_only_badge' => 'Лише для читання',
            'selected_badge' => 'Вибрано',
            'calendar_count_suffix' => 'календар(і)',
        ],
    ],
];