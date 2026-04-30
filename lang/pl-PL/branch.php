<?php

return [
    'messages' => [
        'created'   => 'Oddział został pomyślnie utworzony.',
        'updated'   => 'Oddział został pomyślnie zaktualizowany.',
        'deleted'   => 'Oddział został pomyślnie usunięty.',
        'failed'    => 'Nie udało się przetworzyć żądania dotyczącego oddziału.',
        'not_found' => 'Nie znaleziono oddziału.',
        'has_units' => 'Nie można usunąć oddziału, ponieważ nadal zawiera jednostki.',
        'has_bookings' => 'Nie można usunąć oddziału, ponieważ nadal zawiera rezerwacje.',
        'limit_reached' => 'Osiągnięto maksymalną dozwoloną liczbę oddziałów.',
    ],

    'validation' => [
        'name_required' => 'Nazwa oddziału jest wymagana.',
        'name_max' => 'Nazwa oddziału nie może być dłuższa niż 255 znaków.',

        'address_line_1_max' => 'Pierwszy wiersz adresu nie może być dłuższy niż 255 znaków.',
        'address_line_2_max' => 'Drugi wiersz adresu nie może być dłuższy niż 255 znaków.',

        'city_max' => 'Nazwa miasta nie może być dłuższa niż 255 znaków.',
        'postcode_max' => 'Kod pocztowy nie może być dłuższy niż 32 znaki.',

        'country_code_size' => 'Kod kraju musi mieć dokładnie 2 znaki.',

        'timezone_required' => 'Strefa czasowa jest wymagana.',
        'timezone_max' => 'Strefa czasowa nie może być dłuższa niż 64 znaki.',

        'is_active_required' => 'Status aktywności jest wymagany.',
        'is_active_boolean' => 'Status aktywności musi mieć wartość prawda lub fałsz.',
    ],

    'view' => [
        'title' => 'Oddział',
        'branches' => 'Oddziały',
        'create_branch' => 'Utwórz oddział',
        'edit_branch' => 'Edytuj oddział',
        'index_description' => 'Zarządzaj swoimi oddziałami, w tym danymi adresowymi, strefą czasową i statusem aktywności.',
        'create_description' => 'Utwórz nowy oddział z danymi adresowymi, strefą czasową i statusem aktywności.',
        'edit_description' => 'Zaktualizuj dane oddziału, adres, strefę czasową i status aktywności.',
        'back_to_branches' => 'Powrót do oddziałów',
        'create_first_branch' => 'Utwórz pierwszy oddział',
        'no_branches_found' => 'Nie znaleziono oddziałów.',
        'no_branches_text' => 'Nie ma jeszcze żadnych oddziałów do wyświetlenia. Utwórz pierwszy oddział, aby rozpocząć organizację struktury rezerwacji.',

        'table' => [
            'branch' => 'Oddział',
            'address' => 'Adres',
            'city' => 'Miasto',
            'timezone' => 'Strefa czasowa',
            'no_address_text' => 'Nie podano adresu',
            'status' => 'Status',
            'updated' => 'Zaktualizowano',
            'actions' => 'Działania',
            'active' => 'Aktywny',
            'inactive' => 'Nieaktywny',
        ],

        'overview' => [
            'title' => 'Przegląd oddziału',
            'branch_id_title' => 'ID oddziału',
            'countries_available_title' => 'Dostępne kraje',
            'city_and_postcode_title' => 'Miasto i kod pocztowy',
            'country_and_timezone_title' => 'Kraj i strefa czasowa',
            'timezone_title' => 'Strefa czasowa',
            'timezone_text' => 'Na podstawie wybranego kraju',
            'limit_title' => 'Limit',
            'limit_text' => 'Można utworzyć maksymalnie 10 oddziałów.',
            'duration_text' => 'Ustaw lokalizację oddziału oraz domyślne ustawienia regionalne.',
            'required_title' => 'Wymagane',
            'optional_title' => 'Opcjonalne',
            'status_title' => 'Bieżący status',
            'active_title' => 'Aktywny',
            'inactive_title' => 'Nieaktywny',
            'note_title' => 'Uwaga',
            'note_text' => 'Aktualizacja tego oddziału nie wpłynie na inne oddziały w systemie.',
        ],

        'form' => [
            'branch_details' => 'Dane oddziału',
            'complete_the_form' => 'Wypełnij formularz',
            'update_the_form' => 'Zaktualizuj formularz',
            'branch_name_title' => 'Nazwa oddziału',
            'address_line_1_title' => 'Pierwszy wiersz adresu',
            'address_line_2_title' => 'Drugi wiersz adresu',
            'city_title' => 'Miasto',
            'postcode_title' => 'Kod pocztowy',
            'country_title' => 'Kraj',
            'select_country' => 'Wybierz kraj',
            'timezone_title' => 'Strefa czasowa',
            'select_timezone' => 'Wybierz strefę czasową',
            'loading_timezones' => 'Ładowanie stref czasowych...',
            'active_title' => 'Aktywny oddział',
            'active_text' => 'Nieaktywne oddziały mogą pozostać zapisane w systemie bez aktywnego używania.',
        ],

        'actions' => [
            'edit' => 'Edytuj',
            'delete' => 'Usuń',
            'cancel' => 'Anuluj',
            'create' => 'Utwórz oddział',
            'creating' => 'Tworzenie...',
            'save' => 'Zapisz zmiany',
            'saving' => 'Zapisywanie...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Czy na pewno chcą Państwo usunąć ten oddział?',
        ],

    ],
];