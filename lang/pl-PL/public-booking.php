<?php

return [
    'view' => [
        'title' => 'Zarezerwuj wizytę',
        'description' => 'Wybierz oddział, usługę, datę i godzinę, które najlepiej Państwu odpowiadają.',

        'form' => [
            'branch_title' => 'Oddział',
            'branch_placeholder' => 'Wybierz oddział',

            'unit_title' => 'Jednostka',
            'unit_placeholder' => 'Wybierz jednostkę',

            'activity_title' => 'Usługa',
            'activity_placeholder' => 'Wybierz usługę',

            'date_title' => 'Data',
            'date_placeholder' => 'Wybierz datę',

            'slot_title' => 'Dostępna godzina',
            'slot_placeholder' => 'Wybierz godzinę',

            'first_name_title' => 'Imię',
            'first_name_placeholder' => 'Jan',

            'last_name_title' => 'Nazwisko',
            'last_name_placeholder' => 'Kowalski',

            'email_title' => 'E-mail',
            'email_placeholder' => 'jan@example.com',

            'phone_code_title' => 'Numer kierunkowy',
            'phone_code_placeholder' => '+48',

            'phone_title' => 'Telefon',
            'phone_placeholder' => '555123456',

            'note_title' => 'Notatka',
            'note_placeholder' => 'Dodatkowe informacje dotyczące Państwa rezerwacji',
        ],

        'content' => [
            'form_title' => 'Dokończ rezerwację',
            'ready' => 'gotowe',

            'appointment_title' => 'Szczegóły wizyty',
            'appointment_text' => 'Wybierz oddział, jednostkę, usługę, datę i przedział czasowy, które najlepiej Państwu odpowiadają.',

            'customer_title' => 'Dane klienta',
            'customer_text' => 'Dodaj dane kontaktowe potrzebne do potwierdzenia i rozpoznania rezerwacji.',

            'note_title' => 'Dodatkowa notatka',
            'note_text' => 'Przekaż wszelkie pomocne informacje przed rozpoczęciem rezerwacji.',

            'review_title' => 'Sprawdź szczegóły rezerwacji i potwierdź, gdy wszystko będzie się zgadzać.',
            'review_text' => 'Podsumowanie rezerwacji aktualizuje się na bieżąco podczas wypełniania formularza.',
            'review_live_text' => ':selection/4 szczegóły rezerwacji, :customer/4 dane kontaktowe',

            'summary_badge' => 'Podsumowanie',
            'summary_progress' => 'Sprawdzenie rezerwacji',

            'branch_label' => 'Oddział',
            'unit_label' => 'Jednostka',
            'activity_label' => 'Usługa',
            'date_time_label' => 'Data / godzina',
            'customer_label' => 'Klient',
            'email_label' => 'E-mail',
            'phone_label' => 'Telefon',
            'note_label' => 'Notatka',

            'summary_empty_selection' => 'Jeszcze nie wybrano',
            'summary_empty_customer' => 'Jeszcze nie uzupełniono',

            'branch_status_title' => 'Status oddziału',
            'service_status_title' => 'Status usługi',
            'schedule_status_title' => 'Status harmonogramu',
        ],

        'states' => [
            'no_branches_title' => 'Brak dostępnych oddziałów',
            'no_branches_text' => 'Obecnie nie ma publicznych oddziałów dostępnych do rezerwacji.',

            'no_units_title' => 'Brak dostępnych jednostek',
            'no_units_text' => 'Dla wybranego oddziału nie ma obecnie dostępnych jednostek.',

            'no_activities_title' => 'Brak dostępnych usług',
            'no_activities_text' => 'Dla wybranej jednostki nie ma obecnie dostępnych usług.',

            'no_slots_title' => 'Brak dostępnych terminów',
            'no_slots_text' => 'Dla wybranej daty nie ma dostępnych terminów rezerwacji.',

            'branch_default' => 'Wybierz lokalizację, w której ma odbyć się rezerwacja.',
            'service_default' => 'Wybierz usługę po wybraniu odpowiedniej jednostki.',
            'schedule_loading' => 'Sprawdzanie aktualnej dostępności dla wybranego dnia.',
            'schedule_default' => 'Wybierz datę, aby załadować dostępne terminy rezerwacji.',
        ],

        'actions' => [
            'submit' => 'Utwórz rezerwację',
            'submitting' => 'Tworzenie rezerwacji...',
        ],

        'messages' => [
            'created' => 'Rezerwacja została pomyślnie utworzona.',
            'failed' => 'Nie udało się utworzyć rezerwacji.',
        ],

        'detail' => [
            'title' => 'Szczegóły rezerwacji',
            'badge_created' => 'Rezerwacja utworzona',
            'status_label' => 'Status',
            'heading' => 'Państwa rezerwacja została zapisana',
            'description' => 'Zapisz tę stronę na później, pobierz plik kalendarza lub wydrukuj potwierdzenie.',
            'details_title' => 'Szczegóły rezerwacji',
            'branch_label' => 'Oddział',
            'unit_label' => 'Jednostka',
            'activity_label' => 'Usługa',
            'date_time_label' => 'Data i godzina',
            'to_label' => 'do',
            'customer_title' => 'Informacje o kliencie',
            'customer_name_label' => 'Imię i nazwisko',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Telefon',
            'note_label' => 'Notatka',
            'actions' => [
                'back' => 'Powrót do strony rezerwacji',
                'print' => 'Drukuj stronę',
                'calendar' => 'Dodaj do swojego kalendarza',
            ],
            'fallback' => '—',
        ],
    ],
];