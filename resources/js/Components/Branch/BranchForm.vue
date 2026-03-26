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
})
</script>

<template>
    <form
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm"
        @submit.prevent="submit"
        novalidate
    >
        <div class="border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-sm font-semibold text-gray-900">
                    {{ translations.form.branch_details }}
                </h2>

                <span class="text-xs text-gray-500">
                    {{ isEdit ? translations.form.update_form : translations.form.complete_form }}
                </span>
            </div>
        </div>

        <div class="space-y-6 px-6 py-6">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="space-y-2 md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.branch_name_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        :class="inputClass('name')"
                        @input="clearFieldError('name')"
                    >

                    <p v-if="form.errors.name" class="text-sm text-red-600">
                        {{ form.errors.name }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="address_line_1" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.address_line_1_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="address_line_1"
                        v-model="form.address_line_1"
                        type="text"
                        :class="inputClass('address_line_1')"
                        @input="clearFieldError('address_line_1')"
                    >

                    <p v-if="form.errors.address_line_1" class="text-sm text-red-600">
                        {{ form.errors.address_line_1 }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="address_line_2" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.address_line_2_title }}
                    </label>

                    <input
                        id="address_line_2"
                        v-model="form.address_line_2"
                        type="text"
                        :class="inputClass('address_line_2')"
                        @input="clearFieldError('address_line_2')"
                    >

                    <p v-if="form.errors.address_line_2" class="text-sm text-red-600">
                        {{ form.errors.address_line_2 }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.city_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="city"
                        v-model="form.city"
                        type="text"
                        :class="inputClass('city')"
                        @input="clearFieldError('city')"
                    >

                    <p v-if="form.errors.city" class="text-sm text-red-600">
                        {{ form.errors.city }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="postcode" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.postcode_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="postcode"
                        v-model="form.postcode"
                        type="text"
                        :class="inputClass('postcode')"
                        @input="clearFieldError('postcode')"
                    >

                    <p v-if="form.errors.postcode" class="text-sm text-red-600">
                        {{ form.errors.postcode }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="country_code" class="block text-sm font-medium text-gray-700">
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

                    <p v-if="form.errors.country_code" class="text-sm text-red-600">
                        {{ form.errors.country_code }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="timezone" class="block text-sm font-medium text-gray-700">
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

                    <p v-if="form.errors.timezone" class="text-sm text-red-600">
                        {{ form.errors.timezone }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label class="flex items-start gap-3">
                        <input
                            v-model="form.is_active"
                            type="checkbox"
                            class="mt-0.5 h-4 w-4 rounded border-gray-300 text-gray-900 focus:ring-gray-900"
                        >

                        <div>
                            <div class="font-medium text-gray-900">
                                {{ translations.form.active_title }}
                            </div>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ translations.form.active_text }}
                            </p>
                        </div>
                    </label>

                    <p v-if="form.errors.is_active" class="text-sm text-red-600">
                        {{ form.errors.is_active }}
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-gray-200 pt-6">
                <Link
                    :href="route('branches.index')"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-nowrap select-none text-gray-700 transition hover:bg-gray-50"
                >
                    {{ translations.actions.cancel }}
                </Link>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-nowrap select-none text-white transition hover:bg-gray-800 disabled:cursor-not-allowed disabled:opacity-60 cursor-pointer"
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