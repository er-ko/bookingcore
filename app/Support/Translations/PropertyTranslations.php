<?php

namespace App\Support\Translations;

final class PropertyTranslations
{
    public static function index(): array
    {
        return [
            'title'                  => __('property.view.properties'),
            'description'            => __('property.view.index_description'),
            'create_property'        => __('property.view.create_property'),
            'create_first_property'  => __('property.view.create_first_property'),
            'no_properties_found'    => __('property.view.no_properties_found'),
            'no_properties_text'     => __('property.view.no_properties_text'),
            'table'                  => self::table(),
            'actions'                => self::indexActions(),
            'alerts'                 => self::alerts(),
            'meta'                   => self::meta(),
        ];
    }

    public static function create(): array
    {
        return [
            'title'            => __('property.view.create_property'),
            'description'      => __('property.view.create_description'),
            'back_to_list'     => __('property.view.back_to_properties'),
            'overview'         => self::overview(),
            'form'             => self::form(),
            'validation'       => self::validation(),
            'actions'          => self::formActions(),
            'meta'             => self::meta(),
        ];
    }

    public static function edit(): array
    {
        return [
            'title'            => __('property.view.edit_property'),
            'description'      => __('property.view.edit_description'),
            'back_to_list'     => __('property.view.back_to_properties'),
            'overview'         => self::overview(),
            'form'             => self::form(),
            'validation'       => self::validation(),
            'actions'          => self::formActions(),
            'meta'             => self::meta(),
        ];
    }

    public static function meta(): array
    {
        return [
            'suffix' => ' | ' . config('app.name'),
        ];
    }

    private static function table(): array
    {
        return [
            'property'        => __('property.view.table.property'),
            'type'            => __('property.view.table.type'),
            'rental_type'     => __('property.view.table.rental_type'),
            'address'         => __('property.view.table.address'),
            'city'            => __('property.view.table.city'),
            'status'          => __('property.view.table.status'),
            'updated'         => __('property.view.table.updated'),
            'actions'         => __('property.view.table.actions'),
            'active'          => __('property.view.table.active'),
            'inactive'        => __('property.view.table.inactive'),
            'no_address_text' => __('property.view.table.no_address_text'),
        ];
    }

    private static function indexActions(): array
    {
        return [
            'edit'   => __('property.view.actions.edit'),
            'delete' => __('property.view.actions.delete'),
        ];
    }

    private static function formActions(): array
    {
        return [
            'cancel'   => __('property.view.actions.cancel'),
            'create'   => __('property.view.actions.create'),
            'creating' => __('property.view.actions.creating'),
            'save'     => __('property.view.actions.save'),
            'saving'   => __('property.view.actions.saving'),
        ];
    }

    private static function alerts(): array
    {
        return [
            'delete_confirmation' => __('property.view.alerts.delete_confirmation'),
        ];
    }

    private static function overview(): array
    {
        return [
            'title'          => __('property.view.overview.title'),
            'rental_title'   => __('property.view.overview.rental_title'),
            'rental_text'    => __('property.view.overview.rental_text'),
            'location_title' => __('property.view.overview.location_title'),
            'location_text'  => __('property.view.overview.location_text'),
            'pricing_title'  => __('property.view.overview.pricing_title'),
            'pricing_text'   => __('property.view.overview.pricing_text'),
            'limit_title'    => __('property.view.overview.limit_title'),
            'limit_text'     => __('property.view.overview.limit_text'),
        ];
    }

    private static function form(): array
    {
        return [
            'property_details'        => __('property.view.form.property_details'),
            'complete_form'           => __('property.view.form.complete_the_form'),
            'update_form'             => __('property.view.form.update_the_form'),
            'name_title'              => __('property.view.form.name_title'),
            'description_title'       => __('property.view.form.description_title'),
            'rental_type_title'       => __('property.view.form.rental_type_title'),
            'property_type_title'     => __('property.view.form.property_type_title'),
            'address_line_1_title'    => __('property.view.form.address_line_1_title'),
            'address_line_2_title'    => __('property.view.form.address_line_2_title'),
            'city_title'              => __('property.view.form.city_title'),
            'postcode_title'          => __('property.view.form.postcode_title'),
            'country_title'           => __('property.view.form.country_title'),
            'select_country'          => __('property.view.form.select_country'),
            'timezone_title'          => __('property.view.form.timezone_title'),
            'select_timezone'         => __('property.view.form.select_timezone'),
            'loading_timezones'       => __('property.view.form.loading_timezones'),
            'max_guests_title'        => __('property.view.form.max_guests_title'),
            'size_sqm_title'          => __('property.view.form.size_sqm_title'),
            'price_per_night_title'   => __('property.view.form.price_per_night_title'),
            'min_nights_title'        => __('property.view.form.min_nights_title'),
            'check_in_time_title'     => __('property.view.form.check_in_time_title'),
            'check_out_time_title'    => __('property.view.form.check_out_time_title'),
            'cleaning_fee_title'      => __('property.view.form.cleaning_fee_title'),
            'price_per_month_title'   => __('property.view.form.price_per_month_title'),
            'min_months_title'        => __('property.view.form.min_months_title'),
            'deposit_amount_title'    => __('property.view.form.deposit_amount_title'),
            'available_from_title'    => __('property.view.form.available_from_title'),
            'utilities_included_title' => __('property.view.form.utilities_included_title'),
            'utilities_included_text'  => __('property.view.form.utilities_included_text'),
            'active_title'            => __('property.view.form.active_title'),
            'active_text'             => __('property.view.form.active_text'),
        ];
    }

    private static function validation(): array
    {
        return [
            'name_required'           => __('property.validation.name_required'),
            'rental_type_required'    => __('property.validation.rental_type_required'),
            'property_type_required'  => __('property.validation.property_type_required'),
            'timezone_required'       => __('property.validation.timezone_required'),
            'price_per_night_required' => __('property.validation.price_per_night_required'),
            'price_per_month_required' => __('property.validation.price_per_month_required'),
        ];
    }
}
