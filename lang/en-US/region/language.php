<?php

return [
    'messages' => [
        'updated' => 'Language status updated successfully.',
    ],

    'validation' => [
		'scope_required' => 'Scope is required.',
		'scope_in' => 'Invalid update scope.',

		'language_ids_array' => 'Language selection must be a valid array.',
		'language_ids_integer' => 'Each language identifier must be an integer.',
		'language_ids_exists' => 'One or more selected languages do not exist.',
		'language_ids_required' => 'At least one language must be selected.',
		'language_ids_single' => 'Exactly one language must be provided for single scope.',

		'is_active_required' => 'Status flag is required.',
		'is_active_boolean' => 'Status flag must be true or false.',
	],

    'view' => [
        'languages' => 'Languages',
        'description' => 'Manage the languages available in your workspace. Only active languages will be offered in language-related selections.',

        'table' => [
            'name' => 'Name',
            'local_name' => 'Local name',
            'tag' => 'Tag',
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
            'future_behavior_note' => 'These language settings are prepared for future multilingual features. For now, they do not affect the current behavior of your booking workspace.',
        ],
    ],
];