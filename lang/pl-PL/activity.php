<?php

return [
    'messages' => [
        'created'   => 'Usługa została pomyślnie utworzona.',
        'updated'   => 'Usługa została pomyślnie zaktualizowana.',
        'deleted'   => 'Usługa została pomyślnie usunięta.',
        'failed'    => 'Nie udało się przetworzyć żądania dotyczącego usługi.',
        'not_found' => 'Nie znaleziono usługi.',
        'limit_reached' => 'Osiągnięto maksymalną dozwoloną liczbę usług.',
    ],

    'validation' => [
        'name_required' => 'Nazwa usługi jest wymagana.',
        'name_max' => 'Nazwa usługi nie może być dłuższa niż 255 znaków.',

        'duration_required' => 'Czas trwania jest wymagany.',
        'duration_integer' => 'Czas trwania musi być podany jako pełna liczba minut.',
        'duration_min' => 'Czas trwania musi wynosić co najmniej 1 minutę.',
        'duration_max' => 'Czas trwania nie może być dłuższy niż 1200 minut.',

        'buffer_before_integer' => 'Bufor przed usługą musi być podany jako pełna liczba minut.',
        'buffer_before_min' => 'Bufor przed usługą musi wynosić co najmniej 0 minut.',
        'buffer_before_max' => 'Bufor przed usługą nie może być dłuższy niż 60 minut.',

        'buffer_after_integer' => 'Bufor po usłudze musi być podany jako pełna liczba minut.',
        'buffer_after_min' => 'Bufor po usłudze musi wynosić co najmniej 0 minut.',
        'buffer_after_max' => 'Bufor po usłudze nie może być dłuższy niż 60 minut.',

        'is_active_required' => 'Status aktywności jest wymagany.',
        'is_active_boolean' => 'Status aktywności musi mieć wartość prawda lub fałsz.',
    ],

    'view' => [
        'title' => 'Usługa',
        'activities' => 'Usługi',
        'create_activity' => 'Utwórz usługę',
        'edit_activity' => 'Edytuj usługę',
        'index_description' => 'Zarządzaj usługami, które można rezerwować w Państwa jednostkach.',
        'create_description' => 'Zdefiniuj nową usługę, w tym czas trwania, czasy bufora oraz status aktywności.',
        'edit_description' => 'Zaktualizuj dane istniejącej usługi, w tym czas trwania, czasy bufora oraz status aktywności.',
        'back_to_activities' => 'Powrót do usług',
        'create_first_activity' => 'Utwórz pierwszą usługę',
        'no_activities_found' => 'Nie znaleziono usług.',
        'no_activities_text' => 'Nie ma jeszcze żadnych usług do wyświetlenia. Utwórz pierwszą usługę, aby rozpocząć organizację struktury rezerwacji.',

        'table' => [
            'name' => 'Nazwa',
            'status' => 'Status',
            'updated' => 'Zaktualizowano',
            'actions' => 'Działania',
            'duration' => 'Czas trwania',
            'min' => 'min',
            'active' => 'Aktywna',
            'inactive' => 'Nieaktywna',
        ],

        'overview' => [
            'title' => 'Przegląd usługi',
            'activity_id_title' => 'ID usługi',
            'duration_title' => 'Czas trwania',
            'duration_text' => 'Ustaw, ile minut powinna trwać usługa.',
            'buffer_time_title' => 'Czas bufora',
            'buffer_time_text' => 'Dodaj opcjonalny czas przed usługą i po niej, aby zapobiec zbyt ciasno następującym po sobie rezerwacjom.',
            'required_title' => 'Wymagane',
            'optional_title' => 'Opcjonalne',
            'status_title' => 'Status',
            'status_text' => 'Nieaktywne usługi pozostają zapisane w systemie, ale nie mogą być używane do nowych rezerwacji.',
            'active_title' => 'Aktywna',
            'inactive_title' => 'Nieaktywna',
            'note_title' => 'Uwaga',
            'note_text' => 'Aktualizacja tej usługi nie wpłynie na inne usługi w systemie.',
        ],

        'form' => [
            'activity_details' => 'Dane usługi',
            'complete_the_form' => 'Wypełnij formularz',
            'update_the_form' => 'Zaktualizuj formularz',
            'name_title' => 'Nazwa',
            'duration_title' => 'Czas trwania (minuty)',
            'buffer_before_title' => 'Czas bufora przed usługą (minuty)',
            'buffer_after_title' => 'Czas bufora po usłudze (minuty)',
            'active_title' => 'Aktywna usługa',
            'active_text' => 'Nieaktywne usługi pozostają zapisane w systemie, ale nie mogą być używane do nowych rezerwacji.',
        ],

        'actions' => [
            'edit' => 'Edytuj',
            'delete' => 'Usuń',
            'cancel' => 'Anuluj',
            'create' => 'Utwórz usługę',
            'creating' => 'Tworzenie...',
            'save' => 'Zapisz zmiany',
            'saving' => 'Zapisywanie...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Czy na pewno chcą Państwo usunąć tę usługę?',
        ],

    ],
];