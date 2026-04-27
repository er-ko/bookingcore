<script setup>
import { inject } from 'vue'
import { useUnitRecurringTimeOffsForm } from '@/Composables/Unit/useUnitRecurringTimeOffsForm'

const route = inject('route')

const props = defineProps({
    unit: {
        type: Object,
        required: true,
    },
    recurringTimeOffs: {
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
    hasIntervals,
    hasChanges,
    addInterval,
    removeInterval,
    clearDayError,
    submit,
} = useUnitRecurringTimeOffsForm({
    route,
    unit: props.unit,
    recurringTimeOffs: props.recurringTimeOffs,
    translations: props.translations.recurring_time_offs_form,
})
</script>

<template>
    <section class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
        <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                    {{ translations.recurring_time_offs_form.title }}
                </h2>

                <span class="text-xs text-black/35 dark:text-white/35">
                    {{ translations.recurring_time_offs_form.subtitle }}
                </span>
            </div>
        </div>

        <div class="space-y-6 px-6 py-6">
            <p class="text-sm leading-6 text-black/55 dark:text-white/55">
                {{ translations.recurring_time_offs_form.description }}
            </p>

            <div class="space-y-4">
                <div
                    v-for="day in orderedDays"
                    :key="day.day_of_week"
                    class="rounded-2xl border border-black/8 p-4 dark:border-white/8"
                >
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div class="min-w-[120px]">
                            <h3 class="text-sm font-medium text-black dark:text-white">
                                {{ day.label }}
                            </h3>

                            <p class="mt-1 text-xs text-black/40 dark:text-white/40">
                                {{ translations.recurring_time_offs_form.recurring_blocks_count.replace(':count', day.intervals.length) }}
                            </p>
                        </div>

                        <div class="flex-1 space-y-3">
                            <template v-if="hasIntervals(day.day_of_week)">
                                <div
                                    v-for="(interval, index) in day.intervals"
                                    :key="`${day.day_of_week}-${interval.id ?? 'new'}-${index}`"
                                    class="space-y-4 rounded-2xl border border-black/8 p-4 dark:border-white/8"
                                >
                                    <div class="grid gap-3 md:grid-cols-2">
                                        <div class="space-y-1.5">
                                            <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                                {{ translations.recurring_time_offs_form.start_title }}
                                            </label>

                                            <input
                                                v-model="interval.start_time"
                                                type="time"
                                                required
                                                class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                                                @input="clearDayError(day.day_of_week)"
                                            >
                                        </div>

                                        <div class="space-y-1.5">
                                            <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                                {{ translations.recurring_time_offs_form.end_title }}
                                            </label>

                                            <input
                                                v-model="interval.end_time"
                                                type="time"
                                                required
                                                class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                                                @input="clearDayError(day.day_of_week)"
                                            >
                                        </div>
                                    </div>

                                    <div class="grid gap-3 md:grid-cols-2">
                                        <div class="space-y-1.5 md:col-span-2">
                                            <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                                {{ translations.recurring_time_offs_form.reason_title }}
                                            </label>

                                            <input
                                                v-model="interval.reason"
                                                type="text"
                                                maxlength="255"
                                                :placeholder="translations.recurring_time_offs_form.reason_placeholder"
                                                class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 placeholder:text-black/30 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:placeholder:text-white/30 dark:focus:border-white/30"
                                                @input="clearDayError(day.day_of_week)"
                                            >
                                        </div>
                                    </div>

                                    <div class="grid gap-3 md:grid-cols-2">
                                        <div class="space-y-1.5">
                                            <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                                {{ translations.recurring_time_offs_form.valid_from_title }}
                                            </label>

                                            <input
                                                v-model="interval.valid_from"
                                                type="date"
                                                class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                                                @input="clearDayError(day.day_of_week)"
                                            >
                                        </div>

                                        <div class="space-y-1.5">
                                            <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                                {{ translations.recurring_time_offs_form.valid_until_title }}
                                            </label>

                                            <input
                                                v-model="interval.valid_until"
                                                type="date"
                                                class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                                                @input="clearDayError(day.day_of_week)"
                                            >
                                        </div>
                                    </div>

                                    <div class="flex justify-end">
                                        <button
                                            type="button"
                                            class="inline-flex items-center justify-center rounded-full border border-red-500/20 px-4 py-2 text-sm font-medium select-none text-red-700 transition hover:cursor-pointer hover:border-red-500/40 hover:text-red-800 dark:border-red-400/20 dark:text-red-300 dark:hover:border-red-400/40 dark:hover:text-red-200"
                                            @click="removeInterval(day.day_of_week, index)"
                                        >
                                            {{ translations.recurring_time_offs_form.remove }}
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <div
                                v-else
                                class="rounded-2xl border border-dashed border-black/10 px-4 py-4 dark:border-white/10"
                            >
                                <p class="text-sm leading-6 text-black/50 dark:text-white/50">
                                    {{ translations.recurring_time_offs_form.empty_day.replace(':day', day.label.toLowerCase()) }}
                                </p>
                            </div>

                            <p
                                v-if="state.errors[day.day_of_week]"
                                class="text-sm text-red-600 dark:text-red-400"
                            >
                                {{ state.errors[day.day_of_week] }}
                            </p>

                            <div>
                                <button
                                    type="button"
                                    class="inline-flex items-center justify-center rounded-full border border-black/15 px-4 py-2 text-sm font-medium select-none text-black/70 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/35 dark:hover:text-white"
                                    @click="addInterval(day.day_of_week)"
                                >
                                    {{ translations.recurring_time_offs_form.add }}
                                </button>
                            </div>
                        </div>
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
                        <span v-if="state.processing">{{ translations.recurring_time_offs_form.saving }}</span>
                        <span v-else>{{ translations.recurring_time_offs_form.save }}</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
