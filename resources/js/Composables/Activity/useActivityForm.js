import { computed } from 'vue'
import { useForm } from '@inertiajs/vue3'

export function useActivityForm(route, options = {}) {
    const mode = options.mode ?? 'create'
    const activity = options.activity ?? null
    const translations = options.translations ?? {}

    const form = useForm({
        name: activity?.name ?? '',
        duration_minutes: activity?.duration_minutes ?? '',
        buffer_before_minutes: activity?.buffer_before_minutes ?? 0,
        buffer_after_minutes: activity?.buffer_after_minutes ?? 0,
        is_active: Boolean(activity?.is_active ?? true),
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

        if (!form.name.trim()) {
            errors.name = translations.validation?.name_required
        }

        if (
            form.duration_minutes === null ||
            form.duration_minutes === undefined ||
            String(form.duration_minutes).trim() === ''
        ) {
            errors.duration_minutes = translations.validation?.duration_required
        }

        if (errors.duration_minutes === undefined && Number(form.duration_minutes) < 1) {
            errors.duration_minutes = translations.validation?.duration_min
        }

        if (Number(form.buffer_before_minutes) < 0) {
            errors.buffer_before_minutes = translations.validation?.buffer_before_min
        }

        if (Number(form.buffer_after_minutes) < 0) {
            errors.buffer_after_minutes = translations.validation?.buffer_after_min
        }

        if (Object.keys(errors).length > 0) {
            form.setError(errors)
            return false
        }

        return true
    }

    const isFormValid = computed(() => {
        return (
            form.name.trim().length > 0 &&
            Number(form.duration_minutes) >= 1 &&
            Number(form.buffer_before_minutes) >= 0 &&
            Number(form.buffer_after_minutes) >= 0
        )
    })

    const submit = () => {
        if (!validateForm()) {
            return
        }

        form.transform((data) => ({
            ...data,
            duration_minutes: Number(data.duration_minutes),
            buffer_before_minutes: Number(data.buffer_before_minutes),
            buffer_after_minutes: Number(data.buffer_after_minutes),
            is_active: Boolean(data.is_active),
        }))

        if (mode === 'edit') {
            form.patch(route('activities.update', activity?.public_id ?? activity?.id), {
                preserveScroll: true,
            })

            return
        }

        form.post(route('activities.store'), {
            preserveScroll: true,
        })
    }

    return {
        form,
        isFormValid,
        inputClass,
        clearFieldError,
        submit,
    }
}