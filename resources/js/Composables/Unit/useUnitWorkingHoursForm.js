import axios from 'axios'
import { computed, reactive, watch } from 'vue'

const DAY_KEYS = [1, 2, 3, 4, 5, 6, 7]
const FLASH_EVENT_NAME = 'bookingcore:flash'

const makeEmptyInterval = (dayOfWeek) => ({
    id: null,
    day_of_week: dayOfWeek,
    start_time: '',
    end_time: '',
    is_active: true,
})

const normalizeWorkingHours = (workingHours = {}) => {
    const normalized = {}

    for (const dayOfWeek of DAY_KEYS) {
        const intervals = Array.isArray(workingHours?.[dayOfWeek])
            ? workingHours[dayOfWeek]
            : Array.isArray(workingHours?.[String(dayOfWeek)])
                ? workingHours[String(dayOfWeek)]
                : []

        const firstInterval = intervals[0] ?? null

        normalized[dayOfWeek] = firstInterval
            ? {
                id: firstInterval.id ?? null,
                day_of_week: firstInterval.day_of_week ?? dayOfWeek,
                start_time: firstInterval.start_time ?? '09:00',
                end_time: firstInterval.end_time ?? '17:00',
                is_active: Boolean(firstInterval.is_active ?? true),
            }
            : null
    }

    return normalized
}

const cloneDays = (days) => JSON.parse(JSON.stringify(days))

const dispatchToast = (message, type = 'success', duration = 2000) => {
    window.dispatchEvent(new CustomEvent(FLASH_EVENT_NAME, {
        detail: {
            message,
            type,
            duration,
        },
    }))
}

export function useUnitWorkingHoursForm(options = {}) {
    const route = options.route
    const unit = options.unit ?? null
    const initialWorkingHours = options.workingHours ?? {}
    const translations = options.translations ?? {}

    const state = reactive({
        processing: false,
        errors: {},
        formError: null,
        days: normalizeWorkingHours(initialWorkingHours),
        initialDays: normalizeWorkingHours(initialWorkingHours),
    })

    watch(
        () => options.workingHours,
        (value) => {
            const normalized = normalizeWorkingHours(value ?? {})
            state.days = normalized
            state.initialDays = cloneDays(normalized)
            state.errors = {}
            state.formError = null
        },
        { deep: true }
    )

    const orderedDays = computed(() => {
        const dayLabels = {
            1: translations.monday,
            2: translations.tuesday,
            3: translations.wednesday,
            4: translations.thursday,
            5: translations.friday,
            6: translations.saturday,
            7: translations.sunday,
        }

        return DAY_KEYS.map((dayOfWeek) => ({
            day_of_week: dayOfWeek,
            label: dayLabels[dayOfWeek],
            interval: state.days[dayOfWeek],
        }))
    })

    const toggleDay = (dayOfWeek) => {
        if (state.days[dayOfWeek]) {
            state.days[dayOfWeek] = null
        } else {
            state.days[dayOfWeek] = makeEmptyInterval(dayOfWeek)
        }

        clearDayError(dayOfWeek)
    }

    const clearDayError = (dayOfWeek) => {
        delete state.errors[dayOfWeek]
        state.formError = null
    }

    const validate = () => {
        const errors = {}

        for (const dayOfWeek of DAY_KEYS) {
            const interval = state.days[dayOfWeek]

            if (!interval) {
                continue
            }

            if (!interval.start_time || !interval.end_time) {
                errors[dayOfWeek] = translations.validation_required
                continue
            }

            if (interval.start_time >= interval.end_time) {
                errors[dayOfWeek] = translations.validation_order
            }
        }

        state.errors = errors
        state.formError = null

        return Object.keys(errors).length === 0
    }

    const hasChanges = computed(() => {
        return JSON.stringify(state.days) !== JSON.stringify(state.initialDays)
    })

    const submit = async () => {
        if (!validate() || !unit?.public_id) {
            return false
        }

        state.processing = true
        state.formError = null

        try {
            const payload = {}

            for (const dayOfWeek of DAY_KEYS) {
                payload[dayOfWeek] = state.days[dayOfWeek]
                    ? [state.days[dayOfWeek]]
                    : []
            }

            const response = await axios.put(
                route('units.working-hours.update', unit.public_id),
                {
                    days: payload,
                }
            )

            state.initialDays = cloneDays(state.days)

            dispatchToast(
                response.data?.message ?? translations.save_success,
                'success',
                2000
            )

            return true
        } catch (error) {
            const message = error.response?.data?.message ?? translations.save_failed

            state.formError = message
            dispatchToast(message, 'error', 2500)

            return false
        } finally {
            state.processing = false
        }
    }

    return {
        state,
        orderedDays,
        hasChanges,
        toggleDay,
        clearDayError,
        validate,
        submit,
    }
}
