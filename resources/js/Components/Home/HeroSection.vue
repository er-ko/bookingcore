<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    connectUrl: {
        type: String,
        required: true,
    },
    currentYear: {
        type: [Number, String],
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const copyrightTag = computed(() =>
    props.translations.tags.copyright.replace(':year', props.currentYear)
)
</script>

<template>
    <section class="flex flex-col items-center space-y-10 text-center lg:space-y-12 py-16">
        <!-- Eyebrow -->
        <div class="flex flex-wrap items-center justify-center gap-3">
            <Link
                href="/"
                class="text-xs font-medium uppercase tracking-[0.3em] text-black/75 transition hover:text-black dark:text-white/75 dark:hover:text-white md:text-sm md:tracking-[0.35em]"
            >
                BookingCore
            </Link>
            <span class="h-1 w-1 rounded-full bg-black/20 dark:bg-white/20 hidden sm:block" />
            <div class="rounded-full border border-black/10 bg-white/70 px-3 py-1.5 text-[11px] font-medium uppercase tracking-[0.22em] text-black/55 backdrop-blur-sm dark:border-white/10 dark:bg-white/4 dark:text-white/55">
                {{ translations.badge }}
            </div>
        </div>

        <!-- Headline + description -->
        <div class="max-w-4xl space-y-5">
            <h1 class="text-5xl font-semibold tracking-[-0.04em] sm:text-6xl lg:text-[5.5rem] lg:leading-none">
                {{ translations.title.line_1 }}
                <span class="block text-black/35 dark:text-white/35">{{ translations.title.line_2 }}</span>
                <span class="block">{{ translations.title.line_3 }}</span>
            </h1>
            <p class="mx-auto max-w-xl text-base leading-7 text-black/55 dark:text-white/55 sm:text-lg sm:leading-8">
                {{ translations.description }}
            </p>
        </div>

        <!-- Bridge visual -->
        <div class="w-full max-w-lg overflow-x-auto scrollbar-hidden">
            <div class="w-full flex items-center justify-start gap-6">
                <!-- Customer node -->
                <div class="relative w-full max-w-1/2 rounded-2xl border border-black/10 bg-white/80 p-4 text-center backdrop-blur-sm dark:border-white/10 dark:bg-white/5">
                    <div class="absolute inset-x-0 top-0 h-px rounded-t-2xl bg-linear-to-r from-transparent via-black/12 to-transparent dark:via-white/12" />
                    <div class="mx-auto mb-2.5 flex h-8 w-8 items-center justify-center rounded-full border border-black/8 bg-black/[0.035] dark:border-white/10 dark:bg-white/4">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="text-black/50 dark:text-white/50">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    <div class="text-[10px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">{{ translations.bridge.customer }}</div>
                </div>

                <!-- Arrow -->
                <div class="flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-black/18 dark:text-white/18">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>

                <!-- BookingCore node -->
                <div class="relative w-full max-w-1/2 rounded-2xl border border-black/15 bg-black/5 p-4 text-center dark:border-white/15 dark:bg-white/[0.07]">
                    <div class="absolute inset-x-0 top-0 h-px rounded-t-2xl bg-linear-to-r from-transparent via-black/20 to-transparent dark:via-white/20" />
                    <div class="mx-auto mb-2.5 flex h-8 w-8 items-center justify-center rounded-full border border-black/12 bg-black/6 dark:border-white/15 dark:bg-white/8">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="text-black/60 dark:text-white/60">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                        </svg>
                    </div>
                    <div class="text-[10px] font-semibold uppercase tracking-[0.18em] text-black/60 dark:text-white/60">{{ translations.bridge.engine }}</div>
                </div>

                <!-- Arrow -->
                <div class="flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-black/18 dark:text-white/18">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>

                <!-- Calendar node -->
                <div class="relative w-full max-w-1/2 rounded-2xl border border-black/10 bg-white/80 p-4 text-center backdrop-blur-sm dark:border-white/10 dark:bg-white/5">
                    <div class="absolute inset-x-0 top-0 h-px rounded-t-2xl bg-linear-to-r from-transparent via-black/12 to-transparent dark:via-white/12" />
                    <div class="mx-auto mb-2.5 flex h-8 w-8 items-center justify-center rounded-full border border-black/8 bg-black/[0.035] dark:border-white/10 dark:bg-white/4">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="text-black/50 dark:text-white/50">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                    </div>
                    <div class="text-[10px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">{{ translations.bridge.calendar }}</div>
                </div>
            </div>
        </div>

        <!-- CTAs -->
        <div class="flex flex-col items-center gap-3 sm:flex-row">
            <Link
                :href="connectUrl"
                class="inline-flex items-center justify-center rounded-full border border-black bg-black px-6 py-3 text-sm font-medium uppercase tracking-[0.12em] text-white transition hover:translate-x-0.5 hover:cursor-pointer hover:bg-black/90 dark:border-white dark:bg-white dark:text-black dark:hover:bg-white/90"
            >
                {{ translations.actions.get_started }}
            </Link>
            <a
                href="https://github.com/er-ko/bookingcore"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center justify-center rounded-full border border-black/12 bg-white/70 px-6 py-3 text-sm font-medium uppercase tracking-[0.12em] text-black/70 transition hover:border-black/25 hover:text-black dark:border-white/10 dark:bg-white/4 dark:text-white/70 dark:hover:border-white/25 dark:hover:text-white"
            >
                {{ translations.actions.view_github }}
            </a>
        </div>

        <!-- Tags -->
        <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-xs uppercase tracking-[0.18em] text-black/38 dark:text-white/38">
            <span>{{ translations.tags.mit_license }}</span>
            <span>{{ translations.tags.public_code }}</span>
            <span>{{ copyrightTag }}</span>
        </div>
    </section>
</template>
