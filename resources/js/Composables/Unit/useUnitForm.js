import axios from 'axios'
import { computed } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

export function useUnitForm(route, options = {}) {
    const mode = options.mode ?? 'create'
    const unit = options.unit ?? null
    const translations = options.translations ?? {}

    const form = useForm({
        branch_id: unit?.branch_id ?? '',
        name: unit?.name ?? '',
        description: unit?.description ?? '',
        is_active: Boolean(unit?.is_active ?? true),
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

    const validateForm = () => {
        form.clearErrors()

        const errors = {}

        if (String(form.branch_id).trim() === '') {
            errors.branch_id = translations.validation?.branch_id_required
        }

        if (!form.name.trim()) {
            errors.name = translations.validation?.name_required
        }

        if (Object.keys(errors).length > 0) {
            form.setError(errors)
            return false
        }

        return true
    }

    const isFormValid = computed(() => {
        return (
            String(form.branch_id).trim() !== '' &&
            form.name.trim() !== ''
        )
    })

    const submit = async () => {
        if (!validateForm()) {
            return
        }

        if (mode === 'edit') {
            form.patch(route('units.update', unit?.public_id ?? unit?.id), {
                preserveScroll: true,
            })

            return
        }

        form.processing = true

        try {
            const response = await axios.post(route('units.store'), {
                branch_id: form.branch_id,
                name: form.name,
                description: form.description,
                is_active: form.is_active,
            })

            form.clearErrors()

            const redirectTo = response.data?.redirect_to

            if (redirectTo) {
                router.visit(redirectTo)
                return
            }

            router.visit(route('units.index'))
        } catch (error) {
            if (error.response?.status === 422) {
                const responseErrors = error.response?.data?.errors

                if (responseErrors && typeof responseErrors === 'object') {
                    form.setError(responseErrors)
                }

                const message = error.response?.data?.message

                if (message && !responseErrors) {
                    form.setError({
                        name: message,
                    })
                }

                return
            }

            throw error
        } finally {
            form.processing = false
        }
    }

    return {
        form,
        isFormValid,
        inputClass,
        clearFieldError,
        submit,
    }
}
