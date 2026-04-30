<?php

return [
    'messages' => [
        'updated' => 'Status języka został pomyślnie zaktualizowany.',
    ],

    'validation' => [
        'scope_required' => 'Zakres jest wymagany.',
        'scope_in' => 'Nieprawidłowy zakres aktualizacji.',

        'language_ids_array' => 'Wybór języków musi być prawidłową tablicą.',
        'language_ids_integer' => 'Każdy identyfikator języka musi być liczbą całkowitą.',
        'language_ids_exists' => 'Co najmniej jeden z wybranych języków nie istnieje.',
        'language_ids_required' => 'Należy wybrać co najmniej jeden język.',
        'language_ids_single' => 'Dla pojedynczego zakresu należy podać dokładnie jeden język.',

        'is_active_required' => 'Flaga statusu jest wymagana.',
        'is_active_boolean' => 'Flaga statusu musi mieć wartość prawda albo fałsz.',
    ],

    'view' => [
        'languages' => 'Języki',
        'description' => 'Zarządzaj językami dostępnymi w Państwa obszarze roboczym. Tylko aktywne języki będą oferowane w wyborach związanych z językiem.',

        'table' => [
            'name' => 'Nazwa',
            'local_name' => 'Nazwa lokalna',
            'tag' => 'Tag',
            'status' => 'Status',
            'action' => 'Działanie',
            'active' => 'Aktywny',
            'inactive' => 'Nieaktywny',
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
            'future_behavior_note' => 'Te ustawienia języków są przygotowane na potrzeby przyszłych funkcji wielojęzycznych. Obecnie nie wpływają one na bieżące działanie Państwa obszaru roboczego rezerwacji.',
        ],
    ],
];