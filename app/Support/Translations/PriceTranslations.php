<?php

namespace App\Support\Translations;

final class PriceTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('price.view.title'),
            'description' => __('price.view.description'),
            'form' => self::form(),
            'table' => self::table(),
            'actions' => self::actions(),
            'states' => self::states(),
            'messages' => self::messages(),
            'dialogs' => self::dialogs(),
        ];
    }

    private static function form(): array
    {
        return [
            'title' => __('price.view.form.title'),
            'branch_title' => __('price.view.form.branch_title'),
            'branch_placeholder' => __('price.view.form.branch_placeholder'),
            'unit_title' => __('price.view.form.unit_title'),
            'unit_placeholder' => __('price.view.form.unit_placeholder'),
            'activity_title' => __('price.view.form.activity_title'),
            'activity_placeholder' => __('price.view.form.activity_placeholder'),
            'price_title' => __('price.view.form.price_title'),
            'price_placeholder' => __('price.view.form.price_placeholder'),
            'currency_title' => __('price.view.form.currency_title'),
            'currency_text' => __('price.view.form.currency_text'),
        ];
    }

    private static function table(): array
    {
        return [
            'title' => __('price.view.table.title'),
            'branch_title' => __('price.view.table.branch_title'),
            'unit_title' => __('price.view.table.unit_title'),
            'activity_title' => __('price.view.table.activity_title'),
            'price_title' => __('price.view.table.price_title'),
            'actions_title' => __('price.view.table.actions_title'),
        ];
    }

    private static function actions(): array
    {
        return [
            'save' => __('price.view.actions.save'),
            'saving' => __('price.view.actions.saving'),
            'edit' => __('price.view.actions.edit'),
            'update' => __('price.view.actions.update'),
            'updating' => __('price.view.actions.updating'),
            'delete' => __('price.view.actions.delete'),
            'cancel' => __('price.view.actions.cancel'),
            'deleting' => __('price.view.actions.deleting'),
        ];
    }

    private static function states(): array
    {
        return [
            'empty_title' => __('price.view.states.empty_title'),
            'empty_text' => __('price.view.states.empty_text'),
            'no_branches_title' => __('price.view.states.no_branches_title'),
            'no_branches_text' => __('price.view.states.no_branches_text'),
            'no_units_text' => __('price.view.states.no_units_text'),
            'no_activities_text' => __('price.view.states.no_activities_text'),
        ];
    }

    private static function messages(): array
    {
        return [
            'created' => __('price.messages.created'),
            'updated' => __('price.messages.updated'),
            'deleted' => __('price.messages.deleted'),
            'failed' => __('price.messages.failed'),
        ];
    }

    private static function dialogs(): array
    {
        return [
            'delete_confirm' => __('price.view.dialogs.delete_confirm'),
        ];
    }
}
