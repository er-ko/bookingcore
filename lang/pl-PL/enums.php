<?php

return [
    // identity
    'booking_mode' => [
        'services' => [
            'label' => 'Usługi',
            'description' => 'Salony fryzjerskie, konsultacje, masaże ...'
        ],
        'properties' => [
            'label' => 'Nieruchomości',
            'description' => 'Apartamenty, domy wakacyjne, pobyty krótkoterminowe ...'
        ],
        'parking' => [
            'label' => 'Parking',
            'description' => 'Parkingi lotniskowe, prywatne miejsca parkingowe ...'
        ],
        'boat_rental' => [
            'label' => 'Wynajem łodzi',
            'description' => 'Łodzie, jachty, pojazdy wodne ...'
        ],
        'car_rental' => [
            'label' => 'Wynajem samochodów',
            'description' => 'Samochody, furgonetki, pojazdy luksusowe ...'
        ],
        'caravan_rental' => [
            'label' => 'Wynajem przyczep kempingowych',
            'description' => 'Przyczepy kempingowe, kampery, samochody kempingowe ...'
        ],
    ],

    // properties
    'rental_type' => [
        'short_term' => [
            'label' => 'Wynajem krótkoterminowy',
            'description' => 'Pobyty na noc lub na tydzień — domy wakacyjne, apartamenty, pokoje…',
        ],
        'long_term' => [
            'label' => 'Wynajem długoterminowy',
            'description' => 'Miesięczne umowy najmu — apartamenty, garaże, miejsca parkingowe…',
        ],
    ],
    'property_type' => [
        'apartment' => ['label' => 'Apartament'],
        'house'     => ['label' => 'Dom'],
        'room'      => ['label' => 'Pokój'],
        'garage'    => ['label' => 'Garaż'],
        'garden'    => ['label' => 'Ogród'],
        'parking'   => ['label' => 'Miejsce parkingowe'],
        'other'     => ['label' => 'Inne'],
    ],
];
