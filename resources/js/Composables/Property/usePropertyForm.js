import { computed, ref, watch } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

export function usePropertyForm(route, options = {}) {
    const mode     = options.mode     ?? 'create'
    const property = options.property ?? null
    const translations = options.translations ?? {}

    const timezones        = ref([])
    const loadingTimezones = ref(false)
    const initialized      = ref(false)

    const form = useForm({
        name:            property?.name            ?? '',
        description:     property?.description     ?? '',
        rental_type:     property?.rental_type     ?? '',
        property_type:   property?.property_type   ?? '',

        address_line_1: property?.address_line_1 ?? '',
        address_line_2: property?.address_line_2 ?? '',
        city:           property?.city           ?? '',
        postcode:       property?.postcode        ?? '',
        country_code:   property?.country_code   ?? '',
        timezone:       property?.timezone        ?? '',

        max_guests: property?.max_guests ?? null,
        size_sqm:   property?.size_sqm   ?? null,

        // Short-term
        price_per_night: property?.price_per_night ?? null,
        min_nights:      property?.min_nights      ?? 1,
        check_in_time:   property?.check_in_time   ?? '',
        check_out_time:  property?.check_out_time  ?? '',
        cleaning_fee:    property?.cleaning_fee    ?? null,

        // Long-term
        price_per_month:    property?.price_per_month    ?? null,
        min_months:         property?.min_months         ?? 1,
        deposit_amount:     property?.deposit_amount     ?? null,
        available_from:     property?.available_from     ?? '',
        utilities_included: Boolean(property?.utilities_included ?? false),

        is_active: Boolean(property?.is_active ?? true),
    })

    const isShortTerm = computed(() => form.rental_type === 'short_term')
    const isLongTerm  = computed(() => form.rental_type === 'long_term')

    const inputClass = (field) => [
        'block w-full rounded-2xl bg-transparent px-4 py-3 text-sm select-none text-black transition-all duration-150 placeholder:text-black/30 focus:outline-none dark:text-white dark:placeholder:text-white/30 disabled:cursor-not-allowed disabled:bg-black/[0.03] dark:disabled:bg-white/[0.03]',
        form.errors[field]
            ? 'border border-red-500/50 focus:border-red-500 dark:border-red-400/50 dark:focus:border-red-400'
            : 'border border-black/10 focus:border-black/30 dark:border-white/10 dark:focus:border-white/30',
    ]

    const clearFieldError = (field) => {
        form.clearErrors(field)
    }

    const validateForm = () => {
        form.clearErrors()

        const errors = {}

        if (!form.name.trim()) {
            errors.name = translations.validation?.name_required
        }

        if (!form.rental_type) {
            errors.rental_type = translations.validation?.rental_type_required
        }

        if (!form.property_type) {
            errors.property_type = translations.validation?.property_type_required
        }

        if (!form.timezone) {
            errors.timezone = translations.validation?.timezone_required
        }

        if (form.rental_type === 'short_term' && !form.price_per_night) {
            errors.price_per_night = translations.validation?.price_per_night_required
        }

        if (form.rental_type === 'long_term' && !form.price_per_month) {
            errors.price_per_month = translations.validation?.price_per_month_required
        }

        if (Object.keys(errors).length > 0) {
            form.setError(errors)
            return false
        }

        return true
    }

    const isFormValid = computed(() => {
        const baseValid = (
            form.name.trim() &&
            form.rental_type &&
            form.property_type &&
            form.country_code &&
            form.timezone &&
            !loadingTimezones.value
        )

        if (!baseValid) return false

        if (form.rental_type === 'short_term') {
            return Boolean(form.price_per_night)
        }

        if (form.rental_type === 'long_term') {
            return Boolean(form.price_per_month)
        }

        return Boolean(baseValid)
    })

    const fetchJson = async (url) => {
        const response = await fetch(url, {
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            credentials: 'same-origin',
        })

        const contentType = response.headers.get('content-type') || ''

        if (!response.ok) {
            const text = await response.text()
            throw new Error(`HTTP ${response.status}: ${text}`)
        }

        if (!contentType.includes('application/json')) {
            const text = await response.text()
            throw new Error(`Expected JSON, got: ${text}`)
        }

        return response.json()
    }

    const loadTimezones = async (countryCode, selectedTimezone = '') => {
        timezones.value = []
        form.timezone = ''
        form.clearErrors('timezone')

        if (!countryCode) return

        loadingTimezones.value = true

        try {
            const url = `${route('api.branch-options.timezones')}?country_code=${encodeURIComponent(countryCode)}`
            const payload = await fetchJson(url)

            timezones.value = payload.data ?? []

            const exists = timezones.value.some((tz) => tz.value === selectedTimezone)

            if (exists) {
                form.timezone = selectedTimezone
            } else if (timezones.value.length > 0) {
                form.timezone = timezones.value[0].value
            } else {
                form.timezone = ''
            }
        } catch (error) {
            console.error('Timezone load failed:', error)
            timezones.value = []
            form.timezone = ''
        } finally {
            loadingTimezones.value = false
        }
    }

    watch(
        () => form.country_code,
        async (countryCode) => {
            clearFieldError('country_code')

            if (!countryCode) {
                timezones.value = []
                form.timezone = ''
                return
            }

            if (!initialized.value && mode === 'edit') {
                await loadTimezones(countryCode, property?.timezone ?? '')
                initialized.value = true
                return
            }

            await loadTimezones(countryCode)
            initialized.value = true
        },
        { immediate: true }
    )

    const submit = () => {
        if (!validateForm()) return

        if (mode === 'edit') {
            form.patch(route('properties.update', property?.public_id ?? property?.id), {
                preserveScroll: true,
                onSuccess: () => {
                    router.visit(route('properties.index'))
                },
            })
            return
        }

        form.post(route('properties.store'), {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(route('properties.index'))
            },
        })
    }

    return {
        form,
        timezones,
        loadingTimezones,
        isShortTerm,
        isLongTerm,
        isFormValid,
        inputClass,
        clearFieldError,
        submit,
    }
}
