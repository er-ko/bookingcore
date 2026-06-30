<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Dienstleistungen',
            'description' => 'Friseursalons, Beratungen, Massagen ...'
        ],
        'properties' => [
            'label' => 'Immobilien',
            'description' => 'Apartments, Ferienhäuser, Kurzzeitaufenthalte ...'
        ],
        'parking' => [
            'label' => 'Parkplätze',
            'description' => 'Flughafenparkplätze, private Parkflächen ...'
        ],
        'boat_rental' => [
            'label' => 'Bootsvermietung',
            'description' => 'Boote, Yachten, Wasserfahrzeuge ...'
        ],
        'car_rental' => [
            'label' => 'Autovermietung',
            'description' => 'Autos, Transporter, Luxusfahrzeuge ...'
        ],
        'caravan_rental' => [
            'label' => 'Wohnwagenvermietung',
            'description' => 'Wohnwagen, Camper, Wohnmobile ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Kurzfristige Vermietung',
            'description' => 'Aufenthalte für Nächte oder Wochen — Ferienhäuser, Wohnungen, Zimmer…',
        ],
        'long_term' => [
            'label' => 'Langfristige Vermietung',
            'description' => 'Monatliche Mietverhältnisse — Wohnungen, Garagen, Parkplätze…',
        ],
    ],

    'property_type' => [
        'apartment' => ['label' => 'Wohnung'],
        'house'     => ['label' => 'Haus'],
        'room'      => ['label' => 'Zimmer'],
        'garage'    => ['label' => 'Garage'],
        'garden'    => ['label' => 'Garten'],
        'parking'   => ['label' => 'Parkplatz'],
        'other'     => ['label' => 'Sonstiges'],
    ],
];
