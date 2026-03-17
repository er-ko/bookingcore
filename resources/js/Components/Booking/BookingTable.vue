<script setup>
import BookingStatusBadge from '@/Components/Booking/BookingStatusBadge.vue'
import BookingActions from '@/Components/Booking/BookingActions.vue'

const props = defineProps({
    bookings: {
        type: Array,
        required: true,
    },
})

function customerName(booking) {
    const first = booking.customer?.first_name
    const last = booking.customer?.last_name

    return [first, last].filter(Boolean).join(' ') || '—'
}

function formatDate(value) {
    if (!value) return '—'

    return new Date(value).toLocaleString()
}
</script>

<template>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Customer
                    </th>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Activity
                    </th>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Resource
                    </th>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Branch
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Starts at
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Ends at
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Status
                    </th>
                    <th class="px-6 py-4 text-end text-xs font-semibold uppercase tracking-wide text-gray-500">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                <tr
                    v-for="booking in bookings"
                    :key="booking.id"
                    class="hover:bg-gray-50"
                >
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <div class="font-medium">
                            {{ customerName(booking) }}
                        </div>

                        <div class="text-gray-500">
                            {{ booking.customer?.email ?? '—' }}
                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ booking.activity?.name ?? '—' }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ booking.resource?.name ?? '—' }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ booking.branch?.name ?? '—' }}
                    </td>

                    <td class="px-6 py-4 text-center text-sm text-gray-700">
                        {{ formatDate(booking.starts_at) }}
                    </td>

                    <td class="px-6 py-4 text-center text-sm text-gray-700">
                        {{ formatDate(booking.ends_at) }}
                    </td>

                    <td class="px-6 py-4 text-center text-sm">
                        <BookingStatusBadge :status="booking.status" />
                    </td>

                    <td class="px-6 py-4 text-end text-sm">
                        <BookingActions :booking="booking" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>