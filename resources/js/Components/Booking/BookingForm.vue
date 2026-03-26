<script setup>
import { computed, inject } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useBookingForm } from '@/Composables/Booking/useBookingForm'

const route = inject('route')

const { branches } = defineProps({
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
    slotMeta,
    selectedDate,
    loadingUntis,
    loadingActivities,
    loadingSlots,
    submit,
} = useBookingForm()

const availableSlotsCount = computed(() => slots.value?.length ?? 0)
const hasAvailableSlots = computed(() => availableSlotsCount.value > 0)
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
                    {{ translations.form.booking_details }}
                </h2>

                <span class="text-xs text-gray-500">
                    {{ translations.form.complete_the_reservation }}
                </span>
            </div>
        </div>

        <div class="space-y-6 px-6 py-6">

            <div class="space-y-6 pb-6">
                <div class="grid gap-3 md:gap-6 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="customer_first_name" class="block text-sm font-medium text-gray-700">
                            {{ translations.form.first_name_title }}
                        </label>

                        <input
                            id="customer_first_name"
                            v-model="form.customer.first_name"
                            type="text"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                        >

                        <p v-if="form.errors['customer.first_name']" class="text-sm text-red-600">
                            {{ form.errors['customer.first_name'] }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="customer_last_name" class="block text-sm font-medium text-gray-700">
                            {{ translations.form.last_name_title }}
                        </label>

                        <input
                            id="customer_last_name"
                            v-model="form.customer.last_name"
                            type="text"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                        >

                        <p v-if="form.errors['customer.last_name']" class="text-sm text-red-600">
                            {{ form.errors['customer.last_name'] }}
                        </p>
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="customer_email" class="block text-sm font-medium text-gray-700">
                            {{ translations.form.email_title }}
                        </label>

                        <input
                            id="customer_email"
                            v-model="form.customer.email"
                            type="email"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                        >

                        <p v-if="form.errors['customer.email']" class="text-sm text-red-600">
                            {{ form.errors['customer.email'] }}
                        </p>
                    </div>

                    <div class="grid gap-3 md:grid-cols-[100px_minmax(0,1fr)]">
                        <div class="space-y-2">
                            <label for="customer_phone_code" class="block text-sm font-medium text-gray-700">
                                {{ translations.form.phone_code_title }}
                            </label>

                            <input
                                id="customer_phone_code"
                                v-model="form.customer.phone_code"
                                type="text"
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                                placeholder="+420"
                            >

                            <p v-if="form.errors['customer.phone_code']" class="text-sm text-red-600">
                                {{ form.errors['customer.phone_code'] }}
                            </p>
                        </div>

                        <div class="space-y-2">
                            <label for="customer_phone" class="block text-sm font-medium text-gray-700">
                                {{ translations.form.phone_title }}
                            </label>

                            <input
                                id="customer_phone"
                                v-model="form.customer.phone"
                                type="text"
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                            >

                            <p v-if="form.errors['customer.phone']" class="text-sm text-red-600">
                                {{ form.errors['customer.phone'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6 border-t border-gray-200 pt-8">
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="branch_id" class="block text-sm font-medium text-gray-700">
                            {{ translations.form.branch_title }}
                        </label>

                        <select
                            id="branch_id"
                            v-model="form.branch_id"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
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

                        <p v-if="form.errors.branch_id" class="text-sm text-red-600">
                            {{ form.errors.branch_id }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="unit_id" class="block text-sm font-medium text-gray-700">
                            {{ translations.form.unit_title }}
                        </label>

                        <select
                            id="unit_id"
                            v-model="form.unit_id"
                            :disabled="!form.branch_id || loadingUnits"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 disabled:cursor-not-allowed disabled:bg-gray-100"
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

                        <p v-if="form.errors.unit_id" class="text-sm text-red-600">
                            {{ form.errors.unit_id }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="activity_id" class="block text-sm font-medium text-gray-700">
                            {{ translations.form.activity_title }}
                        </label>

                        <select
                            id="activity_id"
                            v-model="form.activity_id"
                            :disabled="!form.unit_id || loadingActivities"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 disabled:cursor-not-allowed disabled:bg-gray-100"
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

                        <p v-if="form.errors.activity_id" class="text-sm text-red-600">
                            {{ form.errors.activity_id }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        <label for="booking_date" class="block text-sm font-medium text-gray-700">
                            {{ translations.form.date_title }}
                        </label>

                        <input
                            id="booking_date"
                            v-model="selectedDate"
                            type="date"
                            :disabled="!form.activity_id"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 disabled:cursor-not-allowed disabled:bg-gray-100"
                        >
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <div class="flex items-center justify-between gap-3">
                            <label for="starts_at" class="block text-sm font-medium text-gray-700">
                                {{ translations.form.available_slots_title }}
                            </label>

                            <span
                                v-if="selectedDate && !loadingSlots && hasAvailableSlots"
                                class="text-xs text-gray-500"
                            >
                                {{ availableSlotsCount }} {{ translations.form.available_slots_count }}
                            </span>
                        </div>

                        <select
                            id="starts_at"
                            v-model="form.starts_at"
                            :disabled="!selectedDate || loadingSlots"
                            class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 disabled:cursor-not-allowed disabled:bg-gray-100"
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

                        <p v-if="form.errors.starts_at" class="text-sm text-red-600">
                            {{ form.errors.starts_at }}
                        </p>

                        <p
                            v-if="selectedDate && !loadingSlots && !hasAvailableSlots"
                            class="text-sm text-gray-500"
                        >
                            {{ translations.form.no_available_slots }}
                        </p>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="note" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.note_title }}
                    </label>

                    <textarea
                        id="note"
                        v-model="form.note"
                        rows="4"
                        class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                    />

                    <p v-if="form.errors.note" class="text-sm text-red-600">
                        {{ form.errors.note }}
                    </p>
                </div>

            </div>

            <div class="flex items-center justify-end gap-3 border-t border-gray-200 pt-6">
                <Link
                    :href="route('bookings.index')"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-nowrap select-none text-gray-700 transition hover:bg-gray-50"
                >
                    {{ translations.actions.cancel }}
                </Link>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium select-none text-white transition hover:bg-gray-800 disabled:cursor-not-allowed disabled:opacity-60"
                    :disabled="form.processing"
                >
                    <span v-if="form.processing">{{ translations.actions.creating }}</span>
                    <span v-else>{{ translations.actions.create }}</span>
                </button>
            </div>

        </div>
    </form>
</template>