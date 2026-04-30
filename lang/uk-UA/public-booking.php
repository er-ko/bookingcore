<?php

return [
    'view' => [
        'title' => 'Забронюйте Ваш візит',
        'description' => 'Оберіть філію, послугу, дату й час, які найкраще Вам підходять.',

        'form' => [
            'branch_title' => 'Філія',
            'branch_placeholder' => 'Оберіть філію',

            'unit_title' => 'Підрозділ',
            'unit_placeholder' => 'Оберіть підрозділ',

            'activity_title' => 'Послуга',
            'activity_placeholder' => 'Оберіть послугу',

            'date_title' => 'Дата',
            'date_placeholder' => 'Оберіть дату',

            'slot_title' => 'Доступний час',
            'slot_placeholder' => 'Оберіть час',

            'first_name_title' => 'Ім’я',
            'first_name_placeholder' => 'Іван',

            'last_name_title' => 'Прізвище',
            'last_name_placeholder' => 'Петренко',

            'email_title' => 'Електронна пошта',
            'email_placeholder' => 'ivan@example.com',

            'phone_code_title' => 'Телефонний код',
            'phone_code_placeholder' => '+380',

            'phone_title' => 'Телефон',
            'phone_placeholder' => '501234567',

            'note_title' => 'Примітка',
            'note_placeholder' => 'Додаткова інформація до Вашого бронювання',
        ],

        'content' => [
            'form_title' => 'Завершіть Ваше бронювання',
            'ready' => 'готово',

            'appointment_title' => 'Деталі візиту',
            'appointment_text' => 'Оберіть філію, підрозділ, послугу, дату та часовий слот, які Вам найкраще підходять.',

            'customer_title' => 'Дані клієнта',
            'customer_text' => 'Додайте контактні дані, необхідні для підтвердження та ідентифікації бронювання.',

            'note_title' => 'Додаткова примітка',
            'note_text' => 'Повідомте будь-яку корисну інформацію перед початком бронювання.',

            'review_title' => 'Перевірте деталі бронювання та підтвердьте, коли все правильно.',
            'review_text' => 'Підсумок бронювання оновлюється в реальному часі під час заповнення форми.',
            'review_live_text' => ':selection/4 деталі бронювання, :customer/4 контактні дані',

            'summary_badge' => 'Підсумок',
            'summary_progress' => 'Перевірка бронювання',

            'branch_label' => 'Філія',
            'unit_label' => 'Підрозділ',
            'activity_label' => 'Послуга',
            'date_time_label' => 'Дата / час',
            'customer_label' => 'Клієнт',
            'email_label' => 'Електронна пошта',
            'phone_label' => 'Телефон',
            'note_label' => 'Примітка',

            'summary_empty_selection' => 'Ще не обрано',
            'summary_empty_customer' => 'Ще не заповнено',

            'branch_status_title' => 'Статус філії',
            'service_status_title' => 'Статус послуги',
            'schedule_status_title' => 'Статус розкладу',
        ],

        'states' => [
            'no_branches_title' => 'Немає доступних філій',
            'no_branches_text' => 'Наразі немає публічних філій, доступних для бронювання.',

            'no_units_title' => 'Немає доступних підрозділів',
            'no_units_text' => 'Для обраної філії наразі немає доступних підрозділів.',

            'no_activities_title' => 'Немає доступних послуг',
            'no_activities_text' => 'Для обраного підрозділу наразі немає доступних послуг.',

            'no_slots_title' => 'Немає доступних часових слотів',
            'no_slots_text' => 'Для обраної дати немає доступних часових слотів для бронювання.',

            'branch_default' => 'Оберіть місце, де має відбутися бронювання.',
            'service_default' => 'Оберіть послугу після вибору відповідного підрозділу.',
            'schedule_loading' => 'Перевіряємо актуальну доступність для обраного дня.',
            'schedule_default' => 'Оберіть дату, щоб завантажити доступні часові слоти для бронювання.',
        ],

        'actions' => [
            'submit' => 'Створити бронювання',
            'submitting' => 'Створення бронювання...',
        ],

        'messages' => [
            'created' => 'Бронювання успішно створено.',
            'failed' => 'Не вдалося створити бронювання.',
        ],

        'detail' => [
            'title' => 'Деталі бронювання',
            'badge_created' => 'Бронювання створено',
            'status_label' => 'Статус',
            'heading' => 'Ваше бронювання збережено',
            'description' => 'Збережіть цю сторінку на потім, завантажте файл календаря або роздрукуйте підтвердження.',
            'details_title' => 'Деталі бронювання',
            'branch_label' => 'Філія',
            'unit_label' => 'Підрозділ',
            'activity_label' => 'Послуга',
            'date_time_label' => 'Дата й час',
            'to_label' => 'до',
            'customer_title' => 'Інформація про клієнта',
            'customer_name_label' => 'Ім’я та прізвище',
            'customer_email_label' => 'Електронна пошта',
            'customer_phone_label' => 'Телефон',
            'note_label' => 'Примітка',
            'actions' => [
                'back' => 'Повернутися на сторінку бронювання',
                'print' => 'Роздрукувати сторінку',
                'calendar' => 'Імпортувати до Вашого календаря',
            ],
            'fallback' => '—',
        ],
    ],
];