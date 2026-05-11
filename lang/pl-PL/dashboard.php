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
        'cancelled' => 'Rezerwacja została pomyślnie anulowana.',
        'status_updated' => 'Status rezerwacji został pomyślnie zaktualizowany.',
    ],

    'validation' => [
        'status_required' => 'Status rezerwacji jest wymagany.',
        'status_invalid' => 'Format statusu rezerwacji jest nieprawidłowy.',
        'status_not_allowed' => 'Wybrany status rezerwacji jest niedozwolony.',
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

        'actions' => [
            'confirm' => 'Potwierdź',
            'complete' => 'Zakończ',
            'cancel' => 'Anuluj',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Czy na pewno chcą Państwo anulować tę rezerwację?',
        ],

    ],
];