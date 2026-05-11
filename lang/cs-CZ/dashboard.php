<?php

return [
    'errors' => [
        'activity_inactive' => 'Vybraná aktivita neexistuje nebo není aktivní.',
        'unit_invalid' => 'Vybraná jednotka neexistuje, není aktivní nebo nepatří k dané pobočce.',
        'activity_not_assigned' => 'Vybraná aktivita není přiřazena k vybrané jednotce.',
        'activity_not_available_for_unit' => 'Vybraná aktivita není dostupná pro vybranou jednotku.',
        'unit_already_booked' => 'Vybraná jednotka je již v daném časovém rozsahu rezervována.',
        'booking_conflict' => 'Rezervace je v konfliktu s existující rezervací.',
        'slot_overlap' => 'Vybraný rezervační termín se překrývá s existující rezervací.',
        'outside_working_hours' => 'Vybraný rezervační termín je mimo pracovní dobu.',
        'during_time_off' => 'Vybraný rezervační termín spadá do blokovaného období nedostupnosti.',
        'already_cancelled' => 'Rezervace je již zrušena.',
        'cancelled_cannot_be_updated' => 'Zrušené rezervace nelze aktualizovat.',
        'same_status' => 'Rezervace je již označena stavem :status.',
        'use_cancel_action' => 'Pro zrušení rezervace použijte akci zrušení rezervace.',
        'invalid_activity_minutes' => 'Délka aktivity v minutách musí být větší než nula.',
        'negative_buffer_minutes' => 'Časová rezerva v minutách nemůže být záporná.',
        'invalid_slot_block' => 'Celkový blok termínu musí být větší než nula.',
        'invalid_total_slot_block' => 'Celkový blok termínu musí být větší než nula.',
        'invalid_time_range' => 'Začátek časového rozsahu musí být dříve než jeho konec.',
        'invalid_day_of_week' => 'Neplatný den v týdnu: :value',
        'invalid_booking_status' => 'Neplatný stav rezervace: :value',
    ],

    'messages' => [
        'cancelled' => 'Rezervace byla úspěšně zrušena.',
        'status_updated' => 'Stav rezervace byl úspěšně aktualizován.',
    ],

    'validation' => [
        'status_required' => 'Stav rezervace je povinný.',
        'status_invalid' => 'Formát stavu rezervace není platný.',
        'status_not_allowed' => 'Vybraný stav rezervace není povolen.',
    ],

    'view' => [
        'title' => 'Nástěnka',
        'create_booking' => 'Vytvořit rezervaci',
        'edit_booking' => 'Upravit rezervaci',
        'index_description' => 'Přehled vytvořených rezervací včetně jejich aktuálního stavu a souvisejících entit.',
        'create_description' => 'Vytvořte novou rezervaci s údaji zákazníka, výběrem služby a dostupným časovým termínem.',
        'edit_description' => 'Aktualizujte údaje rezervace, informace o zákazníkovi a stav rezervace.',
        'back_to_dashboard' => 'Zpět na nástěnku',
        'create_first_booking' => 'Vytvořit první rezervaci',
        'no_bookings_found' => 'Nebyly nalezeny žádné rezervace.',
        'no_bookings_text' => 'Zatím zde nejsou žádné rezervace k zobrazení. Vytvořte první rezervaci a začněte se systémem pracovat.',

        'table' => [
            'customer' => 'Zákazník',
            'branch' => 'Pobočka',
            'unit' => 'Jednotka',
            'activity' => 'Aktivita',
            'starts_at' => 'Začíná',
            'ends_at' => 'Končí',
            'status' => 'Stav',
            'actions' => 'Akce',
            'active' => 'Aktivní',
            'inactive' => 'Neaktivní',
        ],

        'actions' => [
            'confirm' => 'Potvrdit',
            'complete' => 'Dokončit',
            'cancel' => 'Zrušit',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Opravdu chcete tuto rezervaci zrušit?',
        ],

    ],
];