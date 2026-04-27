<?php

return [
    'messages' => [
        'created'   => 'Activity created successfully.',
        'updated'   => 'Activity updated successfully.',
        'deleted'   => 'Activity deleted successfully.',
        'failed'    => 'Failed to process the activity request.',
        'not_found' => 'Activity not found.',
        'limit_reached' => 'You have reached the maximum allowed number of activities.',
    ],

    'validation' => [
        'name_required' => 'The activity name is required.',
        'name_max' => 'The activity name may not be greater than 255 characters.',

        'duration_required' => 'The duration is required.',
        'duration_integer' => 'The duration must be a whole number of minutes.',
        'duration_min' => 'The duration must be at least 1 minute.',
        'duration_max' => 'The duration may not be greater than 1200 minutes.',

        'buffer_before_integer' => 'The buffer before must be a whole number of minutes.',
        'buffer_before_min' => 'The buffer before must be at least 0 minutes.',
        'buffer_before_max' => 'The buffer before may not be greater than 60 minutes.',

        'buffer_after_integer' => 'The buffer after must be a whole number of minutes.',
        'buffer_after_min' => 'The buffer after must be at least 0 minutes.',
        'buffer_after_max' => 'The buffer after may not be greater than 60 minutes.',

        'is_active_required' => 'The active status is required.',
        'is_active_boolean' => 'The active status must be true or false.',
    ],

    'view' => [
        'title' => 'Activity',
        'activities' => 'Activities',
        'create_activity' => 'Create Activity',
        'edit_activity' => 'Edit Activity',
        'index_description' => 'Manage the activities that can be booked in your units.',
        'create_description' => 'Define a new activity, including duration, buffer times, and active status.',
        'edit_description' => 'Update the details of an existing activity, including duration, buffer times, and active status.',
        'back_to_activities' => 'Back to Activities',
        'create_first_activity' => 'Create your first activity',
        'no_activities_found' => 'No activities found.',
        'no_activities_text' => 'There are no activities to display yet. Create the first activity to start organizing your booking structure.',

        'table' => [
            'name' => 'Name',
            'status' => 'Status',
            'updated' => 'Updated',
            'actions' => 'Actions',
            'duration' => 'Duration',
            'min' => 'min',
            'active' => 'Active',
            'inactive' => 'Inactive',
        ],

        'overview' => [
            'title' => 'Activity overview',
            'activity_id_title' => 'Activity ID',
            'duration_title' => 'Duration',
            'duration_text' => 'Set how long the activity should take in minutes.',
            'buffer_time_title' => 'Buffer time',
            'buffer_time_text' => 'Add optional time before and after the activity to prevent tight booking overlaps.',
            'required_title' => 'Required',
            'optional_title' => 'Optional',
            'status_title' => 'Status',
            'status_text' => 'Inactive activities remain stored in the system but cannot be used for new bookings.',
            'active_title' => 'Active',
            'inactive_title' => 'Inactive',
            'note_title' => 'Note',
            'note_text' => 'Updating this activity will not affect other activities in the system.',
        ],

        'form' => [
            'activity_details' => 'Activity details',
            'complete_the_form' => 'Complete the form',
            'update_the_form' => 'Update the form',
            'name_title' => 'Name',
            'duration_title' => 'Duration (minutes)',
            'buffer_before_title' => 'Buffer time before (minutes)',
            'buffer_after_title' => 'Buffer time after (minutes)',
            'active_title' => 'Active activity',
            'active_text' => 'Inactive activities remain stored in the system but cannot be used for new bookings.',
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
            'delete_confirmation' => 'Are you sure you want to delete this activity?',
        ],

    ],
];