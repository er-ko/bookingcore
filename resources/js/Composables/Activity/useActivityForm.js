import { computed } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

export function useActivityForm(route, options = {}) {
    const mode = options.mode ?? 'create'
    const activity = options.activity ?? null

    const form = useForm({
        name: activity?.name ?? '',
        duration_minutes: activity?.duration_minutes ?? '',
        buffer_before_minutes: activity?.buffer_before_minutes ?? 0,
        buffer_after_minutes: activity?.buffer_after_minutes ?? 0,
        is_active: Boolean(activity?.is_active ?? true),
    })

    const requiredFields = {
        name: 'Activity name',
        duration_minutes: 'Duration',
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
            } else if (value === null || value === undefined || value === '') {
                errors[field] = `${label} is required.`
            }
        }

        if (Number(form.duration_minutes) < 1) {
            errors.duration_minutes = 'Duration must be at least 1 minute.'
        }

        if (Number(form.buffer_before_minutes) < 0) {
            errors.buffer_before_minutes = 'Buffer before must be 0 or more.'
        }

        if (Number(form.buffer_after_minutes) < 0) {
            errors.buffer_after_minutes = 'Buffer after must be 0 or more.'
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
            form.patch(route('api.activities.update', activity?.public_id ?? activity?.id), {
                preserveScroll: true,
                onSuccess: () => {
                    router.visit(route('activities.index'))
                },
            })

            return
        }

        form.post(route('api.activities.store'), {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(route('activities.index'))
            },
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