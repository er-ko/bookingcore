import { computed } from 'vue'
import { router, useForm, usePage } from '@inertiajs/vue3'

export function useIdentityForm(route, options = {}) {
    const identity = options.identity ?? null
    const translations = options.translations ?? {}
    const page = usePage()

    const hasCompletedCalendar = computed(() => {
        return Boolean(page.props.auth?.onboarding?.calendar_completed)
    })

    const form = useForm({
        brand_name: identity?.brand_name ?? '',
        slug: identity?.slug ?? '',
        default_language_code: identity?.default_language_code ?? '',
        default_currency_code: identity?.default_currency_code ?? '',
        default_country_code: identity?.default_country_code ?? '',
        is_public: Boolean(identity?.is_public ?? false),
    })

    const inputClass = (field) => [
        'block w-full rounded-2xl bg-transparent px-4 py-3 text-sm select-none text-black transition-all duration-150 placeholder:text-black/30 focus:outline-none dark:text-white dark:placeholder:text-white/30 disabled:cursor-not-allowed disabled:bg-black/[0.03] dark:disabled:bg-white/[0.03]',
        form.errors[field]
            ? 'border border-red-500/50 focus:border-red-500 dark:border-red-400/50 dark:focus:border-red-400'
            : 'border border-black/10 focus:border-black/30 dark:border-white/10 dark:focus:border-white/30',
    ]

    const clearFieldError = (field) => {
        form.clearErrors(field)
    }

    const normalizeSlug = (value) => {
        if (typeof value !== 'string') {
            return ''
        }

        return value
            .trim()
            .toLowerCase()
            .replace(/^@+/, '')
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '')
            .replace(/-{2,}/g, '-')
    }

    const updateSlug = () => {
        form.slug = normalizeSlug(form.slug)
        clearFieldError('slug')
    }

    const validateForm = () => {
        form.clearErrors()

        const errors = {}

        if (!form.brand_name.trim()) {
            errors.brand_name = translations.validation?.brand_required
        }

        if (!form.slug.trim()) {
            errors.slug = translations.validation?.slug_required
        }

        if (!form.default_language_code.trim()) {
            errors.default_language_code = translations.validation?.default_lang_required
        }

        if (!form.default_currency_code.trim()) {
            errors.default_currency_code = translations.validation?.default_currency_required
        }

        if (!form.default_country_code.trim()) {
            errors.default_country_code = translations.validation?.default_country_required
        }

        const normalizedSlug = normalizeSlug(form.slug)

        if (form.slug && normalizedSlug !== form.slug) {
            form.slug = normalizedSlug
        }

        if (form.slug && form.slug.length < 3) {
            errors.slug = translations.validation?.slug_min
        }

        if (Object.keys(errors).length > 0) {
            form.setError(errors)
            return false
        }

        return true
    }

    const isFormValid = computed(() => {
        return (
            form.brand_name.trim() !== ''
            && normalizeSlug(form.slug).length >= 3
            && form.default_language_code.trim() !== ''
            && form.default_currency_code.trim() !== ''
            && form.default_country_code.trim() !== ''
        )
    })

    const submit = () => {
        if (!validateForm()) {
            return
        }

        form.patch(route('identity.update'), {
            preserveScroll: true,
            onSuccess: () => {
                if (!hasCompletedCalendar.value) {
                    router.visit(route('integrations.calendar.index'))
                    return
                }

                router.visit(route('identity.index'))
            },
        })
    }

    return {
        form,
        isFormValid,
        inputClass,
        clearFieldError,
        updateSlug,
        submit,
    }
}
