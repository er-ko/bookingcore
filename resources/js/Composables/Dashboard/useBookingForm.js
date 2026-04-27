import { inject, ref, watch } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

const FLASH_EVENT_NAME = 'bookingcore:flash'
const FLASH_STORAGE_KEY = 'bookingcore.flash'

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

export function useBookingForm(options = {}) {
    const route = inject('route')
    const translations = options.translations ?? {}

    const units = ref([])
    const activities = ref([])
    const slots = ref([])
    const selectedDate = ref('')

    const loadingUnits = ref(false)
    const loadingActivities = ref(false)
    const loadingSlots = ref(false)

    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content') ?? ''

    const slotMetaDefault = () => ({
        items: [],
        is_empty: true,
    })

    const slotMeta = ref(slotMetaDefault())

    const form = useForm({
        branch_id: '',
        unit_id: '',
        activity_id: '',
        starts_at: '',
        customer: {
            first_name: '',
            last_name: '',
            email: '',
            phone_code: '',
            phone: '',
        },
        note: '',
    })

    function resetUnits() {
        units.value = []
        form.unit_id = ''
    }

    function resetActivities() {
        activities.value = []
        form.activity_id = ''
    }

    function resetSlots() {
        slots.value = []
        slotMeta.value = slotMetaDefault()
        form.starts_at = ''
    }

    async function fetchJson(url) {
        const response = await fetch(url, {
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
        })

        return response.json()
    }

    async function loadUnits(branchId) {
        resetUnits()
        resetActivities()
        resetSlots()

        if (!branchId) {
            return
        }

        loadingUnits.value = true

        try {
            const payload = await fetchJson(
                `${route('api.booking-options.units')}?branch_id=${encodeURIComponent(branchId)}`
            )

            units.value = payload.data ?? []
        } catch (error) {
            console.error('Failed to load units.', error)
            units.value = []
        } finally {
            loadingUnits.value = false
        }
    }

    async function loadActivities(unitId) {
        resetActivities()
        resetSlots()

        if (!unitId) {
            return
        }

        loadingActivities.value = true

        try {
            const payload = await fetchJson(
                `${route('api.booking-options.activities')}?unit_id=${encodeURIComponent(unitId)}`
            )

            activities.value = payload.data ?? []
        } catch (error) {
            console.error('Failed to load activities.', error)
            activities.value = []
        } finally {
            loadingActivities.value = false
        }
    }

    async function loadSlots() {
        resetSlots()

        if (!form.branch_id || !form.unit_id || !form.activity_id || !selectedDate.value) {
            return
        }

        loadingSlots.value = true

        try {
            const query = new URLSearchParams({
                branch_id: String(form.branch_id),
                unit_id: String(form.unit_id),
                activity_id: String(form.activity_id),
                date: selectedDate.value,
            })

            const payload = await fetchJson(
                `${route('api.booking-options.slots')}?${query.toString()}`
            )

            slotMeta.value = payload.data ?? slotMetaDefault()
            slots.value = slotMeta.value.items ?? []
        } catch (error) {
            console.error('Failed to load slots.', error)
            slotMeta.value = slotMetaDefault()
            slots.value = []
        } finally {
            loadingSlots.value = false
        }
    }

    watch(
        () => form.branch_id,
        async (branchId) => {
            selectedDate.value = ''
            await loadUnits(branchId)
        }
    )

    watch(
        () => form.unit_id,
        async (unitId) => {
            selectedDate.value = ''
            await loadActivities(unitId)
        }
    )

    watch(
        [() => form.activity_id, selectedDate],
        async () => {
            await loadSlots()
        }
    )

    async function submit() {
        form.clearErrors()
        form.processing = true

        try {
            const response = await fetch(route('dashboard.store'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(form.data()),
            })

            const payload = await response.json()

            if (!response.ok) {
                if (response.status === 422 && payload.errors) {
                    form.setError(payload.errors)

                    if (payload.message) {
                        dispatchToast(payload.message, 'error', 2500)
                    }

                    return false
                }

                const message = payload?.message ?? translations.messages?.failed ?? 'Failed to create booking.'
                dispatchToast(message, 'error', 2500)
                console.error('Failed to create booking.', payload)
                return false
            }

            dispatchToast(
                payload?.message ?? translations.messages?.created ?? 'Booking created successfully.',
                'success',
                2000
            )

            router.visit(route('dashboard.index'))

            return true
        } catch (error) {
            dispatchToast(translations.messages?.failed ?? 'Failed to create booking.', 'error', 2500)
            console.error('Failed to create booking.', error)
            return false
        } finally {
            form.processing = false
        }
    }

    return {
        form,
        units,
        activities,
        slots,
        slotMeta,
        selectedDate,
        loadingUnits,
        loadingActivities,
        loadingSlots,
        submit,
    }
}
