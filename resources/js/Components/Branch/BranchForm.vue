<script setup>
import { computed, inject } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useBranchForm } from '@/Composables/Branch/useBranchForm'

const route = inject('route')

const props = defineProps({
    countries: {
        type: Array,
        required: true,
    },
    branch: {
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
    isFormValid,
    inputClass,
    clearFieldError,
    submit,
} = useBranchForm(route, {
    mode: props.mode,
    branch: props.branch,
    translations: props.translations,
})

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
                    {{ translations.form.branch_details }}
                </h2>

                <span class="text-xs text-black/35 dark:text-white/35">
                    {{ isEdit ? translations.form.update_form : translations.form.complete_form }}
                </span>
            </div>
        </div>

        <div class="space-y-8 px-6 py-6">
            <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                <div class="space-y-2 md:col-span-2">
                    <label for="name" :class="labelClass">
                        {{ translations.form.branch_name_title }} <span class="text-red-600">*</span>
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
                    <label for="address_line_1" :class="labelClass">
                        {{ translations.form.address_line_1_title }} <span class="text-red-600">*</span>
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
                        {{ translations.form.city_title }} <span class="text-red-600">*</span>
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
                        {{ translations.form.postcode_title }} <span class="text-red-600">*</span>
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
                            :key="country.id ?? country.code ?? country.iso_alpha2"
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

            <div class="border-t border-black/10 pt-8 dark:border-white/10">
                <div class="space-y-2 md:col-span-2">
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

            <div class="flex flex-col-reverse gap-3 border-t border-black/10 pt-6 dark:border-white/10 sm:flex-row sm:items-center sm:justify-end">
                <Link
                    :href="route('branches.index')"
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
