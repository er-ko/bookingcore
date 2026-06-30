<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Diensten',
            'description' => 'Kapsalons, consultaties, massages ...'
        ],
        'properties' => [
            'label' => 'Accommodaties',
            'description' => 'Appartementen, vakantiehuizen, kort verblijf ...'
        ],
        'parking' => [
            'label' => 'Parkeren',
            'description' => 'Luchthavenparkeren, privéparkeerplaatsen ...'
        ],
        'boat_rental' => [
            'label' => 'Bootverhuur',
            'description' => 'Boten, jachten, watervoertuigen ...'
        ],
        'car_rental' => [
            'label' => 'Autoverhuur',
            'description' => 'Auto’s, bestelwagens, luxevoertuigen ...'
        ],
        'caravan_rental' => [
            'label' => 'Caravanverhuur',
            'description' => 'Caravans, campers, motorhomes ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Kortetermijnverhuur',
            'description' => 'Verblijven per nacht of per week — vakantiehuizen, appartementen, kamers…',
        ],
        'long_term' => [
            'label' => 'Langetermijnverhuur',
            'description' => 'Maandelijkse huurovereenkomsten — appartementen, garages, parkeerplaatsen…',
        ],
    ],
    'property_type' => [
        'apartment' => ['label' => 'Appartement'],
        'house'     => ['label' => 'Huis'],
        'room'      => ['label' => 'Kamer'],
        'garage'    => ['label' => 'Garage'],
        'garden'    => ['label' => 'Tuin'],
        'parking'   => ['label' => 'Parkeerplaats'],
        'other'     => ['label' => 'Overig'],
    ],
];
