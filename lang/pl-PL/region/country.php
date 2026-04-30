<?php

return [
    'messages' => [
        'updated' => 'Status kraju został pomyślnie zaktualizowany.',
    ],

    'validation' => [
        'scope_required' => 'Zakres jest wymagany.',
        'scope_in' => 'Nieprawidłowy zakres aktualizacji.',

        'country_ids_array' => 'Wybór krajów musi być prawidłową tablicą.',
        'country_ids_integer' => 'Każdy identyfikator kraju musi być liczbą całkowitą.',
        'country_ids_exists' => 'Co najmniej jeden z wybranych krajów nie istnieje.',
        'country_ids_required' => 'Należy wybrać co najmniej jeden kraj.',
        'country_ids_single' => 'Dla pojedynczego zakresu należy podać dokładnie jeden kraj.',

        'is_active_required' => 'Flaga statusu jest wymagana.',
        'is_active_boolean' => 'Flaga statusu musi mieć wartość prawda albo fałsz.',
    ],

    'view' => [
        'countries' => 'Kraje',
        'description' => 'Zarządzaj krajami dostępnymi w Państwa obszarze roboczym rezerwacji.',

        'table' => [
            'official_name' => 'Nazwa oficjalna',
            'language' => 'Język',
            'currency' => 'Waluta',
            'phone_code' => 'Numer kierunkowy',
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
            'future_behavior_note' => 'Te ustawienia krajów są przygotowane na potrzeby przyszłych funkcji regionalnych. Obecnie nie wpływają one na bieżące działanie Państwa obszaru roboczego rezerwacji.',
        ],
    ],
];