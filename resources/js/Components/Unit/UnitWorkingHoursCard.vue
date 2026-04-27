<script setup>
import { inject } from 'vue'
import { useUnitWorkingHoursForm } from '@/Composables/Unit/useUnitWorkingHoursForm'

const route = inject('route')

const props = defineProps({
    unit: {
        type: Object,
        required: true,
    },
    workingHours: {
        type: Object,
        default: () => ({}),
    },
    translations: {
        type: Object,
        required: true,
    },
})

const {
    state,
    orderedDays,
    hasChanges,
    toggleDay,
    clearDayError,
    submit,
} = useUnitWorkingHoursForm({
    route,
    unit: props.unit,
    workingHours: props.workingHours,
    translations: props.translations.working_hours_form,
})
</script>

<template>
    <section class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
        <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                    {{ translations.working_hours_form.working_hours }}
                </h2>

                <span class="text-xs text-black/35 dark:text-white/35">
                    {{ translations.working_hours_form.weekly_schedule }}
                </span>
            </div>
        </div>

        <div class="space-y-6 px-6 py-6">
            <div class="space-y-4">
                <div
                    v-for="day in orderedDays"
                    :key="day.day_of_week"
                    class="rounded-2xl border border-black/8 p-4 dark:border-white/8"
                >
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-black dark:text-white">
                                    {{ day.label }}
                                </h3>

                                <p class="mt-1 text-xs text-black/40 dark:text-white/40">
                                    {{ day.interval ? translations.working_hours_form.working_period_enabled : translations.working_hours_form.closed_unavailable }}
                                </p>
                            </div>

                            <label class="inline-flex items-center gap-3">
                                <input
                                    :checked="Boolean(day.interval)"
                                    type="checkbox"
                                    class="h-4 w-4 rounded border-black/20 bg-transparent text-black focus:ring-0 dark:border-white/20 dark:bg-transparent dark:text-white"
                                    @change="toggleDay(day.day_of_week)"
                                >

                                <span class="text-sm select-none text-black/70 dark:text-white/70">
                                    {{ translations.working_hours_form.enabled }}
                                </span>
                            </label>
                        </div>

                        <div
                            v-if="day.interval"
                            class="grid gap-3 md:grid-cols-2"
                        >
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.working_hours_form.start_title }}
                                </label>

                                <input
                                    v-model="day.interval.start_time"
                                    type="time"
                                    :required="Boolean(day.interval)"
                                    class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                                    @input="clearDayError(day.day_of_week)"
                                >
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.working_hours_form.end_title }}
                                </label>

                                <input
                                    v-model="day.interval.end_time"
                                    type="time"
                                    :required="Boolean(day.interval)"
                                    class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                                    @input="clearDayError(day.day_of_week)"
                                >
                            </div>
                        </div>

                        <p
                            v-if="state.errors[day.day_of_week]"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ state.errors[day.day_of_week] }}
                        </p>
                    </div>
                </div>
            </div>

            <p
                v-if="state.formError"
                class="text-sm text-red-600 dark:text-red-400"
            >
                {{ state.formError }}
            </p>

            <div class="border-t border-black/10 pt-6 dark:border-white/10">
                <div class="flex justify-end">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-full border border-black/20 px-5 py-2.5 text-sm font-medium select-none text-black/80 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/80 dark:hover:border-white/45 dark:hover:text-white disabled:cursor-not-allowed disabled:opacity-45"
                        :disabled="state.processing || !hasChanges"
                        @click="submit"
                    >
                        <span v-if="state.processing">{{ translations.working_hours_form.saving }}</span>
                        <span v-else>{{ translations.working_hours_form.save }}</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
