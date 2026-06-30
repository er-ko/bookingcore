<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Serviços',
            'description' => 'Salões de beleza, consultas, massagens ...'
        ],
        'properties' => [
            'label' => 'Imóveis',
            'description' => 'Apartamentos, casas de temporada, estadias de curta duração ...'
        ],
        'parking' => [
            'label' => 'Estacionamento',
            'description' => 'Estacionamento em aeroportos, vagas privadas ...'
        ],
        'boat_rental' => [
            'label' => 'Aluguel de barcos',
            'description' => 'Barcos, iates, veículos aquáticos ...'
        ],
        'car_rental' => [
            'label' => 'Aluguel de carros',
            'description' => 'Carros, vans, veículos de luxo ...'
        ],
        'caravan_rental' => [
            'label' => 'Aluguel de trailers',
            'description' => 'Trailers, campers, motorhomes ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Locação de curto prazo',
            'description' => 'Estadias por noite ou por semana — casas de temporada, apartamentos, quartos…',
        ],
        'long_term' => [
            'label' => 'Locação de longo prazo',
            'description' => 'Contratos mensais de locação — apartamentos, garagens, vagas de estacionamento…',
        ],
    ],
    'property_type' => [
        'apartment' => ['label' => 'Apartamento'],
        'house'     => ['label' => 'Casa'],
        'room'      => ['label' => 'Quarto'],
        'garage'    => ['label' => 'Garagem'],
        'garden'    => ['label' => 'Jardim'],
        'parking'   => ['label' => 'Vaga de estacionamento'],
        'other'     => ['label' => 'Outro'],
    ],
];
