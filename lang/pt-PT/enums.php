<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Serviços',
            'description' => 'Cabeleireiros, consultas, massagens ...'
        ],
        'properties' => [
            'label' => 'Propriedades',
            'description' => 'Apartamentos, casas de férias, estadias de curta duração ...'
        ],
        'parking' => [
            'label' => 'Estacionamento',
            'description' => 'Estacionamento em aeroportos, parques privados ...'
        ],
        'boat_rental' => [
            'label' => 'Aluguer de barcos',
            'description' => 'Barcos, iates, veículos aquáticos ...'
        ],
        'car_rental' => [
            'label' => 'Aluguer de automóveis',
            'description' => 'Automóveis, carrinhas, veículos de luxo ...'
        ],
        'caravan_rental' => [
            'label' => 'Aluguer de caravanas',
            'description' => 'Caravanas, autocaravanas, veículos de campismo ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Arrendamento de curta duração',
            'description' => 'Estadias por noite ou por semana — casas de férias, apartamentos, quartos…',
        ],
        'long_term' => [
            'label' => 'Arrendamento de longa duração',
            'description' => 'Contratos de arrendamento mensais — apartamentos, garagens, lugares de estacionamento…',
        ],
    ],
    'property_type' => [
        'apartment' => ['label' => 'Apartamento'],
        'house'     => ['label' => 'Casa'],
        'room'      => ['label' => 'Quarto'],
        'garage'    => ['label' => 'Garagem'],
        'garden'    => ['label' => 'Jardim'],
        'parking'   => ['label' => 'Lugar de estacionamento'],
        'other'     => ['label' => 'Outro'],
    ],
];
