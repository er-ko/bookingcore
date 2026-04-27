<?php

namespace App\Support\Translations\Integration;

final class CalendarTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('integration/calendar.view.title'),
            'description' => __('integration/calendar.view.description'),
            'overview' => self::overview(),
            'form' => self::form(),
            'actions' => self::actions(),
            'states' => self::states(),
        ];
    }

    private static function overview(): array
    {
        return [
            'connected_account_title' => __('integration/calendar.view.overview.connected_account_title'),
            'provider_title' => __('integration/calendar.view.overview.provider_title'),
            'name_title' => __('integration/calendar.view.overview.name_title'),
            'email_title' => __('integration/calendar.view.overview.email_title'),
            'timezone_title' => __('integration/calendar.view.overview.timezone_title'),
            'status_title' => __('integration/calendar.view.overview.status_title'),
            'active_title' => __('integration/calendar.view.overview.active_title'),
            'calendar_settings_title' => __('integration/calendar.view.overview.calendar_settings_title'),
            'available_calendars_title' => __('integration/calendar.view.overview.available_calendars_title'),
            'timezone_prefix' => __('integration/calendar.view.overview.timezone_prefix'),
        ];
    }

    private static function form(): array
    {
        return [
            'sync_mode_title' => __('integration/calendar.view.form.sync_mode_title'),
            'sync_mode_soft_title' => __('integration/calendar.view.form.sync_mode_soft_title'),
            'sync_mode_strict_title' => __('integration/calendar.view.form.sync_mode_strict_title'),
            'sync_mode_help' => __('integration/calendar.view.form.sync_mode_help'),
        ];
    }

    private static function actions(): array
    {
        return [
            'connect_google' => __('integration/calendar.view.actions.connect_google'),
            'reconnect_google' => __('integration/calendar.view.actions.reconnect_google'),
            'save_settings' => __('integration/calendar.view.actions.save_settings'),
            'select_calendar' => __('integration/calendar.view.actions.select_calendar'),
            'selected' => __('integration/calendar.view.actions.selected'),
        ];
    }

    private static function states(): array
    {
        return [
            'connection_expired_title' => __('integration/calendar.view.states.connection_expired_title'),
            'connection_expired_text' => __('integration/calendar.view.states.connection_expired_text'),
            'no_calendar_connected_title' => __('integration/calendar.view.states.no_calendar_connected_title'),
            'no_calendar_connected_text' => __('integration/calendar.view.states.no_calendar_connected_text'),
            'no_calendars_found_title' => __('integration/calendar.view.states.no_calendars_found_title'),
            'no_calendars_found_text' => __('integration/calendar.view.states.no_calendars_found_text'),
            'primary_badge' => __('integration/calendar.view.states.primary_badge'),
            'read_only_badge' => __('integration/calendar.view.states.read_only_badge'),
            'selected_badge' => __('integration/calendar.view.states.selected_badge'),
            'calendar_count_suffix' => __('integration/calendar.view.states.calendar_count_suffix'),
        ];
    }
}