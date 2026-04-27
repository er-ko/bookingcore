<?php

namespace App\Support\Translations\Region;

final class CurrencyTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('region/currency.view.currencies'),
            'description' => __('region/currency.view.description'),
            'table' => self::table(),
            'actions' => self::actions(),
            'alerts' => self::alerts(),
        ];
    }

    private static function table(): array
    {
        return [
            'name' => __('region/currency.view.table.name'),
            'decimal' => __('region/currency.view.table.decimal'),
            'symbol' => __('region/currency.view.table.symbol'),
            'status' => __('region/currency.view.table.status'),
            'action' => __('region/currency.view.table.action'),
            'active' => __('region/currency.view.table.active'),
            'inactive' => __('region/currency.view.table.inactive'),
            'activate' => __('region/currency.view.table.activate'),
            'deactivate' => __('region/currency.view.table.deactivate'),
        ];
    }

    private static function actions(): array
    {
        return [
            'selected' => __('region/currency.view.actions.selected'),
            'activate_selected' => __('region/currency.view.actions.activate_selected'),
            'deactivate_selected' => __('region/currency.view.actions.deactivate_selected'),
            'set_all_active' => __('region/currency.view.actions.set_all_active'),
            'set_all_inactive' => __('region/currency.view.actions.set_all_inactive'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'future_behavior_note' => __('region/currency.view.alerts.future_behavior_note'),
        ];
    }
}