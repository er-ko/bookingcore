<?php

return [
    'messages' => [
        'created'   => 'Cena została pomyślnie utworzona.',
        'updated'   => 'Cena została pomyślnie zaktualizowana.',
        'deleted'   => 'Cena została pomyślnie usunięta.',
        'failed'    => 'Nie udało się przetworzyć żądania dotyczącego ceny.',
    ],

    'validation' => [
        'branch_required' => 'Proszę wybrać oddział.',
        'branch_invalid' => 'Wybrany oddział jest nieprawidłowy.',
        'branch_not_found' => 'Nie znaleziono wybranego oddziału.',

        'unit_required' => 'Proszę wybrać jednostkę.',
        'unit_invalid' => 'Wybrana jednostka jest nieprawidłowa.',
        'unit_not_found' => 'Nie znaleziono wybranej jednostki.',

        'activity_required' => 'Proszę wybrać usługę.',
        'activity_invalid' => 'Wybrana usługa jest nieprawidłowa.',
        'activity_not_found' => 'Nie znaleziono wybranej usługi.',

        'price_already_exists' => 'Cena dla wybranej jednostki i usługi już istnieje.',
        'price_not_found' => 'Nie znaleziono wybranej ceny.',
        'price_required' => 'Proszę wprowadzić cenę.',
        'price_invalid' => 'Cena musi być prawidłową liczbą.',
        'price_min' => 'Cena musi wynosić zero lub więcej.',
    ],

    'view' => [
        'title' => 'Ceny',
        'description' => 'Ustaw domyślną cenę dla każdej usługi w ramach konkretnej jednostki.',

        'form' => [
            'title' => 'Ustawienia ceny',
            'branch_title' => 'Oddział',
            'branch_placeholder' => 'Wybierz oddział',
            'unit_title' => 'Jednostka',
            'unit_placeholder' => 'Wybierz jednostkę',
            'activity_title' => 'Usługa',
            'activity_placeholder' => 'Wybierz usługę',
            'price_title' => 'Cena',
            'price_placeholder' => 'Wprowadź cenę',
            'currency_title' => 'Waluta',
            'currency_text' => 'Ceny są przechowywane w Państwa domyślnej walucie.',
        ],

        'table' => [
            'title' => 'Zapisane ceny',
            'branch_title' => 'Oddział',
            'unit_title' => 'Jednostka',
            'activity_title' => 'Usługa',
            'price_title' => 'Cena',
            'actions_title' => 'Działania',
        ],

        'actions' => [
            'save' => 'Zapisz cenę',
            'saving' => 'Zapisywanie...',
            'edit' => 'Edytuj',
            'update' => 'Zaktualizuj',
            'updating' => 'Aktualizowanie...',
            'delete' => 'Usuń',
            'cancel' => 'Anuluj',
            'deleting' => 'Usuwanie...',
        ],

        'states' => [
            'empty_title' => 'Brak cen',
            'empty_text' => 'Utwórz pierwszą cenę dla kombinacji jednostki i usługi.',
            'no_branches_title' => 'Konfiguracja cen jest niedostępna',
            'no_branches_text' => 'Najpierw utwórz oddział, aby rozpocząć ustawianie cen.',
            'no_units_text' => 'Dla wybranego oddziału nie ma dostępnych jednostek.',
            'no_activities_text' => 'Brak dostępnych usług.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Czy na pewno chcą Państwo usunąć tę cenę?',
        ],
    ],
];