import { inject, ref, watch } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

export function useBookingForm() {
    const route = inject('route')

    const resources = ref([])
    const activities = ref([])
    const slots = ref([])
    const selectedDate = ref('')

    const loadingResources = ref(false)
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
        resource_id: '',
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

    function resetResources() {
        resources.value = []
        form.resource_id = ''
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

    async function loadResources(branchId) {
        resetResources()
        resetActivities()
        resetSlots()

        if (!branchId) {
            return
        }

        loadingResources.value = true

        try {
            const payload = await fetchJson(
                `${route('api.booking-options.resources')}?branch_id=${encodeURIComponent(branchId)}`
            )

            resources.value = payload.data ?? []
        } catch (error) {
            console.error('Failed to load resources.', error)
            resources.value = []
        } finally {
            loadingResources.value = false
        }
    }

    async function loadActivities(resourceId) {
        resetActivities()
        resetSlots()

        if (!resourceId) {
            return
        }

        loadingActivities.value = true

        try {
            const payload = await fetchJson(
                `${route('api.booking-options.activities')}?resource_id=${encodeURIComponent(resourceId)}`
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

        if (!form.branch_id || !form.resource_id || !form.activity_id || !selectedDate.value) {
            return
        }

        loadingSlots.value = true

        try {
            const query = new URLSearchParams({
                branch_id: String(form.branch_id),
                resource_id: String(form.resource_id),
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
            await loadResources(branchId)
        }
    )

    watch(
        () => form.resource_id,
        async (resourceId) => {
            selectedDate.value = ''
            await loadActivities(resourceId)
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
            const response = await fetch(route('api.bookings.store'), {
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
                    return
                }

                console.error('Failed to create booking.', payload)
                return
            }

            router.visit(route('bookings.index'))
        } catch (error) {
            console.error('Failed to create booking.', error)
        } finally {
            form.processing = false
        }
    }

    return {
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
    }
}