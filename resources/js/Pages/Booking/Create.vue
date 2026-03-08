<script setup>
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import BookingForm from '@/Components/Booking/BookingForm.vue'

const { branches } = defineProps({
    branches: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <Head title="Create Booking" />

    <AppLayout>
        <div class="mx-auto max-w-4xl space-y-6 px-4 py-6 sm:px-6 lg:px-8">
            <div class="space-y-1">
                <h1 class="text-2xl font-semibold text-gray-900">
                    Create booking
                </h1>

                <p class="text-sm text-gray-600">
                    Create a new booking by selecting a branch, resource, activity, date, and customer details.
                </p>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-sm font-semibold text-gray-900">
                        Booking details
                    </h2>
                </div>

                <div class="px-6 py-6">
                    <BookingForm :branches="branches" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>