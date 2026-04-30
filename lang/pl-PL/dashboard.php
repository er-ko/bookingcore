<?php

return [
    'errors' => [
        'activity_inactive' => 'Wybrana usługa nie istnieje lub jest nieaktywna.',
        'unit_invalid' => 'Wybrana jednostka nie istnieje, jest nieaktywna albo nie należy do podanego oddziału.',
        'activity_not_assigned' => 'Wybrana usługa nie jest przypisana do wybranej jednostki.',
        'activity_not_available_for_unit' => 'Wybrana usługa nie jest dostępna dla wybranej jednostki.',
        'unit_already_booked' => 'Wybrana jednostka jest już zarezerwowana w podanym przedziale czasowym.',
        'booking_conflict' => 'Rezerwacja koliduje z istniejącą rezerwacją.',
        'slot_overlap' => 'Wybrany termin rezerwacji nakłada się na istniejącą rezerwację.',
        'outside_working_hours' => 'Wybrany termin rezerwacji znajduje się poza godzinami pracy.',
        'during_time_off' => 'Wybrany termin rezerwacji przypada w zablokowanym okresie niedostępności.',
        'already_cancelled' => 'Rezerwacja została już anulowana.',
        'cancelled_cannot_be_updated' => 'Anulowanych rezerwacji nie można aktualizować.',
        'same_status' => 'Rezerwacja ma już status: :status.',
        'use_cancel_action' => 'Aby anulować rezerwację, należy użyć akcji anulowania rezerwacji.',
        'invalid_activity_minutes' => 'Czas trwania usługi w minutach musi być większy niż zero.',
        'negative_buffer_minutes' => 'Czas bufora w minutach nie może być ujemny.',
        'invalid_slot_block' => 'Całkowity blok terminu musi być większy niż zero.',
        'invalid_total_slot_block' => 'Całkowity blok terminu musi być większy niż zero.',
        'invalid_time_range' => 'Początek przedziału czasowego musi być wcześniejszy niż jego koniec.',
        'invalid_day_of_week' => 'Nieprawidłowy dzień tygodnia: :value',
        'invalid_booking_status' => 'Nieprawidłowy status rezerwacji: :value',
    ],

    'messages' => [
        'created' => 'Rezerwacja została pomyślnie utworzona.',
        'failed' => 'Nie udało się utworzyć rezerwacji.',
        'cancelled' => 'Rezerwacja została pomyślnie anulowana.',
        'status_updated' => 'Status rezerwacji został pomyślnie zaktualizowany.',
        'not_found' => 'Nie znaleziono wybranej rezerwacji.',
    ],

    'validation' => [
        'branch_required' => 'Oddział jest wymagany.',
        'branch_invalid' => 'Identyfikator oddziału jest nieprawidłowy.',
        'branch_not_found' => 'Wybrany oddział nie istnieje.',

        'unit_required' => 'Jednostka jest wymagana.',
        'unit_invalid' => 'Identyfikator jednostki jest nieprawidłowy.',
        'unit_not_found' => 'Wybrana jednostka nie istnieje.',

        'activity_required' => 'Usługa jest wymagana.',
        'activity_invalid' => 'Identyfikator usługi jest nieprawidłowy.',
        'activity_not_found' => 'Wybrana usługa nie istnieje.',
        'activity_not_available_for_unit' => 'Wybrana usługa nie jest dostępna dla wybranej jednostki.',

        'starts_at_required' => 'Godzina rozpoczęcia jest wymagana.',
        'starts_at_invalid' => 'Format godziny rozpoczęcia jest nieprawidłowy.',

        'customer_required' => 'Informacje o kliencie są wymagane.',
        'customer_invalid' => 'Format danych klienta jest nieprawidłowy.',

        'customer_first_name_required' => 'Imię klienta jest wymagane.',
        'customer_first_name_invalid' => 'Imię klienta musi być ciągiem znaków.',
        'customer_first_name_too_long' => 'Imię klienta jest zbyt długie.',

        'customer_last_name_required' => 'Nazwisko klienta jest wymagane.',
        'customer_last_name_invalid' => 'Nazwisko klienta musi być ciągiem znaków.',
        'customer_last_name_too_long' => 'Nazwisko klienta jest zbyt długie.',

        'customer_email_required' => 'Adres e-mail klienta jest wymagany.',
        'customer_email_invalid' => 'Adres e-mail klienta musi być prawidłowym adresem e-mail.',
        'customer_email_too_long' => 'Adres e-mail klienta jest zbyt długi.',

        'customer_phone_code_required' => 'Numer kierunkowy jest wymagany.',
        'customer_phone_code_invalid' => 'Numer kierunkowy musi być ciągiem znaków.',
        'customer_phone_code_too_long' => 'Numer kierunkowy jest zbyt długi.',

        'customer_phone_required' => 'Numer telefonu jest wymagany.',
        'customer_phone_invalid' => 'Numer telefonu musi być ciągiem znaków.',
        'customer_phone_too_long' => 'Numer telefonu jest zbyt długi.',

        'note_invalid' => 'Notatka musi być ciągiem znaków.',

        'status_required' => 'Status rezerwacji jest wymagany.',
        'status_invalid' => 'Format statusu rezerwacji jest nieprawidłowy.',
        'status_not_allowed' => 'Wybrany status rezerwacji jest niedozwolony.',

        'date_required' => 'Data jest wymagana.',
        'date_invalid' => 'Format daty jest nieprawidłowy.',
    ],

    'view' => [
        'title' => 'Panel główny',
        'create_booking' => 'Utwórz rezerwację',
        'edit_booking' => 'Edytuj rezerwację',
        'index_description' => 'Przegląd utworzonych rezerwacji, w tym ich bieżącego statusu oraz powiązanych elementów.',
        'create_description' => 'Utwórz nową rezerwację z danymi klienta, wyborem usługi oraz dostępnym terminem.',
        'edit_description' => 'Zaktualizuj szczegóły rezerwacji, informacje o kliencie oraz status rezerwacji.',
        'back_to_dashboard' => 'Powrót do panelu głównego',
        'create_first_booking' => 'Utwórz pierwszą rezerwację',
        'no_bookings_found' => 'Nie znaleziono rezerwacji.',
        'no_bookings_text' => 'Nie ma jeszcze żadnych rezerwacji do wyświetlenia. Utwórz pierwszą rezerwację, aby rozpocząć pracę z systemem.',

        'table' => [
            'customer' => 'Klient',
            'branch' => 'Oddział',
            'unit' => 'Jednostka',
            'activity' => 'Usługa',
            'starts_at' => 'Rozpoczyna się',
            'ends_at' => 'Kończy się',
            'status' => 'Status',
            'actions' => 'Działania',
            'active' => 'Aktywna',
            'inactive' => 'Nieaktywna',
        ],

        'overview' => [
            'title' => 'Przegląd rezerwacji',

            'customer_title' => 'Dane klienta',
            'customer_text' => 'Wprowadź informacje o kliencie wymagane do utworzenia rezerwacji.',

            'booking_flow_title' => 'Proces rezerwacji',
            'booking_flow_text' => 'Wybierz oddział, następnie jednostkę, usługę, datę oraz dostępny termin.',

            'availability_title' => 'Dostępność',
            'availability_text' => 'Dostępne terminy są ładowane na podstawie wybranego oddziału, jednostki, usługi oraz daty.',

            'required_title' => 'Wymagane',
            'required_items' => [
                'first_and_last_name' => 'Imię i nazwisko',
                'phone_code_and_number' => 'Numer kierunkowy i numer telefonu',
                'branch' => 'Oddział',
                'unit' => 'Jednostka',
                'activity' => 'Usługa',
                'date' => 'Data',
                'slot' => 'Dostępny termin',
            ],

            'optional_title' => 'Opcjonalne',
            'optional_items' => [
                'email' => 'E-mail',
                'note' => 'Notatka',
            ],

            'note_title' => 'Uwaga',
            'note_text' => 'Rezerwację można utworzyć dopiero po wybraniu prawidłowego dostępnego terminu.',
        ],

        'form' => [
            'booking_details' => 'Szczegóły rezerwacji',
            'complete_the_reservation' => 'Dokończ rezerwację',
            'customer_details' => 'Dane klienta',
            'first_name_title' => 'Imię',
            'last_name_title' => 'Nazwisko',
            'email_title' => 'E-mail',
            'phone_code_title' => 'Numer kierunkowy',
            'phone_title' => 'Telefon',
            'branch_title' => 'Oddział',
            'select_branch' => 'Wybierz oddział',
            'unit_title' => 'Jednostka',
            'select_unit' => 'Wybierz jednostkę',
            'loading_units' => 'Ładowanie jednostek...',
            'activity_title' => 'Usługa',
            'select_activity' => 'Wybierz usługę',
            'loading_activities' => 'Ładowanie usług...',
            'date_title' => 'Data',
            'available_slots_title' => 'Dostępne terminy',
            'available_slots_count' => 'dostępny termin / dostępne terminy',
            'loading_slots' => 'Ładowanie terminów...',
            'no_available_slots' => 'Nie znaleziono dostępnych terminów dla wybranej daty.',
            'select_slot' => 'Wybierz termin',
            'note_title' => 'Notatka',
        ],

        'actions' => [
            'confirm' => 'Potwierdź',
            'complete' => 'Zakończ',
            'cancel' => 'Anuluj',
            'create' => 'Utwórz rezerwację',
            'creating' => 'Tworzenie...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Czy na pewno chcą Państwo anulować tę rezerwację?',
        ],

    ],
];