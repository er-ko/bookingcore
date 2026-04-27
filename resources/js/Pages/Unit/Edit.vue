<script setup>
import { computed, inject, ref } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import UnitForm from '@/Components/Unit/UnitForm.vue'
import UnitWorkingHoursCard from '@/Components/Unit/UnitWorkingHoursCard.vue'
import UnitRecurringTimeOffsCard from '@/Components/Unit/UnitRecurringTimeOffsCard.vue'
import UnitTimeOffsCard from '@/Components/Unit/UnitTimeOffsCard.vue'

const route = inject('route')

const props = defineProps({
    unit: {
        type: Object,
        required: true,
    },
    branches: {
        type: Array,
        required: true,
    },
    workingHours: {
        type: Object,
        default: () => ({}),
    },
    recurringTimeOffs: {
        type: Object,
        default: () => ({}),
    },
    timeOffs: {
        type: Array,
        default: () => ([]),
    },
    translations: {
        type: Object,
        required: true,
    },
})

const activeTab = ref('general')

const branchesCount = computed(() => props.branches?.length ?? 0)

const tabs = computed(() => [
    {
        key: 'general',
        label: props.translations.sections.general_title,
        description: props.translations.sections.general_text,
    },
    {
        key: 'working-hours',
        label: props.translations.sections.working_hours_title,
        description: props.translations.sections.working_hours_text,
    },
    {
        key: 'recurring-time-off',
        label: props.translations.sections.recurring_time_offs_title,
        description: props.translations.sections.recurring_time_offs_text,
    },
    {
        key: 'time-offs',
        label: props.translations.sections.time_offs_title,
        description: props.translations.sections.time_offs_text,
    },
])

const workingDaysCount = computed(() => {
    return Object.values(props.workingHours ?? {}).filter((intervals) => Array.isArray(intervals) && intervals.length > 0).length
})

const recurringDaysCount = computed(() => {
    return Object.values(props.recurringTimeOffs ?? {}).filter((intervals) => Array.isArray(intervals) && intervals.length > 0).length
})

const recurringBlocksCount = computed(() => {
    return Object.values(props.recurringTimeOffs ?? {}).reduce((total, intervals) => {
        return total + (Array.isArray(intervals) ? intervals.length : 0)
    }, 0)
})

const timeOffsCount = computed(() => props.timeOffs?.length ?? 0)

const upcomingTimeOffCount = computed(() => {
    const now = new Date()

    return (props.timeOffs ?? []).filter((item) => {
        if (!item?.starts_at) {
            return false
        }

        return new Date(item.starts_at) >= now
    }).length
})

const currentOverview = computed(() => {
    switch (activeTab.value) {
        case 'working-hours':
            return {
                title: props.translations.working_hours_overview.title,
                items: [
                    {
                        label: props.translations.working_hours_overview.configured_days_title,
                        value: `${workingDaysCount.value} / 7`,
                    },
                    {
                        label: props.translations.working_hours_overview.schedule_model_title,
                        value: props.translations.working_hours_overview.one_daily_period_title,
                    },
                    {
                        label: props.translations.working_hours_overview.usage_title,
                        value: props.translations.working_hours_overview.usage_text,
                    },
                    {
                        label: props.translations.working_hours_overview.note_title,
                        value: props.translations.working_hours_overview.note_text,
                    },
                ],
            }

        case 'recurring-time-off':
            return {
                title: props.translations.recurring_time_off_overview.title,
                items: [
                    {
                        label: props.translations.recurring_time_off_overview.configured_days_title,
                        value: `${recurringDaysCount.value} / 7`,
                    },
                    {
                        label: props.translations.recurring_time_off_overview.recurring_blocks_title,
                        value: recurringBlocksCount.value,
                    },
                    {
                        label: props.translations.recurring_time_off_overview.usage_title,
                        value: props.translations.recurring_time_off_overview.usage_text,
                    },
                    {
                        label: props.translations.recurring_time_off_overview.note_title,
                        value: props.translations.recurring_time_off_overview.note_text,
                    },
                ],
            }

        case 'time-offs':
            return {
                title: props.translations.time_offs_overview.title,
                items: [
                    {
                        label: props.translations.time_offs_overview.total_entries_title,
                        value: timeOffsCount.value,
                    },
                    {
                        label: props.translations.time_offs_overview.upcoming_entries_title,
                        value: upcomingTimeOffCount.value,
                    },
                    {
                        label: props.translations.time_offs_overview.usage_title,
                        value: props.translations.time_offs_overview.usage_text,
                    },
                    {
                        label: props.translations.time_offs_overview.note_title,
                        value: props.translations.time_offs_overview.note_text,
                    },
                ],
            }

        default:
            return {
                title: props.translations.overview.title,
                items: [
                    {
                        label: props.translations.overview.unit_id_title,
                        value: props.unit.public_id ?? props.unit.id,
                    },
                    {
                        label: props.translations.overview.status_title,
                        value: props.unit.is_active
                            ? props.translations.overview.active_title
                            : props.translations.overview.inactive_title,
                        badge: props.unit.is_active ? 'active' : 'inactive',
                    },
                    {
                        label: props.translations.overview.branches_available_title,
                        value: branchesCount.value,
                    },
                    {
                        label: props.translations.overview.assignment_title,
                        value: props.translations.overview.assignment_text,
                    },
                    {
                        label: props.translations.overview.required_title,
                        list: [
                            props.translations.form.branch_title,
                            props.translations.form.name_title,
                        ],
                    },
                    {
                        label: props.translations.overview.optional_title,
                        list: [
                            props.translations.form.description_title,
                        ],
                    },
                    {
                        label: props.translations.overview.note_title,
                        value: props.translations.overview.note_text,
                    },
                ],
            }
    }
})

const setActiveTab = (tabKey) => {
    activeTab.value = tabKey
}
</script>

<template>
    <Head :title="`${translations.title} - ${props.unit.name}`" />

    <AppLayout>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="space-y-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div class="max-w-2xl">
                        <h1 class="text-3xl font-semibold tracking-tight text-black dark:text-white sm:text-4xl">
                            {{ translations.title }}
                        </h1>

                        <p class="mt-3 text-sm leading-6 text-black/55 dark:text-white/55 sm:text-base">
                            {{ translations.description }}
                        </p>
                    </div>

                    <div>
                        <Link
                            :href="route('units.index')"
                            class="inline-flex items-center rounded-full border border-dashed border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/75 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/75 dark:hover:border-white/45 dark:hover:text-white"
                        >
                            {{ translations.back_to_units }}
                        </Link>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[0.95fr_1.55fr]">
                    <div class="space-y-6">
                        <aside class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
                            <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
                                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                                    {{ translations.sections.title }}
                                </h2>
                            </div>

                            <div class="space-y-2 px-4 py-4">
                                <button
                                    v-for="tab in tabs"
                                    :key="tab.key"
                                    type="button"
                                    class="flex w-full items-start justify-between rounded-2xl px-4 py-3 text-left transition-all duration-150 hover:cursor-pointer"
                                    :class="activeTab === tab.key
                                        ? 'bg-black text-white dark:bg-white dark:text-black'
                                        : 'text-black/70 hover:bg-black/[0.04] hover:text-black dark:text-white/70 dark:hover:bg-white/[0.06] dark:hover:text-white'"
                                    @click="setActiveTab(tab.key)"
                                >
                                    <div>
                                        <div class="text-sm font-medium select-none">
                                            {{ tab.label }}
                                        </div>

                                        <div
                                            class="mt-1 text-xs select-none"
                                            :class="activeTab === tab.key
                                                ? 'text-white/70 dark:text-black/70'
                                                : 'text-black/45 dark:text-white/45'"
                                        >
                                            {{ tab.description }}
                                        </div>
                                    </div>

                                    <span
                                        class="ml-3 mt-0.5 inline-flex h-2.5 w-2.5 rounded-full"
                                        :class="activeTab === tab.key
                                            ? 'bg-white dark:bg-black'
                                            : 'bg-black/15 dark:bg-white/15'"
                                    />
                                </button>
                            </div>
                        </aside>

                        <aside class="h-fit overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
                            <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
                                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                                    {{ currentOverview.title }}
                                </h2>
                            </div>

                            <div class="space-y-7 px-6 py-6">
                                <div
                                    v-for="(item, index) in currentOverview.items"
                                    :key="`${activeTab}-${index}`"
                                >
                                    <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                        {{ item.label }}
                                    </div>

                                    <div
                                        v-if="item.badge === 'active'"
                                        class="mt-2"
                                    >
                                        <span class="inline-flex items-center rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-xs font-medium text-nowrap select-none text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300">
                                            {{ item.value }}
                                        </span>
                                    </div>

                                    <div
                                        v-else-if="item.badge === 'inactive'"
                                        class="mt-2"
                                    >
                                        <span class="inline-flex items-center rounded-full border border-amber-500/20 bg-amber-500/10 px-3 py-1 text-xs font-medium text-nowrap select-none text-amber-700 dark:border-amber-400/20 dark:bg-amber-400/10 dark:text-amber-300">
                                            {{ item.value }}
                                        </span>
                                    </div>

                                    <ul
                                        v-else-if="item.list"
                                        class="mt-1 space-y-0.5 text-sm leading-6 text-black/60 dark:text-white/60"
                                    >
                                        <li
                                            v-for="listItem in item.list"
                                            :key="listItem"
                                        >
                                            {{ listItem }}
                                        </li>
                                    </ul>

                                    <div
                                        v-else
                                        class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60"
                                    >
                                        {{ item.value }}
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>

                    <div>
                        <UnitForm
                            v-if="activeTab === 'general'"
                            mode="edit"
                            :unit="unit"
                            :branches="branches"
                            :translations="translations"
                        />

                        <UnitWorkingHoursCard
                            v-else-if="activeTab === 'working-hours'"
                            :unit="unit"
                            :working-hours="workingHours"
                            :translations="translations"
                        />

                        <UnitRecurringTimeOffsCard
                            v-else-if="activeTab === 'recurring-time-off'"
                            :unit="unit"
                            :recurring-time-offs="recurringTimeOffs"
                            :translations="translations"
                        />

                        <UnitTimeOffsCard
                            v-else-if="activeTab === 'time-offs'"
                            :unit="unit"
                            :time-offs="timeOffs"
                            :translations="translations"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
