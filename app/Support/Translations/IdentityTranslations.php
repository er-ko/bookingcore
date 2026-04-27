<?php

namespace App\Support\Translations;

final class IdentityTranslations
{
    public static function index(): array
    {
        return [
            'title' => __('identity.view.title'),
            'description' => __('identity.view.description'),
            'overview' => self::overview(),
            'form' => self::form(),
            'validation' => self::validation(),
            'actions' => self::actions(),
            'deletion' => self::deletion(),
        ];
    }

    private static function overview(): array
    {
        return [
            'title' => __('identity.view.overview.title'),
            'brand_title' => __('identity.view.overview.brand_title'),
            'brand_text' => __('identity.view.overview.brand_text'),
            'public_url_title' => __('identity.view.overview.public_url_title'),
            'public_url_text' => __('identity.view.overview.public_url_text'),
            'defaults_title' => __('identity.view.overview.defaults_title'),
            'defaults_text' => __('identity.view.overview.defaults_text'),
            'visibility_title' => __('identity.view.overview.visibility_title'),
            'visibility_text' => __('identity.view.overview.visibility_text'),
        ];
    }

    private static function form(): array
    {
        return [
            'identity_settings' => __('identity.view.form.identity_settings'),
            'base_configuration' => __('identity.view.form.base_configuration'),
            'brand_name_title' => __('identity.view.form.brand_name_title'),
            'brand_name_placeholder' => __('identity.view.form.brand_name_placeholder'),
            'public_slug_title' => __('identity.view.form.public_slug_title'),
            'public_slug_placeholder' => __('identity.view.form.public_slug_placeholder'),
            'public_slug_prefix' => __('identity.view.form.public_slug_prefix'),
            'default_language_title' => __('identity.view.form.default_language_title'),
            'select_language_title' => __('identity.view.form.select_language_title'),
            'default_currency_title' => __('identity.view.form.default_currency_title'),
            'select_currency_title' => __('identity.view.form.select_currency_title'),
            'default_country_title' => __('identity.view.form.default_country_title'),
            'select_country_title' => __('identity.view.form.select_country_title'),
            'booking_page_visibility_title' => __('identity.view.form.booking_page_visibility_title'),
            'public_booking_page_title' => __('identity.view.form.public_booking_page_title'),
            'public_booking_page_text' => __('identity.view.form.public_booking_page_text'),
        ];
    }

    private static function validation(): array
    {
        return [
            'brand_required' => __('identity.validation.brand_required'),
            'slug_required' => __('identity.validation.slug_required'),
            'slug_min' => __('identity.validation.slug_min'),
            'default_lang_required' => __('identity.validation.default_lang_required'),
            'default_currency_required' => __('identity.validation.default_currency_required'),
            'default_country_required' => __('identity.validation.default_country_required'),
        ];
    }

    private static function actions(): array
    {
        return [
            'cancel' => __('identity.view.actions.cancel'),
            'save' => __('identity.view.actions.save'),
            'saving' => __('identity.view.actions.saving'),
            'schedule_account_deletion' => __('identity.view.actions.schedule_account_deletion'),
            'cancel_deletion' => __('identity.view.actions.cancel_deletion'),
        ];
    }

    private static function deletion(): array
    {
        return [
            'account_removal_title' => __('identity.view.deletion.account_removal_title'),
            'scheduled_deletion_title' => __('identity.view.deletion.scheduled_deletion_title'),
            'scheduled_deletion_text' => __('identity.view.deletion.scheduled_deletion_text'),
            'recovery_period_title' => __('identity.view.deletion.recovery_period_title'),
            'recovery_period_text' => __('identity.view.deletion.recovery_period_text'),
            'deletion_date_title' => __('identity.view.deletion.deletion_date_title'),
            'deletion_date_text' => __('identity.view.deletion.deletion_date_text'),
        ];
    }
}
