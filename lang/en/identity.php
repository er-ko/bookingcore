<?php

return [
    'messages' => [
        'updated' => 'Identity settings updated successfully.',
        'deletion_scheduled' => 'Your account has been scheduled for deletion in 7 days.',
        'deletion_canceled' => 'Your scheduled account deletion has been cancelled.',
    ],

    'validation' => [
        'mode_required' => 'Booking mode is required.',
        'mode_in' => 'Selected booking mode is invalid.',

        'brand_required' => 'Brand name is required.',
        'brand_max' => 'Brand name may not be greater than 160 characters.',

        'slug_required' => 'Slug is required.',
        'slug_min' => 'Slug must be at least 3 characters.',
        'slug_max' => 'Slug may not be greater than 120 characters.',
        'slug_regex' => 'Slug may contain only lowercase letters, numbers, and single hyphens between words.',
        'slug_unique' => 'This slug is already in use.',

        'default_lang_required' => 'Default language is required.',
        'default_lang_max' => 'Default language may not be greater than 16 characters.',
        'default_lang_exists' => 'Selected default language is invalid.',

        'default_currency_required' => 'Default currency is required.',
        'default_currency_size' => 'Default currency must be exactly 3 characters.',
        'default_currency_exists' => 'Selected default currency is invalid.',

        'default_country_required' => 'Default country is required.',
        'default_country_size' => 'Default country must be exactly 2 characters.',
        'default_country_exists' => 'Selected default country is invalid.',

        'is_public_required' => 'Visibility status is required.',
        'is_public_boolean' => 'Visibility status must be true or false.',
    ],

    'view' => [
        'title' => 'Identity',
        'description' => 'Manage the public identity of your booking page, including brand name, public URL, and regional defaults.',

        'overview' => [
            'title' => 'Overview',
            'brand_title' => 'Brand',
            'brand_text' => 'Set the public name that visitors will see on your booking page.',
            'public_url_title' => 'Public URL',
            'public_url_text' => 'Choose the slug for your public booking page. Your page will be available at :slug',
            'defaults_title' => 'Defaults',
            'defaults_text' => 'Define the default language, currency, and country used across your booking workspace.',
            'visibility_title' => 'Visibility',
            'visibility_text' => 'These settings shape how your booking page is presented to visitors and how your workspace behaves by default.',
        ],

        'form' => [
            'identity_settings' => 'Identity settings',
            'base_configuration' => 'Base configuration',
            'brand_name_title' => 'Brand name',
            'brand_name_placeholder' => 'BookingCore Studio',
            'public_slug_title' => 'Public slug',
            'public_slug_placeholder' => 'your-slug',
            'public_slug_prefix' => 'bookingcore.io/@',
            'default_language_title' => 'Default language',
            'select_language_title' => 'Select language',
            'default_currency_title' => 'Default currency',
            'select_currency_title' => 'Select currency',
            'default_country_title' => 'Default country',
            'select_country_title' => 'Select country',
            'booking_page_visibility_title' => 'Booking page visibility',
            'public_booking_page_title' => 'Public booking page',
            'public_booking_page_text' => 'When enabled, visitors can access your booking page using its public URL. When disabled, the page remains hidden from visitors.',
        ],

        'actions' => [
            'cancel' => 'Cancel',
            'save' => 'Save identity',
            'saving' => 'Saving...',
            'schedule_account_deletion' => 'Schedule account deletion',
            'cancel_deletion' => 'Cancel deletion',
        ],

        'deletion' => [
            'account_removal_title' => 'Account removal',
            'scheduled_deletion_title' => 'Scheduled deletion',
            'scheduled_deletion_text' => 'Your public booking page will be hidden immediately after scheduling deletion. All account data will be permanently removed after 7 days unless you cancel the request.',
            'recovery_period_title' => 'Recovery period',
            'recovery_period_text' => 'During the 7-day grace period, you can still cancel the deletion request and keep your account.',
            'deletion_date_title' => 'Deletion date',
            'deletion_date_text' => 'Your account is scheduled for permanent deletion on :date.',
        ],
    ],
];
