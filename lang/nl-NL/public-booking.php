<?php

return [
    'view' => [
        'title' => 'Boek uw afspraak',
        'description' => 'Kies de vestiging, dienst, datum en tijd die voor u het beste uitkomen.',

        'form' => [
            'branch_title' => 'Vestiging',
            'branch_placeholder' => 'Selecteer een vestiging',

            'unit_title' => 'Unit',
            'unit_placeholder' => 'Selecteer een unit',

            'activity_title' => 'Activiteit',
            'activity_placeholder' => 'Selecteer een activiteit',

            'date_title' => 'Datum',
            'date_placeholder' => 'Selecteer een datum',

            'slot_title' => 'Beschikbare tijd',
            'slot_placeholder' => 'Selecteer een tijd',

            'first_name_title' => 'Voornaam',
            'first_name_placeholder' => 'Jan',

            'last_name_title' => 'Achternaam',
            'last_name_placeholder' => 'Jansen',

            'email_title' => 'E-mail',
            'email_placeholder' => 'jan@example.com',

            'phone_code_title' => 'Netnummer',
            'phone_code_placeholder' => '+31',

            'phone_title' => 'Telefoon',
            'phone_placeholder' => '612345678',

            'note_title' => 'Opmerking',
            'note_placeholder' => 'Aanvullende informatie voor uw boeking',
        ],

        'content' => [
            'form_title' => 'Voltooi uw boeking',
            'ready' => 'gereed',

            'appointment_title' => 'Afspraakgegevens',
            'appointment_text' => 'Kies de vestiging, unit, dienst, datum en het tijdslot die het beste passen.',

            'customer_title' => 'Klantgegevens',
            'customer_text' => 'Voeg de contactgegevens toe die nodig zijn om de boeking te bevestigen en te herkennen.',

            'note_title' => 'Aanvullende opmerking',
            'note_text' => 'Deel eventuele nuttige informatie voordat de boeking begint.',

            'review_title' => 'Controleer de boekingsgegevens en bevestig wanneer alles correct is.',
            'review_text' => 'De boekingssamenvatting wordt live bijgewerkt terwijl u het formulier invult.',
            'review_live_text' => ':selection/4 boekingsgegevens, :customer/4 contactgegevens',

            'summary_badge' => 'Samenvatting',
            'summary_progress' => 'Boekingscontrole',

            'branch_label' => 'Vestiging',
            'unit_label' => 'Unit',
            'activity_label' => 'Activiteit',
            'date_time_label' => 'Datum / tijd',
            'customer_label' => 'Klant',
            'email_label' => 'E-mail',
            'phone_label' => 'Telefoon',
            'note_label' => 'Opmerking',

            'summary_empty_selection' => 'Nog niet geselecteerd',
            'summary_empty_customer' => 'Nog niet ingevuld',

            'branch_status_title' => 'Vestigingsstatus',
            'service_status_title' => 'Dienststatus',
            'schedule_status_title' => 'Planningsstatus',
        ],

        'states' => [
            'no_branches_title' => 'Geen vestigingen beschikbaar',
            'no_branches_text' => 'Er zijn momenteel geen openbare vestigingen beschikbaar voor boekingen.',

            'no_units_title' => 'Geen units beschikbaar',
            'no_units_text' => 'Er zijn momenteel geen units beschikbaar voor de geselecteerde vestiging.',

            'no_activities_title' => 'Geen activiteiten beschikbaar',
            'no_activities_text' => 'Er zijn momenteel geen activiteiten beschikbaar voor de geselecteerde unit.',

            'no_slots_title' => 'Geen beschikbare tijdsloten',
            'no_slots_text' => 'Er zijn geen beschikbare boekingstijdsloten voor de geselecteerde datum.',

            'branch_default' => 'Kies de locatie waar de boeking moet plaatsvinden.',
            'service_default' => 'Kies de dienst nadat u de juiste unit heeft geselecteerd.',
            'schedule_loading' => 'Live beschikbaarheid voor de geselecteerde dag wordt gecontroleerd.',
            'schedule_default' => 'Selecteer een datum om beschikbare boekingstijdsloten te laden.',
        ],

        'actions' => [
            'submit' => 'Boeking aanmaken',
            'submitting' => 'Boeking wordt aangemaakt...',
        ],

        'messages' => [
            'created' => 'Boeking succesvol aangemaakt.',
            'failed' => 'Het aanmaken van de boeking is mislukt.',
        ],

        'detail' => [
            'title' => 'Boekingsgegevens',
            'badge_created' => 'Boeking aangemaakt',
            'status_label' => 'Status',
            'heading' => 'Uw boeking is opgeslagen',
            'description' => 'Bewaar deze pagina voor later, download het kalenderbestand of print de bevestiging.',
            'details_title' => 'Boekingsgegevens',
            'branch_label' => 'Vestiging',
            'unit_label' => 'Unit',
            'activity_label' => 'Activiteit',
            'date_time_label' => 'Datum en tijd',
            'to_label' => 'tot',
            'customer_title' => 'Klantinformatie',
            'customer_name_label' => 'Voor- en achternaam',
            'customer_email_label' => 'E-mail',
            'customer_phone_label' => 'Telefoon',
            'note_label' => 'Opmerking',
            'actions' => [
                'back' => 'Terug naar de boekingspagina',
                'print' => 'Pagina afdrukken',
                'calendar' => 'Importeren in uw agenda',
            ],
            'fallback' => '—',
        ],
    ],
];