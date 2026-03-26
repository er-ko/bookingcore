<?php

namespace App\Support\Translations;

final class BookingTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('booking.view.bookings'),
            'description' => __('booking.view.index_description'),
            'create_booking' => __('booking.view.create_booking'),
            'create_first_booking' => __('booking.view.create_first_booking'),
            'no_bookings_found' => __('booking.view.no_bookings_found'),
            'no_bookings_text' => __('booking.view.no_bookings_text'),
            'table' => self::table(),
            'actions' => self::indexActions(),
            'alerts' => self::alerts(),
        ];
    }

    public static function create(): array
    {
        return [
            'title' => __('booking.view.create_booking'),
            'description' => __('booking.view.create_description'),
            'back_to_bookings' => __('booking.view.back_to_bookings'),
            'create_booking' => __('booking.view.create_booking'),
            'overview' => array_merge(
                self::baseOverview(),
                [
                    'required_title' => __('booking.view.overview.required_title'),
                    'optional_title' => __('booking.view.overview.optional_title'),
                    'status_title' => __('booking.view.overview.status_title'),
                ]
            ),
            'form' => self::form(),
            'actions' => self::formActions(),
        ];
    }

    private static function table(): array
    {
        return [
            'customer' => __('booking.view.table.customer'),
            'branch' => __('booking.view.table.branch'),
            'unit' => __('booking.view.table.unit'),
            'activity' => __('booking.view.table.activity'),
            'starts_at' => __('booking.view.table.starts_at'),
            'ends_at' => __('booking.view.table.ends_at'),
            'status' => __('booking.view.table.status'),
            'actions' => __('booking.view.table.actions'),
            'active' => __('booking.view.table.active'),
            'inactive' => __('booking.view.table.inactive'),
        ];
    }

    private static function indexActions(): array
    {
        return [
            'confirm' => __('booking.view.actions.confirm'),
            'complete' => __('booking.view.actions.complete'),
            'cancel' => __('booking.view.actions.cancel'),
        ];
    }

    private static function formActions(): array
    {
        return [
            'cancel' => __('booking.view.actions.cancel'),
            'create' => __('booking.view.actions.create'),
            'creating' => __('booking.view.actions.creating'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'cancel_confirmation' => __('booking.view.alerts.cancel_confirmation'),
        ];
    }

    private static function baseOverview(): array
    {
        return [
            'title' => __('booking.view.overview.title'),
            'customer_title' => __('booking.view.overview.customer_title'),
            'customer_text' => __('booking.view.overview.customer_text'),

            'booking_flow_title' => __('booking.view.overview.booking_flow_title'),
            'booking_flow_text' => __('booking.view.overview.booking_flow_text'),

            'availability_title' => __('booking.view.overview.availability_title'),
            'availability_text' => __('booking.view.overview.availability_text'),

            'required_title' => __('booking.view.overview.required_title'),
            'required_items' => [
                __('booking.view.overview.required_items.first_and_last_name'),
                __('booking.view.overview.required_items.phone_code_and_number'),
                __('booking.view.overview.required_items.branch'),
                __('booking.view.overview.required_items.unit'),
                __('booking.view.overview.required_items.activity'),
                __('booking.view.overview.required_items.date'),
                __('booking.view.overview.required_items.slot'),
            ],
            'optional_title' => __('booking.view.overview.optional_title'),
            'optional_items' => [
                __('booking.view.overview.optional_items.email'),
                __('booking.view.overview.optional_items.note'),
            ],
            'note_title' => __('booking.view.overview.note_title'),
            'note_text' => __('booking.view.overview.note_text'),
        ];
    }

    private static function form(): array
    {
        return [
            'booking_details' => __('booking.view.form.booking_details'),
            'complete_the_reservation' => __('booking.view.form.complete_the_reservation'),
            'customer_details' => __('booking.view.form.customer_details'),
            'first_name_title' => __('booking.view.form.first_name_title'),
            'last_name_title' => __('booking.view.form.last_name_title'),
            'email_title' => __('booking.view.form.email_title'),
            'phone_code_title' => __('booking.view.form.phone_code_title'),
            'phone_title' => __('booking.view.form.phone_title'),
            'branch_title' => __('booking.view.form.branch_title'),
            'select_branch' => __('booking.view.form.select_branch'),
            'unit_title' => __('booking.view.form.unit_title'),
            'select_unit' => __('booking.view.form.select_unit'),
            'loading_units' => __('booking.view.form.loading_units'),
            'activity_title' => __('booking.view.form.activity_title'),
            'select_activity' => __('booking.view.form.select_activity'),
            'loading_activities' => __('booking.view.form.loading_activities'),
            'date_title' => __('booking.view.form.date_title'),
            'available_slots_title' => __('booking.view.form.available_slots_title'),
            'available_slots_count' => __('booking.view.form.available_slots_count'),
            'loading_slots' => __('booking.view.form.loading_slots'),
            'no_available_slots' => __('booking.view.form.no_available_slots'),
            'select_slot' => __('booking.view.form.select_slot'),
            'note_title' => __('booking.view.form.note_title'),
        ];
    }
}