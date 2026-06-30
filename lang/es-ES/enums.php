<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Servicios',
            'description' => 'Peluquerías, consultas, masajes ...'
        ],
        'properties' => [
            'label' => 'Propiedades',
            'description' => 'Apartamentos, casas de vacaciones, estancias de corta duración ...'
        ],
        'parking' => [
            'label' => 'Aparcamiento',
            'description' => 'Aparcamiento en aeropuertos, plazas privadas ...'
        ],
        'boat_rental' => [
            'label' => 'Alquiler de embarcaciones',
            'description' => 'Embarcaciones, yates, vehículos acuáticos ...'
        ],
        'car_rental' => [
            'label' => 'Alquiler de coches',
            'description' => 'Coches, furgonetas, vehículos de lujo ...'
        ],
        'caravan_rental' => [
            'label' => 'Alquiler de caravanas',
            'description' => 'Caravanas, campers, autocaravanas ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Alquiler a corto plazo',
            'description' => 'Estancias por noches o semanas — casas de vacaciones, apartamentos, habitaciones…',
        ],
        'long_term' => [
            'label' => 'Alquiler a largo plazo',
            'description' => 'Arrendamientos mensuales — apartamentos, garajes, plazas de aparcamiento…',
        ],
    ],

    'property_type' => [
        'apartment' => ['label' => 'Apartamento'],
        'house'     => ['label' => 'Casa'],
        'room'      => ['label' => 'Habitación'],
        'garage'    => ['label' => 'Garaje'],
        'garden'    => ['label' => 'Jardín'],
        'parking'   => ['label' => 'Aparcamiento'],
        'other'     => ['label' => 'Otro'],
    ],
];
