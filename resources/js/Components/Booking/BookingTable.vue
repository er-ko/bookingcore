<script setup>
import BookingStatusBadge from '@/Components/Booking/BookingStatusBadge.vue'
import BookingActions from '@/Components/Booking/BookingActions.vue'

const props = defineProps({
    bookings: {
        type: Array,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

function customerName(booking) {
    const first = booking.customer?.first_name
    const last = booking.customer?.last_name

    return [first, last].filter(Boolean).join(' ') || '—'
}
</script>

<template>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.customer }}
                    </th>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.branch }}
                    </th>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.unit }}
                    </th>
                    <th class="px-6 py-4 text-start text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.activity }}
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.starts_at }}
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.ends_at }}
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.status }}
                    </th>
                    <th class="px-6 py-4 text-end text-xs font-semibold uppercase tracking-wide text-gray-500">
                        {{ translations.table.actions }}
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                <tr
                    v-for="booking in bookings"
                    :key="booking.id"
                    class="hover:bg-gray-50"
                >
                    <td class="w-full px-6 py-4 text-sm text-gray-900">
                        <div class="font-medium">
                            {{ customerName(booking) }}
                        </div>

                        <div class="text-xs text-gray-500">
                            {{ booking.customer?.email ?? '—' }}
                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm text-nowrap text-gray-700">
                        {{ booking.branch?.name ?? '—' }}
                    </td>

                    <td class="px-6 py-4 text-sm text-nowrap text-gray-700">
                        {{ booking.unit?.name ?? '—' }}
                    </td>

                    <td class="px-6 py-4 text-sm text-nowrap text-gray-700">
                        {{ booking.activity?.name ?? '—' }}
                    </td>

                    <td class="px-6 py-4 min-w-[130px] text-center text-sm text-gray-700">
                        {{ booking.starts_at }}
                    </td>

                    <td class="px-6 py-4 min-w-[130px] text-center text-sm text-gray-700">
                        {{ booking.ends_at }}
                    </td>

                    <td class="px-6 py-4 text-center text-sm">
                        <BookingStatusBadge :status="booking.status" :translations="translations" />
                    </td>

                    <td class="px-6 py-4 text-end text-sm">
                        <BookingActions :booking="booking" :translations="translations" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>