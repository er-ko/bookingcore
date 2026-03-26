<?php

namespace App\Support\Translations;

final class UnitTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('unit.view.units'),
            'create_unit' => __('unit.view.create_unit'),
            'description' => __('unit.view.index_description'),
            'create_first_unit' => __('unit.view.create_first_unit'),
            'no_units_found' => __('unit.view.no_units_found'),
            'no_units_text' => __('unit.view.no_units_text'),
            'table' => self::table(),
            'actions' => self::indexActions(),
            'alerts' => self::alerts(),
        ];
    }

    public static function create(): array
    {
        return [
            'title' => __('unit.view.create_unit'),
            'description' => __('unit.view.create_description'),
            'back_to_units' => __('unit.view.back_to_units'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'required_title' => __('unit.view.overview.required_title'),
                    'optional_title' => __('unit.view.overview.optional_title'),
                    'status_title' => __('unit.view.overview.status_title'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
        ];
    }

    public static function edit(): array
    {
        return [
            'title' => __('unit.view.edit_unit'),
            'description' => __('unit.view.edit_description'),
            'back_to_units' => __('unit.view.back_to_units'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'unit_id_title' => __('unit.view.overview.unit_id_title'),
                    'required_title' => __('unit.view.overview.required_title'),
                    'optional_title' => __('unit.view.overview.optional_title'),
                    'status_title' => __('unit.view.overview.status_title'),
                    'active_title' => __('unit.view.overview.active_title'),
                    'inactive_title' => __('unit.view.overview.inactive_title'),
                    'note_title' => __('unit.view.overview.note_title'),
                    'note_text' => __('unit.view.overview.note_text'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
        ];
    }

    private static function table(): array
    {
        return [
            'name' => __('unit.view.table.name'),
            'status' => __('unit.view.table.status'),
            'updated' => __('unit.view.table.updated'),
            'actions' => __('unit.view.table.actions'),
            'active' => __('unit.view.table.active'),
            'inactive' => __('unit.view.table.inactive'),
        ];
    }

    private static function indexActions(): array
    {
        return [
            'edit' => __('unit.view.actions.edit'),
            'delete' => __('unit.view.actions.delete'),
        ];
    }

    private static function formActions(): array
    {
        return [
            'cancel' => __('unit.view.actions.cancel'),
            'create' => __('unit.view.actions.create'),
            'creating' => __('unit.view.actions.creating'),
            'save' => __('unit.view.actions.save'),
            'saving' => __('unit.view.actions.saving'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'delete_confirmation' => __('unit.view.alerts.delete_confirmation'),
        ];
    }

    private static function baseOverview(): array
    {
        return [
            'title' => __('unit.view.overview.title'),
            'branches_available_title' => __('unit.view.overview.branches_available_title'),
            'assignment_title' => __('unit.view.overview.assignment_title'),
            'assignment_text' => __('unit.view.overview.assignment_text'),
            'limit_title' => __('unit.view.overview.limit_title'),
			'limit_text' => __('unit.view.overview.limit_text'),
        ];
    }

    private static function form(): array
    {
        return [
            'unit_details' => __('unit.view.form.unit_details'),
            'complete_form' => __('unit.view.form.complete_the_form'),
            'update_form' => __('unit.view.form.update_the_form'),
			'branch_title' => __('unit.view.form.branch_title'),
			'select_branch' => __('unit.view.form.select_branch'),
            'name_title' => __('unit.view.form.name_title'),
            'description_title' => __('unit.view.form.description_title'),
            'active_title' => __('unit.view.form.active_title'),
            'active_text' => __('unit.view.form.active_text'),
        ];
    }
}