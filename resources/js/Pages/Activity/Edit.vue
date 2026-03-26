<script setup>
import { inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import ActivityForm from '@/Components/Activity/ActivityForm.vue'

const route = inject('route')

const props = defineProps({
    activity: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <Head :title="`${translations.title} - ${props.activity.name}`" />

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
                        :href="route('activities.index')"
                        class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-nowrap select-none text-gray-700 transition hover:bg-gray-50"
                    >
                        {{ translations.back_to_activities }}
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
                                {{ translations.overview.activity_id_title }}
                            </div>

                            <div class="mt-1 text-gray-900">
                                {{ activity.public_id ?? activity.id }}
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                Current status
                            </div>

                            <div class="mt-1">
                                <span
                                    v-if="props.activity.is_active"
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
                                {{ translations.overview.duration_title }}
                            </div>

                            <div class="mt-1">
                                {{ translations.overview.duration_text }}
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.buffer_time_title }}
                            </div>

                            <div class="mt-1">
                                {{ translations.overview.buffer_time_text }}
                            </div>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.required_title}}
                            </div>

                            <ul class="mt-2 space-y-1 text-sm text-gray-600">
                                <li>{{ translations.form.name_title }}</li>
                                <li>{{ translations.form.duration_title }}</li>
                            </ul>
                        </div>

                        <div>
                            <div class="text-xs font-medium uppercase tracking-wide text-gray-500">
                                {{ translations.overview.optional_title }}
                            </div>

                            <ul class="mt-2 space-y-1 text-sm text-gray-600">
                                <li>{{ translations.form.buffer_before_title }}</li>
                                <li>{{ translations.form.buffer_after_title }}</li>
                                <li>{{ translations.form.active_title }}</li>
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
                    <ActivityForm mode="edit" :activity="activity" :translations="translations" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>