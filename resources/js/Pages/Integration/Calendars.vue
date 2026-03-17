<script setup>
import { computed, reactive } from 'vue'
import { Head, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
    calendarIntegration: {
        type: Object,
        required: true,
    },
})

const integration = computed(() => props.calendarIntegration?.integration ?? null)
const account = computed(() => props.calendarIntegration?.account ?? null)
const calendars = computed(() => props.calendarIntegration?.calendars ?? [])

const hasIntegration = computed(() => integration.value !== null)
const selectedCalendarId = computed(() => integration.value?.calendar_settings?.selected_calendar_id ?? null)

const settingsForm = reactive({
    sync_bookings: integration.value?.calendar_settings?.sync_bookings ?? false,
    sync_mode: integration.value?.calendar_settings?.sync_mode ?? 'soft',
})

const selectCalendar = (calendarId) => {
    if (!integration.value?.id) {
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

const updateSettings = () => {
    if (!integration.value?.id) {
        return
    }

    router.patch(
        `/integrations/calendar/${integration.value.id}/settings`,
        {
            sync_bookings: settingsForm.sync_bookings,
            sync_mode: settingsForm.sync_mode,
        },
        {
            preserveScroll: true,
        }
    )
}
</script>

<template>
    <Head title="Calendar Integrations" />

    <AppLayout>
        <div class="mx-auto max-w-7xl space-y-6 px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        Calendar integrations
                    </h1>

                    <p class="mt-1 text-sm text-gray-600">
                        Connect your external calendar account and choose where BookingCore should create booking events.
                    </p>
                </div>

                <div v-if="!hasIntegration">
                    <a
                        :href="route('integrations.calendar.google.redirect')"
                        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-800"
                    >
                        Connect Google Calendar
                    </a>
                </div>
            </div>

            <div
                v-if="!hasIntegration"
                class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm"
            >
                <div class="flex flex-col items-center justify-center px-6 py-16 text-center">
                    <h2 class="text-lg font-semibold text-gray-900">
                        No calendar connected
                    </h2>

                    <p class="mt-2 max-w-md text-sm text-gray-600">
                        You have not connected any calendar yet. Connect Google Calendar to start syncing booking events.
                    </p>

                    <div class="mt-6">
                        <a
                            :href="route('integrations.calendar.google.redirect')"
                            class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-800"
                        >
                            Connect Google Calendar
                        </a>
                    </div>
                </div>
            </div>

            <template v-else>
                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm lg:col-span-1">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h2 class="text-sm font-semibold text-gray-900">
                                Connected account
                            </h2>
                        </div>

                        <div class="space-y-4 px-6 py-6 text-sm text-gray-700">
                            <div>
                                <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Provider
                                </div>
                                <div class="mt-1 text-gray-900">
                                    {{ integration.provider }}
                                </div>
                            </div>

                            <div v-if="account?.name">
                                <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Name
                                </div>
                                <div class="mt-1 text-gray-900">
                                    {{ account.name }}
                                </div>
                            </div>

                            <div v-if="account?.email">
                                <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Email
                                </div>
                                <div class="mt-1 text-gray-900">
                                    {{ account.email }}
                                </div>
                            </div>

                            <div v-if="account?.timezone">
                                <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Timezone
                                </div>
                                <div class="mt-1 text-gray-900">
                                    {{ account.timezone }}
                                </div>
                            </div>

                            <div>
                                <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                    Status
                                </div>
                                <div class="mt-1">
                                    <span
                                        class="inline-flex items-center rounded-md bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-800 ring-1 ring-inset ring-emerald-600/20"
                                    >
                                        Active
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 px-6 py-4">
                            <h2 class="text-sm font-semibold text-gray-900">
                                Sync settings
                            </h2>
                        </div>

                        <div class="space-y-5 px-6 py-6 text-sm text-gray-700">
                            <label class="flex items-start gap-3">
                                <input
                                    v-model="settingsForm.sync_bookings"
                                    type="checkbox"
                                    class="mt-0.5 h-4 w-4 rounded border-gray-300 text-gray-900 focus:ring-gray-900"
                                >
                                <div>
                                    <div class="font-medium text-gray-900">
                                        Sync bookings
                                    </div>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Enable synchronization between BookingCore and the selected calendar.
                                    </p>
                                </div>
                            </label>

                            <div class="space-y-2">
                                <label for="sync_mode" class="block text-sm font-medium text-gray-700">
                                    Synchronization mode
                                </label>

                                <select
                                    id="sync_mode"
                                    v-model="settingsForm.sync_mode"
                                    class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                                >
                                    <option value="soft">Soft</option>
                                    <option value="strict">Strict</option>
                                </select>

                                <p class="text-xs text-gray-500">
                                    Soft keeps BookingCore working even if calendar sync fails. Strict is intended for stronger consistency.
                                </p>
                            </div>

                            <div class="pt-2">
                                <button
                                    type="button"
                                    class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-800 hover:cursor-pointer"
                                    @click="updateSettings"
                                >
                                    Save settings
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="h-fit overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm lg:col-span-2">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <div class="flex items-center justify-between gap-3">
                                <h2 class="text-sm font-semibold text-gray-900">
                                    Available calendars
                                </h2>

                                <span class="text-xs text-gray-500">
                                    {{ calendars.length }} calendar(s)
                                </span>
                            </div>
                        </div>

                        <div v-if="calendars.length === 0" class="px-6 py-12 text-center">
                            <h3 class="text-sm font-semibold text-gray-900">
                                No calendars found
                            </h3>

                            <p class="mt-2 text-sm text-gray-600">
                                The connected account does not currently expose any calendars.
                            </p>
                        </div>

                        <div v-else class="divide-y divide-gray-100">
                            <div
                                v-for="calendar in calendars"
                                :key="calendar.id"
                                class="flex flex-col gap-4 px-6 py-5 sm:flex-row sm:items-start sm:justify-between"
                            >
                                <div class="min-w-0 space-y-1">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h3 class="text-sm font-semibold text-gray-900">
                                            {{ calendar.name }}
                                        </h3>

                                        <span
                                            v-if="calendar.is_primary"
                                            class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-800 ring-1 ring-inset ring-blue-600/20"
                                        >
                                            Primary
                                        </span>

                                        <span
                                            v-if="calendar.is_read_only"
                                            class="inline-flex items-center rounded-md bg-amber-100 px-2 py-1 text-xs font-medium text-amber-800 ring-1 ring-inset ring-amber-600/20"
                                        >
                                            Read only
                                        </span>

                                        <span
                                            v-if="selectedCalendarId === calendar.id"
                                            class="inline-flex items-center rounded-md bg-emerald-100 px-2 py-1 text-xs font-medium text-emerald-800 ring-1 ring-inset ring-emerald-600/20"
                                        >
                                            Selected
                                        </span>
                                    </div>

                                    <p class="break-all text-xs text-gray-500">
                                        {{ calendar.id }}
                                    </p>

                                    <p
                                        v-if="calendar.description"
                                        class="text-sm text-gray-600"
                                    >
                                        {{ calendar.description }}
                                    </p>

                                    <p
                                        v-if="calendar.timezone"
                                        class="text-xs text-gray-500"
                                    >
                                        Timezone: {{ calendar.timezone }}
                                    </p>
                                </div>

                                <div class="shrink-0">
                                    <button
                                        v-if="selectedCalendarId !== calendar.id"
                                        type="button"
                                        class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium select-none text-gray-700 transition hover:cursor-pointer hover:bg-gray-50"
                                        @click="selectCalendar(calendar.id)"
                                    >
                                        Select calendar
                                    </button>

                                    <span
                                        v-else
                                        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium select-none text-white"
                                    >
                                        Selected
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </AppLayout>
</template>