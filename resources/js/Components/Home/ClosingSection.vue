<script setup>
defineProps({
    translations: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <section class="relative overflow-hidden py-20 sm:px-8 sm:py-28 lg:px-12 lg:py-32">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute left-[10%] top-[18%] h-36 w-36 rounded-full bg-black/4 blur-3xl dark:bg-white/5" />
            <div class="absolute right-[12%] top-[26%] h-40 w-40 rounded-full bg-black/3 blur-3xl dark:bg-white/4" />
            <div class="absolute bottom-[14%] left-1/2 h-32 w-32 -translate-x-1/2 rounded-full bg-black/3.5 blur-3xl dark:bg-white/4" />
        </div>

        <div class="relative flex flex-col items-center text-center">
            <div class="inline-flex items-center gap-3 rounded-full border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-[11px] font-semibold uppercase tracking-[0.24em] text-emerald-700 shadow-[0_14px_30px_-18px_rgba(16,185,129,0.55)] dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300 dark:shadow-[0_14px_30px_-18px_rgba(52,211,153,0.35)]">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500/55 dark:bg-emerald-300/55" />
                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-emerald-600 dark:bg-emerald-300" />
                </span>
                <span>{{ translations.badge }}</span>
            </div>

            <h2 class="mt-8 text-5xl font-semibold tracking-[-0.08em] text-black transition-opacity duration-500 dark:text-white sm:text-7xl lg:text-[7.5rem] lg:leading-[0.92]">
                <span class="inline-block">{{ translations.title }}</span>
            </h2>

            <p class="mt-6 max-w-2xl text-sm leading-8 text-black/58 dark:text-white/58 sm:text-lg">
                {{ translations.description }}
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-xs uppercase tracking-[0.18em] text-black/38 dark:text-white/38">
                <span>{{ translations.tags.open_source }}</span>
                <span>{{ translations.tags.mit_license }}</span>
                <span>{{ translations.tags.public_code }}</span>
                <span>{{ translations.tags.booking_infrastructure }}</span>
            </div>
        </div>
    </section>
</template>