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
            'validation' => self::validation(),
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
            'validation' => self::validation(),
            'actions' => self::formActions(),
            'sections' => self::sections(),
            'working_hours_overview' => self::workingHoursOverview(),
            'recurring_time_off_overview' => self::recurringTimeOffOverview(),
            'time_offs_overview' => self::timeOffsOverview(),
            'working_hours_form' => self::workingHoursForm(),
            'recurring_time_offs_form' => self::recurringTimeOffsForm(),
            'time_offs_form' => self::timeOffsForm(),
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

    private static function validation(): array
    {
        return [
            'branch_id_required' => __('unit.validation.branch_id_required'),
            'name_required' => __('unit.validation.name_required'),
        ];
    }

    private static function sections(): array
    {
        return [
            'title' => __('unit.view.sections.sections_title'),
            'general_title' => __('unit.view.sections.general_title'),
            'general_text' => __('unit.view.sections.general_text'),
            'working_hours_title' => __('unit.view.sections.working_hours_title'),
			'working_hours_text' => __('unit.view.sections.working_hours_text'),
			'recurring_time_offs_title' => __('unit.view.sections.recurring_time_offs_title'),
            'recurring_time_offs_text' => __('unit.view.sections.recurring_time_offs_text'),
            'time_offs_title' => __('unit.view.sections.time_offs_title'),
            'time_offs_text' => __('unit.view.sections.time_offs_text'),
        ];
    }

    private static function workingHoursOverview(): array
    {
        return [
            'title' => __('unit.view.overview_working_hours.title'),
            'configured_days_title' => __('unit.view.overview_working_hours.configured_days_title'),
            'schedule_model_title' => __('unit.view.overview_working_hours.schedule_model_title'),
            'one_daily_period_title' => __('unit.view.overview_working_hours.one_daily_period_title'),
            'usage_title' => __('unit.view.overview_working_hours.usage_title'),
			'usage_text' => __('unit.view.overview_working_hours.usage_text'),
            'note_title' => __('unit.view.overview_working_hours.note_title'),
			'note_text' => __('unit.view.overview_working_hours.note_text'),
        ];
    }

    private static function recurringTimeOffOverview(): array
    {
        return [
            'title' => __('unit.view.overview_recurring_time_off.title'),
            'configured_days_title' => __('unit.view.overview_recurring_time_off.configured_days_title'),
            'recurring_blocks_title' => __('unit.view.overview_recurring_time_off.recurring_blocks_title'),
            'usage_title' => __('unit.view.overview_recurring_time_off.usage_title'),
			'usage_text' => __('unit.view.overview_recurring_time_off.usage_text'),
            'note_title' => __('unit.view.overview_recurring_time_off.note_title'),
			'note_text' => __('unit.view.overview_recurring_time_off.note_text'),
        ];
    }

    private static function timeOffsOverview(): array
    {
        return [
            'title' => __('unit.view.overview_time_offs.title'),
            'total_entries_title' => __('unit.view.overview_time_offs.total_entries_title'),
            'upcoming_entries_title' => __('unit.view.overview_time_offs.upcoming_entries_title'),
            'usage_title' => __('unit.view.overview_time_offs.usage_title'),
			'usage_text' => __('unit.view.overview_time_offs.usage_text'),
            'note_title' => __('unit.view.overview_time_offs.note_title'),
			'note_text' => __('unit.view.overview_time_offs.note_text'),
        ];
    }

    private static function workingHoursForm(): array
    {
        return [
            'working_hours' => __('unit.view.form_working_hours.working_hours'),
            'weekly_schedule' => __('unit.view.form_working_hours.weekly_schedule'),
            'monday' => __('unit.view.form_working_hours.monday'),
            'tuesday' => __('unit.view.form_working_hours.tuesday'),
            'wednesday' => __('unit.view.form_working_hours.wednesday'),
            'thursday' => __('unit.view.form_working_hours.thursday'),
            'friday' => __('unit.view.form_working_hours.friday'),
            'saturday' => __('unit.view.form_working_hours.saturday'),
            'sunday' => __('unit.view.form_working_hours.sunday'),
            'working_period_enabled' => __('unit.view.form_working_hours.working_period_enabled'),
            'closed_unavailable' => __('unit.view.form_working_hours.closed_unavailable'),
            'enabled' => __('unit.view.form_working_hours.enabled'),
            'start_title' => __('unit.view.form_working_hours.start_title'),
            'end_title' => __('unit.view.form_working_hours.end_title'),
            'save' => __('unit.view.form_working_hours.save'),
            'saving' => __('unit.view.form_working_hours.saving'),
            'save_success' => __('unit.view.form_working_hours.save_success'),
            'validation_required' => __('unit.view.form_working_hours.validation_required'),
            'validation_order' => __('unit.view.form_working_hours.validation_order'),
            'save_failed' => __('unit.view.form_working_hours.save_failed'),
        ];
    }

    private static function recurringTimeOffsForm(): array
    {
        return [
            'title' => __('unit.view.form_recurring_time_offs.title'),
            'subtitle' => __('unit.view.form_recurring_time_offs.subtitle'),
            'description' => __('unit.view.form_recurring_time_offs.description'),
            'monday' => __('unit.view.form_recurring_time_offs.monday'),
            'tuesday' => __('unit.view.form_recurring_time_offs.tuesday'),
            'wednesday' => __('unit.view.form_recurring_time_offs.wednesday'),
            'thursday' => __('unit.view.form_recurring_time_offs.thursday'),
            'friday' => __('unit.view.form_recurring_time_offs.friday'),
            'saturday' => __('unit.view.form_recurring_time_offs.saturday'),
            'sunday' => __('unit.view.form_recurring_time_offs.sunday'),
            'recurring_blocks_count' => __('unit.view.form_recurring_time_offs.recurring_blocks_count'),
            'start_title' => __('unit.view.form_recurring_time_offs.start_title'),
            'end_title' => __('unit.view.form_recurring_time_offs.end_title'),
            'reason_title' => __('unit.view.form_recurring_time_offs.reason_title'),
            'reason_placeholder' => __('unit.view.form_recurring_time_offs.reason_placeholder'),
            'valid_from_title' => __('unit.view.form_recurring_time_offs.valid_from_title'),
            'valid_until_title' => __('unit.view.form_recurring_time_offs.valid_until_title'),
            'remove' => __('unit.view.form_recurring_time_offs.remove'),
            'add' => __('unit.view.form_recurring_time_offs.add'),
            'empty_day' => __('unit.view.form_recurring_time_offs.empty_day'),
            'save' => __('unit.view.form_recurring_time_offs.save'),
            'saving' => __('unit.view.form_recurring_time_offs.saving'),
            'save_success' => __('unit.view.form_recurring_time_offs.save_success'),
            'validation_required' => __('unit.view.form_recurring_time_offs.validation_required'),
            'validation_time_order' => __('unit.view.form_recurring_time_offs.validation_time_order'),
            'validation_date_order' => __('unit.view.form_recurring_time_offs.validation_date_order'),
            'validation_reason_max' => __('unit.view.form_recurring_time_offs.validation_reason_max'),
            'validation_overlap' => __('unit.view.form_recurring_time_offs.validation_overlap'),
            'save_failed' => __('unit.view.form_recurring_time_offs.save_failed'),
        ];
    }

    private static function timeOffsForm(): array
    {
        return [
            'title' => __('unit.view.form_time_offs.title'),
            'subtitle' => __('unit.view.form_time_offs.subtitle'),
            'description' => __('unit.view.form_time_offs.description'),
            'starts_at_title' => __('unit.view.form_time_offs.starts_at_title'),
            'ends_at_title' => __('unit.view.form_time_offs.ends_at_title'),
            'reason_title' => __('unit.view.form_time_offs.reason_title'),
            'reason_placeholder' => __('unit.view.form_time_offs.reason_placeholder'),
            'remove' => __('unit.view.form_time_offs.remove'),
            'empty' => __('unit.view.form_time_offs.empty'),
            'add' => __('unit.view.form_time_offs.add'),
            'save' => __('unit.view.form_time_offs.save'),
            'saving' => __('unit.view.form_time_offs.saving'),
            'save_success' => __('unit.view.form_time_offs.save_success'),
            'validation_required' => __('unit.view.form_time_offs.validation_required'),
            'validation_order' => __('unit.view.form_time_offs.validation_order'),
            'validation_reason_max' => __('unit.view.form_time_offs.validation_reason_max'),
            'validation_overlap' => __('unit.view.form_time_offs.validation_overlap'),
            'save_failed' => __('unit.view.form_time_offs.save_failed'),
        ];
    }
}
