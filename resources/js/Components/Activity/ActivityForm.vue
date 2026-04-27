<script setup>
import { computed, inject } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useActivityForm } from '@/Composables/Activity/useActivityForm'

const route = inject('route')

const props = defineProps({
    activity: {
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
    isFormValid,
    inputClass,
    clearFieldError,
    submit,
} = useActivityForm(route, {
    mode: props.mode,
    activity: props.activity,
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
                    {{ translations.form.activity_details }}
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
                    <label for="duration_minutes" :class="labelClass">
                        {{ translations.form.duration_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="duration_minutes"
                        v-model="form.duration_minutes"
                        type="number"
                        min="1"
                        step="1"
                        :class="inputClass('duration_minutes')"
                        @input="clearFieldError('duration_minutes')"
                    >

                    <p v-if="form.errors.duration_minutes" :class="errorClass">
                        {{ form.errors.duration_minutes }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="buffer_before_minutes" :class="labelClass">
                        {{ translations.form.buffer_before_title }}
                    </label>

                    <input
                        id="buffer_before_minutes"
                        v-model="form.buffer_before_minutes"
                        type="number"
                        min="0"
                        step="1"
                        :class="inputClass('buffer_before_minutes')"
                        @input="clearFieldError('buffer_before_minutes')"
                    >

                    <p v-if="form.errors.buffer_before_minutes" :class="errorClass">
                        {{ form.errors.buffer_before_minutes }}
                    </p>
                </div>

                <div class="space-y-2">
                    <label for="buffer_after_minutes" :class="labelClass">
                        {{ translations.form.buffer_after_title }}
                    </label>

                    <input
                        id="buffer_after_minutes"
                        v-model="form.buffer_after_minutes"
                        type="number"
                        min="0"
                        step="1"
                        :class="inputClass('buffer_after_minutes')"
                        @input="clearFieldError('buffer_after_minutes')"
                    >

                    <p v-if="form.errors.buffer_after_minutes" :class="errorClass">
                        {{ form.errors.buffer_after_minutes }}
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
                    :href="route('activities.index')"
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
