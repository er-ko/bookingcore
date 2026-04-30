<?php

return [
    'messages' => [
        'created'   => 'Activiteit succesvol aangemaakt.',
        'updated'   => 'Activiteit succesvol bijgewerkt.',
        'deleted'   => 'Activiteit succesvol verwijderd.',
        'failed'    => 'Het verwerken van het activiteitsverzoek is mislukt.',
        'not_found' => 'Activiteit niet gevonden.',
        'limit_reached' => 'U heeft het maximaal toegestane aantal activiteiten bereikt.',
    ],

    'validation' => [
        'name_required' => 'De naam van de activiteit is verplicht.',
        'name_max' => 'De naam van de activiteit mag niet langer zijn dan 255 tekens.',

        'duration_required' => 'De duur is verplicht.',
        'duration_integer' => 'De duur moet een geheel aantal minuten zijn.',
        'duration_min' => 'De duur moet minimaal 1 minuut zijn.',
        'duration_max' => 'De duur mag niet langer zijn dan 1200 minuten.',

        'buffer_before_integer' => 'De buffertijd vóór de activiteit moet een geheel aantal minuten zijn.',
        'buffer_before_min' => 'De buffertijd vóór de activiteit moet minimaal 0 minuten zijn.',
        'buffer_before_max' => 'De buffertijd vóór de activiteit mag niet langer zijn dan 60 minuten.',

        'buffer_after_integer' => 'De buffertijd na de activiteit moet een geheel aantal minuten zijn.',
        'buffer_after_min' => 'De buffertijd na de activiteit moet minimaal 0 minuten zijn.',
        'buffer_after_max' => 'De buffertijd na de activiteit mag niet langer zijn dan 60 minuten.',

        'is_active_required' => 'De actieve status is verplicht.',
        'is_active_boolean' => 'De actieve status moet waar of onwaar zijn.',
    ],

    'view' => [
        'title' => 'Activiteit',
        'activities' => 'Activiteiten',
        'create_activity' => 'Activiteit aanmaken',
        'edit_activity' => 'Activiteit bewerken',
        'index_description' => 'Beheer de activiteiten die in uw units kunnen worden geboekt.',
        'create_description' => 'Definieer een nieuwe activiteit, inclusief duur, buffertijden en actieve status.',
        'edit_description' => 'Werk de gegevens van een bestaande activiteit bij, inclusief duur, buffertijden en actieve status.',
        'back_to_activities' => 'Terug naar activiteiten',
        'create_first_activity' => 'Maak uw eerste activiteit aan',
        'no_activities_found' => 'Geen activiteiten gevonden.',
        'no_activities_text' => 'Er zijn nog geen activiteiten om weer te geven. Maak de eerste activiteit aan om uw boekingsstructuur te organiseren.',

        'table' => [
            'name' => 'Naam',
            'status' => 'Status',
            'updated' => 'Bijgewerkt',
            'actions' => 'Acties',
            'duration' => 'Duur',
            'min' => 'min',
            'active' => 'Actief',
            'inactive' => 'Inactief',
        ],

        'overview' => [
            'title' => 'Activiteitenoverzicht',
            'activity_id_title' => 'Activiteits-ID',
            'duration_title' => 'Duur',
            'duration_text' => 'Stel in hoeveel minuten de activiteit moet duren.',
            'buffer_time_title' => 'Buffertijd',
            'buffer_time_text' => 'Voeg optioneel tijd vóór en na de activiteit toe om krappe overlappingen tussen boekingen te voorkomen.',
            'required_title' => 'Verplicht',
            'optional_title' => 'Optioneel',
            'status_title' => 'Status',
            'status_text' => 'Inactieve activiteiten blijven in het systeem opgeslagen, maar kunnen niet voor nieuwe boekingen worden gebruikt.',
            'active_title' => 'Actief',
            'inactive_title' => 'Inactief',
            'note_title' => 'Opmerking',
            'note_text' => 'Het bijwerken van deze activiteit heeft geen invloed op andere activiteiten in het systeem.',
        ],

        'form' => [
            'activity_details' => 'Activiteitsgegevens',
            'complete_the_form' => 'Vul het formulier in',
            'update_the_form' => 'Werk het formulier bij',
            'name_title' => 'Naam',
            'duration_title' => 'Duur (minuten)',
            'buffer_before_title' => 'Buffertijd vóór de activiteit (minuten)',
            'buffer_after_title' => 'Buffertijd na de activiteit (minuten)',
            'active_title' => 'Actieve activiteit',
            'active_text' => 'Inactieve activiteiten blijven in het systeem opgeslagen, maar kunnen niet voor nieuwe boekingen worden gebruikt.',
        ],

        'actions' => [
            'edit' => 'Bewerken',
            'delete' => 'Verwijderen',
            'cancel' => 'Annuleren',
            'create' => 'Activiteit aanmaken',
            'creating' => 'Bezig met aanmaken...',
            'save' => 'Wijzigingen opslaan',
            'saving' => 'Bezig met opslaan...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Weet u zeker dat u deze activiteit wilt verwijderen?',
        ],

    ],
];