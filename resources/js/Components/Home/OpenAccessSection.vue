<script setup>
defineProps({
    translations: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <section class="relative overflow-hidden rounded-[2.2rem] border border-emerald-500/14 bg-[radial-gradient(circle_at_top_left,rgba(16,185,129,0.12),transparent_36%),radial-gradient(circle_at_bottom_right,rgba(16,185,129,0.08),transparent_34%)] px-4 py-6 md:py-10 dark:border-emerald-300/14 dark:bg-[radial-gradient(circle_at_top_left,rgba(52,211,153,0.14),transparent_36%),radial-gradient(circle_at_bottom_right,rgba(52,211,153,0.08),transparent_34%)] sm:px-8 sm:py-12 lg:px-10 lg:py-14">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute left-[6%] top-[14%] h-28 w-28 rounded-full bg-emerald-500/10 blur-3xl dark:bg-emerald-300/12" />
            <div class="absolute right-[8%] top-[18%] h-36 w-36 rounded-full bg-emerald-500/8 blur-3xl dark:bg-emerald-300/10" />
            <div class="absolute bottom-[10%] left-1/2 h-28 w-28 -translate-x-1/2 rounded-full bg-emerald-500/6 blur-3xl dark:bg-emerald-300/8" />
        </div>

        <div class="relative grid gap-8 lg:grid-cols-[0.92fr_1.08fr] lg:items-center lg:gap-10">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 rounded-full border border-emerald-600/15 bg-emerald-500/8 px-3.5 py-1.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-emerald-700 dark:border-emerald-300/15 dark:bg-emerald-300/10 dark:text-emerald-300">
                    <span class="h-2 w-2 rounded-full bg-emerald-600 dark:bg-emerald-300" />
                    {{ translations.badge }}
                </div>

                <div class="space-y-4">
                    <h2 class="max-w-3xl text-3xl font-semibold tracking-[-0.05em] text-emerald-800 dark:text-emerald-200 sm:text-4xl lg:text-[3.35rem] lg:leading-[1.02]">
                        {{ translations.title }}
                    </h2>

                    <p class="max-w-xl text-sm leading-8 text-emerald-950/72 dark:text-emerald-100/75 sm:text-base">
                        {{ translations.description }}
                    </p>
                </div>

                <div class="flex flex-wrap gap-2.5 pt-1">
                    <div class="rounded-full border border-emerald-600/12 bg-white/75 px-3.5 py-2 text-[11px] font-medium uppercase tracking-[0.18em] text-emerald-800/80 dark:border-emerald-300/12 dark:bg-white/4 dark:text-emerald-200/80">
                        {{ translations.tags.subscription }}
                    </div>

                    <div class="rounded-full border border-emerald-600/12 bg-white/75 px-3.5 py-2 text-[11px] font-medium uppercase tracking-[0.18em] text-emerald-800/80 dark:border-emerald-300/12 dark:bg-white/4 dark:text-emerald-200/80">
                        {{ translations.tags.codebase }}
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <article class="sm:col-span-2 overflow-hidden rounded-[1.7rem] border border-emerald-600/14 bg-white/78 p-5 shadow-[0_20px_50px_-28px_rgba(16,185,129,0.45)] backdrop-blur-md dark:border-emerald-300/14 dark:bg-white/5 dark:shadow-[0_20px_50px_-28px_rgba(52,211,153,0.22)] sm:p-6">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <div class="text-[11px] font-semibold uppercase tracking-[0.22em] text-emerald-700 dark:text-emerald-300">
                                {{ translations.highlight.eyebrow }}
                            </div>

                            <h3 class="mt-3 text-xl font-semibold tracking-[-0.03em] text-black dark:text-white sm:text-2xl">
                                {{ translations.highlight.title }}
                            </h3>
                        </div>

                        <div class="rounded-full border border-emerald-600/12 bg-emerald-500/8 px-3 py-1.5 text-[11px] font-medium uppercase tracking-[0.18em] text-nowrap text-emerald-700 dark:border-emerald-300/12 dark:bg-emerald-300/10 dark:text-emerald-300">
                            {{ translations.highlight.badge }}
                        </div>
                    </div>

                    <p class="mt-4 max-w-2xl text-sm leading-7 text-black/65 dark:text-white/65">
                        {{ translations.highlight.description }}
                    </p>

                    <div class="mt-6 grid gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl border border-black/6 bg-black/3 px-4 py-3 text-sm text-black/70 dark:border-white/8 dark:bg-white/3 dark:text-white/70">
                            <div class="text-[11px] font-medium uppercase tracking-[0.18em] text-black/38 dark:text-white/38">
                                {{ translations.points.access.title }}
                            </div>
                            <div class="mt-2 font-medium text-black dark:text-white">
                                {{ translations.points.access.value }}
                            </div>
                        </div>

                        <div class="rounded-2xl border border-black/6 bg-black/3 px-4 py-3 text-sm text-black/70 dark:border-white/8 dark:bg-white/3 dark:text-white/70">
                            <div class="text-[11px] font-medium uppercase tracking-[0.18em] text-black/38 dark:text-white/38">
                                {{ translations.points.code.title }}
                            </div>
                            <div class="mt-2 font-medium text-black dark:text-white">
                                {{ translations.points.code.value }}
                            </div>
                        </div>

                        <div class="rounded-2xl border border-black/6 bg-black/3 px-4 py-3 text-sm text-black/70 dark:border-white/8 dark:bg-white/3 dark:text-white/70">
                            <div class="text-[11px] font-medium uppercase tracking-[0.18em] text-black/38 dark:text-white/38">
                                {{ translations.points.control.title }}
                            </div>
                            <div class="mt-2 font-medium text-black dark:text-white">
                                {{ translations.points.control.value }}
                            </div>
                        </div>
                    </div>
                </article>

                <article class="rounded-3xl border border-emerald-600/14 bg-white/74 p-5 backdrop-blur-sm dark:border-emerald-300/14 dark:bg-white/4">
                    <div class="text-[11px] font-semibold uppercase tracking-[0.22em] text-emerald-700 dark:text-emerald-300">
                        {{ translations.cards.why_it_matters.title }}
                    </div>

                    <p class="mt-3 text-sm leading-7 text-black/65 dark:text-white/65">
                        {{ translations.cards.why_it_matters.description }}
                    </p>
                </article>

                <article class="rounded-3xl border border-emerald-600/14 bg-white/74 p-5 backdrop-blur-sm dark:border-emerald-300/14 dark:bg-white/4">
                    <div class="text-[11px] font-semibold uppercase tracking-[0.22em] text-emerald-700 dark:text-emerald-300">
                        {{ translations.cards.practical_outcome.title }}
                    </div>

                    <p class="mt-3 text-sm leading-7 text-black/65 dark:text-white/65">
                        {{ translations.cards.practical_outcome.description }}
                    </p>
                </article>
            </div>
        </div>
    </section>
</template>