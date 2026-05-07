<?php

return [
    'meta' => [
        'title' => 'Polityka prywatności | BookingCore',
        'description' => 'Polityka prywatności BookingCore, obejmująca integrację z kalendarzem oraz przetwarzanie danych publicznych rezerwacji.',
    ],
    'badge' => 'Polityka prywatności',
    'title' => 'Polityka prywatności',
    'updated' => 'Ostatnia aktualizacja: 7 maja 2026 r.',
    'intro' => 'BookingCore jest aplikacją open source do rezerwacji i planowania terminów. Niniejsza polityka wyjaśnia, jakie informacje są przetwarzane przez BookingCore, w jaki sposób są wykorzystywane oraz jak obsługiwane są dane Kalendarza Google, gdy użytkownik podłączy integrację z kalendarzem.',
    'sections' => [
        'who_operates' => [
            'title' => 'Kto obsługuje BookingCore',
            'body_1' => 'BookingCore jest udostępniany jako aplikacja open source do planowania terminów pod adresem bookingcore.link. W sprawach dotyczących prywatności, żądań związanych z danymi lub pytań dotyczących integracji z kalendarzem prosimy o kontakt pod adresem roman.kocian@gmail.com.',
        ],
        'information_we_process' => [
            'title' => 'Informacje, które przetwarzamy',
            'body_1' => 'Użytkownicy posiadający konto mogą podawać ustawienia identyfikacyjne, dane oddziałów, jednostki, aktywności, ceny, godziny pracy, ustawienia czasu niedostępności, dane rezerwacji klientów oraz ustawienia integracji z kalendarzem.',
            'body_2' => 'Publiczni odwiedzający, którzy tworzą rezerwację, mogą podawać dane rezerwacji, takie jak imię i nazwisko, dane kontaktowe, wybrana usługa, wybrany termin oraz opcjonalne uwagi.',
            'body_3' => 'Aplikacja może również przetwarzać standardowe informacje techniczne niezbędne do działania usługi, takie jak pliki cookie sesji, metadane żądań, znaczniki czasu oraz dzienniki bezpieczeństwa.',
        ],
        'how_information_is_used' => [
            'title' => 'W jaki sposób wykorzystywane są informacje',
            'body_1' => 'BookingCore wykorzystuje informacje do udostępniania funkcji planowania terminów, wyświetlania dostępnych terminów rezerwacji, zarządzania rezerwacjami, wysyłania lub przechowywania danych rezerwacji oraz synchronizowania podłączonych kalendarzy, gdy ta funkcja jest włączona.',
            'body_2' => 'Informacje nie są sprzedawane. BookingCore nie wykorzystuje danych użytkowników Google do celów reklamowych, profilowania ani niepowiązanych analiz.',
        ],
        'google_calendar_integration' => [
            'title' => 'Integracja z Kalendarzem Google',
            'body_1' => 'Gdy użytkownik posiadający konto podłączy Kalendarz Google, BookingCore żąda dostępu wyłącznie w celu obsługi synchronizacji kalendarza dla rezerwacji utworzonych lub zarządzanych w BookingCore.',
            'body_2' => 'BookingCore może tworzyć, aktualizować, odczytywać lub wybierać informacje z kalendarza niezbędne do umieszczania wydarzeń rezerwacji w podłączonym kalendarzu oraz utrzymywania zgodności tych wydarzeń z harmonogramem BookingCore.',
            'body_3' => 'Dane Kalendarza Google są wykorzystywane wyłącznie do zapewnienia integracji z kalendarzem żądanej przez użytkownika. Nie są one przekazywane stronom trzecim, z wyjątkiem przypadków niezbędnych do świadczenia lub utrzymania aplikacji, przestrzegania prawa albo ochrony usługi.',
        ],
        'data_sharing' => [
            'title' => 'Udostępnianie danych',
            'body_1' => 'Dane rezerwacji mogą być widoczne dla użytkownika konta lub organizacji, która jest właścicielem publicznej strony rezerwacji, na której rezerwacja została utworzona.',
            'body_2' => 'Dostawcy usług, którzy hostują, zabezpieczają lub obsługują aplikację, mogą przetwarzać dane wyłącznie w zakresie niezbędnym do świadczenia usługi.',
            'body_3' => 'Dane mogą zostać ujawnione, jeżeli jest to wymagane przez prawo, postępowanie prawne lub jest niezbędne do ochrony użytkowników, aplikacji albo społeczeństwa.',
        ],
        'retention_and_deletion' => [
            'title' => 'Przechowywanie i usuwanie danych',
            'body_1' => 'BookingCore przechowuje dane tak długo, jak jest to niezbędne do świadczenia usługi, utrzymywania danych rezerwacji, obsługi funkcji podłączonego kalendarza oraz spełnienia wymogów prawnych lub operacyjnych.',
            'body_2' => 'Użytkownicy mogą zażądać usunięcia danych swojego konta lub odłączyć dostęp do Kalendarza Google. Po odłączeniu dostępu do kalendarza BookingCore przestaje wykorzystywać daną autoryzację Google do przyszłej synchronizacji kalendarza.',
        ],
        'security' => [
            'title' => 'Bezpieczeństwo',
            'body_1' => 'BookingCore stosuje rozsądne środki techniczne i organizacyjne w celu ochrony danych, w tym uwierzytelniony dostęp do funkcji administracyjnych oraz autoryzację opartą na OAuth dla integracji z Google.',
            'body_2' => 'Żadna metoda przesyłania ani przechowywania danych nie jest całkowicie bezpieczna, jednak aplikacja została zaprojektowana tak, aby ograniczać dostęp do danych zgodnie z rolą użytkownika oraz używaną funkcją.',
        ],
        'your_choices' => [
            'title' => 'Państwa wybory',
            'body_1' => 'Użytkownicy posiadający konto mogą zarządzać danymi rezerwacji w aplikacji, odłączać integracje z kalendarzem oraz, tam gdzie jest to dostępne, żądać usunięcia konta.',
            'body_2' => 'Można również cofnąć dostęp BookingCore w ustawieniach bezpieczeństwa swojego Konta Google.',
        ],
        'changes' => [
            'title' => 'Zmiany',
            'body_1' => 'Niniejsza polityka może być aktualizowana wraz z rozwojem BookingCore. Data aktualizacji podana powyżej wskazuje, kiedy najnowsza wersja weszła w życie.',
        ],
    ],
    'links' => [
        'home' => 'Strona główna',
        'terms_of_service' => 'Regulamin świadczenia usług',
    ],
];