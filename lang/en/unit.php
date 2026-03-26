<?php

return [
    'messages' => [
        'created' => 'Unit created successfully.',
        'updated' => 'Unit updated successfully.',
        'deleted' => 'Unit deleted successfully.',
        'not_found' => 'Unit not found.',
		'limit_reached' => 'You have reached the maximum allowed number of units.'
    ],

    'validation' => [
        'branch_id_required' => 'The branch is required.',
        'branch_id_integer' => 'The branch selection is invalid.',
        'branch_id_exists' => 'The selected branch does not exist.',

        'name_required' => 'The unit name is required.',
        'name_max' => 'The unit name may not be greater than 255 characters.',

        'description_string' => 'The description must be a valid string.',

        'is_active_required' => 'The active status is required.',
        'is_active_boolean' => 'The active status must be true or false.',
    ],

    'view' => [
        'title' => 'Unit',
        'units' => 'Units',
        'create_unit' => 'Create Unit',
        'edit_unit' => 'Edit Unit',
        'index_description' => 'Manage the activities that can be booked in your units.',
        'create_description' => 'Create a new unit and assign it to an existing branch.',
        'edit_description' => 'Update unit details and assign it to an existing branch.',
        'back_to_units' => 'Back to Units',
        'create_first_unit' => 'Create your first unit',
        'no_units_found' => 'No units found.',
        'no_units_text' => 'There are no units to display yet. Create the first unit to start organizing your booking structure.',

        'table' => [
            'name' => 'Name',
            'status' => 'Status',
            'updated' => 'Updated',
            'actions' => 'Actions',
            'active' => 'Active',
            'inactive' => 'Inactive',
        ],

        'overview' => [
            'title' => 'Unit overview',
            'unit_id_title' => 'Unit ID',
            'branches_available_title' => 'Branches available',
            'assignment_title' => 'Assignment',
            'assignment_text' => 'Each unit must belong to one branch.',
            'limit_title' => 'Limit',
            'limit_text' => 'You can create up to 50 units.',
            'duration_text' => 'Set how long the activity should take in minutes.',
            'required_title' => 'Required',
            'optional_title' => 'Optional',
            'status_title' => 'Current status',
            'active_title' => 'Active',
            'inactive_title' => 'Inactive',
            'note_title' => 'Note',
            'note_text' => 'Updating this unit will not affect other units in the system.',
        ],

        'form' => [
            'unit_details' => 'Unit details',
            'complete_the_form' => 'Complete the form',
            'update_the_form' => 'Update the form',
            'branch_title' => 'Branch',
            'select_branch' => 'Select a branch',
            'name_title' => 'Name',
            'description_title' => 'Description',
            'active_title' => 'Active unit',
            'active_text' => 'Inactive units remain stored in the system but cannot be actively used for bookings.',
        ],

        'actions' => [
            'edit' => 'Edit',
            'delete' => 'Delete',
            'cancel' => 'Cancel',
            'create' => 'Create Activity',
            'creating' => 'Creating...',
            'save' => 'Save changes',
            'saving' => 'Saving...',
        ],

        'alerts' => [
            'delete_confirmation' => 'Are you sure you want to delete this unit?',
        ],

    ],
];