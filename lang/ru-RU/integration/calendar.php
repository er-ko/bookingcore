<?php

return [
    'messages' => [
        'failed' => 'Не удалось обработать запрос на интеграцию календаря.',
        'calendar_selected' => 'Календарь успешно выбран.',
        'settings_updated' => 'Настройки синхронизации календаря успешно обновлены.',
        'invalid_calendar_id' => 'Выбранный идентификатор календаря недействителен.',
        'integration_user_mismatch' => 'Выбранная интеграция не принадлежит аутентифицированному пользователю.',
        'integration_not_calendar' => 'Выбранная интеграция не является интеграцией календаря.',
        'integration_inactive' => 'Выбранная интеграция неактивна.',
        'missing_refresh_token' => 'Интеграция календаря не содержит refresh token.',
        'missing_access_token' => 'Интеграция календаря не содержит access token.',
        'not_google_integration' => 'Выбранная интеграция не является интеграцией Google Календаря.',
        'invalid_sync_mode' => 'Выбранный режим синхронизации недействителен.',
        'google_refresh_failed' => 'Не удалось обновить access token Google Календаря.',
        'google_refresh_missing_access_token' => 'Не удалось обновить access token Google Календаря, поскольку ответ не содержит access token.',
        'connection_error' => 'BookingCore не удалось проверить подключение к Вашему календарю. Пожалуйста, повторно подключите аккаунт Google Календаря и попробуйте снова.',
    ],

    'validation' => [
        'calendar_id_required' => 'Идентификатор календаря обязателен.',
        'calendar_id_string' => 'Идентификатор календаря должен быть строкой.',
        'calendar_id_max' => 'Идентификатор календаря не может превышать 255 символов.',

        'sync_mode_required' => 'Режим синхронизации обязателен.',
        'sync_mode_string' => 'Режим синхронизации должен быть строкой.',
        'sync_mode_in' => 'Выбранный режим синхронизации недействителен.',
    ],

    'view' => [
        'title' => 'Интеграции календаря',
        'description' => 'Подключите свой внешний календарный аккаунт и выберите, где BookingCore должен создавать события бронирований.',

        'overview' => [
            'connected_account_title' => 'Подключённый аккаунт',
            'provider_title' => 'Поставщик',
            'name_title' => 'Имя',
            'email_title' => 'Электронная почта',
            'timezone_title' => 'Часовой пояс',
            'status_title' => 'Статус',
            'active_title' => 'Активна',
            'calendar_settings_title' => 'Настройки календаря',
            'available_calendars_title' => 'Доступные календари',
            'timezone_prefix' => 'Часовой пояс:',
        ],

        'form' => [
            'sync_mode_title' => 'Режим синхронизации',
            'sync_mode_soft_title' => 'Мягкий',
            'sync_mode_strict_title' => 'Строгий',
            'sync_mode_help' => 'Мягкий режим позволяет BookingCore продолжать работу, даже если синхронизация календаря завершится ошибкой. Строгий режим предназначен для более высокой согласованности данных.',
        ],

        'actions' => [
            'connect_google' => 'Подключить Google Календарь',
            'reconnect_google' => 'Повторно подключить Google Календарь',
            'save_settings' => 'Сохранить настройки',
            'select_calendar' => 'Выбрать календарь',
            'selected' => 'Выбран',
        ],

        'states' => [
            'connection_expired_title' => 'Срок действия подключения к Google Календарю истёк',
            'connection_expired_text' => 'Ваше подключение к Google Календарю больше недействительно. Пожалуйста, повторно подключите свой аккаунт, чтобы продолжить синхронизацию календарей и событий бронирований.',
            'no_calendar_connected_title' => 'Календарь не подключён',
            'no_calendar_connected_text' => 'Вы ещё не подключили ни один календарь. Подключите Google Календарь, чтобы начать синхронизацию событий бронирований.',
            'no_calendars_found_title' => 'Календари не найдены',
            'no_calendars_found_text' => 'Подключённый аккаунт в настоящее время не предоставляет доступ ни к одному календарю.',
            'primary_badge' => 'Основной',
            'read_only_badge' => 'Только для чтения',
            'selected_badge' => 'Выбран',
            'calendar_count_suffix' => 'календарь(и)',
        ],
    ],
];