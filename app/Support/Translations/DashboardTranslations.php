<?php

namespace App\Support\Translations;

final class DashboardTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('dashboard.view.title'),
            'description' => __('dashboard.view.index_description'),
            'create_booking' => __('dashboard.view.create_booking'),
            'create_first_booking' => __('dashboard.view.create_first_booking'),
            'no_bookings_found' => __('dashboard.view.no_bookings_found'),
            'no_bookings_text' => __('dashboard.view.no_bookings_text'),
            'table' => self::table(),
            'actions' => self::indexActions(),
            'alerts' => self::alerts(),
            'meta' => self::meta(),
        ];
    }

    public static function meta(): array
    {
        return [
            'suffix' => ' | '. config('app.name'),
        ];
    }

    private static function table(): array
    {
        return [
            'customer' => __('dashboard.view.table.customer'),
            'branch' => __('dashboard.view.table.branch'),
            'unit' => __('dashboard.view.table.unit'),
            'activity' => __('dashboard.view.table.activity'),
            'starts_at' => __('dashboard.view.table.starts_at'),
            'ends_at' => __('dashboard.view.table.ends_at'),
            'status' => __('dashboard.view.table.status'),
            'actions' => __('dashboard.view.table.actions'),
            'active' => __('dashboard.view.table.active'),
            'inactive' => __('dashboard.view.table.inactive'),
        ];
    }

    private static function indexActions(): array
    {
        return [
            'confirm' => __('dashboard.view.actions.confirm'),
            'complete' => __('dashboard.view.actions.complete'),
            'cancel' => __('dashboard.view.actions.cancel'),
        ];
    }
    private static function alerts(): array
    {
        return [
            'cancel_confirmation' => __('dashboard.view.alerts.cancel_confirmation'),
        ];
    }
}
