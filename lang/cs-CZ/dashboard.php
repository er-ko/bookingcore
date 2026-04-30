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
        'created' => 'Rezervace byla úspěšně vytvořena.',
        'failed' => 'Rezervaci se nepodařilo vytvořit.',
        'cancelled' => 'Rezervace byla úspěšně zrušena.',
        'status_updated' => 'Stav rezervace byl úspěšně aktualizován.',
        'not_found' => 'Vybraná rezervace nebyla nalezena.',
    ],

    'validation' => [
        'branch_required' => 'Pobočka je povinná.',
        'branch_invalid' => 'Identifikátor pobočky není platný.',
        'branch_not_found' => 'Vybraná pobočka neexistuje.',

        'unit_required' => 'Jednotka je povinná.',
        'unit_invalid' => 'Identifikátor jednotky není platný.',
        'unit_not_found' => 'Vybraná jednotka neexistuje.',

        'activity_required' => 'Aktivita je povinná.',
        'activity_invalid' => 'Identifikátor aktivity není platný.',
        'activity_not_found' => 'Vybraná aktivita neexistuje.',
        'activity_not_available_for_unit' => 'Vybraná aktivita není dostupná pro vybranou jednotku.',

        'starts_at_required' => 'Čas začátku je povinný.',
        'starts_at_invalid' => 'Formát času začátku není platný.',

        'customer_required' => 'Informace o zákazníkovi jsou povinné.',
        'customer_invalid' => 'Formát údajů zákazníka není platný.',

        'customer_first_name_required' => 'Jméno zákazníka je povinné.',
        'customer_first_name_invalid' => 'Jméno zákazníka musí být text.',
        'customer_first_name_too_long' => 'Jméno zákazníka je příliš dlouhé.',

        'customer_last_name_required' => 'Příjmení zákazníka je povinné.',
        'customer_last_name_invalid' => 'Příjmení zákazníka musí být text.',
        'customer_last_name_too_long' => 'Příjmení zákazníka je příliš dlouhé.',

        'customer_email_required' => 'E-mail zákazníka je povinný.',
        'customer_email_invalid' => 'E-mail zákazníka musí být platná e-mailová adresa.',
        'customer_email_too_long' => 'E-mail zákazníka je příliš dlouhý.',

        'customer_phone_code_required' => 'Telefonní předvolba je povinná.',
        'customer_phone_code_invalid' => 'Telefonní předvolba musí být text.',
        'customer_phone_code_too_long' => 'Telefonní předvolba je příliš dlouhá.',

        'customer_phone_required' => 'Telefonní číslo je povinné.',
        'customer_phone_invalid' => 'Telefonní číslo musí být text.',
        'customer_phone_too_long' => 'Telefonní číslo je příliš dlouhé.',

        'note_invalid' => 'Poznámka musí být text.',

        'status_required' => 'Stav rezervace je povinný.',
        'status_invalid' => 'Formát stavu rezervace není platný.',
        'status_not_allowed' => 'Vybraný stav rezervace není povolen.',

        'date_required' => 'Datum je povinné.',
        'date_invalid' => 'Formát data není platný.',
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

        'overview' => [
            'title' => 'Přehled rezervace',

            'customer_title' => 'Údaje zákazníka',
            'customer_text' => 'Zadejte informace o zákazníkovi potřebné k vytvoření rezervace.',

            'booking_flow_title' => 'Rezervační proces',
            'booking_flow_text' => 'Vyberte pobočku, poté jednotku, aktivitu, datum a dostupný časový termín.',

            'availability_title' => 'Dostupnost',
            'availability_text' => 'Dostupné časové termíny se načítají podle vybrané pobočky, jednotky, aktivity a data.',

            'required_title' => 'Povinné',
            'required_items' => [
                'first_and_last_name' => 'Jméno a příjmení',
                'phone_code_and_number' => 'Telefonní předvolba a číslo',
                'branch' => 'Pobočka',
                'unit' => 'Jednotka',
                'activity' => 'Aktivita',
                'date' => 'Datum',
                'slot' => 'Dostupný termín',
            ],

            'optional_title' => 'Volitelné',
            'optional_items' => [
                'email' => 'E-mail',
                'note' => 'Poznámka',
            ],

            'note_title' => 'Poznámka',
            'note_text' => 'Rezervaci lze vytvořit až po výběru platného dostupného časového termínu.',
        ],

        'form' => [
            'booking_details' => 'Údaje rezervace',
            'complete_the_reservation' => 'Dokončete rezervaci',
            'customer_details' => 'Údaje zákazníka',
            'first_name_title' => 'Jméno',
            'last_name_title' => 'Příjmení',
            'email_title' => 'E-mail',
            'phone_code_title' => 'Předvolba',
            'phone_title' => 'Telefon',
            'branch_title' => 'Pobočka',
            'select_branch' => 'Vyberte pobočku',
            'unit_title' => 'Jednotka',
            'select_unit' => 'Vyberte jednotku',
            'loading_units' => 'Načítají se jednotky...',
            'activity_title' => 'Aktivita',
            'select_activity' => 'Vyberte aktivitu',
            'loading_activities' => 'Načítají se aktivity...',
            'date_title' => 'Datum',
            'available_slots_title' => 'Dostupné termíny',
            'available_slots_count' => 'dostupný termín / dostupné termíny / dostupných termínů',
            'loading_slots' => 'Načítají se termíny...',
            'no_available_slots' => 'Pro vybrané datum nebyly nalezeny žádné dostupné termíny.',
            'select_slot' => 'Vyberte termín',
            'note_title' => 'Poznámka',
        ],

        'actions' => [
            'confirm' => 'Potvrdit',
            'complete' => 'Dokončit',
            'cancel' => 'Zrušit',
            'create' => 'Vytvořit rezervaci',
            'creating' => 'Vytváří se...',
        ],

        'alerts' => [
            'cancel_confirmation' => 'Opravdu chcete tuto rezervaci zrušit?',
        ],

    ],
];