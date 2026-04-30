<?php

return [
    'messages' => [
        'updated' => 'Valutastatus succesvol bijgewerkt.',
    ],

    'validation' => [
        'scope_required' => 'Het bereik is verplicht.',
        'scope_in' => 'Ongeldig bijwerkbereik.',

        'currency_ids_array' => 'De valutaselectie moet een geldige array zijn.',
        'currency_ids_integer' => 'Elke valuta-ID moet een geheel getal zijn.',
        'currency_ids_exists' => 'Een of meer geselecteerde valuta’s bestaan niet.',
        'currency_ids_required' => 'Er moet minimaal één valuta worden geselecteerd.',
        'currency_ids_single' => 'Voor een enkelvoudig bereik moet exact één valuta worden opgegeven.',

        'is_active_required' => 'De statusvlag is verplicht.',
        'is_active_boolean' => 'De statusvlag moet waar of onwaar zijn.',
    ],

    'view' => [
        'currencies' => 'Valuta’s',
        'description' => 'Beheer de valuta’s die beschikbaar zijn in uw werkomgeving. Alleen actieve valuta’s worden aangeboden in valutagerelateerde selecties.',

        'table' => [
            'name' => 'Naam',
            'decimal' => 'Decimaal',
            'symbol' => 'Symbool',
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
            'future_behavior_note' => 'Deze valuta-instellingen zijn voorbereid voor toekomstige prijs- en regionale functies. Op dit moment hebben ze geen invloed op het huidige gedrag van uw boekingsomgeving.',
        ],
    ],
];