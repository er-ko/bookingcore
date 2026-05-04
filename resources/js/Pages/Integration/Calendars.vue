<script setup>
import { computed } from 'vue'
import { Head, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
    calendarIntegration: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const integration = computed(() => props.calendarIntegration?.integration ?? null)
const account = computed(() => props.calendarIntegration?.account ?? null)
const calendars = computed(() => props.calendarIntegration?.calendars ?? [])
const connectionError = computed(() => props.calendarIntegration?.connection_error ?? null)

const hasIntegration = computed(() => integration.value !== null)
const hasConnectionError = computed(() => Boolean(connectionError.value))
const selectedCalendarId = computed(() => integration.value?.calendar_settings?.selected_calendar_id ?? null)

const fieldClass = [
    'block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm select-none text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30 disabled:cursor-not-allowed disabled:bg-black/[0.03] dark:disabled:bg-white/[0.03]',
]

const labelClass = 'block text-[11px] font-medium uppercase tracking-[0.2em] text-black/45 dark:text-white/45'

const selectCalendar = (calendarId) => {
    if (!integration.value?.id || hasConnectionError.value) {
        return
    }

    router.post(
        `/integrations/calendar/${integration.value.id}/select`,
        {
            calendar_id: calendarId,
        },
        {
            preserveScroll: true,
        }
    )
}
</script>

<template>
    <Head :title="translations.title" />

    <AppLayout>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="space-y-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-semibold tracking-tight text-black dark:text-white sm:text-4xl">
                            {{ translations.title }}
                        </h1>

                        <p class="mt-3 text-sm leading-6 text-black/55 dark:text-white/55 sm:text-base">
                            {{ translations.description }}
                        </p>
                    </div>

                    <div v-if="!hasIntegration || hasConnectionError">
                        <a
                            :href="route('integrations.calendar.google.redirect')"
                            class="inline-flex items-center rounded-full border border-dashed border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/75 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/75 dark:hover:border-white/45 dark:hover:text-white"
                        >
                            {{ hasConnectionError ? translations.actions.reconnect_google : translations.actions.connect_google }}
                        </a>
                    </div>
                </div>

                <div
                    v-if="hasConnectionError"
                    class="overflow-hidden rounded-3xl border border-red-500/20 bg-red-500/5 backdrop-blur-sm"
                >
                    <div class="border-b border-red-500/20 px-6 py-4">
                        <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-red-700 dark:text-red-300">
                            {{ translations.states.connection_expired_title }}
                        </h2>
                    </div>

                    <div class="space-y-5 px-6 py-6">
                        <p class="text-sm leading-6 text-red-800 dark:text-red-200">
                            {{ translations.states.connection_expired_text }}
                        </p>

                        <p
                            v-if="connectionError"
                            class="text-xs leading-5 text-red-700/80 dark:text-red-300/80"
                        >
                            {{ connectionError }}
                        </p>

                        <div>
                            <a
                                :href="route('integrations.calendar.google.redirect')"
                                class="inline-flex items-center rounded-full border border-red-500/25 px-5 py-2.5 text-sm font-medium text-red-800 transition hover:border-red-500/50 hover:text-red-900 dark:text-red-200 dark:hover:text-white"
                            >
                                {{ translations.actions.reconnect_google }}
                            </a>
                        </div>
                    </div>
                </div>

                <div
                    v-else-if="!hasIntegration"
                    class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10"
                >
                    <div class="flex flex-col items-center justify-center px-6 py-20 text-center">
                        <h2 class="text-xl font-semibold tracking-tight text-black dark:text-white">
                            {{ translations.states.no_calendar_connected_title }}
                        </h2>

                        <p class="mt-3 max-w-md text-sm leading-6 text-black/50 dark:text-white/50">
                            {{ translations.states.no_calendar_connected_text }}
                        </p>

                        <div class="mt-8">
                            <a
                                :href="route('integrations.calendar.google.redirect')"
                                class="inline-flex items-center rounded-full border border-dashed border-black/20 px-5 py-2.5 text-sm font-medium text-black/75 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/75 dark:hover:border-white/45 dark:hover:text-white"
                            >
                                {{ translations.actions.connect_google }}
                            </a>
                        </div>
                    </div>
                </div>

                <template v-else>
                    <div class="grid gap-6 xl:grid-cols-[0.95fr_1.55fr]">
                        <aside class="h-fit overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
                            <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
                                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                                    {{ translations.overview.connected_account_title }}
                                </h2>
                            </div>

                            <div class="space-y-7 px-6 py-6">
                                <div>
                                    <div :class="labelClass">
                                        {{ translations.overview.provider_title }}
                                    </div>
                                    <div class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                        {{ integration.provider }}
                                    </div>
                                </div>

                                <div v-if="account?.name">
                                    <div :class="labelClass">
                                        {{ translations.overview.name_title }}
                                    </div>
                                    <div class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                        {{ account.name }}
                                    </div>
                                </div>

                                <div v-if="account?.email">
                                    <div :class="labelClass">
                                        {{ translations.overview.email_title }}
                                    </div>
                                    <div class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                        {{ account.email }}
                                    </div>
                                </div>

                                <div v-if="account?.timezone">
                                    <div :class="labelClass">
                                        {{ translations.overview.timezone_title }}
                                    </div>
                                    <div class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                        {{ account.timezone }}
                                    </div>
                                </div>

                                <div>
                                    <div :class="labelClass">
                                        {{ translations.overview.status_title }}
                                    </div>

                                    <div class="mt-2">
                                        <span
                                            class="inline-flex items-center rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-xs font-medium text-nowrap select-none text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300"
                                        >
                                            {{ translations.overview.active_title }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </aside>

                        <div class="h-fit overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
                            <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
                                <div class="flex items-center justify-between gap-3">
                                    <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                                        {{ translations.overview.available_calendars_title }}
                                    </h2>

                                    <span class="text-xs text-black/35 dark:text-white/35">
                                        {{ calendars.length }} {{ translations.states.calendar_count_suffix }}
                                    </span>
                                </div>
                            </div>

                            <div v-if="calendars.length === 0" class="px-6 py-16 text-center">
                                <h3 class="text-xl font-semibold tracking-tight text-black dark:text-white">
                                    {{ translations.states.no_calendars_found_title }}
                                </h3>

                                <p class="mt-3 text-sm leading-6 text-black/50 dark:text-white/50">
                                    {{ translations.states.no_calendars_found_text }}
                                </p>
                            </div>

                            <div v-else>
                                <div
                                    v-for="calendar in calendars"
                                    :key="calendar.id"
                                    class="border-b border-black/6 px-6 py-5 transition-colors duration-150 last:border-b-0 hover:bg-black/[0.025] dark:border-white/8 dark:hover:bg-white/[0.045]"
                                >
                                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                        <div class="min-w-0 space-y-2">
                                            <div class="flex flex-wrap items-center gap-2">
                                                <h3 class="text-sm font-medium text-black dark:text-white">
                                                    {{ calendar.name }}
                                                </h3>

                                                <span
                                                    v-if="calendar.is_primary"
                                                    class="inline-flex items-center rounded-full border border-sky-500/20 bg-sky-500/10 px-3 py-1 text-xs font-medium select-none text-sky-700 dark:border-sky-400/20 dark:bg-sky-400/10 dark:text-sky-300"
                                                >
                                                    {{ translations.states.primary_badge }}
                                                </span>

                                                <span
                                                    v-if="calendar.is_read_only"
                                                    class="inline-flex items-center rounded-full border border-amber-500/20 bg-amber-500/10 px-3 py-1 text-xs font-medium select-none text-amber-700 dark:border-amber-400/20 dark:bg-amber-400/10 dark:text-amber-300"
                                                >
                                                    {{ translations.states.read_only_badge }}
                                                </span>

                                                <span
                                                    v-if="selectedCalendarId === calendar.id"
                                                    class="inline-flex items-center rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-xs font-medium select-none text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300"
                                                >
                                                    {{ translations.states.selected_badge }}
                                                </span>
                                            </div>

                                            <p class="break-all text-xs text-black/45 dark:text-white/45">
                                                {{ calendar.id }}
                                            </p>

                                            <p
                                                v-if="calendar.description"
                                                class="text-sm leading-6 text-black/60 dark:text-white/60"
                                            >
                                                {{ calendar.description }}
                                            </p>

                                            <p
                                                v-if="calendar.timezone"
                                                class="text-xs text-black/45 dark:text-white/45"
                                            >
                                                {{ translations.overview.timezone_prefix }} {{ calendar.timezone }}
                                            </p>
                                        </div>

                                        <div class="shrink-0">
                                            <button
                                                v-if="selectedCalendarId !== calendar.id"
                                                type="button"
                                                class="inline-flex items-center justify-center rounded-full border border-black/15 px-4 py-2 text-sm font-medium text-nowrap select-none text-black/65 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/65 dark:hover:border-white/35 dark:hover:text-white"
                                                @click="selectCalendar(calendar.id)"
                                            >
                                                {{ translations.actions.select_calendar }}
                                            </button>

                                            <span
                                                v-else
                                                class="inline-flex items-center justify-center rounded-full border border-black/20 px-4 py-2 text-sm font-medium text-nowrap select-none bg-black text-white dark:bg-white dark:text-black dark:border-white/20"
                                            >
                                                {{ translations.actions.selected }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </AppLayout>
</template>