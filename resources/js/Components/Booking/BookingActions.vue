<script setup>
import { computed, inject, ref } from 'vue'
import { router } from '@inertiajs/vue3'

const route = inject('route')

const { booking, translations } = defineProps({
    booking: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const processing = ref(false)
const errorMessage = ref('')

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute('content') ?? ''

const status = computed(() => booking?.status ?? null)

const canConfirm = computed(() => status.value === 'pending')
const canComplete = computed(() => status.value === 'confirmed')
const canCancel = computed(() => ['pending', 'confirmed'].includes(status.value))

function reloadBookings() {
    router.reload({
        only: ['bookings'],
    })
}

async function sendRequest(url, options = {}) {
    if (processing.value) {
        return false
    }

    processing.value = true
    errorMessage.value = ''

    try {
        const response = await fetch(url, {
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
                ...options.headers,
            },
            ...options,
        })

        const payload = await response.json()

        if (!response.ok) {
            errorMessage.value = payload?.message ?? 'Something went wrong.'
            console.error('Booking action failed.', payload)
            return false
        }

        reloadBookings()

        return true
    } catch (error) {
        errorMessage.value = 'Something went wrong.'
        console.error('Booking action failed.', error)

        return false
    } finally {
        processing.value = false
    }
}

async function updateStatus(nextStatus) {
    await sendRequest(route('api.bookings.status', booking.id), {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            status: nextStatus,
        }),
    })
}

async function cancelBooking() {
    if (processing.value) {
        return
    }

    if (!window.confirm(translations.alerts.cancel_confirmation)) {
        return
    }

    await sendRequest(route('api.bookings.cancel', booking.id), {
        method: 'POST',
    })
}
</script>

<template>
    <div class="flex flex-col items-end gap-2">
        <div class="flex items-center justify-end gap-2">
            <button
                v-if="canConfirm"
                type="button"
                class="select-none rounded-md border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-medium text-nowrap text-blue-700 transition hover:bg-blue-100 hover:cursor-pointer disabled:cursor-not-allowed disabled:opacity-60"
                :disabled="processing"
                @click="updateStatus('confirmed')"
            >
                {{ translations.actions.confirm }}
            </button>

            <button
                v-if="canComplete"
                type="button"
                class="select-none rounded-md border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs font-medium text-nowrap text-emerald-700 transition hover:cursor-pointer hover:bg-emerald-100 disabled:cursor-not-allowed disabled:opacity-60"
                :disabled="processing"
                @click="updateStatus('completed')"
            >
                {{ translations.actions.complete }}
            </button>

            <button
                v-if="canCancel"
                type="button"
                class="select-none rounded-md border border-red-200 bg-red-50 px-3 py-2 text-xs font-medium text-nowrap text-red-700 transition hover:cursor-pointer hover:bg-red-100 disabled:cursor-not-allowed disabled:opacity-60"
                :disabled="processing"
                @click="cancelBooking"
            >
                {{ translations.actions.cancel }}
            </button>
        </div>

        <p
            v-if="errorMessage"
            class="text-xs text-red-600"
        >
            {{ errorMessage }}
        </p>
    </div>
</template>