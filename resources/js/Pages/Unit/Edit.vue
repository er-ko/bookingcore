<script setup>
import { computed, inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import UnitForm from '@/Components/Unit/UnitForm.vue'

const route = inject('route')

const props = defineProps({
    unit: {
        type: Object,
        required: true,
    },
    branches: {
        type: Array,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const branchesCount = computed(() => props.branches?.length ?? 0)
</script>

<template>
    <Head :title="`${translations.title} - ${props.unit.name}`" />

    <AppLayout>
        <div class="mx-auto max-w-7xl space-y-6 px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        {{ translations.title }}
                    </h1>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ translations.description }}
                    </p>
                </div>

                <div>
                    <Link
                        :href="route('units.index')"
                        class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-nowrap select-none text-gray-700 transition hover:bg-gray-50"
                    >
                        {{ translations.back_to_units }}
                    </Link>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm lg:col-span-1">
                    <div class="border-b border-gray-200 px-6 py-4">
                        <h2 class="text-sm font-semibold text-gray-900">
                            {{ translations.overview.title }}
                        </h2>
                    </div>

                    <div class="space-y-6 px-6 py-6 text-sm text-gray-700">
                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.unit_id_title }}
                            </div>

                            <div class="mt-1 text-gray-900">
                                {{ props.unit.public_id ?? props.unit.id }}
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.status_title }}
                            </div>

                            <div class="mt-1">
                                <span
                                    v-if="props.unit.is_active"
                                    class="inline-flex items-center rounded-md bg-emerald-100 px-2.5 py-1 text-xs font-medium select-none text-emerald-800 ring-1 ring-inset ring-emerald-600/20"
                                >
                                    {{ translations.overview.active_title }}
                                </span>

                                <span
                                    v-else
                                    class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-1 text-xs font-medium select-none text-gray-700 ring-1 ring-inset ring-gray-300"
                                >
                                    {{ translations.overview.inactive_title }}
                                </span>
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.branches_available_title }}
                            </div>

                            <div class="mt-1">
                                {{ branchesCount }}
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.assignment_title }}
                            </div>

                            <div class="mt-1">
                                {{ translations.overview.assignment_text }}
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.required_title }}
                            </div>

                            <ul class="mt-2 space-y-1 text-sm text-gray-600">
                                <li>{{ translations.form.branch_title }}</li>
                                <li>{{ translations.form.name_title }}</li>
                            </ul>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.optional_title }}
                            </div>

                            <ul class="mt-2 space-y-1 text-sm text-gray-600">
                                <li>{{ translations.form.description_title }}</li>
                            </ul>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.note_title }}
                            </div>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ translations.overview.note_text }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <UnitForm
                        mode="edit"
                        :unit="unit"
                        :branches="branches"
                        :translations="translations"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>