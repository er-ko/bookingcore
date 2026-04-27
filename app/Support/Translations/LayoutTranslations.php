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
        ];
    }
}
