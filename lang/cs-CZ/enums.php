<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Služby',
            'description' => 'Kadeřnické salony, konzultace, masáže ...'
        ],
        'properties' => [
            'label' => 'Nemovitosti',
            'description' => 'Apartmány, rekreační domy, krátkodobé pobyty ...'
        ],
        'parking' => [
            'label' => 'Parkování',
            'description' => 'Parkování na letištích, soukromá parkovací místa ...'
        ],
        'boat_rental' => [
            'label' => 'Pronájem lodí',
            'description' => 'Lodě, jachty, vodní vozidla ...'
        ],
        'car_rental' => [
            'label' => 'Pronájem automobilů',
            'description' => 'Automobily, dodávky, luxusní vozidla ...'
        ],
        'caravan_rental' => [
            'label' => 'Pronájem karavanů',
            'description' => 'Karavany, obytné vozy, obytné automobily ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Krátkodobý pronájem',
            'description' => 'Pobyty na noc nebo na týden — rekreační domy, apartmány, pokoje…',
        ],
        'long_term' => [
            'label' => 'Dlouhodobý pronájem',
            'description' => 'Měsíční nájemní smlouvy — apartmány, garáže, parkovací místa…',
        ],
    ],
    'property_type' => [
        'apartment' => ['label' => 'Apartmán'],
        'house'     => ['label' => 'Dům'],
        'room'      => ['label' => 'Pokoj'],
        'garage'    => ['label' => 'Garáž'],
        'garden'    => ['label' => 'Zahrada'],
        'parking'   => ['label' => 'Parkovací místo'],
        'other'     => ['label' => 'Ostatní'],
    ],
];
