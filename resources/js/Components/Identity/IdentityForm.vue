<script setup>
import { inject } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useIdentityForm } from '@/Composables/Identity/useIdentityForm'

const route = inject('route')

const props = defineProps({
    identity: {
        type: Object,
        default: () => ({}),
    },
    languages: {
        type: Array,
        default: () => ([]),
    },
    currencies: {
        type: Array,
        default: () => ([]),
    },
    countries: {
        type: Array,
        default: () => ([]),
    },
    translations: {
        type: Object,
        required: true,
    },
})

const {
    form,
    isFormValid,
    inputClass,
    clearFieldError,
    updateSlug,
    submit,
} = useIdentityForm(route, {
    identity: props.identity,
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
                    {{ translations.form.identity_settings }}
                </h2>

                <span class="hidden text-xs text-black/35 dark:text-white/35 md:block">
                    {{ translations.form.base_configuration }}
                </span>
            </div>
        </div>

        <div class="space-y-8 px-6 py-6">
            <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                <div class="space-y-2 md:col-span-2">
                    <label
                        for="brand_name"
                        :class="labelClass"
                    >
                        {{ translations.form.brand_name_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="brand_name"
                        v-model="form.brand_name"
                        type="text"
                        :class="inputClass('brand_name')"
                        :placeholder="translations.form.brand_name_placeholder"
                        @input="clearFieldError('brand_name')"
                    >

                    <p
                        v-if="form.errors.brand_name"
                        :class="errorClass"
                    >
                        {{ form.errors.brand_name }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label
                        for="slug"
                        :class="labelClass"
                    >
                        {{ translations.form.public_slug_title }} <span class="text-red-600">*</span>
                    </label>

                    <div
                        class="flex items-center rounded-2xl px-4 py-3"
                        :class="inputClass('slug')"
                    >
                        <span class="text-sm text-black/35 dark:text-white/35">
                            {{ translations.form.public_slug_prefix }}
                        </span>

                        <input
                            id="slug"
                            v-model="form.slug"
                            type="text"
                            class="ml-1 w-full bg-transparent text-sm text-black outline-none placeholder:text-black/30 dark:text-white dark:placeholder:text-white/30"
                            :placeholder="translations.form.public_slug_placeholder"
                            @input="clearFieldError('slug')"
                            @blur="updateSlug"
                        >
                    </div>

                    <p
                        v-if="form.errors.slug"
                        :class="errorClass"
                    >
                        {{ form.errors.slug }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label
                        for="default_language_code"
                        :class="labelClass"
                    >
                        {{ translations.form.default_language_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="default_language_code"
                        v-model="form.default_language_code"
                        :class="inputClass('default_language_code')"
                        @change="clearFieldError('default_language_code')"
                    >
                        <option value="">
                            {{ translations.form.select_language_title }}
                        </option>

                        <option
                            v-for="language in languages"
                            :key="language.language_tag"
                            :value="language.language_tag"
                        >
                            {{ language.flag_emoji ? `${language.flag_emoji} ` : '' }}{{ language.name }}
                        </option>
                    </select>

                    <p
                        v-if="form.errors.default_language_code"
                        :class="errorClass"
                    >
                        {{ form.errors.default_language_code }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label
                        for="default_currency_code"
                        :class="labelClass"
                    >
                        {{ translations.form.default_currency_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="default_currency_code"
                        v-model="form.default_currency_code"
                        :class="inputClass('default_currency_code')"
                        @change="clearFieldError('default_currency_code')"
                    >
                        <option value="">
                            {{ translations.form.select_currency_title }}
                        </option>

                        <option
                            v-for="currency in currencies"
                            :key="currency.currency_code"
                            :value="currency.currency_code"
                        >
                            {{ currency.flag_emoji ? `${currency.flag_emoji} ` : '' }}{{ currency.currency_code }} — {{ currency.name }}
                        </option>
                    </select>

                    <p
                        v-if="form.errors.default_currency_code"
                        :class="errorClass"
                    >
                        {{ form.errors.default_currency_code }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label
                        for="default_country_code"
                        :class="labelClass"
                    >
                        {{ translations.form.default_country_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="default_country_code"
                        v-model="form.default_country_code"
                        :class="inputClass('default_country_code')"
                        @change="clearFieldError('default_country_code')"
                    >
                        <option value="">
                            {{ translations.form.select_country_title }}
                        </option>

                        <option
                            v-for="country in countries"
                            :key="country.iso_alpha2"
                            :value="country.iso_alpha2"
                        >
                            {{ country.flag_emoji ? `${country.flag_emoji} ` : '' }}{{ country.official_name }}
                        </option>
                    </select>

                    <p
                        v-if="form.errors.default_country_code"
                        :class="errorClass"
                    >
                        {{ form.errors.default_country_code }}
                    </p>
                </div>
            </div>

            <div class="border-t border-black/10 pt-7 dark:border-white/10">
                <div class="space-y-2">
                    <div :class="labelClass">
                        {{ translations.form.booking_page_visibility_title }}
                    </div>

                    <label class="flex items-start gap-3">
                        <input
                            v-model="form.is_public"
                            type="checkbox"
                            class="mt-0.5 h-4 w-4 rounded border-black/20 bg-transparent text-black focus:ring-0 dark:border-white/20 dark:bg-transparent dark:text-white"
                        >

                        <div>
                            <div class="text-sm font-medium select-none text-black dark:text-white">
                                {{ translations.form.public_booking_page_title }}
                            </div>

                            <p class="mt-1 text-sm leading-6 text-black/55 dark:text-white/55">
                                {{ translations.form.public_booking_page_text }}
                            </p>
                        </div>
                    </label>

                    <p
                        v-if="form.errors.is_public"
                        :class="errorClass"
                    >
                        {{ form.errors.is_public }}
                    </p>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-black/10 pt-6 dark:border-white/10 sm:flex-row sm:items-center sm:justify-end">
                <Link
                    :href="route('identity.index')"
                    class="inline-flex items-center justify-center rounded-full border border-dashed border-black/15 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/65 transition hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/65 dark:hover:border-white/35 dark:hover:text-white"
                >
                    {{ translations.actions.cancel }}
                </Link>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-full border border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/80 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/80 dark:hover:border-white/45 dark:hover:text-white disabled:cursor-not-allowed disabled:opacity-45 hover:cursor-pointer"
                    :disabled="form.processing || !isFormValid"
                >
                    <span v-if="form.processing">
                        {{ translations.actions.saving }}
                    </span>

                    <span v-else>
                        {{ translations.actions.save }}
                    </span>
                </button>
            </div>
        </div>
    </form>
</template>
