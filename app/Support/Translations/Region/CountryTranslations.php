<?php

namespace App\Support\Translations\Region;

final class CountryTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('region/country.view.countries'),
            'description' => __('region/country.view.description'),
            'table' => self::table(),
            'actions' => self::actions(),
            'alerts' => self::alerts(),
        ];
    }

    private static function table(): array
    {
        return [
            'official_name' => __('region/country.view.table.official_name'),
            'language' => __('region/country.view.table.language'),
            'currency' => __('region/country.view.table.currency'),
            'phone_code' => __('region/country.view.table.phone_code'),
            'status' => __('region/country.view.table.status'),
            'action' => __('region/country.view.table.action'),
            'active' => __('region/country.view.table.active'),
            'inactive' => __('region/country.view.table.inactive'),
            'activate' => __('region/country.view.table.activate'),
            'deactivate' => __('region/country.view.table.deactivate'),
        ];
    }

    private static function actions(): array
    {
        return [
            'selected' => __('region/country.view.actions.selected'),
            'activate_selected' => __('region/country.view.actions.activate_selected'),
            'deactivate_selected' => __('region/country.view.actions.deactivate_selected'),
            'set_all_active' => __('region/country.view.actions.set_all_active'),
            'set_all_inactive' => __('region/country.view.actions.set_all_inactive'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'future_behavior_note' => __('region/country.view.alerts.future_behavior_note'),
        ];
    }
}