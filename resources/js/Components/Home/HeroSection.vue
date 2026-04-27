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
    capabilities: {
        type: Array,
        default: () => [],
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
    <section class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr] lg:gap-14">
        <div class="space-y-9">
            <div class="flex flex-col space-x-0 space-y-4 md:flex-row md:items-center md:space-x-8 md:space-y-0">
                <Link
                    href="/"
                    class="ms-3 text-xs font-medium uppercase tracking-[0.25em] text-black/75 transition hover:text-black dark:text-white/75 dark:hover:text-white md:ms-0 md:text-sm md:tracking-[0.35em]"
                >
                    BookingCore
                </Link>

                <div class="w-fit rounded-full border border-black/10 bg-white/70 px-3 py-1.5 text-[11px] font-medium uppercase tracking-[0.24em] text-black/60 backdrop-blur-sm dark:border-white/10 dark:bg-white/4 dark:text-white/60">
                    {{ translations.badge }}
                </div>
            </div>

            <div class="space-y-6">
                <h1 class="max-w-4xl text-5xl font-semibold tracking-[-0.05em] sm:text-7xl lg:text-[5.8rem] lg:leading-[0.95]">
                    {{ translations.title.line_1 }}
                    <span class="block text-black/35 dark:text-white/35">
                        {{ translations.title.line_2 }}
                    </span>
                    <span class="block">
                        {{ translations.title.line_3 }}
                    </span>
                </h1>

                <p class="max-w-2xl text-base leading-8 text-black/58 dark:text-white/58 sm:text-lg">
                    {{ translations.description }}
                </p>
            </div>

            <div class="flex flex-col items-start gap-3 pt-1 sm:flex-row sm:items-center">
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

            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 pt-1 text-xs uppercase tracking-[0.18em] text-black/38 dark:text-white/38">
                <span>{{ translations.tags.mit_license }}</span>
                <span>{{ translations.tags.public_code }}</span>
                <span>{{ copyrightTag }}</span>
            </div>
        </div>

        <aside class="relative overflow-hidden rounded-4xl border border-black/10 bg-white/75 p-6 backdrop-blur-xl dark:border-white/10 dark:bg-white/4 sm:p-8">
            <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-black/15 to-transparent dark:via-white/15" />

            <div class="space-y-7">
                <div>
                    <div class="text-[11px] font-medium uppercase tracking-[0.22em] text-black/40 dark:text-white/40">
                        {{ translations.profile.title }}
                    </div>

                    <div class="mt-3.5 space-y-2.5 text-sm leading-7 text-black/62 dark:text-white/62">
                        <p>{{ translations.profile.text_1 }}</p>
                        <p>{{ translations.profile.text_2 }}</p>
                    </div>
                </div>

                <div class="rounded-3xl border border-black/8 bg-black/3 p-4.5 dark:border-white/8 dark:bg-white/3">
                    <div class="flex items-center justify-between text-[11px] uppercase tracking-[0.2em] text-black/38 dark:text-white/38">
                        <span>{{ translations.capabilities.title }}</span>
                        <span>{{ translations.capabilities.version }}</span>
                    </div>

                    <div class="mt-4.5 space-y-3">
                        <div
                            v-for="capability in capabilities"
                            :key="capability"
                            class="flex items-start gap-3 rounded-2xl border border-black/6 bg-white/70 px-4 py-3 text-sm leading-6 text-black/70 dark:border-white/8 dark:bg-white/3 dark:text-white/70"
                        >
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-black/55 dark:bg-white/55" />
                            <span>{{ capability }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </section>
</template>