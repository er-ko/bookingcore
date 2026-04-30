<?php

return [
    'messages' => [
        'created'   => 'Price created successfully.',
        'updated'   => 'Price updated successfully.',
        'deleted'   => 'Price deleted successfully.',
        'failed'    => 'Failed to process the price request.',
    ],

    'validation' => [
        'branch_required' => 'Please select a branch.',
        'branch_invalid' => 'The selected branch is invalid.',
        'branch_not_found' => 'The selected branch was not found.',

        'unit_required' => 'Please select a unit.',
        'unit_invalid' => 'The selected unit is invalid.',
        'unit_not_found' => 'The selected unit was not found.',

        'activity_required' => 'Please select an activity.',
        'activity_invalid' => 'The selected activity is invalid.',
        'activity_not_found' => 'The selected activity was not found.',

        'price_already_exists' => 'A price for the selected unit and activity already exists.',
        'price_not_found' => 'The selected price was not found.',
        'price_required' => 'Please enter a price.',
        'price_invalid' => 'The price must be a valid number.',
        'price_min' => 'The price must be zero or greater.',
    ],

    'view' => [
        'title' => 'Prices',
        'description' => 'Set the default price for each activity within a specific unit.',

        'form' => [
            'title' => 'Price settings',
            'branch_title' => 'Branch',
            'branch_placeholder' => 'Select branch',
            'unit_title' => 'Unit',
            'unit_placeholder' => 'Select unit',
            'activity_title' => 'Activity',
            'activity_placeholder' => 'Select activity',
            'price_title' => 'Price',
            'price_placeholder' => 'Enter price',
            'currency_title' => 'Currency',
            'currency_text' => 'Prices are stored in your default currency.',
        ],

        'table' => [
            'title' => 'Saved prices',
            'branch_title' => 'Branch',
            'unit_title' => 'Unit',
            'activity_title' => 'Activity',
            'price_title' => 'Price',
            'actions_title' => 'Actions',
        ],

        'actions' => [
            'save' => 'Save price',
            'saving' => 'Saving...',
            'edit' => 'Edit',
            'update' => 'Update',
            'updating' => 'Updating...',
            'delete' => 'Delete',
            'cancel' => 'Cancel',
            'deleting' => 'Deleting...',
        ],

        'states' => [
            'empty_title' => 'No prices yet',
            'empty_text' => 'Create the first price for a unit and activity combination.',
            'no_branches_title' => 'No price setup available',
            'no_branches_text' => 'Create a branch first to start setting prices.',
            'no_units_text' => 'No units are available for the selected branch.',
            'no_activities_text' => 'No activities are available.',
        ],

        'dialogs' => [
            'delete_confirm' => 'Are you sure you want to delete this price?',
        ],
    ],
];
