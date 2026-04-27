<script setup>
import BookingStatusBadge from '@/Components/Dashboard/BookingStatusBadge.vue'
import BookingActions from '@/Components/Dashboard/BookingActions.vue'

defineProps({
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
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="border-b border-black/10 dark:border-white/10">
                    <th class="w-full px-6 py-4 text-start text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.customer }}
                    </th>

                    <th class="px-6 py-4 text-start text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.branch }}
                    </th>

                    <th class="px-6 py-4 text-start text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.unit }}
                    </th>

                    <th class="px-6 py-4 text-start text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.activity }}
                    </th>

                    <th class="min-w-[130px] px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.starts_at }}
                    </th>

                    <th class="min-w-[130px] px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.ends_at }}
                    </th>

                    <th class="px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.status }}
                    </th>

                    <th class="px-6 py-4 text-end text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.actions }}
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="booking in bookings"
                    :key="booking.id"
                    class="border-b border-black/6 transition-colors duration-150 last:border-b-0 hover:bg-black/[0.025] dark:border-white/8 dark:hover:bg-white/[0.045]"
                >
                    <td class="w-full px-6 py-5 align-middle">
                        <div class="text-sm font-medium text-black dark:text-white">
                            {{ customerName(booking) }}
                        </div>

                        <div class="mt-1 text-xs text-black/45 dark:text-white/45">
                            {{ booking.customer?.email ?? '—' }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle">
                        <div class="text-sm text-nowrap text-black/65 dark:text-white/65">
                            {{ booking.branch?.name ?? '—' }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle">
                        <div class="text-sm text-nowrap text-black/65 dark:text-white/65">
                            {{ booking.unit?.name ?? '—' }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle">
                        <div class="text-sm text-nowrap text-black/65 dark:text-white/65">
                            {{ booking.activity?.name ?? '—' }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle text-center">
                        <div class="text-sm text-black/65 dark:text-white/65">
                            {{ booking.starts_at }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle text-center">
                        <div class="text-sm text-black/65 dark:text-white/65">
                            {{ booking.ends_at }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle text-center">
                        <BookingStatusBadge
                            :status="booking.status"
                            :translations="translations"
                        />
                    </td>

                    <td class="px-6 py-5 align-middle text-end">
                        <BookingActions
                            :booking="booking"
                            :translations="translations"
                        />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>