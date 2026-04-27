<?php

namespace App\Support\Translations\Region;

final class LanguageTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('region/language.view.languages'),
            'description' => __('region/language.view.description'),
            'table' => self::table(),
            'actions' => self::actions(),
            'alerts' => self::alerts(),
        ];
    }

    private static function table(): array
    {
        return [
            'name' => __('region/language.view.table.name'),
            'local_name' => __('region/language.view.table.local_name'),
            'tag' => __('region/language.view.table.tag'),
            'status' => __('region/language.view.table.status'),
            'action' => __('region/language.view.table.action'),
            'active' => __('region/language.view.table.active'),
            'inactive' => __('region/language.view.table.inactive'),
            'activate' => __('region/language.view.table.activate'),
            'deactivate' => __('region/language.view.table.deactivate'),
        ];
    }

    private static function actions(): array
    {
        return [
            'selected' => __('region/language.view.actions.selected'),
            'activate_selected' => __('region/language.view.actions.activate_selected'),
            'deactivate_selected' => __('region/language.view.actions.deactivate_selected'),
            'set_all_active' => __('region/language.view.actions.set_all_active'),
            'set_all_inactive' => __('region/language.view.actions.set_all_inactive'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'future_behavior_note' => __('region/language.view.alerts.future_behavior_note'),
        ];
    }
}