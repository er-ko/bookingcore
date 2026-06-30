<?php

return [
	// identity
    'booking_mode' => [
        'services' => [
			'label' => 'Services',
			'description' => 'Hair salons, consultations, massages...'
		],
        'properties' => [
			'label' => 'Properties',
			'description' => 'Apartments, holiday homes, short-term stays...'
		],
        'parking' => [
			'label' => 'Parking',
			'description' => 'Airport parking, private lots...'
		],
        'boat_rental' => [
			'label' => 'Boat Rental',
			'description' => 'Boats, yachts, water vehicles...'
		],
        'car_rental' => [
			'label' => 'Car Rental',
			'description' => 'Cars, vans, luxury vehicles...'
		],
        'caravan_rental' => [
			'label' => 'Caravan Rental',
			'description' => 'Caravans, campers, motorhomes...'
		],
    ],

	// properties
	'rental_type' => [
		'short_term' => [
			'label' => 'Short-term',
			'description' => 'Nightly or weekly stays — holiday homes, apartments, rooms...',
		],
		'long_term' => [
			'label' => 'Long-term',
			'description' => 'Monthly leases — apartments, garages, parking spaces...',
		],
	],

	'property_type' => [
		'apartment' => ['label' => 'Apartment'],
		'house'     => ['label' => 'House'],
		'room'      => ['label' => 'Room'],
		'garage'    => ['label' => 'Garage'],
		'garden'    => ['label' => 'Garden'],
		'parking'   => ['label' => 'Parking'],
		'other'     => ['label' => 'Other'],
	],
];
