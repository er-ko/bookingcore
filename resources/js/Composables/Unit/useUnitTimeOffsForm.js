import axios from 'axios'
import { computed, reactive, watch } from 'vue'

const FLASH_EVENT_NAME = 'bookingcore:flash'

const makeEmptyItem = () => ({
    id: null,
    starts_at: '',
    ends_at: '',
    reason: '',
})

const normalizeTimeOffs = (timeOffs = []) => {
    if (!Array.isArray(timeOffs)) {
        return []
    }

    return timeOffs.map((item) => ({
        id: item.id ?? null,
        starts_at: item.starts_at ?? '',
        ends_at: item.ends_at ?? '',
        reason: item.reason ?? '',
    }))
}

const cloneItems = (items) => JSON.parse(JSON.stringify(items))

const dispatchToast = (message, type = 'success', duration = 2000) => {
    window.dispatchEvent(new CustomEvent(FLASH_EVENT_NAME, {
        detail: {
            message,
            type,
            duration,
        },
    }))
}

export function useUnitTimeOffsForm(options = {}) {
    const route = options.route
    const unit = options.unit ?? null
    const initialTimeOffs = options.timeOffs ?? []
    const translations = options.translations ?? {}

    const state = reactive({
        processing: false,
        error: null,
        items: normalizeTimeOffs(initialTimeOffs),
        initialItems: normalizeTimeOffs(initialTimeOffs),
    })

    watch(
        () => options.timeOffs,
        (value) => {
            const normalized = normalizeTimeOffs(value ?? [])
            state.items = normalized
            state.initialItems = cloneItems(normalized)
            state.error = null
        },
        { deep: true }
    )

    const hasChanges = computed(() => {
        return JSON.stringify(state.items) !== JSON.stringify(state.initialItems)
    })

    const addItem = () => {
        state.items.push(makeEmptyItem())
        state.error = null
    }

    const removeItem = (index) => {
        state.items.splice(index, 1)
        state.error = null
    }

    const validate = () => {
        state.error = null

        for (const item of state.items) {
            if (!item.starts_at || !item.ends_at) {
                state.error = translations.validation_required
                return false
            }

            if (item.starts_at >= item.ends_at) {
                state.error = translations.validation_order
                return false
            }

            if (typeof item.reason === 'string' && item.reason.length > 255) {
                state.error = translations.validation_reason_max
                return false
            }
        }

        const sorted = [...state.items].sort((a, b) =>
            a.starts_at.localeCompare(b.starts_at)
        )

        for (let index = 1; index < sorted.length; index++) {
            const previous = sorted[index - 1]
            const current = sorted[index]

            if (current.starts_at < previous.ends_at) {
                state.error = translations.validation_overlap
                return false
            }
        }

        return true
    }

    const submit = async () => {
        if (!validate() || !unit?.public_id) {
            return false
        }

        state.processing = true
        state.error = null

        try {
            const response = await axios.put(
                route('units.time-offs.update', unit.public_id),
                {
                    items: state.items,
                }
            )

            state.initialItems = cloneItems(state.items)

            dispatchToast(
                response.data?.message ?? translations.save_success,
                'success',
                2000
            )

            return true
        } catch (error) {
            const message = error.response?.data?.message ?? translations.save_failed

            state.error = message
            dispatchToast(message, 'error', 2500)

            return false
        } finally {
            state.processing = false
        }
    }

    return {
        state,
        hasChanges,
        addItem,
        removeItem,
        validate,
        submit,
    }
}
