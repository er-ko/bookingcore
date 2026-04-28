<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import BookingForm from '@/Components/PublicBooking/BookingForm.vue'
import BookingSummary from '@/Components/PublicBooking/BookingSummary.vue'
import { usePublicBooking } from '@/Composables/PublicBooking/usePublicBooking'
import { usePublicBookingForm } from '@/Composables/PublicBooking/usePublicBookingForm'

const props = defineProps({
    identity: {
        type: Object,
        required: true,
    },
    branches: {
        type: Array,
        default: () => [],
    },
    translations: {
        type: Object,
        required: true,
    },
})

const pageTitle = computed(() => {
    return props.identity?.brand_name
        ? `${props.identity.brand_name} — ${props.translations.title}`
        : props.translations.title
})

const {
    copyState,
    homeUrl,
    isDark,
    pageName,
    publicPageDisplay,
    copyPublicPageUrl,
    toggleTheme,
} = usePublicBooking({
    identity: props.identity,
})

const {
    canSubmit,
    completedCount,
    customerCount,
    form,
    units,
    activities,
    slots,
    slotMeta,
    slotValue,
    slotLabel,
    selectedDate,
    setSelectedDate,
    loadingUnits,
    loadingActivities,
    loadingSlots,
    selectionCount,
    submit,
} = usePublicBookingForm({
    slug: props.identity.slug,
    translations: props.translations,
})

const handleSubmit = () => {
    submit()
}

const formatBranchLocation = (branch) => {
    const parts = [
        branch.address_line_1,
        branch.address_line_2,
        branch.city,
        branch.postcode,
    ].filter(Boolean)

    return parts.join(', ')
}

const inputClass = (field) => [
    'block w-full rounded-2xl border bg-white/65 px-4 py-3 text-sm text-black transition-all duration-200 placeholder:text-black/30 focus:outline-none dark:bg-white/[0.03] dark:text-white dark:placeholder:text-white/30',
    form.errors[field]
        ? 'border-red-500/50 focus:border-red-500 dark:border-red-400/50 dark:focus:border-red-400'
        : 'border-black/10 focus:border-black/30 dark:border-white/10 dark:focus:border-white/30',
]

const nestedInputClass = (parent, field) => [
    'block w-full rounded-2xl border bg-white/65 px-4 py-3 text-sm text-black transition-all duration-200 placeholder:text-black/30 focus:outline-none dark:bg-white/[0.03] dark:text-white dark:placeholder:text-white/30',
    form.errors?.[`${parent}.${field}`]
        ? 'border-red-500/50 focus:border-red-500 dark:border-red-400/50 dark:focus:border-red-400'
        : 'border-black/10 focus:border-black/30 dark:border-white/10 dark:focus:border-white/30',
]

const clearFieldError = (field) => {
    form.clearErrors(field)
}

const clearNestedFieldError = (parent, field) => {
    form.clearErrors(`${parent}.${field}`)
}

const selectedBranch = computed(() => {
    return props.branches.find((branch) => String(branch.id) === String(form.branch_id)) ?? null
})

const selectedUnit = computed(() => {
    return units.value.find((unit) => String(unit.id) === String(form.unit_id)) ?? null
})

const selectedActivity = computed(() => {
    return activities.value.find((activity) => String(activity.id) === String(form.activity_id)) ?? null
})

const selectedSlot = computed(() => {
    return slots.value.find((slot) => slotValue(slot) === form.starts_at) ?? null
})

const customerFullName = computed(() => {
    const parts = [
        form.customer.first_name?.trim(),
        form.customer.last_name?.trim(),
    ].filter(Boolean)

    return parts.length ? parts.join(' ') : null
})

const customerPhone = computed(() => {
    const code = form.customer.phone_code?.trim()
    const phone = form.customer.phone?.trim()

    if (!code && !phone) {
        return null
    }

    return [code, phone].filter(Boolean).join(' ')
})

const compactSummary = computed(() => {
    return {
        branch_name: selectedBranch.value?.name ?? null,
        branch_address: selectedBranch.value ? formatBranchLocation(selectedBranch.value) : null,
        unit_name: selectedUnit.value?.name ?? null,
        activity_name: selectedActivity.value?.name ?? null,
        date: selectedDate.value || null,
        time: selectedSlot.value?.label ?? form.starts_at ?? null,
        customer_name: customerFullName.value,
        customer_email: form.customer.email?.trim() || null,
        customer_phone: customerPhone.value,
        note: form.note?.trim() || null,
    }
})

const branchStatusText = computed(() => {
    if (props.branches.length === 0) {
        return props.translations.states.no_branches_text
    }

    if (form.branch_id && !loadingUnits.value && units.value.length === 0) {
        return props.translations.states.no_units_text
    }

    return props.translations.states.branch_default
})

const serviceStatusText = computed(() => {
    if (form.unit_id && !loadingActivities.value && activities.value.length === 0) {
        return props.translations.states.no_activities_text
    }

    return props.translations.states.service_default
})

const scheduleStatusText = computed(() => {
    if (selectedDate.value && form.activity_id && !loadingSlots.value && slotMeta.value.is_empty) {
        return props.translations.states.no_slots_text
    }

    if (loadingSlots.value) {
        return props.translations.states.schedule_loading
    }

    return props.translations.states.schedule_default
})

const completedBadgeClass = computed(() => {
    if (completedCount.value === 3) {
        return 'border-emerald-500/20 bg-emerald-500/10 text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300'
    }

    if (completedCount.value === 2) {
        return 'border-amber-500/20 bg-amber-500/10 text-amber-700 dark:border-amber-400/20 dark:bg-amber-400/10 dark:text-amber-300'
    }

    if (completedCount.value === 1) {
        return 'border-red-500/20 bg-red-500/10 text-red-700 dark:border-red-400/20 dark:bg-red-400/10 dark:text-red-300'
    }

    return 'border-black/10 text-black/70 dark:border-white/10 dark:text-white/70'
})

const copyrightYear = new Date().getFullYear()
</script>

<template>
    <Head :title="pageTitle" />

    <div class="relative min-h-screen overflow-hidden bg-stone-50 text-black transition-colors duration-300 dark:bg-neutral-950 dark:text-white">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-black/10 to-transparent dark:via-white/10" />
            <div class="absolute -left-32 -top-24 h-64 w-64 rounded-full bg-black/3 blur-3xl dark:bg-white/4" />
            <div class="absolute -right-40 top-[20%] h-72 w-72 rounded-full bg-black/2.5 blur-3xl dark:bg-white/[0.035]" />
            <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(0,0,0,0.03)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,0.03)_1px,transparent_1px)] bg-size-[40px_40px] dark:bg-[linear-gradient(to_right,rgba(255,255,255,0.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.04)_1px,transparent_1px)]" />
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.75),transparent_45%)] dark:bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.05),transparent_40%)]" />
        </div>

        <div class="relative mx-auto max-w-6xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-12">
            <div class="space-y-12">
                <div class="mx-auto max-w-4xl py-4 text-center">
                    <h1 class="font-serif text-5xl font-semibold leading-[0.95] tracking-[-0.07em] text-black dark:text-white sm:text-7xl">
                        {{ pageName }}
                    </h1>
                </div>

                <section class="grid gap-6 xl:grid-cols-[1.12fr_0.88fr]">
                    <BookingForm
                        :translations="translations"
                        :branches="branches"
                        :form="form"
                        :units="units"
                        :activities="activities"
                        :slots="slots"
                        :selected-date="selectedDate"
                        :loading-units="loadingUnits"
                        :loading-activities="loadingActivities"
                        :loading-slots="loadingSlots"
                        :can-submit="canSubmit"
                        :completed-count="completedCount"
                        :completed-badge-class="completedBadgeClass"
                        :input-class="inputClass"
                        :nested-input-class="nestedInputClass"
                        :clear-field-error="clearFieldError"
                        :clear-nested-field-error="clearNestedFieldError"
                        :slot-value="slotValue"
                        :slot-label="slotLabel"
                        @update:selected-date="setSelectedDate"
                        @submit="handleSubmit"
                    />

                    <BookingSummary
                        :translations="translations"
                        :compact-summary="compactSummary"
                        :selection-count="selectionCount"
                        :customer-count="customerCount"
                        :branch-status-text="branchStatusText"
                        :service-status-text="serviceStatusText"
                        :schedule-status-text="scheduleStatusText"
                    />
                </section>

                <div class="relative border-t border-black/8 py-5 dark:border-white/10">
                    <div class="flex flex-col gap-3 space-y-2 text-xs select-none text-black/45 dark:text-white/45 sm:flex-row sm:items-center sm:justify-between sm:space-y-0">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
                            <a
                                :href="homeUrl"
                                class="font-semibold tracking-[0.24em] text-black/65 transition hover:text-black dark:text-white/65 dark:hover:text-white"
                            >
                                BOOKINGCORE
                            </a>

                            <span class="hidden h-1 w-1 rounded-full bg-black/20 dark:bg-white/20 sm:block" />

                            <span class="max-w-[16rem] truncate sm:max-w-none">
                                {{ publicPageDisplay }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between gap-3 sm:justify-end">
                            <div class="text-black/35 dark:text-white/35">
                                &copy; {{ copyrightYear }} bookingcore.link
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="text-black/35 dark:text-white/35">
                                    Theme
                                </div>

                                <button
                                    type="button"
                                    class="inline-flex items-center rounded-full border border-black/10 bg-white/70 px-3 py-1.5 text-black/55 transition-all duration-300 ease-in-out hover:cursor-pointer hover:border-black/25 hover:text-black dark:border-white/10 dark:bg-white/4 dark:text-white/55 dark:hover:border-white/25 dark:hover:text-white"
                                    @click="toggleTheme"
                                >
                                    <svg
                                        v-if="isDark"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="15"
                                        height="15"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <circle cx="12" cy="12" r="4" />
                                        <path d="M12 2v2" />
                                        <path d="M12 20v2" />
                                        <path d="m4.93 4.93 1.41 1.41" />
                                        <path d="m17.66 17.66 1.41 1.41" />
                                        <path d="M2 12h2" />
                                        <path d="M20 12h2" />
                                        <path d="m6.34 17.66-1.41 1.41" />
                                        <path d="m19.07 4.93-1.41 1.41" />
                                    </svg>

                                    <svg
                                        v-else
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="15"
                                        height="15"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path d="M20.985 12.486a9 9 0 1 1-9.473-9.472c.405-.022.617.46.402.803a6 6 0 0 0 8.268 8.268c.344-.215.825-.004.803.401" />
                                    </svg>
                                </button>

                                <button
                                    type="button"
                                    class="inline-flex items-center rounded-full border border-black/10 bg-white/70 px-3 py-1.5 text-black/55 transition-all duration-300 ease-in-out hover:cursor-pointer hover:border-black/25 hover:text-black dark:border-white/10 dark:bg-white/4 dark:text-white/55 dark:hover:border-white/25 dark:hover:text-white"
                                    @click="copyPublicPageUrl"
                                >
                                    {{ copyState === 'copied' ? 'Copied' : copyState === 'error' ? 'Unavailable' : 'Copy URL' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>