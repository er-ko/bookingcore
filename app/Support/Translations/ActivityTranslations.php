<?php

namespace App\Support\Translations;

final class ActivityTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('activity.view.activities'),
            'create_activity' => __('activity.view.create_activity'),
            'description' => __('activity.view.index_description'),
            'create_first_activity' => __('activity.view.create_first_activity'),
            'no_activities_found' => __('activity.view.no_activities_found'),
            'no_activities_text' => __('activity.view.no_activities_text'),
            'table' => self::table(),
            'actions' => self::indexActions(),
            'alerts' => self::alerts(),
        ];
    }

    public static function create(): array
    {
        return [
            'title' => __('activity.view.create_activity'),
            'description' => __('activity.view.create_description'),
            'back_to_activities' => __('activity.view.back_to_activities'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'required_title' => __('activity.view.overview.required_title'),
                    'optional_title' => __('activity.view.overview.optional_title'),
                    'status_title' => __('activity.view.overview.status_title'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
        ];
    }

    public static function edit(): array
    {
        return [
            'title' => __('activity.view.edit_activity'),
            'description' => __('activity.view.edit_description'),
            'back_to_activities' => __('activity.view.back_to_activities'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'activity_id_title' => __('activity.view.overview.activity_id_title'),
                    'required_title' => __('activity.view.overview.required_title'),
                    'optional_title' => __('activity.view.overview.optional_title'),
                    'status_title' => __('activity.view.overview.status_title'),
                    'active_title' => __('activity.view.overview.active_title'),
                    'inactive_title' => __('activity.view.overview.inactive_title'),
                    'note_title' => __('activity.view.overview.note_title'),
                    'note_text' => __('activity.view.overview.note_text'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
        ];
    }

    private static function table(): array
    {
        return [
            'name' => __('activity.view.table.name'),
            'status' => __('activity.view.table.status'),
            'updated' => __('activity.view.table.updated'),
            'actions' => __('activity.view.table.actions'),
            'duration' => __('activity.view.table.duration'),
            'min' => __('activity.view.table.min'),
            'active' => __('activity.view.table.active'),
            'inactive' => __('activity.view.table.inactive'),
        ];
    }

    private static function indexActions(): array
    {
        return [
            'edit' => __('activity.view.actions.edit'),
            'delete' => __('activity.view.actions.delete'),
        ];
    }

    private static function formActions(): array
    {
        return [
            'cancel' => __('activity.view.actions.cancel'),
            'create' => __('activity.view.actions.create'),
            'creating' => __('activity.view.actions.creating'),
            'save' => __('activity.view.actions.save'),
            'saving' => __('activity.view.actions.saving'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'delete_confirmation' => __('activity.view.alerts.delete_confirmation'),
        ];
    }

    private static function baseOverview(): array
    {
        return [
            'title' => __('activity.view.overview.title'),
            'duration_title' => __('activity.view.overview.duration_title'),
            'duration_text' => __('activity.view.overview.duration_text'),
            'buffer_time_title' => __('activity.view.overview.buffer_time_title'),
            'buffer_time_text' => __('activity.view.overview.buffer_time_text'),
        ];
    }

    private static function form(): array
    {
        return [
            'activity_details' => __('activity.view.form.activity_details'),
            'complete_form' => __('activity.view.form.complete_the_form'),
            'update_form' => __('activity.view.form.update_the_form'),
            'name_title' => __('activity.view.form.name_title'),
            'duration_title' => __('activity.view.form.duration_title'),
            'buffer_before_title' => __('activity.view.form.buffer_before_title'),
            'buffer_after_title' => __('activity.view.form.buffer_after_title'),
            'active_title' => __('activity.view.form.active_title'),
            'active_text' => __('activity.view.form.active_text'),
        ];
    }
}