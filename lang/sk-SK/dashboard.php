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
        'cancelled' => 'Rezervácia bola úspešne zrušená.',
        'status_updated' => 'Stav rezervácie bol úspešne aktualizovaný.',
    ],

    'validation' => [
        'status_required' => 'Stav rezervácie je povinný.',
        'status_invalid' => 'Formát stavu rezervácie je neplatný.',
        'status_not_allowed' => 'Vybraný stav rezervácie nie je povolený.',
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

        'actions' => [
            'confirm' => 'Potvrdiť',
            'complete' => 'Dokončiť',
            'cancel' => 'Zrušiť',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Naozaj chcete zrušiť túto rezerváciu?',
        ],
    ],
];