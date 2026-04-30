<?php

return [
    'messages' => [
        'updated' => 'Landstatus succesvol bijgewerkt.',
    ],

    'validation' => [
        'scope_required' => 'Het bereik is verplicht.',
        'scope_in' => 'Ongeldig bijwerkbereik.',

        'country_ids_array' => 'De landselectie moet een geldige array zijn.',
        'country_ids_integer' => 'Elke land-ID moet een geheel getal zijn.',
        'country_ids_exists' => 'Een of meer geselecteerde landen bestaan niet.',
        'country_ids_required' => 'Er moet minimaal één land worden geselecteerd.',
        'country_ids_single' => 'Voor een enkelvoudig bereik moet exact één land worden opgegeven.',

        'is_active_required' => 'De statusvlag is verplicht.',
        'is_active_boolean' => 'De statusvlag moet waar of onwaar zijn.',
    ],

    'view' => [
        'countries' => 'Landen',
        'description' => 'Beheer de landen die beschikbaar zijn in uw boekingsomgeving.',

        'table' => [
            'official_name' => 'Officiële naam',
            'language' => 'Taal',
            'currency' => 'Valuta',
            'phone_code' => 'Telefooncode',
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
            'future_behavior_note' => 'Deze landinstellingen zijn voorbereid voor toekomstige regionale functies. Op dit moment hebben ze geen invloed op het huidige gedrag van uw boekingsomgeving.',
        ],
    ],
];