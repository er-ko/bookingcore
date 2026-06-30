<?php

return [
	'messages' => [
		'created'       => 'Property created successfully.',
		'updated'       => 'Property updated successfully.',
		'deleted'       => 'Property deleted successfully.',
		'failed'        => 'Failed to process the property request.',
		'not_found'     => 'Property not found.',
		'has_bookings'  => 'The property cannot be deleted because it still has active bookings.',
		'limit_reached' => 'You have reached the maximum allowed number of properties.',
	],

	'validation' => [
		'name_required'             => 'The property name is required.',
		'name_max'                  => 'The property name may not be greater than 255 characters.',

		'rental_type_required'      => 'The rental type is required.',
		'rental_type_in'            => 'The selected rental type is invalid.',

		'property_type_required'    => 'The property type is required.',
		'property_type_in'          => 'The selected property type is invalid.',

		'address_line_1_max'        => 'Address line 1 may not be greater than 255 characters.',
		'address_line_2_max'        => 'Address line 2 may not be greater than 255 characters.',
		'city_max'                  => 'The city may not be greater than 255 characters.',
		'postcode_max'              => 'The postcode may not be greater than 32 characters.',
		'country_code_size'         => 'The country code must be exactly 2 characters.',

		'timezone_required'         => 'The timezone is required.',

		'price_per_night_required'  => 'The nightly price is required for short-term rentals.',
		'price_per_month_required'  => 'The monthly price is required for long-term rentals.',

		'check_in_time_format'      => 'The check-in time must be in HH:MM format.',
		'check_out_time_format'     => 'The check-out time must be in HH:MM format.',

		'available_from_date'       => 'The available from date must be a valid date.',

		'is_active_required'        => 'The active status is required.',
		'is_active_boolean'         => 'The active status must be true or false.',
	],

	'view' => [
		'properties'            => 'Properties',
		'create_property'       => 'Create Property',
		'edit_property'         => 'Edit Property',
		'index_description'     => 'Manage your rental properties, including type, pricing, location, and availability.',
		'create_description'    => 'Add a new rental property with all the details your guests need.',
		'edit_description'      => 'Update your property details, pricing, and availability settings.',
		'back_to_properties'    => 'Back to Properties',
		'create_first_property' => 'Create your first property',
		'no_properties_found'   => 'No properties found.',
		'no_properties_text'    => 'There are no properties to display yet. Create your first property to start accepting bookings.',

		'table' => [
			'property'        => 'Property',
			'type'            => 'Type',
			'rental_type'     => 'Rental type',
			'address'         => 'Address',
			'city'            => 'City',
			'status'          => 'Status',
			'updated'         => 'Updated',
			'actions'         => 'Actions',
			'active'          => 'Active',
			'inactive'        => 'Inactive',
			'no_address_text' => 'No address specified',
		],

		'overview' => [
			'title'          => 'Property overview',
			'rental_title'   => 'Rental type',
			'rental_text'    => 'Choose between short-term nightly stays or long-term monthly rentals.',
			'location_title' => 'Location',
			'location_text'  => 'Address and timezone are used for availability and booking calculations.',
			'pricing_title'  => 'Pricing',
			'pricing_text'   => 'Short-term uses nightly rates, long-term uses monthly rates.',
			'limit_title'    => 'Limit',
			'limit_text'     => 'You can create up to 10 properties.',
		],

		'form' => [
			'property_details'          => 'Property details',
			'complete_the_form'         => 'Complete the form',
			'update_the_form'           => 'Update the form',
			'name_title'                => 'Property name',
			'description_title'         => 'Description',
			'rental_type_title'         => 'Rental type',
			'property_type_title'       => 'Property type',
			'address_line_1_title'      => 'Address line 1',
			'address_line_2_title'      => 'Address line 2',
			'city_title'                => 'City',
			'postcode_title'            => 'Postcode',
			'country_title'             => 'Country',
			'select_country'            => 'Select a country',
			'timezone_title'            => 'Timezone',
			'select_timezone'           => 'Select a timezone',
			'loading_timezones'         => 'Loading timezones...',
			'max_guests_title'          => 'Max guests',
			'size_sqm_title'            => 'Size (m²)',
			'price_per_night_title'     => 'Price per night',
			'min_nights_title'          => 'Minimum nights',
			'check_in_time_title'       => 'Check-in time',
			'check_out_time_title'      => 'Check-out time',
			'cleaning_fee_title'        => 'Cleaning fee',
			'price_per_month_title'     => 'Price per month',
			'min_months_title'          => 'Minimum months',
			'deposit_amount_title'      => 'Deposit amount',
			'available_from_title'      => 'Available from',
			'utilities_included_title'  => 'Utilities included',
			'utilities_included_text'   => 'When enabled, electricity, water, and gas are included in the monthly price.',
			'active_title'              => 'Active property',
			'active_text'               => 'Inactive properties are hidden from the public booking page.',
		],

		'actions' => [
			'edit'     => 'Edit',
			'delete'   => 'Delete',
			'cancel'   => 'Cancel',
			'create'   => 'Create Property',
			'creating' => 'Creating...',
			'save'     => 'Save changes',
			'saving'   => 'Saving...',
		],

		'alerts' => [
			'delete_confirmation' => 'Are you sure you want to delete this property?',
		],
	],
];
