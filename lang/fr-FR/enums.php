<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Services',
            'description' => 'Salons de coiffure, consultations, massages ...'
        ],
        'properties' => [
            'label' => 'Biens immobiliers',
            'description' => 'Appartements, maisons de vacances, séjours de courte durée ...'
        ],
        'parking' => [
            'label' => 'Stationnement',
            'description' => 'Parkings d\'aéroport, places privées ...'
        ],
        'boat_rental' => [
            'label' => 'Location de bateaux',
            'description' => 'Bateaux, yachts, véhicules nautiques ...'
        ],
        'car_rental' => [
            'label' => 'Location de voitures',
            'description' => 'Voitures, fourgonnettes, véhicules de luxe ...'
        ],
        'caravan_rental' => [
            'label' => 'Location de caravanes',
            'description' => 'Caravanes, camping-cars, véhicules de loisirs ...'
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
