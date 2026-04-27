<?php

return [
    'messages' => [
        'updated' => 'Currency status updated successfully.',
    ],

    'validation' => [
		'scope_required' => 'Scope is required.',
		'scope_in' => 'Invalid update scope.',

		'currency_ids_array' => 'Currency selection must be a valid array.',
		'currency_ids_integer' => 'Each currency identifier must be an integer.',
		'currency_ids_exists' => 'One or more selected currencies do not exist.',
		'currency_ids_required' => 'At least one currency must be selected.',
		'currency_ids_single' => 'Exactly one currency must be provided for single scope.',

		'is_active_required' => 'Status flag is required.',
		'is_active_boolean' => 'Status flag must be true or false.',
	],

    'view' => [
        'currencies' => 'Currencies',
        'description' => 'Manage the currencies available in your workspace. Only active currencies will be offered in currency-related selections.',

        'table' => [
            'name' => 'Name',
            'decimal' => 'Decimal',
            'symbol' => 'Symbol',
            'status' => 'Status',
            'action' => 'Action',
            'active' => 'Active',
            'inactive' => 'Inactive',
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
        ],

        'actions' => [
            'selected' => 'selected',
            'activate_selected' => 'Activate selected',
            'deactivate_selected' => 'Deactivate selected',
            'set_all_active' => 'Set all active',
            'set_all_inactive' => 'Set all inactive',
        ],

        'alerts' => [
            'future_behavior_note' => 'These currency settings are prepared for future pricing and regional features. For now, they do not affect the current behavior of your booking workspace.',
        ],
    ],
];