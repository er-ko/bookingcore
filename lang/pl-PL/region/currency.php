<?php

return [
    'messages' => [
        'updated' => 'Status waluty został pomyślnie zaktualizowany.',
    ],

    'validation' => [
        'scope_required' => 'Zakres jest wymagany.',
        'scope_in' => 'Nieprawidłowy zakres aktualizacji.',

        'currency_ids_array' => 'Wybór walut musi być prawidłową tablicą.',
        'currency_ids_integer' => 'Każdy identyfikator waluty musi być liczbą całkowitą.',
        'currency_ids_exists' => 'Co najmniej jedna z wybranych walut nie istnieje.',
        'currency_ids_required' => 'Należy wybrać co najmniej jedną walutę.',
        'currency_ids_single' => 'Dla pojedynczego zakresu należy podać dokładnie jedną walutę.',

        'is_active_required' => 'Flaga statusu jest wymagana.',
        'is_active_boolean' => 'Flaga statusu musi mieć wartość prawda albo fałsz.',
    ],

    'view' => [
        'currencies' => 'Waluty',
        'description' => 'Zarządzaj walutami dostępnymi w Państwa obszarze roboczym. Tylko aktywne waluty będą oferowane w wyborach związanych z walutą.',

        'table' => [
            'name' => 'Nazwa',
            'decimal' => 'Liczba miejsc po przecinku',
            'symbol' => 'Symbol',
            'status' => 'Status',
            'action' => 'Działanie',
            'active' => 'Aktywna',
            'inactive' => 'Nieaktywna',
            'activate' => 'Aktywuj',
            'deactivate' => 'Dezaktywuj',
        ],

        'actions' => [
            'selected' => 'wybrano',
            'activate_selected' => 'Aktywuj wybrane',
            'deactivate_selected' => 'Dezaktywuj wybrane',
            'set_all_active' => 'Ustaw wszystkie jako aktywne',
            'set_all_inactive' => 'Ustaw wszystkie jako nieaktywne',
        ],

        'alerts' => [
            'future_behavior_note' => 'Te ustawienia walut są przygotowane na potrzeby przyszłych funkcji cenowych i regionalnych. Obecnie nie wpływają one na bieżące działanie Państwa obszaru roboczego rezerwacji.',
        ],
    ],
];