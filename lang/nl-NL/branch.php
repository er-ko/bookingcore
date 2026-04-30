<?php

return [
    'messages' => [
        'created'   => 'Vestiging succesvol aangemaakt.',
        'updated'   => 'Vestiging succesvol bijgewerkt.',
        'deleted'   => 'Vestiging succesvol verwijderd.',
        'failed'    => 'Het verwerken van het vestigingsverzoek is mislukt.',
        'not_found' => 'Vestiging niet gevonden.',
        'has_units' => 'De vestiging kan niet worden verwijderd omdat deze nog units bevat.',
        'has_bookings' => 'De vestiging kan niet worden verwijderd omdat deze nog boekingen bevat.',
        'limit_reached' => 'U heeft het maximaal toegestane aantal vestigingen bereikt.',
    ],

    'validation' => [
        'name_required' => 'De naam van de vestiging is verplicht.',
        'name_max' => 'De naam van de vestiging mag niet langer zijn dan 255 tekens.',

        'address_line_1_max' => 'Adresregel 1 mag niet langer zijn dan 255 tekens.',
        'address_line_2_max' => 'Adresregel 2 mag niet langer zijn dan 255 tekens.',

        'city_max' => 'De plaats mag niet langer zijn dan 255 tekens.',
        'postcode_max' => 'De postcode mag niet langer zijn dan 32 tekens.',

        'country_code_size' => 'De landcode moet exact 2 tekens bevatten.',

        'timezone_required' => 'De tijdzone is verplicht.',
        'timezone_max' => 'De tijdzone mag niet langer zijn dan 64 tekens.',

        'is_active_required' => 'De actieve status is verplicht.',
        'is_active_boolean' => 'De actieve status moet waar of onwaar zijn.',
    ],

    'view' => [
        'title' => 'Vestiging',
        'branches' => 'Vestigingen',
        'create_branch' => 'Vestiging aanmaken',
        'edit_branch' => 'Vestiging bewerken',
        'index_description' => 'Beheer uw vestigingen, inclusief adresgegevens, tijdzone en actieve status.',
        'create_description' => 'Maak een nieuwe vestiging aan met adresgegevens, tijdzone en activeringsstatus.',
        'edit_description' => 'Werk vestigingsgegevens, adres, tijdzone en activeringsstatus bij.',
        'back_to_branches' => 'Terug naar vestigingen',
        'create_first_branch' => 'Maak uw eerste vestiging aan',
        'no_branches_found' => 'Geen vestigingen gevonden.',
        'no_branches_text' => 'Er zijn nog geen vestigingen om weer te geven. Maak de eerste vestiging aan om uw boekingsstructuur te organiseren.',

        'table' => [
            'branch' => 'Vestiging',
            'address' => 'Adres',
            'city' => 'Plaats',
            'timezone' => 'Tijdzone',
            'no_address_text' => 'Geen adres opgegeven',
            'status' => 'Status',
            'updated' => 'Bijgewerkt',
            'actions' => 'Acties',
            'active' => 'Actief',
            'inactive' => 'Inactief',
        ],

        'overview' => [
            'title' => 'Vestigingsoverzicht',
            'branch_id_title' => 'Vestigings-ID',
            'countries_available_title' => 'Beschikbare landen',
            'city_and_postcode_title' => 'Plaats en postcode',
            'country_and_timezone_title' => 'Land en tijdzone',
            'timezone_title' => 'Tijdzone',
            'timezone_text' => 'Gebaseerd op het geselecteerde land',
            'limit_title' => 'Limiet',
            'limit_text' => 'U kunt maximaal 10 vestigingen aanmaken.',
            'duration_text' => 'Stel de vestigingslocatie en regionale standaardinstellingen in.',
            'required_title' => 'Verplicht',
            'optional_title' => 'Optioneel',
            'status_title' => 'Huidige status',
            'active_title' => 'Actief',
            'inactive_title' => 'Inactief',
            'note_title' => 'Opmerking',
            'note_text' => 'Het bijwerken van deze vestiging heeft geen invloed op andere vestigingen in het systeem.',
        ],

        'form' => [
            'branch_details' => 'Vestigingsgegevens',
            'complete_the_form' => 'Vul het formulier in',
            'update_the_form' => 'Werk het formulier bij',
            'branch_name_title' => 'Vestigingsnaam',
            'address_line_1_title' => 'Adresregel 1',
            'address_line_2_title' => 'Adresregel 2',
            'city_title' => 'Plaats',
            'postcode_title' => 'Postcode',
            'country_title' => 'Land',
            'select_country' => 'Selecteer een land',
            'timezone_title' => 'Tijdzone',
            'select_timezone' => 'Selecteer een tijdzone',
            'loading_timezones' => 'Tijdzones worden geladen...',
            'active_title' => 'Actieve vestiging',
            'active_text' => 'Inactieve vestigingen kunnen in het systeem opgeslagen blijven zonder actief te worden gebruikt.',
        ],

        'actions' => [
            'edit' => 'Bewerken',
            'delete' => 'Verwijderen',
            'cancel' => 'Annuleren',
            'create' => 'Vestiging aanmaken',
            'creating' => 'Bezig met aanmaken...',
            'save' => 'Wijzigingen opslaan',
            'saving' => 'Bezig met opslaan...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Weet u zeker dat u deze vestiging wilt verwijderen?',
        ],

    ],
];