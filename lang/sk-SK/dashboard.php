<?php

return [
    'errors' => [
        'activity_inactive' => 'Vybraná aktivita neexistuje alebo je neaktívna.',
        'unit_invalid' => 'Vybraná jednotka neexistuje, je neaktívna alebo nepatrí k danej pobočke.',
        'activity_not_assigned' => 'Vybraná aktivita nie je priradená k vybranej jednotke.',
        'activity_not_available_for_unit' => 'Vybraná aktivita nie je dostupná pre vybranú jednotku.',
        'unit_already_booked' => 'Vybraná jednotka je už rezervovaná pre daný časový rozsah.',
        'booking_conflict' => 'Rezervácia je v konflikte s existujúcou rezerváciou.',
        'slot_overlap' => 'Vybraný rezervačný termín sa prekrýva s existujúcou rezerváciou.',
        'outside_working_hours' => 'Vybraný rezervačný termín je mimo pracovného času.',
        'during_time_off' => 'Vybraný rezervačný termín spadá do zablokovaného obdobia nedostupnosti.',
        'already_cancelled' => 'Rezervácia už bola zrušená.',
        'cancelled_cannot_be_updated' => 'Zrušené rezervácie nemožno aktualizovať.',
        'same_status' => 'Rezervácia je už označená stavom :status.',
        'use_cancel_action' => 'Na zrušenie rezervácie použite akciu na zrušenie rezervácie.',
        'invalid_activity_minutes' => 'Počet minút aktivity musí byť väčší ako nula.',
        'negative_buffer_minutes' => 'Počet minút prestávky nemôže byť záporný.',
        'invalid_slot_block' => 'Celkový blok termínu musí byť väčší ako nula.',
        'invalid_total_slot_block' => 'Celkový blok termínu musí byť väčší ako nula.',
        'invalid_time_range' => 'Začiatok časového rozsahu musí byť skôr ako jeho koniec.',
        'invalid_day_of_week' => 'Neplatný deň v týždni: :value',
        'invalid_booking_status' => 'Neplatný stav rezervácie: :value',
    ],

    'messages' => [
        'created' => 'Rezervácia bola úspešne vytvorená.',
        'failed' => 'Rezerváciu sa nepodarilo vytvoriť.',
        'cancelled' => 'Rezervácia bola úspešne zrušená.',
        'status_updated' => 'Stav rezervácie bol úspešne aktualizovaný.',
        'not_found' => 'Vybraná rezervácia sa nenašla.',
    ],

    'validation' => [
        'branch_required' => 'Pobočka je povinná.',
        'branch_invalid' => 'Identifikátor pobočky je neplatný.',
        'branch_not_found' => 'Vybraná pobočka neexistuje.',

        'unit_required' => 'Jednotka je povinná.',
        'unit_invalid' => 'Identifikátor jednotky je neplatný.',
        'unit_not_found' => 'Vybraná jednotka neexistuje.',

        'activity_required' => 'Aktivita je povinná.',
        'activity_invalid' => 'Identifikátor aktivity je neplatný.',
        'activity_not_found' => 'Vybraná aktivita neexistuje.',
        'activity_not_available_for_unit' => 'Vybraná aktivita nie je dostupná pre vybranú jednotku.',

        'starts_at_required' => 'Čas začiatku je povinný.',
        'starts_at_invalid' => 'Formát času začiatku je neplatný.',

        'customer_required' => 'Informácie o zákazníkovi sú povinné.',
        'customer_invalid' => 'Formát údajov zákazníka je neplatný.',

        'customer_first_name_required' => 'Meno zákazníka je povinné.',
        'customer_first_name_invalid' => 'Meno zákazníka musí byť text.',
        'customer_first_name_too_long' => 'Meno zákazníka je príliš dlhé.',

        'customer_last_name_required' => 'Priezvisko zákazníka je povinné.',
        'customer_last_name_invalid' => 'Priezvisko zákazníka musí byť text.',
        'customer_last_name_too_long' => 'Priezvisko zákazníka je príliš dlhé.',

        'customer_email_required' => 'E-mail zákazníka je povinný.',
        'customer_email_invalid' => 'E-mail zákazníka musí byť platná e-mailová adresa.',
        'customer_email_too_long' => 'E-mail zákazníka je príliš dlhý.',

        'customer_phone_code_required' => 'Telefónna predvoľba je povinná.',
        'customer_phone_code_invalid' => 'Telefónna predvoľba musí byť text.',
        'customer_phone_code_too_long' => 'Telefónna predvoľba je príliš dlhá.',

        'customer_phone_required' => 'Telefónne číslo je povinné.',
        'customer_phone_invalid' => 'Telefónne číslo musí byť text.',
        'customer_phone_too_long' => 'Telefónne číslo je príliš dlhé.',

        'note_invalid' => 'Poznámka musí byť text.',

        'status_required' => 'Stav rezervácie je povinný.',
        'status_invalid' => 'Formát stavu rezervácie je neplatný.',
        'status_not_allowed' => 'Vybraný stav rezervácie nie je povolený.',

        'date_required' => 'Dátum je povinný.',
        'date_invalid' => 'Formát dátumu je neplatný.',
    ],

    'view' => [
        'title' => 'Nástenka',
        'create_booking' => 'Vytvoriť rezerváciu',
        'edit_booking' => 'Upraviť rezerváciu',
        'index_description' => 'Prehľad vytvorených rezervácií vrátane ich aktuálneho stavu a súvisiacich entít.',
        'create_description' => 'Vytvorte novú rezerváciu s údajmi zákazníka, výberom služby a dostupným časovým termínom.',
        'edit_description' => 'Aktualizujte údaje rezervácie, informácie o zákazníkovi a stav rezervácie.',
        'back_to_dashboard' => 'Späť na nástenku',
        'create_first_booking' => 'Vytvoriť prvú rezerváciu',
        'no_bookings_found' => 'Nenašli sa žiadne rezervácie.',
        'no_bookings_text' => 'Zatiaľ nie sú k dispozícii žiadne rezervácie na zobrazenie. Vytvorte prvú rezerváciu a začnite pracovať so systémom.',

        'table' => [
            'customer' => 'Zákazník',
            'branch' => 'Pobočka',
            'unit' => 'Jednotka',
            'activity' => 'Aktivita',
            'starts_at' => 'Začína',
            'ends_at' => 'Končí',
            'status' => 'Stav',
            'actions' => 'Akcie',
            'active' => 'Aktívne',
            'inactive' => 'Neaktívne',
        ],

        'overview' => [
            'title' => 'Prehľad rezervácie',

            'customer_title' => 'Údaje zákazníka',
            'customer_text' => 'Zadajte informácie o zákazníkovi potrebné na vytvorenie rezervácie.',

            'booking_flow_title' => 'Priebeh rezervácie',
            'booking_flow_text' => 'Vyberte pobočku, potom jednotku, aktivitu, dátum a dostupný časový termín.',

            'availability_title' => 'Dostupnosť',
            'availability_text' => 'Dostupné časové termíny sa načítajú podľa vybranej pobočky, jednotky, aktivity a dátumu.',

            'required_title' => 'Povinné',
            'required_items' => [
                'first_and_last_name' => 'Meno a priezvisko',
                'phone_code_and_number' => 'Telefónna predvoľba a číslo',
                'branch' => 'Pobočka',
                'unit' => 'Jednotka',
                'activity' => 'Aktivita',
                'date' => 'Dátum',
                'slot' => 'Dostupný termín',
            ],

            'optional_title' => 'Voliteľné',
            'optional_items' => [
                'email' => 'E-mail',
                'note' => 'Poznámka',
            ],

            'note_title' => 'Poznámka',
            'note_text' => 'Rezerváciu je možné vytvoriť až po výbere platného dostupného časového termínu.',
        ],

        'form' => [
            'booking_details' => 'Údaje rezervácie',
            'complete_the_reservation' => 'Dokončite rezerváciu',
            'customer_details' => 'Údaje zákazníka',
            'first_name_title' => 'Meno',
            'last_name_title' => 'Priezvisko',
            'email_title' => 'E-mail',
            'phone_code_title' => 'Predvoľba',
            'phone_title' => 'Telefón',
            'branch_title' => 'Pobočka',
            'select_branch' => 'Vyberte pobočku',
            'unit_title' => 'Jednotka',
            'select_unit' => 'Vyberte jednotku',
            'loading_units' => 'Načítavajú sa jednotky...',
            'activity_title' => 'Aktivita',
            'select_activity' => 'Vyberte aktivitu',
            'loading_activities' => 'Načítavajú sa aktivity...',
            'date_title' => 'Dátum',
            'available_slots_title' => 'Dostupné termíny',
            'available_slots_count' => 'dostupný termín/termíny/termínov',
            'loading_slots' => 'Načítavajú sa termíny...',
            'no_available_slots' => 'Pre vybraný dátum neboli nájdené žiadne dostupné termíny.',
            'select_slot' => 'Vyberte termín',
            'note_title' => 'Poznámka',
        ],

        'actions' => [
            'confirm' => 'Potvrdiť',
            'complete' => 'Dokončiť',
            'cancel' => 'Zrušiť',
            'create' => 'Vytvoriť rezerváciu',
            'creating' => 'Vytvára sa...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Naozaj chcete zrušiť túto rezerváciu?',
        ],
    ],
];