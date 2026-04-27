<script setup>
import { computed, inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import BookingTable from '@/Components/Dashboard/BookingTable.vue'

const route = inject('route')

const props = defineProps({
    bookings: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const items = computed(() => props.bookings?.data ?? [])
const links = computed(() => props.bookings?.links ?? [])
const hasPagination = computed(() => links.value.length > 3)
</script>

<template>
    <Head :title="translations.title" />

    <AppLayout>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="space-y-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div class="max-w-2xl">
                        <h1 class="text-3xl font-semibold tracking-tight text-black dark:text-white sm:text-4xl">
                            {{ translations.title }}
                        </h1>

                        <p class="mt-3 text-sm leading-6 text-black/55 dark:text-white/55 sm:text-base">
                            {{ translations.description }}
                        </p>
                    </div>

                    <div>
                        <Link
                            :href="route('dashboard.create')"
                            class="inline-flex items-center rounded-full border border-dashed border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/75 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/75 dark:hover:border-white/45 dark:hover:text-white"
                        >
                            {{ translations.create_booking }}
                        </Link>
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
                    <div
                        v-if="items.length === 0"
                        class="flex flex-col items-center justify-center px-6 py-20 text-center"
                    >
                        <h2 class="text-xl font-semibold tracking-tight text-black dark:text-white">
                            {{ translations.no_bookings_found }}
                        </h2>

                        <p class="mt-3 max-w-md text-sm leading-6 text-black/50 dark:text-white/50">
                            {{ translations.no_bookings_text }}
                        </p>

                        <div class="mt-8">
                            <Link
                                :href="route('dashboard.create')"
                                class="inline-flex items-center rounded-full border border-dashed border-black/20 px-5 py-2.5 text-sm font-medium text-black/75 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/75 dark:hover:border-white/45 dark:hover:text-white"
                            >
                                {{ translations.create_first_booking }}
                            </Link>
                        </div>
                    </div>

                    <template v-else>
                        <BookingTable :bookings="items" :translations="translations" />

                        <div
                            v-if="hasPagination"
                            class="flex flex-wrap items-center justify-center gap-2 border-t border-black/10 px-4 py-4 dark:border-white/10 sm:justify-end"
                        >
                            <template
                                v-for="(link, index) in links"
                                :key="`${index}-${link.label}`"
                            >
                                <span
                                    v-if="link.url === null"
                                    class="rounded-full border border-black/10 px-3 py-2 text-sm text-black/30 dark:border-white/10 dark:text-white/30"
                                    v-html="link.label"
                                />

                                <Link
                                    v-else
                                    :href="link.url"
                                    class="rounded-full border px-3 py-2 text-sm transition-all duration-150"
                                    :class="link.active
                                        ? 'border-black bg-black text-white dark:border-white dark:bg-white dark:text-black'
                                        : 'border-black/10 text-black/55 hover:border-black/30 hover:text-black dark:border-white/10 dark:text-white/55 dark:hover:border-white/30 dark:hover:text-white'"
                                    v-html="link.label"
                                />
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </AppLayout>
</template>