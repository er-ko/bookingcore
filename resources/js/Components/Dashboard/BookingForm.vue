<script setup>
import { computed, inject } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useBookingForm } from '@/Composables/Dashboard/useBookingForm'

const route = inject('route')

const { branches, translations } = defineProps({
    branches: {
        type: Array,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const {
    form,
    units,
    activities,
    slots,
    selectedDate,
    loadingUnits,
    loadingActivities,
    loadingSlots,
    submit,
} = useBookingForm({
    translations,
})

const availableSlotsCount = computed(() => slots.value?.length ?? 0)
const hasAvailableSlots = computed(() => availableSlotsCount.value > 0)

const fieldClass = [
    'block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm select-none text-black transition-all duration-150 placeholder:text-black/30 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:placeholder:text-white/30 dark:focus:border-white/30 disabled:cursor-not-allowed disabled:bg-black/[0.03] dark:disabled:bg-white/[0.03]',
]

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
                    {{ translations.form.booking_details }}
                </h2>

                <span class="text-xs text-black/35 dark:text-white/35">
                    {{ translations.form.complete_the_reservation }}
                </span>
            </div>
        </div>

        <div class="space-y-8 px-6 py-6">
            <div class="space-y-6">
                <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                    <div class="space-y-2">
                        <label for="customer_first_name" :class="labelClass">
                            {{ translations.form.first_name_title }}
                        </label>

                        <input
                            id="customer_first_name"
                            v-model="form.customer.first_name"
                            type="text"
                            :class="fieldClass"
                        >

                        <p v-if="form.errors['customer.first_name']" :class="errorClass">
                            {{ form.errors['customer.first_name'] }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="customer_last_name" :class="labelClass">
                            {{ translations.form.last_name_title }}
                        </label>

                        <input
                            id="customer_last_name"
                            v-model="form.customer.last_name"
                            type="text"
                            :class="fieldClass"
                        >

                        <p v-if="form.errors['customer.last_name']" :class="errorClass">
                            {{ form.errors['customer.last_name'] }}
                        </p>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                    <div class="space-y-2">
                        <label for="customer_email" :class="labelClass">
                            {{ translations.form.email_title }}
                        </label>

                        <input
                            id="customer_email"
                            v-model="form.customer.email"
                            type="email"
                            :class="fieldClass"
                        >

                        <p v-if="form.errors['customer.email']" :class="errorClass">
                            {{ form.errors['customer.email'] }}
                        </p>
                    </div>

                    <div class="grid gap-4 md:grid-cols-[100px_minmax(0,1fr)]">
                        <div class="space-y-2">
                            <label for="customer_phone_code" :class="labelClass">
                                {{ translations.form.phone_code_title }}
                            </label>

                            <input
                                id="customer_phone_code"
                                v-model="form.customer.phone_code"
                                type="text"
                                placeholder="+420"
                                :class="fieldClass"
                            >

                            <p v-if="form.errors['customer.phone_code']" :class="errorClass">
                                {{ form.errors['customer.phone_code'] }}
                            </p>
                        </div>

                        <div class="space-y-2">
                            <label for="customer_phone" :class="labelClass">
                                {{ translations.form.phone_title }}
                            </label>

                            <input
                                id="customer_phone"
                                v-model="form.customer.phone"
                                type="text"
                                :class="fieldClass"
                            >

                            <p v-if="form.errors['customer.phone']" :class="errorClass">
                                {{ form.errors['customer.phone'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6 border-t border-black/10 pt-8 dark:border-white/10">
                <div class="grid gap-4 md:grid-cols-2 md:gap-6">
                    <div class="space-y-2">
                        <label for="branch_id" :class="labelClass">
                            {{ translations.form.branch_title }}
                        </label>

                        <select
                            id="branch_id"
                            v-model="form.branch_id"
                            :class="fieldClass"
                        >
                            <option value="">{{ translations.form.select_branch }}</option>

                            <option
                                v-for="branch in branches"
                                :key="branch.id"
                                :value="branch.id"
                            >
                                {{ branch.name }}
                            </option>
                        </select>

                        <p v-if="form.errors.branch_id" :class="errorClass">
                            {{ form.errors.branch_id }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="unit_id" :class="labelClass">
                            {{ translations.form.unit_title }}
                        </label>

                        <select
                            id="unit_id"
                            v-model="form.unit_id"
                            :disabled="!form.branch_id || loadingUnits"
                            :class="fieldClass"
                        >
                            <option value="">
                                {{ loadingUnits ? translations.form.loading_units : translations.form.select_unit }}
                            </option>

                            <option
                                v-for="unit in units"
                                :key="unit.id"
                                :value="unit.id"
                            >
                                {{ unit.name }}
                            </option>
                        </select>

                        <p v-if="form.errors.unit_id" :class="errorClass">
                            {{ form.errors.unit_id }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="activity_id" :class="labelClass">
                            {{ translations.form.activity_title }}
                        </label>

                        <select
                            id="activity_id"
                            v-model="form.activity_id"
                            :disabled="!form.unit_id || loadingActivities"
                            :class="fieldClass"
                        >
                            <option value="">
                                {{ loadingActivities ? translations.form.loading_activities : translations.form.select_activity }}
                            </option>

                            <option
                                v-for="activity in activities"
                                :key="activity.id"
                                :value="activity.id"
                            >
                                {{ activity.name }}
                            </option>
                        </select>

                        <p v-if="form.errors.activity_id" :class="errorClass">
                            {{ form.errors.activity_id }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="booking_date" :class="labelClass">
                            {{ translations.form.date_title }}
                        </label>

                        <input
                            id="booking_date"
                            v-model="selectedDate"
                            type="date"
                            :disabled="!form.activity_id"
                            :class="fieldClass"
                        >
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <div class="flex items-center justify-between gap-3">
                            <label for="starts_at" :class="labelClass">
                                {{ translations.form.available_slots_title }}
                            </label>

                            <span
                                v-if="selectedDate && !loadingSlots && hasAvailableSlots"
                                class="text-xs text-black/35 dark:text-white/35"
                            >
                                {{ availableSlotsCount }} {{ translations.form.available_slots_count }}
                            </span>
                        </div>

                        <select
                            id="starts_at"
                            v-model="form.starts_at"
                            :disabled="!selectedDate || loadingSlots"
                            :class="fieldClass"
                        >
                            <option value="">
                                {{ loadingSlots ? translations.form.loading_slots : translations.form.select_slot }}
                            </option>

                            <option
                                v-for="slot in slots"
                                :key="slot.start"
                                :value="slot.start"
                            >
                                {{ slot.label }}
                            </option>
                        </select>

                        <p v-if="form.errors.starts_at" :class="errorClass">
                            {{ form.errors.starts_at }}
                        </p>

                        <p
                            v-if="selectedDate && !loadingSlots && !hasAvailableSlots"
                            class="text-sm text-black/45 dark:text-white/45"
                        >
                            {{ translations.form.no_available_slots }}
                        </p>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="note" :class="labelClass">
                        {{ translations.form.note_title }}
                    </label>

                    <textarea
                        id="note"
                        v-model="form.note"
                        rows="4"
                        :class="fieldClass"
                    />

                    <p v-if="form.errors.note" :class="errorClass">
                        {{ form.errors.note }}
                    </p>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-black/10 pt-6 dark:border-white/10 sm:flex-row sm:items-center sm:justify-end">
                <Link
                    :href="route('dashboard.index')"
                    class="inline-flex items-center justify-center rounded-full border border-dashed border-black/15 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/65 transition hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/65 dark:hover:border-white/35 dark:hover:text-white"
                >
                    {{ translations.actions.cancel }}
                </Link>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-full border border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/80 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/80 dark:hover:border-white/45 dark:hover:text-white disabled:cursor-not-allowed disabled:opacity-45"
                    :disabled="form.processing"
                >
                    <span v-if="form.processing">
                        {{ translations.actions.creating }}
                    </span>

                    <span v-else>
                        {{ translations.actions.create }}
                    </span>
                </button>
            </div>
        </div>
    </form>
</template>
