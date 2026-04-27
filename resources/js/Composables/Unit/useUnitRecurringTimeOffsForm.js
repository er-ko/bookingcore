import axios from 'axios'
import { computed, reactive, watch } from 'vue'

const DAY_KEYS = [1, 2, 3, 4, 5, 6, 7]
const FLASH_EVENT_NAME = 'bookingcore:flash'

const makeEmptyInterval = (dayOfWeek) => ({
    id: null,
    day_of_week: dayOfWeek,
    start_time: '',
    end_time: '',
    reason: '',
    is_active: true,
    valid_from: '',
    valid_until: '',
})

const normalizeRecurringTimeOffs = (recurringTimeOffs = {}) => {
    const normalized = {}

    for (const dayOfWeek of DAY_KEYS) {
        const intervals = Array.isArray(recurringTimeOffs?.[dayOfWeek])
            ? recurringTimeOffs[dayOfWeek]
            : Array.isArray(recurringTimeOffs?.[String(dayOfWeek)])
                ? recurringTimeOffs[String(dayOfWeek)]
                : []

        normalized[dayOfWeek] = intervals.map((interval) => ({
            id: interval.id ?? null,
            day_of_week: interval.day_of_week ?? dayOfWeek,
            start_time: interval.start_time ?? '12:00',
            end_time: interval.end_time ?? '13:00',
            reason: interval.reason ?? '',
            is_active: Boolean(interval.is_active ?? true),
            valid_from: interval.valid_from ?? '',
            valid_until: interval.valid_until ?? '',
        }))
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

export function useUnitRecurringTimeOffsForm(options = {}) {
    const route = options.route
    const unit = options.unit ?? null
    const initialRecurringTimeOffs = options.recurringTimeOffs ?? {}
    const translations = options.translations ?? {}

    const state = reactive({
        processing: false,
        errors: {},
        formError: null,
        days: normalizeRecurringTimeOffs(initialRecurringTimeOffs),
        initialDays: normalizeRecurringTimeOffs(initialRecurringTimeOffs),
    })

    watch(
        () => options.recurringTimeOffs,
        (value) => {
            const normalized = normalizeRecurringTimeOffs(value ?? {})
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
            intervals: state.days[dayOfWeek] ?? [],
        }))
    })

    const hasIntervals = (dayOfWeek) => {
        return (state.days[dayOfWeek] ?? []).length > 0
    }

    const addInterval = (dayOfWeek) => {
        state.days[dayOfWeek].push(makeEmptyInterval(dayOfWeek))
        clearDayError(dayOfWeek)
    }

    const removeInterval = (dayOfWeek, index) => {
        state.days[dayOfWeek].splice(index, 1)
        clearDayError(dayOfWeek)
    }

    const clearDayError = (dayOfWeek) => {
        delete state.errors[dayOfWeek]
        state.formError = null
    }

    const validate = () => {
        const errors = {}

        for (const dayOfWeek of DAY_KEYS) {
            const intervals = state.days[dayOfWeek] ?? []

            for (let index = 0; index < intervals.length; index++) {
                const interval = intervals[index]

                if (!interval.start_time || !interval.end_time) {
                    errors[dayOfWeek] = translations.validation_required
                    break
                }

                if (interval.start_time >= interval.end_time) {
                    errors[dayOfWeek] = translations.validation_time_order
                    break
                }

                if (interval.valid_from && interval.valid_until && interval.valid_until < interval.valid_from) {
                    errors[dayOfWeek] = translations.validation_date_order
                    break
                }

                if (typeof interval.reason === 'string' && interval.reason.length > 255) {
                    errors[dayOfWeek] = translations.validation_reason_max
                    break
                }
            }

            if (errors[dayOfWeek]) {
                continue
            }

            const sortedIntervals = [...intervals].sort((a, b) =>
                a.start_time.localeCompare(b.start_time)
            )

            for (let index = 1; index < sortedIntervals.length; index++) {
                const previous = sortedIntervals[index - 1]
                const current = sortedIntervals[index]

                if (current.start_time < previous.end_time) {
                    errors[dayOfWeek] = translations.validation_overlap
                    break
                }
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
            const response = await axios.put(
                route('units.recurring-time-offs.update', unit.public_id),
                {
                    days: state.days,
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
        hasIntervals,
        hasChanges,
        addInterval,
        removeInterval,
        clearDayError,
        validate,
        submit,
    }
}
