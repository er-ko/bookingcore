<?php

return [
    'messages' => [
        'created'   => 'Prijs succesvol aangemaakt.',
        'updated'   => 'Prijs succesvol bijgewerkt.',
        'deleted'   => 'Prijs succesvol verwijderd.',
        'failed'    => 'Het verwerken van het prijsverzoek is mislukt.',
    ],

    'validation' => [
        'branch_required' => 'Selecteer een vestiging.',
        'branch_invalid' => 'De geselecteerde vestiging is ongeldig.',
        'branch_not_found' => 'De geselecteerde vestiging is niet gevonden.',

        'unit_required' => 'Selecteer een unit.',
        'unit_invalid' => 'De geselecteerde unit is ongeldig.',
        'unit_not_found' => 'De geselecteerde unit is niet gevonden.',

        'activity_required' => 'Selecteer een activiteit.',
        'activity_invalid' => 'De geselecteerde activiteit is ongeldig.',
        'activity_not_found' => 'De geselecteerde activiteit is niet gevonden.',

        'price_already_exists' => 'Er bestaat al een prijs voor de geselecteerde unit en activiteit.',
        'price_not_found' => 'De geselecteerde prijs is niet gevonden.',
        'price_required' => 'Voer een prijs in.',
        'price_invalid' => 'De prijs moet een geldig getal zijn.',
        'price_min' => 'De prijs moet nul of hoger zijn.',
    ],

    'view' => [
        'title' => 'Prijzen',
        'description' => 'Stel de standaardprijs in voor elke activiteit binnen een specifieke unit.',

        'form' => [
            'title' => 'Prijsinstellingen',
            'branch_title' => 'Vestiging',
            'branch_placeholder' => 'Selecteer een vestiging',
            'unit_title' => 'Unit',
            'unit_placeholder' => 'Selecteer een unit',
            'activity_title' => 'Activiteit',
            'activity_placeholder' => 'Selecteer een activiteit',
            'price_title' => 'Prijs',
            'price_placeholder' => 'Voer een prijs in',
            'currency_title' => 'Valuta',
            'currency_text' => 'Prijzen worden opgeslagen in uw standaardvaluta.',
        ],

        'table' => [
            'title' => 'Opgeslagen prijzen',
            'branch_title' => 'Vestiging',
            'unit_title' => 'Unit',
            'activity_title' => 'Activiteit',
            'price_title' => 'Prijs',
            'actions_title' => 'Acties',
        ],

        'actions' => [
            'save' => 'Prijs opslaan',
            'saving' => 'Bezig met opslaan...',
            'edit' => 'Bewerken',
            'update' => 'Bijwerken',
            'updating' => 'Bezig met bijwerken...',
            'delete' => 'Verwijderen',
            'cancel' => 'Annuleren',
            'deleting' => 'Bezig met verwijderen...',
        ],

        'states' => [
            'empty_title' => 'Nog geen prijzen',
            'empty_text' => 'Maak de eerste prijs aan voor een combinatie van unit en activiteit.',
            'no_branches_title' => 'Geen prijsconfiguratie beschikbaar',
            'no_branches_text' => 'Maak eerst een vestiging aan om prijzen in te stellen.',
            'no_units_text' => 'Er zijn geen units beschikbaar voor de geselecteerde vestiging.',
            'no_activities_text' => 'Er zijn geen activiteiten beschikbaar.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Weet u zeker dat u deze prijs wilt verwijderen?',
        ],
    ],
];