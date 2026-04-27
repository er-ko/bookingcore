<script setup>
import { computed, inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import BranchForm from '@/Components/Branch/BranchForm.vue'

const route = inject('route')

const props = defineProps({
    branch: {
        type: Object,
        required: true,
    },
    countries: {
        type: Array,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const countriesCount = computed(() => props.countries?.length ?? 0)
</script>

<template>
    <Head :title="`${translations.title} - ${branch.name}`" />

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
                            :href="route('branches.index')"
                            class="inline-flex items-center rounded-full border border-dashed border-black/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/75 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/75 dark:hover:border-white/45 dark:hover:text-white"
                        >
                            {{ translations.back_to_branches }}
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
                                    {{ translations.overview.branch_id_title }}
                                </div>

                                <div class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ props.branch.public_id ?? props.branch.id }}
                                </div>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.status_title }}
                                </div>

                                <div class="mt-2">
                                    <span
                                        v-if="props.branch.is_active"
                                        class="inline-flex items-center rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-xs font-medium text-nowrap select-none text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300"
                                    >
                                        {{ translations.overview.active_title }}
                                    </span>

                                    <span
                                        v-else
                                        class="inline-flex items-center rounded-full border border-amber-500/20 bg-amber-500/10 px-3 py-1 text-xs font-medium text-nowrap select-none text-amber-700 dark:border-amber-400/20 dark:bg-amber-400/10 dark:text-amber-300"
                                    >
                                        {{ translations.overview.inactive_title }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.countries_available_title }}
                                </div>

                                <div class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ countriesCount }}
                                </div>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.timezone_title }}
                                </div>

                                <div class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.timezone_text }}
                                </div>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.required_title }}
                                </div>

                                <ul class="mt-1 space-y-0.5 text-sm leading-6 text-black/60 dark:text-white/60">
                                    <li>{{ translations.form.branch_name_title }}</li>
                                    <li>{{ translations.form.address_line_1_title }}</li>
                                    <li>{{ translations.overview.city_and_postcode_title }}</li>
                                    <li>{{ translations.overview.country_and_timezone_title }}</li>
                                </ul>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.optional_title }}
                                </div>

                                <ul class="mt-1 space-y-0.5 text-sm leading-6 text-black/60 dark:text-white/60">
                                    <li>{{ translations.form.address_line_2_title }}</li>
                                </ul>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.note_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.note_text }}
                                </p>
                            </div>
                        </div>
                    </aside>

                    <div>
                        <BranchForm
                            mode="edit"
                            :branch="branch"
                            :countries="countries"
                            :translations="translations"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>