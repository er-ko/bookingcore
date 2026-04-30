<?php

return [
    'view' => [
        'title' => 'Rezervujte si termín',
        'description' => 'Vyberte si pobočku, službu, dátum a čas, ktoré Vám najviac vyhovujú.',

        'form' => [
            'branch_title' => 'Pobočka',
            'branch_placeholder' => 'Vyberte pobočku',

            'unit_title' => 'Jednotka',
            'unit_placeholder' => 'Vyberte jednotku',

            'activity_title' => 'Aktivita',
            'activity_placeholder' => 'Vyberte aktivitu',

            'date_title' => 'Dátum',
            'date_placeholder' => 'Vyberte dátum',

            'slot_title' => 'Dostupný čas',
            'slot_placeholder' => 'Vyberte čas',

            'first_name_title' => 'Meno',
            'first_name_placeholder' => 'Ján',

            'last_name_title' => 'Priezvisko',
            'last_name_placeholder' => 'Novák',

            'email_title' => 'E-mail',
            'email_placeholder' => 'jan@example.com',

            'phone_code_title' => 'Telefónna predvoľba',
            'phone_code_placeholder' => '+421',

            'phone_title' => 'Telefón',
            'phone_placeholder' => '901234567',

            'note_title' => 'Poznámka',
            'note_placeholder' => 'Doplňujúce informácie k Vašej rezervácii',
        ],

        'content' => [
            'form_title' => 'Dokončite svoju rezerváciu',
            'ready' => 'pripravené',

            'appointment_title' => 'Údaje o termíne',
            'appointment_text' => 'Vyberte si pobočku, jednotku, službu, dátum a časový interval, ktoré Vám najviac vyhovujú.',

            'customer_title' => 'Údaje zákazníka',
            'customer_text' => 'Doplňte kontaktné údaje potrebné na potvrdenie a identifikáciu rezervácie.',

            'note_title' => 'Doplňujúca poznámka',
            'note_text' => 'Uveďte všetko, čo môže byť užitočné pred začiatkom rezervovaného termínu.',

            'review_title' => 'Skontrolujte údaje rezervácie a potvrďte ju, keď je všetko v poriadku.',
            'review_text' => 'Súhrn rezervácie sa aktualizuje priebežne počas vypĺňania formulára.',
            'review_live_text' => ':selection/4 údaje rezervácie, :customer/4 kontaktné údaje',

            'summary_badge' => 'Súhrn',
            'summary_progress' => 'Kontrola rezervácie',

            'branch_label' => 'Pobočka',
            'unit_label' => 'Jednotka',
            'activity_label' => 'Aktivita',
            'date_time_label' => 'Dátum / čas',
            'customer_label' => 'Zákazník',
            'email_label' => 'E-mail',
            'phone_label' => 'Telefón',
            'note_label' => 'Poznámka',

            'summary_empty_selection' => 'Zatiaľ nevybraté',
            'summary_empty_customer' => 'Zatiaľ nevyplnené',

            'branch_status_title' => 'Stav pobočky',
            'service_status_title' => 'Stav služby',
            'schedule_status_title' => 'Stav rozvrhu',
        ],

        'states' => [
            'no_branches_title' => 'Nie sú dostupné žiadne pobočky',
            'no_branches_text' => 'Momentálne nie sú k dispozícii žiadne verejné pobočky na rezerváciu.',

            'no_units_title' => 'Nie sú dostupné žiadne jednotky',
            'no_units_text' => 'Pre vybranú pobočku momentálne nie sú k dispozícii žiadne jednotky.',

            'no_activities_title' => 'Nie sú dostupné žiadne aktivity',
            'no_activities_text' => 'Pre vybranú jednotku momentálne nie sú k dispozícii žiadne aktivity.',

            'no_slots_title' => 'Nie sú dostupné žiadne termíny',
            'no_slots_text' => 'Pre vybraný dátum nie sú dostupné žiadne rezervačné termíny.',

            'branch_default' => 'Vyberte miesto, kde sa má rezervácia uskutočniť.',
            'service_default' => 'Po výbere správnej jednotky vyberte službu.',
            'schedule_loading' => 'Kontroluje sa aktuálna dostupnosť pre vybraný deň.',
            'schedule_default' => 'Vyberte dátum, aby sa načítali dostupné rezervačné termíny.',
        ],

        'actions' => [
            'submit' => 'Vytvoriť rezerváciu',
            'submitting' => 'Rezervácia sa vytvára...',
        ],

        'messages' => [
            'created' => 'Rezervácia bola úspešne vytvorená.',
            'failed' => 'Rezerváciu sa nepodarilo vytvoriť.',
        ],

        'detail' => [
            'title' => 'Údaje rezervácie',
            'badge_created' => 'Rezervácia vytvorená',
            'status_label' => 'Stav',
            'heading' => 'Vaša rezervácia je uložená',
            'description' => 'Uložte si túto stránku na neskôr, stiahnite si súbor do kalendára alebo si vytlačte potvrdenie.',
            'details_title' => 'Údaje rezervácie',
            'branch_label' => 'Pobočka',
            'unit_label' => 'Jednotka',
            'activity_label' => 'Aktivita',
            'date_time_label' => 'Dátum a čas',
            'to_label' => 'do',
            'customer_title' => 'Informácie o zákazníkovi',
            'customer_name_label' => 'Meno a priezvisko',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Telefón',
            'note_label' => 'Poznámka',
            'actions' => [
                'back' => 'Späť na stránku rezervácie',
                'print' => 'Vytlačiť stránku',
                'calendar' => 'Importovať do Vášho kalendára',
            ],
            'fallback' => '—',
        ],
    ],
];