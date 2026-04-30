<?php

return [
    'errors' => [
        'activity_inactive' => 'Vybraná aktivita neexistuje alebo je neaktívna.',
        'unit_invalid' => 'Vybraná jednotka neexistuje, je neaktívna alebo nepatrí k danej pobočke.',
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
];