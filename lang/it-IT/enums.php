<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Servizi',
            'description' => 'Parrucchieri, consulenze, massaggi ...'
        ],
        'properties' => [
            'label' => 'Proprietà',
            'description' => 'Appartamenti, case vacanze, soggiorni di breve durata ...'
        ],
        'parking' => [
            'label' => 'Parcheggio',
            'description' => 'Parcheggi aeroportuali, aree private ...'
        ],
        'boat_rental' => [
            'label' => 'Noleggio barche',
            'description' => 'Barche, yacht, veicoli nautici ...'
        ],
        'car_rental' => [
            'label' => 'Noleggio auto',
            'description' => 'Auto, furgoni, veicoli di lusso ...'
        ],
        'caravan_rental' => [
            'label' => 'Noleggio caravan',
            'description' => 'Caravan, camper, autocaravan ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Affitto a breve termine',
            'description' => 'Soggiorni per notte o per settimana — case vacanza, appartamenti, camere…',
        ],
        'long_term' => [
            'label' => 'Affitto a lungo termine',
            'description' => 'Contratti di locazione mensili — appartamenti, garage, posti auto…',
        ],
    ],
    'property_type' => [
        'apartment' => ['label' => 'Appartamento'],
        'house'     => ['label' => 'Casa'],
        'room'      => ['label' => 'Camera'],
        'garage'    => ['label' => 'Garage'],
        'garden'    => ['label' => 'Giardino'],
        'parking'   => ['label' => 'Posto auto'],
        'other'     => ['label' => 'Altro'],
    ],
];
