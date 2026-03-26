<script setup>
import { computed, inject } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useUnitForm } from '@/Composables/Unit/useUnitForm'

const route = inject('route')

const props = defineProps({
    branches: {
        type: Array,
        required: true,
    },
    unit: {
        type: Object,
        default: null,
    },
    mode: {
        type: String,
        default: 'create',
        validator: (value) => ['create', 'edit'].includes(value),
    },
    translations: {
        type: Object,
        required: true,
    },
})

const isEdit = computed(() => props.mode === 'edit')

const {
    form,
    isFormValid,
    inputClass,
    clearFieldError,
    submit,
} = useUnitForm(route, {
    mode: props.mode,
    unit: props.unit,
})
</script>

<template>
    <form
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm"
        novalidate
        @submit.prevent="submit"
    >
        <div class="border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-sm font-semibold text-gray-900">
                    {{ translations.form.unit_details }}
                </h2>

                <span class="text-xs text-gray-500">
                    {{ isEdit ? translations.form.update_form : translations.form.complete_form }}
                </span>
            </div>
        </div>

        <div class="space-y-6 px-6 py-6">
            <div class="grid gap-6 md:grid-cols-2">
                <div class="space-y-2 md:col-span-2">
                    <label for="branch_id" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.branch_title }} <span class="text-red-600">*</span>
                    </label>

                    <select
                        id="branch_id"
                        v-model="form.branch_id"
                        :class="inputClass('branch_id')"
                        @change="clearFieldError('branch_id')"
                    >
                        <option value="">
                            {{ translations.form.select_branch }}
                        </option>

                        <option
                            v-for="branch in branches"
                            :key="branch.id"
                            :value="branch.id"
                        >
                            {{ branch.name }}
                        </option>
                    </select>

                    <p v-if="form.errors.branch_id" class="text-sm text-red-600">
                        {{ form.errors.branch_id }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.name_title }} <span class="text-red-600">*</span>
                    </label>

                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        :class="inputClass('name')"
                        @input="clearFieldError('name')"
                    >

                    <p v-if="form.errors.name" class="text-sm text-red-600">
                        {{ form.errors.name }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        {{ translations.form.description_title }}
                    </label>

                    <textarea
                        id="description"
                        v-model="form.description"
                        rows="4"
                        :class="inputClass('description')"
                        @input="clearFieldError('description')"
                    />

                    <p v-if="form.errors.description" class="text-sm text-red-600">
                        {{ form.errors.description }}
                    </p>
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label class="flex items-start gap-3">
                        <input
                            v-model="form.is_active"
                            type="checkbox"
                            class="mt-0.5 h-4 w-4 rounded border-gray-300 text-gray-900 focus:ring-gray-900"
                        >

                        <div>
                            <div class="font-medium text-gray-900">
                                {{ translations.form.active_title }}
                            </div>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ translations.form.active_text }}
                            </p>
                        </div>
                    </label>

                    <p v-if="form.errors.is_active" class="text-sm text-red-600">
                        {{ form.errors.is_active }}
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-gray-200 pt-6">
                <Link
                    :href="route('units.index')"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-nowrap select-none text-gray-700 transition hover:bg-gray-50"
                >
                    {{ translations.actions.cancel }}
                </Link>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-nowrap select-none text-white transition hover:bg-gray-800 disabled:cursor-not-allowed disabled:opacity-60 cursor-pointer"
                    :disabled="form.processing || !isFormValid"
                >
                    <span v-if="form.processing">
                        {{ isEdit ? translations.actions.saving : translations.actions.creating }}
                    </span>

                    <span v-else>
                        {{ isEdit ? translations.actions.save : translations.actions.create }}
                    </span>
                </button>
            </div>
        </div>
    </form>
</template>