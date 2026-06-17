<script setup>
import { computed } from 'vue'

const props = defineProps({
    translations: {
        type: Object,
        required: true,
    },
    currentYear: {
        type: [Number, String],
        required: true,
    },
})

const copyrightTag = computed(() =>
    props.translations.tags.copyright.replace(':year', props.currentYear)
)
</script>

<template>
    <section class="relative w-full overflow-hidden py-20 sm:py-28 lg:py-32 px-3 xl:px-0">
        <div class="flex flex-col items-center text-center">
            <div class="inline-flex items-center gap-3 rounded-full border border-emerald-500/20 bg-emerald-500/10 px-4 py-2.5 text-[0.6rem] font-semibold uppercase tracking-[0.20em] text-emerald-700 shadow-[0_14px_30px_-18px_rgba(16,185,129,0.55)] dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300 dark:shadow-[0_14px_30px_-18px_rgba(52,211,153,0.35)]">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500/55 dark:bg-emerald-300/55" />
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-600 dark:bg-emerald-300" />
                </span>
                <span>{{ translations.badge }}</span>
            </div>

            <h2 class="mt-10 text-5xl font-semibold tracking-[-0.08em] text-black transition-opacity duration-500 dark:text-white sm:text-7xl lg:text-[7.5rem] lg:leading-[0.92]">
                <span class="inline-block">{{ translations.title }}</span>
            </h2>

            <p class="mt-6 max-w-2xl text-sm sm:text-lg leading-6 sm:leading-8 text-black/65 dark:text-white/65">
                {{ translations.description }}
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-x-3 md:gap-x-4 gap-y-2 text-[0.7rem] md:text-xs uppercase tracking-[0.15em] text-black/65 dark:text-white/65">
                <span class="transition duration-300 ease-in-out hover:text-black dark:hover:text-white cursor-pointer">{{ translations.tags.public_code }}</span>
                <span class="transition duration-300 ease-in-out hover:text-black dark:hover:text-white cursor-pointer">{{ copyrightTag }}</span>
            </div>
        </div>
    </section>
</template>