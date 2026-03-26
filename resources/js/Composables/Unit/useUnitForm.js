import { computed } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

export function useUnitForm(route, options = {}) {
    const mode = options.mode ?? 'create'
    const unit = options.unit ?? null

    const form = useForm({
        branch_id: unit?.branch_id ?? '',
        name: unit?.name ?? '',
        description: unit?.description ?? '',
        is_active: Boolean(unit?.is_active ?? true),
    })

    const requiredFields = {
        branch_id: 'Branch',
        name: 'Unit name',
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
            String(form.branch_id).trim() &&
            form.name.trim()
        )
    })

    const submit = () => {
        if (!validateForm()) {
            return
        }

        if (mode === 'edit') {
            form.patch(route('api.units.update', unit?.public_id ?? unit?.id), {
                preserveScroll: true,
                onSuccess: () => {
                    router.visit(route('units.index'))
                },
            })

            return
        }

        form.post(route('api.units.store'), {
            preserveScroll: true,
            onSuccess: () => {
                router.visit(route('units.index'))
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