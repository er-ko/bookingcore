<?php

return [
    'messages' => [
        'failed' => 'Failed to process the calendar integration request.',
        'calendar_selected' => 'Calendar selected successfully.',
        'settings_updated' => 'Calendar sync settings updated successfully.',
        'invalid_calendar_id' => 'The selected calendar ID is invalid.',
        'integration_user_mismatch' => 'The selected integration does not belong to the authenticated user.',
        'integration_not_calendar' => 'The selected integration is not a calendar integration.',
        'integration_inactive' => 'The selected integration is inactive.',
        'missing_refresh_token' => 'The calendar integration does not contain a refresh token.',
        'missing_access_token' => 'The calendar integration does not contain an access token.',
        'not_google_integration' => 'The selected integration is not a Google Calendar integration.',
        'invalid_sync_mode' => 'The selected synchronization mode is invalid.',
        'google_refresh_failed' => 'Failed to refresh the Google Calendar access token.',
        'google_refresh_missing_access_token' => 'Failed to refresh the Google Calendar access token because the response did not include an access token.',
        'connection_error' => 'BookingCore could not verify your calendar connection. Please reconnect your Google Calendar account and try again.',
    ],

    'validation' => [
        'calendar_id_required' => 'Calendar identifier is required.',
        'calendar_id_string' => 'Calendar identifier must be a string.',
        'calendar_id_max' => 'Calendar identifier may not be greater than 255 characters.',

        'sync_mode_required' => 'Synchronization mode is required.',
        'sync_mode_string' => 'Synchronization mode must be a string.',
        'sync_mode_in' => 'Selected synchronization mode is invalid.',
    ],

    'view' => [
        'title' => 'Calendar integrations',
        'description' => 'Connect your external calendar account and choose where BookingCore should create booking events.',

        'overview' => [
            'connected_account_title' => 'Connected account',
            'provider_title' => 'Provider',
            'name_title' => 'Name',
            'email_title' => 'Email',
            'timezone_title' => 'Timezone',
            'status_title' => 'Status',
            'active_title' => 'Active',
            'calendar_settings_title' => 'Calendar settings',
            'available_calendars_title' => 'Available calendars',
            'timezone_prefix' => 'Timezone:',
        ],

        'form' => [
            'sync_mode_title' => 'Synchronization mode',
            'sync_mode_soft_title' => 'Soft',
            'sync_mode_strict_title' => 'Strict',
            'sync_mode_help' => 'Soft keeps BookingCore working even if calendar sync fails. Strict is intended for stronger consistency.',
        ],

        'actions' => [
            'connect_google' => 'Connect Google Calendar',
            'reconnect_google' => 'Reconnect Google Calendar',
            'save_settings' => 'Save settings',
            'select_calendar' => 'Select calendar',
            'selected' => 'Selected',
        ],

        'states' => [
            'connection_expired_title' => 'Google Calendar connection expired',
            'connection_expired_text' => 'Your Google Calendar connection is no longer valid. Please reconnect your account to continue syncing calendars and booking events.',
            'no_calendar_connected_title' => 'No calendar connected',
            'no_calendar_connected_text' => 'You have not connected any calendar yet. Connect Google Calendar to start syncing booking events.',
            'no_calendars_found_title' => 'No calendars found',
            'no_calendars_found_text' => 'The connected account does not currently expose any calendars.',
            'primary_badge' => 'Primary',
            'read_only_badge' => 'Read only',
            'selected_badge' => 'Selected',
            'calendar_count_suffix' => 'calendar(s)',
        ],
    ],
];
