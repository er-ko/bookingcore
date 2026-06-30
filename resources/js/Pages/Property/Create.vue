<script setup>
import { inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import PropertyForm from '@/Components/Property/PropertyForm.vue'

const route = inject('route')

defineProps({
    countries: {
        type: Array,
        required: true,
    },
    rentalTypes: {
        type: Array,
        required: true,
    },
    propertyTypes: {
        type: Array,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <Head :title="`${translations.title} ${translations.meta.suffix}`" />

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
                            :href="route('properties.index')"
                            class="inline-flex items-center rounded-full border border-dashed border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/75 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/75 dark:hover:border-white/45 dark:hover:text-white"
                        >
                            {{ translations.back_to_list }}
                        </Link>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[0.95fr_1.55fr]">
                    <aside class="h-fit overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
                        <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
                            <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                                {{ translations.overview.title }}
                            </h2>
                        </div>

                        <div class="space-y-7 px-6 py-6">
                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.rental_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.rental_text }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.location_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.location_text }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.pricing_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.pricing_text }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.limit_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.limit_text }}
                                </p>
                            </div>
                        </div>
                    </aside>

                    <div>
                        <PropertyForm
                            :countries="countries"
                            :rental-types="rentalTypes"
                            :property-types="propertyTypes"
                            :translations="translations"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
