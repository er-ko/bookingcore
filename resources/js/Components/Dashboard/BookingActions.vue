<script setup>
import { computed, inject, ref } from 'vue'
import { router } from '@inertiajs/vue3'

const FLASH_EVENT_NAME = 'bookingcore:flash'
const FLASH_STORAGE_KEY = 'bookingcore.flash'

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

const dispatchToast = (message, type = 'success', duration = 2000) => {
    const expiresAt = Date.now() + duration

    sessionStorage.setItem(FLASH_STORAGE_KEY, JSON.stringify({
        message,
        type,
        expiresAt,
    }))

    window.dispatchEvent(new CustomEvent(FLASH_EVENT_NAME, {
        detail: {
            message,
            type,
            duration,
        },
    }))
}

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

    const { headers: customHeaders = {}, ...restOptions } = options

    try {
        const response = await fetch(url, {
            credentials: 'same-origin',
            ...restOptions,
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
                ...customHeaders,
            },
        })

        let payload = null

        try {
            payload = await response.json()
        } catch {
            payload = null
        }

        if (!response.ok) {
            const message = payload?.message ?? 'Something went wrong.'

            errorMessage.value = message
            dispatchToast(message, 'error', 2500)

            console.error('Booking action failed.', {
                status: response.status,
                payload,
                url,
            })

            return false
        }

        dispatchToast(
            payload?.message ?? translations.messages?.updated ?? 'Booking updated successfully.',
            'success',
            2000
        )

        reloadBookings()
        return true
    } catch (error) {
        const message = 'Something went wrong.'

        errorMessage.value = message
        dispatchToast(message, 'error', 2500)

        console.error('Booking action failed.', error)
        return false
    } finally {
        processing.value = false
    }
}

async function updateStatus(nextStatus) {
    await sendRequest(route('dashboard.status', booking.id), {
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

    await sendRequest(route('dashboard.cancel', booking.id), {
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
                class="inline-flex items-center rounded-full border border-blue-500/20 bg-blue-500/10 px-3 py-2 text-xs font-medium text-nowrap select-none text-blue-700 dark:border-blue-400/20 dark:bg-blue-400/10 dark:text-blue-300 hover:cursor-pointer disabled:cursor-not-allowed disabled:opacity-60"
                :disabled="processing"
                @click="updateStatus('confirmed')"
            >
                {{ translations.actions.confirm }}
            </button>

            <button
                v-if="canComplete"
                type="button"
                class="inline-flex items-center rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-2 text-xs font-medium text-nowrap select-none text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300 hover:cursor-pointer disabled:cursor-not-allowed disabled:opacity-60"
                :disabled="processing"
                @click="updateStatus('completed')"
            >
                {{ translations.actions.complete }}
            </button>

            <button
                v-if="canCancel"
                type="button"
                class="inline-flex items-center rounded-full border border-red-500/20 bg-red-500/10 px-3 py-2 text-xs font-medium text-nowrap select-none text-red-700 dark:border-red-400/20 dark:bg-red-400/10 dark:text-red-300 hover:cursor-pointer disabled:cursor-not-allowed disabled:opacity-60"
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