<script setup>
import { computed, inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import ActivityTable from '@/Components/Activity/ActivityTable.vue'

const route = inject('route')

const props = defineProps({
    activities: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const items = computed(() => props.activities?.data ?? [])
const links = computed(() => props.activities?.links ?? [])
const hasPagination = computed(() => links.value.length > 3)
</script>

<template>
    <Head :title="translations.title" />

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
                        :href="route('activities.create')"
                        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-nowrap select-none text-white transition hover:bg-gray-800"
                    >
                        {{ translations.create_activity }}
                    </Link>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
                <div
                    v-if="items.length === 0"
                    class="flex flex-col items-center justify-center px-6 py-16 text-center"
                >
                    <h2 class="text-lg font-semibold text-gray-900">
                        {{ translations.no_activities_found }}
                    </h2>

                    <p class="mt-2 max-w-md text-sm text-gray-600">
                        {{ translations.no_activities_text }}
                    </p>

                    <div class="mt-6">
                        <Link
							:href="route('activities.create')"
                            class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-800"
                        >
                            {{ translations.create_first_activity }}
                        </Link>
                    </div>
                </div>

                <template v-else>
                    <ActivityTable :activities="items" :translations="translations" />

                    <div
                        v-if="hasPagination"
                        class="flex flex-wrap items-center justify-center gap-2 border-t border-gray-200 px-4 py-4 sm:justify-end"
                    >
                        <template
                            v-for="(link, index) in links"
                            :key="`${index}-${link.label}`"
                        >
                            <span
                                v-if="link.url === null"
                                class="rounded-md border border-gray-200 px-3 py-2 text-sm text-gray-400"
                                v-html="link.label"
                            />

                            <Link
                                v-else
                                :href="link.url"
                                class="rounded-md border px-3 py-2 text-sm transition"
                                :class="link.active
                                    ? 'border-gray-900 bg-gray-900 text-white'
                                    : 'border-gray-200 bg-white text-gray-700 hover:bg-gray-50'"
                                v-html="link.label"
                            />
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </AppLayout>
</template>