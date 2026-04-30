<?php

return [
    'messages' => [
        'updated' => 'Taalstatus succesvol bijgewerkt.',
    ],

    'validation' => [
        'scope_required' => 'Het bereik is verplicht.',
        'scope_in' => 'Ongeldig bijwerkbereik.',

        'language_ids_array' => 'De taalselectie moet een geldige array zijn.',
        'language_ids_integer' => 'Elke taal-ID moet een geheel getal zijn.',
        'language_ids_exists' => 'Een of meer geselecteerde talen bestaan niet.',
        'language_ids_required' => 'Er moet minimaal één taal worden geselecteerd.',
        'language_ids_single' => 'Voor een enkelvoudig bereik moet exact één taal worden opgegeven.',

        'is_active_required' => 'De statusvlag is verplicht.',
        'is_active_boolean' => 'De statusvlag moet waar of onwaar zijn.',
    ],

    'view' => [
        'languages' => 'Talen',
        'description' => 'Beheer de talen die beschikbaar zijn in uw werkomgeving. Alleen actieve talen worden aangeboden in taalgerelateerde selecties.',

        'table' => [
            'name' => 'Naam',
            'local_name' => 'Lokale naam',
            'tag' => 'Tag',
            'status' => 'Status',
            'action' => 'Actie',
            'active' => 'Actief',
            'inactive' => 'Inactief',
            'activate' => 'Activeren',
            'deactivate' => 'Deactiveren',
        ],

        'actions' => [
            'selected' => 'geselecteerd',
            'activate_selected' => 'Geselecteerde activeren',
            'deactivate_selected' => 'Geselecteerde deactiveren',
            'set_all_active' => 'Alles activeren',
            'set_all_inactive' => 'Alles deactiveren',
        ],

        'alerts' => [
            'future_behavior_note' => 'Deze taalinstellingen zijn voorbereid voor toekomstige meertalige functies. Op dit moment hebben ze geen invloed op het huidige gedrag van uw boekingsomgeving.',
        ],
    ],
];