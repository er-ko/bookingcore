<?php

namespace App\Support\Translations;

final class BranchTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('branch.view.branches'),
            'create_branch' => __('branch.view.create_branch'),
            'description' => __('branch.view.index_description'),
            'create_first_branch' => __('branch.view.create_first_branch'),
            'no_branches_found' => __('branch.view.no_branches_found'),
            'no_branches_text' => __('branch.view.no_branches_text'),
            'table' => self::table(),
            'actions' => self::indexActions(),
            'alerts' => self::alerts(),
        ];
    }

    public static function create(): array
    {
        return [
            'title' => __('branch.view.create_branch'),
            'description' => __('branch.view.create_description'),
            'back_to_branches' => __('branch.view.back_to_branches'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'required_title' => __('branch.view.overview.required_title'),
                    'optional_title' => __('branch.view.overview.optional_title'),
                    'status_title' => __('branch.view.overview.status_title'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
        ];
    }

    public static function edit(): array
    {
        return [
            'title' => __('branch.view.edit_branch'),
            'description' => __('branch.view.edit_description'),
            'back_to_branches' => __('branch.view.back_to_branches'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'branch_id_title' => __('branch.view.overview.branch_id_title'),
                    'required_title' => __('branch.view.overview.required_title'),
                    'optional_title' => __('branch.view.overview.optional_title'),
                    'status_title' => __('branch.view.overview.status_title'),
                    'active_title' => __('branch.view.overview.active_title'),
                    'inactive_title' => __('branch.view.overview.inactive_title'),
                    'note_title' => __('branch.view.overview.note_title'),
                    'note_text' => __('branch.view.overview.note_text'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
        ];
    }

    private static function table(): array
    {
        return [
            'branch' => __('branch.view.table.branch'),
            'address' => __('branch.view.table.address'),
            'city' => __('branch.view.table.city'),
            'timezone' => __('branch.view.table.timezone'),
            'status' => __('branch.view.table.status'),
            'updated' => __('branch.view.table.updated'),
            'actions' => __('branch.view.table.actions'),
            'active' => __('branch.view.table.active'),
            'inactive' => __('branch.view.table.inactive'),
        ];
    }

    private static function indexActions(): array
    {
        return [
            'edit' => __('branch.view.actions.edit'),
            'delete' => __('branch.view.actions.delete'),
        ];
    }

    private static function formActions(): array
    {
        return [
            'cancel' => __('branch.view.actions.cancel'),
            'create' => __('branch.view.actions.create'),
            'creating' => __('branch.view.actions.creating'),
            'save' => __('branch.view.actions.save'),
            'saving' => __('branch.view.actions.saving'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'delete_confirmation' => __('branch.view.alerts.delete_confirmation'),
        ];
    }

    private static function baseOverview(): array
    {
        return [
            'title' => __('branch.view.overview.title'),
            'countries_available_title' => __('branch.view.overview.countries_available_title'),
			'city_and_postcode_title' => __('branch.view.overview.city_and_postcode_title'),
			'country_and_timezone_title' => __('branch.view.overview.country_and_timezone_title'),
            'timezone_title' => __('branch.view.overview.timezone_title'),
            'timezone_text' => __('branch.view.overview.timezone_text'),
            'limit_title' => __('branch.view.overview.limit_title'),
			'limit_text' => __('branch.view.overview.limit_text'),
        ];
    }

    private static function form(): array
    {
        return [
            'branch_details' => __('branch.view.form.branch_details'),
            'complete_form' => __('branch.view.form.complete_the_form'),
            'update_form' => __('branch.view.form.update_the_form'),
			'branch_name_title' => __('branch.view.form.branch_name_title'),
			'address_line_1_title' => __('branch.view.form.address_line_1_title'),
			'address_line_2_title' => __('branch.view.form.address_line_2_title'),
			'city_title' => __('branch.view.form.city_title'),
			'postcode_title' => __('branch.view.form.postcode_title'),
			'country_title' => __('branch.view.form.country_title'),
			'select_country' => __('branch.view.form.select_country'),
			'timezone_title' => __('branch.view.form.timezone_title'),
			'select_timezone' => __('branch.view.form.select_timezone'),
			'loading_timezones' => __('branch.view.form.loading_timezones'),
            'active_title' => __('branch.view.form.active_title'),
            'active_text' => __('branch.view.form.active_text'),
        ];
    }
}