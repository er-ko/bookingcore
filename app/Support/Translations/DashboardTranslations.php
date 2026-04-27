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
        ];
    }

    public static function create(): array
    {
        return [
            'title' => __('dashboard.view.create_booking'),
            'description' => __('dashboard.view.create_description'),
            'back_to_dashboard' => __('dashboard.view.back_to_dashboard'),
            'create_booking' => __('dashboard.view.create_booking'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'required_title' => __('dashboard.view.overview.required_title'),
                    'optional_title' => __('dashboard.view.overview.optional_title'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
            'messages' => self::messages(),
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

    private static function formActions(): array
    {
        return [
            'cancel' => __('dashboard.view.actions.cancel'),
            'create' => __('dashboard.view.actions.create'),
            'creating' => __('dashboard.view.actions.creating'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'cancel_confirmation' => __('dashboard.view.alerts.cancel_confirmation'),
        ];
    }

    private static function messages(): array
    {
        return [
            'created' => __('dashboard.messages.created'),
            'failed' => __('dashboard.messages.failed'),
        ];
    }

    private static function baseOverview(): array
    {
        return [
            'title' => __('dashboard.view.overview.title'),
            'customer_title' => __('dashboard.view.overview.customer_title'),
            'customer_text' => __('dashboard.view.overview.customer_text'),

            'booking_flow_title' => __('dashboard.view.overview.booking_flow_title'),
            'booking_flow_text' => __('dashboard.view.overview.booking_flow_text'),

            'availability_title' => __('dashboard.view.overview.availability_title'),
            'availability_text' => __('dashboard.view.overview.availability_text'),

            'required_title' => __('dashboard.view.overview.required_title'),
            'required_items' => [
                __('dashboard.view.overview.required_items.first_and_last_name'),
                __('dashboard.view.overview.required_items.phone_code_and_number'),
                __('dashboard.view.overview.required_items.branch'),
                __('dashboard.view.overview.required_items.unit'),
                __('dashboard.view.overview.required_items.activity'),
                __('dashboard.view.overview.required_items.date'),
                __('dashboard.view.overview.required_items.slot'),
            ],
            'optional_title' => __('dashboard.view.overview.optional_title'),
            'optional_items' => [
                __('dashboard.view.overview.optional_items.email'),
                __('dashboard.view.overview.optional_items.note'),
            ],
            'note_title' => __('dashboard.view.overview.note_title'),
            'note_text' => __('dashboard.view.overview.note_text'),
        ];
    }

    private static function form(): array
    {
        return [
            'booking_details' => __('dashboard.view.form.booking_details'),
            'complete_the_reservation' => __('dashboard.view.form.complete_the_reservation'),
            'customer_details' => __('dashboard.view.form.customer_details'),
            'first_name_title' => __('dashboard.view.form.first_name_title'),
            'last_name_title' => __('dashboard.view.form.last_name_title'),
            'email_title' => __('dashboard.view.form.email_title'),
            'phone_code_title' => __('dashboard.view.form.phone_code_title'),
            'phone_title' => __('dashboard.view.form.phone_title'),
            'branch_title' => __('dashboard.view.form.branch_title'),
            'select_branch' => __('dashboard.view.form.select_branch'),
            'unit_title' => __('dashboard.view.form.unit_title'),
            'select_unit' => __('dashboard.view.form.select_unit'),
            'loading_units' => __('dashboard.view.form.loading_units'),
            'activity_title' => __('dashboard.view.form.activity_title'),
            'select_activity' => __('dashboard.view.form.select_activity'),
            'loading_activities' => __('dashboard.view.form.loading_activities'),
            'date_title' => __('dashboard.view.form.date_title'),
            'available_slots_title' => __('dashboard.view.form.available_slots_title'),
            'available_slots_count' => __('dashboard.view.form.available_slots_count'),
            'loading_slots' => __('dashboard.view.form.loading_slots'),
            'no_available_slots' => __('dashboard.view.form.no_available_slots'),
            'select_slot' => __('dashboard.view.form.select_slot'),
            'note_title' => __('dashboard.view.form.note_title'),
        ];
    }
}
