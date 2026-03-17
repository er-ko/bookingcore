<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import BookingForm from '@/Components/Booking/BookingForm.vue'

const props = defineProps({
    branches: {
        type: Array,
        required: true,
    },
})

const branchesCount = computed(() => props.branches?.length ?? 0)
</script>

<template>
    <Head title="Create Booking" />

    <AppLayout>
        <div class="mx-auto max-w-7xl space-y-6 px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        Create booking
                    </h1>

                    <p class="mt-1 text-sm text-gray-600">
                        Create a new booking by selecting a branch, resource, activity, date, time, and customer details.
                    </p>
                </div>
            </div>

            <BookingForm :branches="branches" />
        </div>
    </AppLayout>
</template>