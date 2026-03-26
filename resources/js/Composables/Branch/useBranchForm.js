import { computed, ref, watch } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

export function useBranchForm(route, options = {}) {
    const mode = options.mode ?? 'create'
    const branch = options.branch ?? null

    const timezones = ref([])
    const loadingTimezones = ref(false)
    const initialized = ref(false)

    const form = useForm({
        name: branch?.name ?? '',
        address_line_1: branch?.address_line_1 ?? '',
        address_line_2: branch?.address_line_2 ?? '',
        city: branch?.city ?? '',
        postcode: branch?.postcode ?? '',
        country_code: branch?.country_code ?? '',
        timezone: branch?.timezone ?? '',
        is_active: Boolean(branch?.is_active ?? true),
    })

    const requiredFields = {
        name: 'Branch name',
        address_line_1: 'Address line 1',
        city: 'City',
        postcode: 'Postcode',
        country_code: 'Country',
        timezone: 'Timezone',
    }

    const inputClass = (field) => [
        'block w-full rounded-lg px-3 py-2 text-sm text-gray-900 shadow-xs focus:outline-none disabled:cursor-not-allowed disabled:bg-gray-100 border border-gray-100',
        form.errors[field]
            ? 'border-red-300 focus:border-red-500'
            : 'border-gray-300 focus:border-gray-900',
    ]

    const clearFieldError = (field) => {
        form.clearErrors(field)
    }

    const validateForm = () => {
        form.clearErrors()

        const errors = {}

        for (const [field, label] of Object.entries(requiredFields)) {
            const value = form[field]

            if (typeof value === 'string') {
                if (!value.trim()) {
                    errors[field] = `${label} is required.`
                }
            } else if (!value) {
                errors[field] = `${label} is required.`
            }
        }

        if (Object.keys(errors).length > 0) {
            form.setError(errors)
            return false
        }

        return true
    }

    const isFormValid = computed(() => {
        return (
            form.name.trim() &&
            form.address_line_1.trim() &&
            form.city.trim() &&
            form.postcode.trim() &&
            form.country_code &&
            form.timezone &&
            !loadingTimezones.value
        )
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

        if (!countryCode) {
            return
        }

        loadingTimezones.value = true

        try {
            const url = `${route('api.branch-options.timezones')}?country_code=${encodeURIComponent(countryCode)}`
            const payload = await fetchJson(url)

            timezones.value = payload.data ?? []

            const timezoneExists = timezones.value.some(
                (timezone) => timezone.value === selectedTimezone
            )

            if (timezoneExists) {
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
        async (countryCode, oldCountryCode) => {
            clearFieldError('country_code')

            if (!countryCode) {
                timezones.value = []
                form.timezone = ''
                return
            }

            if (!initialized.value && mode === 'edit') {
                await loadTimezones(countryCode, branch?.timezone ?? '')
                initialized.value = true
                return
            }

            await loadTimezones(countryCode)
            initialized.value = true
        },
        { immediate: true }
    )

    const submit = () => {
        if (!validateForm()) {
            return
        }

        if (mode === 'edit') {
            form.patch(route('api.branches.update', branch?.public_id ?? branch?.id), {
                preserveScroll: true,
                onSuccess: () => {
                    router.visit(route('branches.index'))
                },
            })

            return
        }

        form.post(route('api.branches.store'), {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(route('branches.index'))
            },
        })
    }

    return {
        form,
        timezones,
        loadingTimezones,
        isFormValid,
        inputClass,
        clearFieldError,
        loadTimezones,
        submit,
    }
}