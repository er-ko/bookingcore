<?php

namespace App\Support\Translations;

final class PublicBookingTranslations
{
    public static function show(): array
    {
        return [
            'title' => __('public-booking.view.title'),
            'description' => __('public-booking.view.description'),
            'form' => self::form(),
            'content' => self::content(),
            'states' => self::states(),
            'actions' => self::actions(),
            'messages' => self::messages(),
        ];
    }

    private static function form(): array
    {
        return [
            'branch_title' => __('public-booking.view.form.branch_title'),
            'branch_placeholder' => __('public-booking.view.form.branch_placeholder'),

            'unit_title' => __('public-booking.view.form.unit_title'),
            'unit_placeholder' => __('public-booking.view.form.unit_placeholder'),

            'activity_title' => __('public-booking.view.form.activity_title'),
            'activity_placeholder' => __('public-booking.view.form.activity_placeholder'),

            'date_title' => __('public-booking.view.form.date_title'),
            'date_placeholder' => __('public-booking.view.form.date_placeholder'),

            'slot_title' => __('public-booking.view.form.slot_title'),
            'slot_placeholder' => __('public-booking.view.form.slot_placeholder'),

            'first_name_title' => __('public-booking.view.form.first_name_title'),
            'first_name_placeholder' => __('public-booking.view.form.first_name_placeholder'),

            'last_name_title' => __('public-booking.view.form.last_name_title'),
            'last_name_placeholder' => __('public-booking.view.form.last_name_placeholder'),

            'email_title' => __('public-booking.view.form.email_title'),
            'email_placeholder' => __('public-booking.view.form.email_placeholder'),

            'phone_code_title' => __('public-booking.view.form.phone_code_title'),
            'phone_code_placeholder' => __('public-booking.view.form.phone_code_placeholder'),

            'phone_title' => __('public-booking.view.form.phone_title'),
            'phone_placeholder' => __('public-booking.view.form.phone_placeholder'),

            'note_title' => __('public-booking.view.form.note_title'),
            'note_placeholder' => __('public-booking.view.form.note_placeholder'),
        ];
    }

    private static function states(): array
    {
        return [
            'no_branches_title' => __('public-booking.view.states.no_branches_title'),
            'no_branches_text' => __('public-booking.view.states.no_branches_text'),

            'no_units_title' => __('public-booking.view.states.no_units_title'),
            'no_units_text' => __('public-booking.view.states.no_units_text'),

            'no_activities_title' => __('public-booking.view.states.no_activities_title'),
            'no_activities_text' => __('public-booking.view.states.no_activities_text'),

            'no_slots_title' => __('public-booking.view.states.no_slots_title'),
            'no_slots_text' => __('public-booking.view.states.no_slots_text'),

            'branch_default' => __('public-booking.view.states.branch_default'),
            'service_default' => __('public-booking.view.states.service_default'),
            'schedule_loading' => __('public-booking.view.states.schedule_loading'),
            'schedule_default' => __('public-booking.view.states.schedule_default'),
        ];
    }

    private static function content(): array
    {
        return [
            'form_title' => __('public-booking.view.content.form_title'),
            'ready' => __('public-booking.view.content.ready'),

            'appointment_title' => __('public-booking.view.content.appointment_title'),
            'appointment_text' => __('public-booking.view.content.appointment_text'),

            'customer_title' => __('public-booking.view.content.customer_title'),
            'customer_text' => __('public-booking.view.content.customer_text'),

            'note_title' => __('public-booking.view.content.note_title'),
            'note_text' => __('public-booking.view.content.note_text'),

            'review_title' => __('public-booking.view.content.review_title'),
            'review_text' => __('public-booking.view.content.review_text'),
            'review_live_text' => __('public-booking.view.content.review_live_text'),

            'summary_badge' => __('public-booking.view.content.summary_badge'),
            'summary_progress' => __('public-booking.view.content.summary_progress'),

            'branch_label' => __('public-booking.view.content.branch_label'),
            'unit_label' => __('public-booking.view.content.unit_label'),
            'activity_label' => __('public-booking.view.content.activity_label'),
            'date_time_label' => __('public-booking.view.content.date_time_label'),
            'customer_label' => __('public-booking.view.content.customer_label'),
            'email_label' => __('public-booking.view.content.email_label'),
            'phone_label' => __('public-booking.view.content.phone_label'),
            'note_label' => __('public-booking.view.content.note_label'),

            'summary_empty_selection' => __('public-booking.view.content.summary_empty_selection'),
            'summary_empty_customer' => __('public-booking.view.content.summary_empty_customer'),

            'branch_status_title' => __('public-booking.view.content.branch_status_title'),
            'service_status_title' => __('public-booking.view.content.service_status_title'),
            'schedule_status_title' => __('public-booking.view.content.schedule_status_title'),
        ];
    }

    private static function actions(): array
    {
        return [
            'submit' => __('public-booking.view.actions.submit'),
            'submitting' => __('public-booking.view.actions.submitting'),
        ];
    }

    private static function messages(): array
    {
        return [
            'created' => __('public-booking.view.messages.created'),
            'failed' => __('public-booking.view.messages.failed'),
        ];
    }

    public static function detail(): array
    {
        return [
            'title' => __('public-booking.view.detail.title'),
            'badge_created' => __('public-booking.view.detail.badge_created'),
            'status_label' => __('public-booking.view.detail.status_label'),
            'heading' => __('public-booking.view.detail.heading'),
            'description' => __('public-booking.view.detail.description'),

            'details_title' => __('public-booking.view.detail.details_title'),
            'branch_label' => __('public-booking.view.detail.branch_label'),
            'unit_label' => __('public-booking.view.detail.unit_label'),
            'activity_label' => __('public-booking.view.detail.activity_label'),
            'date_time_label' => __('public-booking.view.detail.date_time_label'),
            'to_label' => __('public-booking.view.detail.to_label'),

            'customer_title' => __('public-booking.view.detail.customer_title'),
            'customer_name_label' => __('public-booking.view.detail.customer_name_label'),
            'customer_email_label' => __('public-booking.view.detail.customer_email_label'),
            'customer_phone_label' => __('public-booking.view.detail.customer_phone_label'),

            'note_label' => __('public-booking.view.detail.note_label'),

            'actions' => [
                'back' => __('public-booking.view.detail.actions.back'),
                'print' => __('public-booking.view.detail.actions.print'),
                'calendar' => __('public-booking.view.detail.actions.calendar'),
            ],

            'fallback' => __('public-booking.view.detail.fallback'),
        ];
    }
}
