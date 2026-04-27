import { computed, inject, ref, watch } from 'vue'
import { router } from '@inertiajs/vue3'

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
        detail: { message, type, duration },
    }))
}

export function usePricePage(options = {}) {
    const route = inject('route')

    const translations = options.translations ?? {}
    const branches = options.branches ?? []
    const allUnits = options.units ?? []
    const allActivities = options.activities ?? []
    const defaultCurrencyCode = options.defaultCurrencyCode ?? null

    const form = ref({
        branch_id: '',
        unit_id: '',
        activity_id: '',
        price: '',
    })

    const errors = ref({})
    const processing = ref(false)

    const units = ref([])
    const activities = ref([])

    const loadingUnits = ref(false)
    const loadingActivities = ref(false)

    const editingId = ref(null)
    const editForm = ref({
        price: '',
    })
    const editErrors = ref({})
    const updating = ref(false)
    const deletingId = ref(null)

    const hasBranches = computed(() => branches.length > 0)

    const inputClass = (field) => [
        'block w-full rounded-2xl border bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 placeholder:text-black/30 focus:outline-none dark:text-white dark:placeholder:text-white/30',
        errors.value[field]
            ? 'border-red-500/50 focus:border-red-500 dark:border-red-400/50 dark:focus:border-red-400'
            : 'border-black/10 focus:border-black/30 dark:border-white/10 dark:focus:border-white/30',
    ]

    const editInputClass = (field) => [
        'block w-full rounded-xl border bg-transparent px-3 py-2 text-sm text-black transition-all duration-150 placeholder:text-black/30 focus:outline-none dark:text-white dark:placeholder:text-white/30',
        editErrors.value[field]
            ? 'border-red-500/50 focus:border-red-500 dark:border-red-400/50 dark:focus:border-red-400'
            : 'border-black/10 focus:border-black/30 dark:border-white/10 dark:focus:border-white/30',
    ]

    const clearFieldError = (field) => {
        delete errors.value[field]
    }

    const clearEditFieldError = (field) => {
        delete editErrors.value[field]
    }

    const resetUnits = () => {
        units.value = []
        form.value.unit_id = ''
    }

    const resetActivities = () => {
        activities.value = []
        form.value.activity_id = ''
    }

    const resetForm = () => {
        form.value = {
            branch_id: '',
            unit_id: '',
            activity_id: '',
            price: '',
        }

        errors.value = {}
        units.value = []
        activities.value = []
    }

    const resetEditForm = () => {
        editForm.value = {
            price: '',
        }

        editErrors.value = {}
    }

    const formatPrice = (price) => {
        if (price === null || price === undefined || price === '') {
            return '—'
        }

        return defaultCurrencyCode
            ? `${price} ${defaultCurrencyCode}`
            : String(price)
    }

    async function loadUnits(branchId) {
        resetUnits()
        resetActivities()

        if (!branchId) {
            return
        }

        loadingUnits.value = true

        try {
            units.value = allUnits.filter((unit) => String(unit.branch_id) === String(branchId))
        } finally {
            loadingUnits.value = false
        }
    }

    async function loadActivities(unitId) {
        resetActivities()

        if (!unitId) {
            return
        }

        loadingActivities.value = true

        try {
            activities.value = allActivities
        } finally {
            loadingActivities.value = false
        }
    }

    watch(
        () => form.value.branch_id,
        async (branchId) => {
            clearFieldError('branch_id')
            await loadUnits(branchId)
        }
    )

    watch(
        () => form.value.unit_id,
        async (unitId) => {
            clearFieldError('unit_id')
            await loadActivities(unitId)
        }
    )

    watch(() => form.value.activity_id, () => clearFieldError('activity_id'))
    watch(() => form.value.price, () => clearFieldError('price'))
    watch(() => editForm.value.price, () => clearEditFieldError('price'))

    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content') ?? ''

    const submit = async () => {
        if (processing.value) {
            return
        }

        processing.value = true
        errors.value = {}

        try {
            const response = await fetch(route('prices.store'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(form.value),
            })

            const payload = await response.json()

            if (!response.ok) {
                if (response.status === 422 && payload.errors && typeof payload.errors === 'object') {
                    errors.value = payload.errors
                }

                dispatchToast(payload.message ?? translations.messages.failed, 'error', 2500)
                return
            }

            dispatchToast(payload.message ?? translations.messages.created, 'success', 2000)

            resetForm()

            router.reload({
                only: ['prices'],
            })
        } catch (error) {
            dispatchToast(translations.messages.failed, 'error', 2500)
            console.error('Failed to store price.', error)
        } finally {
            processing.value = false
        }
    }

    const startEdit = (price) => {
        editingId.value = price.id
        editErrors.value = {}

        editForm.value = {
            price: price.price ?? '',
        }
    }

    const cancelEdit = () => {
        editingId.value = null
        resetEditForm()
    }

    const updatePrice = async (priceId) => {
        if (updating.value) {
            return
        }

        updating.value = true
        editErrors.value = {}

        try {
            const response = await fetch(route('prices.update', priceId), {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(editForm.value),
            })

            const payload = await response.json()

            if (!response.ok) {
                if (response.status === 422 && payload.errors && typeof payload.errors === 'object') {
                    editErrors.value = payload.errors
                }

                dispatchToast(payload.message ?? translations.messages.failed, 'error', 2500)
                return
            }

            dispatchToast(payload.message ?? translations.messages.updated, 'success', 2000)

            cancelEdit()

            router.reload({
                only: ['prices'],
            })
        } catch (error) {
            dispatchToast(translations.messages.failed, 'error', 2500)
            console.error('Failed to update price.', error)
        } finally {
            updating.value = false
        }
    }

    const deletePrice = async (priceId) => {
        if (deletingId.value !== null) {
            return
        }

        if (!window.confirm(translations.dialogs.delete_confirm)) {
			return
		}

        deletingId.value = priceId

        try {
            const response = await fetch(route('prices.destroy', priceId), {
                method: 'DELETE',
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                },
            })

            const payload = await response.json()

            if (!response.ok) {
                dispatchToast(payload.message ?? translations.messages.failed, 'error', 2500)
                return
            }

            dispatchToast(payload.message ?? translations.messages.deleted, 'success', 2000)

            if (editingId.value === priceId) {
                cancelEdit()
            }

            router.reload({
                only: ['prices'],
            })
        } catch (error) {
            dispatchToast(translations.messages.failed, 'error', 2500)
            console.error('Failed to delete price.', error)
        } finally {
            deletingId.value = null
        }
    }

    return {
        form,
        errors,
        processing,
        units,
        activities,
        loadingUnits,
        loadingActivities,
        editingId,
        editForm,
        editErrors,
        updating,
        deletingId,
        hasBranches,
        inputClass,
        editInputClass,
        clearEditFieldError,
        formatPrice,
        submit,
        startEdit,
        cancelEdit,
        updatePrice,
        deletePrice,
    }
}
