<?php

return [
    'messages' => [
        'updated' => 'Country status updated successfully.',
    ],

    'validation' => [
        'scope_required' => 'Scope is required.',
        'scope_in' => 'Invalid update scope.',

        'country_ids_array' => 'Country selection must be a valid array.',
        'country_ids_integer' => 'Each country identifier must be an integer.',
        'country_ids_exists' => 'One or more selected countries do not exist.',
        'country_ids_required' => 'At least one country must be selected.',
        'country_ids_single' => 'Exactly one country must be provided for single scope.',

        'is_active_required' => 'Status flag is required.',
        'is_active_boolean' => 'Status flag must be true or false.',
    ],

    'view' => [
        'countries' => 'Countries',
        'description' => 'Manage the countries available in your booking workspace.',

        'table' => [
            'official_name' => 'Official name',
            'language' => 'Language',
            'currency' => 'Currency',
            'phone_code' => 'Phone code',
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
            'future_behavior_note' => 'These country settings are prepared for future regional features. For now, they do not affect the current behavior of your booking workspace.',
        ],
    ],
];