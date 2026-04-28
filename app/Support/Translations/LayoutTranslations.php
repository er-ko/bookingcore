<?php

namespace App\Support\Translations;

final class LayoutTranslations
{
    public static function shared(): array
    {
        return [
            'flash' => [
                'success_eyebrow' => __('layout.flash.success_eyebrow'),
                'success_title' => __('layout.flash.success_title'),
                'error_eyebrow' => __('layout.flash.error_eyebrow'),
                'error_title' => __('layout.flash.error_title'),
            ],
            'navigation' => [
                'dashboard' => __('layout.navigation.dashboard'),
                'identity' => __('layout.navigation.identity'),
                'booking_group' => __('layout.navigation.booking_group'),
                'branches' => __('layout.navigation.branches'),
                'units' => __('layout.navigation.units'),
                'activities' => __('layout.navigation.activities'),
                'prices' => __('layout.navigation.prices'),
                'integrations_group' => __('layout.navigation.integrations_group'),
                'calendars' => __('layout.navigation.calendars'),
                'region_group' => __('layout.navigation.region_group'),
                'countries' => __('layout.navigation.countries'),
                'languages' => __('layout.navigation.languages'),
                'currencies' => __('layout.navigation.currencies'),
                'logout' => __('layout.navigation.logout'),
            ],
            'public' => [
                'created_by' => __('layout.public.created_by'),
                'public_code' => __('layout.public.public_code'),
                'mit_licensed' => __('layout.public.mit_licensed'),
                'theme' => __('layout.public.theme'),
            ],
            'auth' => [
                'default_title' => __('layout.auth.default_title'),
                'default_heading' => __('layout.auth.default_heading'),
                'oauth_notice' => __('layout.auth.oauth_notice', [
                    'app' => config('app.name'),
                ]),
            ],
            'accessibility' => [
                'toggle_theme' => __('layout.accessibility.toggle_theme'),
                'open_navigation' => __('layout.accessibility.open_navigation'),
                'close_navigation' => __('layout.accessibility.close_navigation'),
            ],
        ];
    }
}
