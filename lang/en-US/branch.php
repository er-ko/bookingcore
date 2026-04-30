<?php

return [
    'messages' => [
        'created'   => 'Branch created successfully.',
        'updated'   => 'Branch updated successfully.',
        'deleted'   => 'Branch deleted successfully.',
        'failed'    => 'Failed to process the branch request.',
        'not_found' => 'Branch not found.',
        'has_units' => 'The branch cannot be deleted because it still contains units.',
        'has_bookings' => 'The branch cannot be deleted because it still contains bookings.',
		'limit_reached' => 'You have reached the maximum allowed number of branches.',
    ],

    'validation' => [
        'name_required' => 'The branch name is required.',
        'name_max' => 'The branch name may not be greater than 255 characters.',

        'address_line_1_max' => 'Address line 1 may not be greater than 255 characters.',
        'address_line_2_max' => 'Address line 2 may not be greater than 255 characters.',

        'city_max' => 'The city may not be greater than 255 characters.',
        'postcode_max' => 'The postcode may not be greater than 32 characters.',

        'country_code_size' => 'The country code must be exactly 2 characters.',

        'timezone_required' => 'The timezone is required.',
        'timezone_max' => 'The timezone may not be greater than 64 characters.',

        'is_active_required' => 'The active status is required.',
        'is_active_boolean' => 'The active status must be true or false.',
    ],

    'view' => [
        'title' => 'Branch',
        'branches' => 'Branches',
        'create_branch' => 'Create Branch',
        'edit_branch' => 'Edit Branch',
        'index_description' => 'Manage your branches, including address details, timezone, and active status.',
        'create_description' => 'Create a new branch with address details, timezone, and activation status.',
        'edit_description' => 'Update branch details, address, timezone, and activation status.',
        'back_to_branches' => 'Back to Branches',
        'create_first_branch' => 'Create your first branch',
        'no_branches_found' => 'No branches found.',
        'no_branches_text' => 'There are no branches to display yet. Create the first branch to start organizing your booking structure.',

        'table' => [
            'branch' => 'Branch',
            'address' => 'Address',
            'city' => 'City',
            'timezone' => 'Timezone',
            'no_address_text' => 'No address specified',
            'status' => 'Status',
            'updated' => 'Updated',
            'actions' => 'Actions',
            'active' => 'Active',
            'inactive' => 'Inactive',
        ],

        'overview' => [
            'title' => 'Branch overview',
            'branch_id_title' => 'Branch ID',
            'countries_available_title' => 'Countries available',
            'city_and_postcode_title' => 'City and postcode',
            'country_and_timezone_title' => 'Country and timezone',
            'timezone_title' => 'Timezone',
            'timezone_text' => 'Based on the selected country',
            'limit_title' => 'Limit',
            'limit_text' => 'You can create up to 10 branches.',
            'duration_text' => 'Set the branch location and regional defaults.',
            'required_title' => 'Required',
            'optional_title' => 'Optional',
            'status_title' => 'Current status',
            'active_title' => 'Active',
            'inactive_title' => 'Inactive',
            'note_title' => 'Note',
            'note_text' => 'Updating this branch will not affect other branches in the system.',
        ],

        'form' => [
            'branch_details' => 'Branch details',
            'complete_the_form' => 'Complete the form',
            'update_the_form' => 'Update the form',
            'branch_name_title' => 'Branch name',
            'address_line_1_title' => 'Address line 1',
            'address_line_2_title' => 'Address line 2',
            'city_title' => 'City',
            'postcode_title' => 'Postcode',
            'country_title' => 'Country',
            'select_country' => 'Select a country',
            'timezone_title' => 'Timezone',
            'select_timezone' => 'Select a timezone',
            'loading_timezones' => 'Loading timezones...',
            'active_title' => 'Active branch',
            'active_text' => 'Inactive branches can remain stored in the system without being actively used.',
        ],

        'actions' => [
            'edit' => 'Edit',
            'delete' => 'Delete',
            'cancel' => 'Cancel',
            'create' => 'Create Branch',
            'creating' => 'Creating...',
            'save' => 'Save changes',
            'saving' => 'Saving...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Are you sure you want to delete this branch?',
        ],

    ],
];
