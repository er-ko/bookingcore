<script setup>
import { computed, inject } from 'vue'
import { Link } from '@inertiajs/vue3'
import { usePropertyForm } from '@/Composables/Property/usePropertyForm'

const route = inject('route')

const props = defineProps({
    countries: {
        type: Array,
        required: true,
    },
    rentalTypes: {
        type: Array,
        required: true,
    },
    propertyTypes: {
        type: Array,
        required: true,
    },
    property: {
        type: Object,
        default: null,
    },
    mode: {
        type: String,
        default: 'create',
        validator: (value) => ['create', 'edit'].includes(value),
    },
    translations: {
        type: Object,
        required: true,
    },
})

const isEdit = computed(() => props.mode === 'edit')

const {
    form,
    timezones,
    loadingTimezones,
    isShortTerm,
    isLongTerm,
    isFormValid,
    inputClass,
    clearFieldError,
    submit,
} = usePropertyForm(route, {
    mode:         props.mode,
    property:     props.property,
    translations: props.translations,
})

const selectedRentalType = computed(
    () => props.rentalTypes.find((rt) => rt.value === form.rental_type) ?? null
)

const errorClass = 'text-sm text-red-600 dark:text-red-400'
const labelClass = 'block text-[11px] font-medium uppercase tracking-[0.2em] text-black/45 dark:text-white/45'
</script>

<template>
    <form
        class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10"
        novalidate
        @submit.prevent="submit"
    >
        <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                    {{ translations.form.property_details }}
                </h2>

                <span class="text-xs text-black/35 dark:text-white/35">
                    {{ isEdit ? translations.form.update_form : translations.form.complete_form }}
                </span>
            </div>
        </div>

        <div class="space-y-8 px-6 py-6">

            <!-- Basic details -->
            <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                <div class="space-y-2 md:col-span-2">
                    <label for="name" :class="labelClass">
                        {{ translations.form.name_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        :class="inputClass('name')"
                        @input="clearFieldError('name')"
                    >

                    <p v-if="form.errors.name" :class="errorClass">
                        {{ form.errors.name }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="description" :class="labelClass">
                        {{ translations.form.description_title }}
                    </label>

                    <textarea
                        id="description"
                        v-model="form.description"
                        rows="3"
                        :class="[inputClass('description'), 'resize-none']"
                        @input="clearFieldError('description')"
                    />

                    <p v-if="form.errors.description" :class="errorClass">
                        {{ form.errors.description }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="rental_type" :class="labelClass">
                        {{ translations.form.rental_type_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="rental_type"
                        v-model="form.rental_type"
                        :class="inputClass('rental_type')"
                        @change="clearFieldError('rental_type')"
                    >
                        <option value="" disabled>
                            —
                        </option>

                        <option
                            v-for="rt in rentalTypes"
                            :key="rt.value"
                            :value="rt.value"
                        >
                            {{ rt.label }}
                        </option>
                    </select>

                    <p v-if="selectedRentalType?.description" class="text-xs leading-5 text-black/45 dark:text-white/45">
                        {{ selectedRentalType.description }}
                    </p>

                    <p v-if="form.errors.rental_type" :class="errorClass">
                        {{ form.errors.rental_type }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="property_type" :class="labelClass">
                        {{ translations.form.property_type_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="property_type"
                        v-model="form.property_type"
                        :class="inputClass('property_type')"
                        @change="clearFieldError('property_type')"
                    >
                        <option value="" disabled>
                            —
                        </option>

                        <option
                            v-for="pt in propertyTypes"
                            :key="pt.value"
                            :value="pt.value"
                        >
                            {{ pt.label }}
                        </option>
                    </select>

                    <p v-if="form.errors.property_type" :class="errorClass">
                        {{ form.errors.property_type }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="max_guests" :class="labelClass">
                        {{ translations.form.max_guests_title }}
                    </label>

                    <input
                        id="max_guests"
                        v-model="form.max_guests"
                        type="number"
                        min="1"
                        :class="inputClass('max_guests')"
                        @input="clearFieldError('max_guests')"
                    >

                    <p v-if="form.errors.max_guests" :class="errorClass">
                        {{ form.errors.max_guests }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="size_sqm" :class="labelClass">
                        {{ translations.form.size_sqm_title }}
                    </label>

                    <input
                        id="size_sqm"
                        v-model="form.size_sqm"
                        type="number"
                        min="0"
                        step="0.01"
                        :class="inputClass('size_sqm')"
                        @input="clearFieldError('size_sqm')"
                    >

                    <p v-if="form.errors.size_sqm" :class="errorClass">
                        {{ form.errors.size_sqm }}
                    </p>
                </div>
            </div>

            <!-- Short-term fields -->
            <template v-if="isShortTerm">
                <div class="grid gap-4 border-t border-black/10 pt-8 dark:border-white/10 md:grid-cols-2 md:gap-6">
                    <div class="space-y-2">
                        <label for="price_per_night" :class="labelClass">
                            {{ translations.form.price_per_night_title }} <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="price_per_night"
                            v-model="form.price_per_night"
                            type="number"
                            min="0"
                            step="0.01"
                            :class="inputClass('price_per_night')"
                            @input="clearFieldError('price_per_night')"
                        >

                        <p v-if="form.errors.price_per_night" :class="errorClass">
                            {{ form.errors.price_per_night }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="min_nights" :class="labelClass">
                            {{ translations.form.min_nights_title }}
                        </label>

                        <input
                            id="min_nights"
                            v-model="form.min_nights"
                            type="number"
                            min="1"
                            :class="inputClass('min_nights')"
                            @input="clearFieldError('min_nights')"
                        >

                        <p v-if="form.errors.min_nights" :class="errorClass">
                            {{ form.errors.min_nights }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="check_in_time" :class="labelClass">
                            {{ translations.form.check_in_time_title }}
                        </label>

                        <input
                            id="check_in_time"
                            v-model="form.check_in_time"
                            type="time"
                            :class="inputClass('check_in_time')"
                            @input="clearFieldError('check_in_time')"
                        >

                        <p v-if="form.errors.check_in_time" :class="errorClass">
                            {{ form.errors.check_in_time }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="check_out_time" :class="labelClass">
                            {{ translations.form.check_out_time_title }}
                        </label>

                        <input
                            id="check_out_time"
                            v-model="form.check_out_time"
                            type="time"
                            :class="inputClass('check_out_time')"
                            @input="clearFieldError('check_out_time')"
                        >

                        <p v-if="form.errors.check_out_time" :class="errorClass">
                            {{ form.errors.check_out_time }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="cleaning_fee" :class="labelClass">
                            {{ translations.form.cleaning_fee_title }}
                        </label>

                        <input
                            id="cleaning_fee"
                            v-model="form.cleaning_fee"
                            type="number"
                            min="0"
                            step="0.01"
                            :class="inputClass('cleaning_fee')"
                            @input="clearFieldError('cleaning_fee')"
                        >

                        <p v-if="form.errors.cleaning_fee" :class="errorClass">
                            {{ form.errors.cleaning_fee }}
                        </p>
                    </div>
                </div>
            </template>

            <!-- Long-term fields -->
            <template v-if="isLongTerm">
                <div class="grid gap-4 border-t border-black/10 pt-8 dark:border-white/10 md:grid-cols-2 md:gap-6">
                    <div class="space-y-2">
                        <label for="price_per_month" :class="labelClass">
                            {{ translations.form.price_per_month_title }} <span class="text-red-600">*</span>
                        </label>

                        <input
                            id="price_per_month"
                            v-model="form.price_per_month"
                            type="number"
                            min="0"
                            step="0.01"
                            :class="inputClass('price_per_month')"
                            @input="clearFieldError('price_per_month')"
                        >

                        <p v-if="form.errors.price_per_month" :class="errorClass">
                            {{ form.errors.price_per_month }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="min_months" :class="labelClass">
                            {{ translations.form.min_months_title }}
                        </label>

                        <input
                            id="min_months"
                            v-model="form.min_months"
                            type="number"
                            min="1"
                            :class="inputClass('min_months')"
                            @input="clearFieldError('min_months')"
                        >

                        <p v-if="form.errors.min_months" :class="errorClass">
                            {{ form.errors.min_months }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="deposit_amount" :class="labelClass">
                            {{ translations.form.deposit_amount_title }}
                        </label>

                        <input
                            id="deposit_amount"
                            v-model="form.deposit_amount"
                            type="number"
                            min="0"
                            step="0.01"
                            :class="inputClass('deposit_amount')"
                            @input="clearFieldError('deposit_amount')"
                        >

                        <p v-if="form.errors.deposit_amount" :class="errorClass">
                            {{ form.errors.deposit_amount }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="available_from" :class="labelClass">
                            {{ translations.form.available_from_title }}
                        </label>

                        <input
                            id="available_from"
                            v-model="form.available_from"
                            type="date"
                            :class="inputClass('available_from')"
                            @input="clearFieldError('available_from')"
                        >

                        <p v-if="form.errors.available_from" :class="errorClass">
                            {{ form.errors.available_from }}
                        </p>
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="flex items-start gap-3">
                            <input
                                v-model="form.utilities_included"
                                type="checkbox"
                                class="mt-0.5 h-4 w-4 rounded border-black/20 bg-transparent text-black focus:ring-0 dark:border-white/20 dark:bg-transparent dark:text-white"
                            >

                            <div>
                                <div class="text-sm font-medium select-none text-black dark:text-white">
                                    {{ translations.form.utilities_included_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 select-none text-black/55 dark:text-white/55">
                                    {{ translations.form.utilities_included_text }}
                                </p>
                            </div>
                        </label>

                        <p v-if="form.errors.utilities_included" :class="errorClass">
                            {{ form.errors.utilities_included }}
                        </p>
                    </div>
                </div>
            </template>

            <!-- Location -->
            <div class="grid gap-4 border-t border-black/10 pt-8 dark:border-white/10 md:grid-cols-2 md:gap-6">
                <div class="space-y-2 md:col-span-2">
                    <label for="address_line_1" :class="labelClass">
                        {{ translations.form.address_line_1_title }}
                    </label>

                    <input
                        id="address_line_1"
                        v-model="form.address_line_1"
                        type="text"
                        :class="inputClass('address_line_1')"
                        @input="clearFieldError('address_line_1')"
                    >

                    <p v-if="form.errors.address_line_1" :class="errorClass">
                        {{ form.errors.address_line_1 }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="address_line_2" :class="labelClass">
                        {{ translations.form.address_line_2_title }}
                    </label>

                    <input
                        id="address_line_2"
                        v-model="form.address_line_2"
                        type="text"
                        :class="inputClass('address_line_2')"
                        @input="clearFieldError('address_line_2')"
                    >

                    <p v-if="form.errors.address_line_2" :class="errorClass">
                        {{ form.errors.address_line_2 }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="city" :class="labelClass">
                        {{ translations.form.city_title }}
                    </label>

                    <input
                        id="city"
                        v-model="form.city"
                        type="text"
                        :class="inputClass('city')"
                        @input="clearFieldError('city')"
                    >

                    <p v-if="form.errors.city" :class="errorClass">
                        {{ form.errors.city }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="postcode" :class="labelClass">
                        {{ translations.form.postcode_title }}
                    </label>

                    <input
                        id="postcode"
                        v-model="form.postcode"
                        type="text"
                        :class="inputClass('postcode')"
                        @input="clearFieldError('postcode')"
                    >

                    <p v-if="form.errors.postcode" :class="errorClass">
                        {{ form.errors.postcode }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="country_code" :class="labelClass">
                        {{ translations.form.country_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="country_code"
                        v-model="form.country_code"
                        :class="inputClass('country_code')"
                        @change="clearFieldError('country_code')"
                    >
                        <option value="">
                            {{ translations.form.select_country }}
                        </option>

                        <option
                            v-for="country in countries"
                            :key="country.id ?? country.iso_alpha2"
                            :value="country.iso_alpha2"
                        >
                            {{ country.flag_emoji }} {{ country.name }}
                        </option>
                    </select>

                    <p v-if="form.errors.country_code" :class="errorClass">
                        {{ form.errors.country_code }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="timezone" :class="labelClass">
                        {{ translations.form.timezone_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="timezone"
                        v-model="form.timezone"
                        :disabled="!form.country_code || loadingTimezones"
                        :class="inputClass('timezone')"
                        @change="clearFieldError('timezone')"
                    >
                        <option value="">
                            {{ loadingTimezones ? translations.form.loading_timezones : translations.form.select_timezone }}
                        </option>

                        <option
                            v-for="timezone in timezones"
                            :key="timezone.value"
                            :value="timezone.value"
                        >
                            {{ timezone.label }}
                        </option>
                    </select>

                    <p v-if="form.errors.timezone" :class="errorClass">
                        {{ form.errors.timezone }}
                    </p>
                </div>
            </div>

            <!-- Active toggle -->
            <div class="border-t border-black/10 pt-8 dark:border-white/10">
                <div class="space-y-2">
                    <label class="flex items-start gap-3">
                        <input
                            v-model="form.is_active"
                            type="checkbox"
                            class="mt-0.5 h-4 w-4 rounded border-black/20 bg-transparent text-black focus:ring-0 dark:border-white/20 dark:bg-transparent dark:text-white"
                        >

                        <div>
                            <div class="text-sm font-medium select-none text-black dark:text-white">
                                {{ translations.form.active_title }}
                            </div>

                            <p class="mt-1 text-sm leading-6 select-none text-black/55 dark:text-white/55">
                                {{ translations.form.active_text }}
                            </p>
                        </div>
                    </label>

                    <p v-if="form.errors.is_active" :class="errorClass">
                        {{ form.errors.is_active }}
                    </p>
                </div>
            </div>

            <!-- Form actions -->
            <div class="flex flex-col-reverse gap-3 border-t border-black/10 pt-6 dark:border-white/10 sm:flex-row sm:items-center sm:justify-end">
                <Link
                    :href="route('properties.index')"
                    class="inline-flex items-center justify-center rounded-full border border-dashed border-black/15 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/65 transition hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/65 dark:hover:border-white/35 dark:hover:text-white"
                >
                    {{ translations.actions.cancel }}
                </Link>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-full border border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/80 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/80 dark:hover:border-white/45 dark:hover:text-white disabled:cursor-not-allowed disabled:opacity-45"
                    :disabled="form.processing || !isFormValid"
                >
                    <span v-if="form.processing">
                        {{ isEdit ? translations.actions.saving : translations.actions.creating }}
                    </span>

                    <span v-else>
                        {{ isEdit ? translations.actions.save : translations.actions.create }}
                    </span>
                </button>
            </div>
        </div>
    </form>
</template>
