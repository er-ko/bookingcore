<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Služby',
            'description' => 'Kadernícke salóny, konzultácie, masáže ...'
        ],
        'properties' => [
            'label' => 'Nehnuteľnosti',
            'description' => 'Apartmány, rekreačné domy, krátkodobé pobyty ...'
        ],
        'parking' => [
            'label' => 'Parkovanie',
            'description' => 'Parkovanie na letiskách, súkromné parkovacie miesta ...'
        ],
        'boat_rental' => [
            'label' => 'Prenájom lodí',
            'description' => 'Lode, jachty, vodné vozidlá ...'
        ],
        'car_rental' => [
            'label' => 'Prenájom automobilov',
            'description' => 'Automobily, dodávky, luxusné vozidlá ...'
        ],
        'caravan_rental' => [
            'label' => 'Prenájom karavanov',
            'description' => 'Karavany, obytné vozidlá, obytné automobily ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Krátkodobý prenájom',
            'description' => 'Pobyty na noc alebo na týždeň — rekreačné domy, apartmány, izby…',
        ],
        'long_term' => [
            'label' => 'Dlhodobý prenájom',
            'description' => 'Mesačné nájomné zmluvy — apartmány, garáže, parkovacie miesta…',
        ],
    ],
    'property_type' => [
        'apartment' => ['label' => 'Apartmán'],
        'house'     => ['label' => 'Dom'],
        'room'      => ['label' => 'Izba'],
        'garage'    => ['label' => 'Garáž'],
        'garden'    => ['label' => 'Záhrada'],
        'parking'   => ['label' => 'Parkovacie miesto'],
        'other'     => ['label' => 'Ostatné'],
    ],
];
