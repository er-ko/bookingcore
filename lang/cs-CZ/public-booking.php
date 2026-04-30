<?php

return [
    'view' => [
        'title' => 'Rezervujte si termín',
        'description' => 'Vyberte pobočku, službu, datum a čas, které vám nejlépe vyhovují.',

        'form' => [
            'branch_title' => 'Pobočka',
            'branch_placeholder' => 'Vyberte pobočku',

            'unit_title' => 'Jednotka',
            'unit_placeholder' => 'Vyberte jednotku',

            'activity_title' => 'Aktivita',
            'activity_placeholder' => 'Vyberte aktivitu',

            'date_title' => 'Datum',
            'date_placeholder' => 'Vyberte datum',

            'slot_title' => 'Dostupný čas',
            'slot_placeholder' => 'Vyberte čas',

            'first_name_title' => 'Jméno',
            'first_name_placeholder' => 'Jan',

            'last_name_title' => 'Příjmení',
            'last_name_placeholder' => 'Novák',

            'email_title' => 'E-mail',
            'email_placeholder' => 'jan@example.com',

            'phone_code_title' => 'Telefonní předvolba',
            'phone_code_placeholder' => '+420',

            'phone_title' => 'Telefon',
            'phone_placeholder' => '777123456',

            'note_title' => 'Poznámka',
            'note_placeholder' => 'Doplňující informace k vaší rezervaci',
        ],

        'content' => [
            'form_title' => 'Dokončete svou rezervaci',
            'ready' => 'připraveno',

            'appointment_title' => 'Údaje o termínu',
            'appointment_text' => 'Vyberte pobočku, jednotku, službu, datum a časový slot, které vám nejlépe vyhovují.',

            'customer_title' => 'Údaje zákazníka',
            'customer_text' => 'Doplňte kontaktní údaje potřebné k potvrzení a identifikaci rezervace.',

            'note_title' => 'Doplňující poznámka',
            'note_text' => 'Sdělte nám vše, co může být před začátkem rezervace užitečné.',

            'review_title' => 'Zkontrolujte údaje rezervace a potvrďte ji, jakmile bude vše v pořádku.',
            'review_text' => 'Souhrn rezervace se aktualizuje živě při vyplňování formuláře.',
            'review_live_text' => ':selection/4 údaje rezervace, :customer/4 kontaktní údaje',

            'summary_badge' => 'Souhrn',
            'summary_progress' => 'Kontrola rezervace',

            'branch_label' => 'Pobočka',
            'unit_label' => 'Jednotka',
            'activity_label' => 'Aktivita',
            'date_time_label' => 'Datum / čas',
            'customer_label' => 'Zákazník',
            'email_label' => 'E-mail',
            'phone_label' => 'Telefon',
            'note_label' => 'Poznámka',

            'summary_empty_selection' => 'Zatím nevybráno',
            'summary_empty_customer' => 'Zatím nevyplněno',

            'branch_status_title' => 'Stav pobočky',
            'service_status_title' => 'Stav služby',
            'schedule_status_title' => 'Stav rozvrhu',
        ],

        'states' => [
            'no_branches_title' => 'Nejsou dostupné žádné pobočky',
            'no_branches_text' => 'Aktuálně nejsou k dispozici žádné veřejné pobočky pro rezervaci.',

            'no_units_title' => 'Nejsou dostupné žádné jednotky',
            'no_units_text' => 'Pro vybranou pobočku nejsou aktuálně dostupné žádné jednotky.',

            'no_activities_title' => 'Nejsou dostupné žádné aktivity',
            'no_activities_text' => 'Pro vybranou jednotku nejsou aktuálně dostupné žádné aktivity.',

            'no_slots_title' => 'Nejsou dostupné žádné termíny',
            'no_slots_text' => 'Pro vybrané datum nejsou k dispozici žádné volné rezervační termíny.',

            'branch_default' => 'Vyberte místo, kde má rezervace proběhnout.',
            'service_default' => 'Po výběru správné jednotky vyberte službu.',
            'schedule_loading' => 'Ověřuje se aktuální dostupnost pro vybraný den.',
            'schedule_default' => 'Vyberte datum pro načtení volných rezervačních termínů.',
        ],

        'actions' => [
            'submit' => 'Vytvořit rezervaci',
            'submitting' => 'Rezervace se vytváří...',
        ],

        'messages' => [
            'created' => 'Rezervace byla úspěšně vytvořena.',
            'failed' => 'Rezervaci se nepodařilo vytvořit.',
        ],

        'detail' => [
            'title' => 'Detail rezervace',
            'badge_created' => 'Rezervace vytvořena',
            'status_label' => 'Stav',
            'heading' => 'Vaše rezervace je uložena',
            'description' => 'Uložte si tuto stránku na později, stáhněte si soubor kalendáře nebo si potvrzení vytiskněte.',
            'details_title' => 'Údaje rezervace',
            'branch_label' => 'Pobočka',
            'unit_label' => 'Jednotka',
            'activity_label' => 'Aktivita',
            'date_time_label' => 'Datum a čas',
            'to_label' => 'do',
            'customer_title' => 'Informace o zákazníkovi',
            'customer_name_label' => 'Jméno a příjmení',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Telefon',
            'note_label' => 'Poznámka',
            'actions' => [
                'back' => 'Zpět na stránku rezervace',
                'print' => 'Vytisknout stránku',
                'calendar' => 'Importovat do kalendáře',
            ],
            'fallback' => '—',
        ],
    ],
];