<script setup>
import { useBookingForm } from '@/Composables/Booking/useBookingForm'

const { branches } = defineProps({
    branches: {
        type: Array,
        required: true,
    },
})

const {
    form,
    resources,
    activities,
    slots,
    slotMeta,
    selectedDate,
    loadingResources,
    loadingActivities,
    loadingSlots,
    submit,
} = useBookingForm()
</script>

<template>
    <form class="space-y-8" @submit.prevent="submit">
        <div class="grid gap-6 md:grid-cols-2">
            <div class="space-y-2">
                <label for="branch_id" class="block text-sm font-medium text-gray-700">
                    Branch
                </label>

                <select
                    id="branch_id"
                    v-model="form.branch_id"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900"
                >
                    <option value="">Select a branch</option>

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
                <label for="resource_id" class="block text-sm font-medium text-gray-700">
                    Resource
                </label>

                <select
                    id="resource_id"
                    v-model="form.resource_id"
                    :disabled="!form.branch_id || loadingResources"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 disabled:cursor-not-allowed disabled:bg-gray-100"
                >
                    <option value="">
                        {{ loadingResources ? 'Loading resources...' : 'Select a resource' }}
                    </option>

                    <option
                        v-for="resource in resources"
                        :key="resource.id"
                        :value="resource.id"
                    >
                        {{ resource.name }}
                    </option>
                </select>

                <p v-if="form.errors.resource_id" class="text-sm text-red-600">
                    {{ form.errors.resource_id }}
                </p>
            </div>

            <div class="space-y-2">
                <label for="activity_id" class="block text-sm font-medium text-gray-700">
                    Activity
                </label>

                <select
                    id="activity_id"
                    v-model="form.activity_id"
                    :disabled="!form.resource_id || loadingActivities"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 disabled:cursor-not-allowed disabled:bg-gray-100"
                >
                    <option value="">
                        {{ loadingActivities ? 'Loading activities...' : 'Select an activity' }}
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
                    Date
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
                        Available slot
                    </label>

                    <span
                        v-if="selectedDate && !loadingSlots && !slotMeta.is_empty"
                        class="text-xs text-gray-500"
                    >
                        {{ slotMeta.remaining_count }} slot(s) available
                    </span>
                </div>

                <select
                    id="starts_at"
                    v-model="form.starts_at"
                    :disabled="!selectedDate || loadingSlots"
                    class="block w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 disabled:cursor-not-allowed disabled:bg-gray-100"
                >
                    <option value="">
                        {{ loadingSlots ? 'Loading slots...' : 'Select a slot' }}
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
                    v-if="selectedDate && !loadingSlots && slotMeta.is_empty"
                    class="text-sm text-gray-500"
                >
                    No available slots were found for the selected date.
                </p>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-semibold text-gray-900">
                    Customer details
                </h3>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="space-y-2">
                    <label for="customer_first_name" class="block text-sm font-medium text-gray-700">
                        First name
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
                        Last name
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

                <div class="space-y-2">
                    <label for="customer_email" class="block text-sm font-medium text-gray-700">
                        Email
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

                <div class="grid gap-4 md:grid-cols-[120px_minmax(0,1fr)]">
                    <div class="space-y-2">
                        <label for="customer_phone_code" class="block text-sm font-medium text-gray-700">
                            Code
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
                            Phone
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

        <div class="space-y-2">
            <label for="note" class="block text-sm font-medium text-gray-700">
                Note
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

        <div class="flex items-center justify-end gap-3 border-t border-gray-200 pt-6">
            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-800 disabled:cursor-not-allowed disabled:opacity-60"
                :disabled="form.processing"
            >
                <span v-if="form.processing">Creating...</span>
                <span v-else>Create booking</span>
            </button>
        </div>
    </form>
</template>