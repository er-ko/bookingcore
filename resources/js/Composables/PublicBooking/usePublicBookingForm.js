import { computed, inject, ref, watch } from 'vue'
import { useForm } from '@inertiajs/vue3'

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

export function usePublicBookingForm(options = {}) {
    const route = inject('route')

    const slug = options.slug ?? ''
    const translations = options.translations ?? {}

    const units = ref([])
    const activities = ref([])
    const slots = ref([])
    const selectedDate = ref('')

    const loadingUnits = ref(false)
    const loadingActivities = ref(false)
    const loadingSlots = ref(false)
    const unitsRequestId = ref(0)
    const activitiesRequestId = ref(0)
    const slotsRequestId = ref(0)

    const slotMetaDefault = () => ({
        items: [],
        is_empty: true,
    })

    const slotMeta = ref(slotMetaDefault())

    const slotValue = (slot) => slot.start ?? ''
    const slotLabel = (slot) => slot.label ?? slot.start ?? ''
    const hasValue = (value) => String(value ?? '').trim() !== ''

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

    const selectionCount = computed(() => {
        return [
            form.branch_id,
            form.unit_id,
            form.activity_id,
            form.starts_at,
        ].filter(hasValue).length
    })

    const customerCount = computed(() => {
        return [
            form.customer.first_name,
            form.customer.last_name,
            form.customer.email,
            form.customer.phone_code,
            form.customer.phone,
        ].filter(hasValue).length
    })

    const completedCount = computed(() => {
        let total = 0

        if (selectionCount.value === 4) {
            total += 1
        }

        if (customerCount.value === 5) {
            total += 1
        }

        if (hasValue(form.note)) {
            total += 1
        }

        return total
    })

    const canSubmit = computed(() => {
        return selectionCount.value === 4 && customerCount.value === 5
    })

    function setSelectedDate(value) {
        selectedDate.value = value
    }

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
        const requestId = ++unitsRequestId.value

        resetUnits()
        resetActivities()
        resetSlots()
        selectedDate.value = ''

        if (!branchId) {
            return
        }

        loadingUnits.value = true

        try {
            const payload = await fetchJson(
                `${route('api.booking-options.units')}?branch_id=${encodeURIComponent(branchId)}`
            )

            if (requestId !== unitsRequestId.value) {
                return
            }

            units.value = payload?.data ?? []
        } catch (error) {
            if (requestId !== unitsRequestId.value) {
                return
            }

            console.error('Failed to load units.', error)
            units.value = []
        } finally {
            if (requestId === unitsRequestId.value) {
                loadingUnits.value = false
            }
        }
    }

    async function loadActivities(unitId) {
        const requestId = ++activitiesRequestId.value

        resetActivities()
        resetSlots()
        selectedDate.value = ''

        if (!unitId) {
            return
        }

        loadingActivities.value = true

        try {
            const payload = await fetchJson(
                `${route('api.booking-options.activities')}?unit_id=${encodeURIComponent(unitId)}`
            )

            if (requestId !== activitiesRequestId.value) {
                return
            }

            activities.value = payload?.data ?? []
        } catch (error) {
            if (requestId !== activitiesRequestId.value) {
                return
            }

            console.error('Failed to load activities.', error)
            activities.value = []
        } finally {
            if (requestId === activitiesRequestId.value) {
                loadingActivities.value = false
            }
        }
    }

    async function loadSlots() {
        const requestId = ++slotsRequestId.value

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

            if (requestId !== slotsRequestId.value) {
                return
            }

            slotMeta.value = payload?.data ?? slotMetaDefault()
            slots.value = slotMeta.value.items ?? []
        } catch (error) {
            if (requestId !== slotsRequestId.value) {
                return
            }

            console.error('Failed to load slots.', error)
            slotMeta.value = slotMetaDefault()
            slots.value = []
        } finally {
            if (requestId === slotsRequestId.value) {
                loadingSlots.value = false
            }
        }
    }

    watch(
        () => form.branch_id,
        async (branchId) => {
            await loadUnits(branchId)
        }
    )

    watch(
        () => form.unit_id,
        async (unitId) => {
            await loadActivities(unitId)
        }
    )

    watch(
        [() => form.activity_id, selectedDate],
        async () => {
            await loadSlots()
        }
    )

    function submit() {
        form.clearErrors()

        form.post(route('public-booking.store', { slug }), {
            preserveScroll: true,
            onError: (errors) => {
                if (Object.keys(errors).length > 0) {
                    dispatchToast(
                        translations.messages?.validation_failed ?? 'Please check the form and try again.',
                        'error',
                        2500
                    )

                    return
                }

                dispatchToast(
                    translations.messages?.failed ?? 'Failed to create booking.',
                    'error',
                    2500
                )
            },
            onSuccess: () => {
                dispatchToast(
                    translations.messages?.created ?? 'Booking created successfully.',
                    'success',
                    2000
                )
            },
        })
    }

    return {
        canSubmit,
        completedCount,
        customerCount,
        form,
        units,
        activities,
        slots,
        slotMeta,
        slotValue,
        slotLabel,
        selectedDate,
        setSelectedDate,
        loadingUnits,
        loadingActivities,
        loadingSlots,
        selectionCount,
        submit,
    }
}