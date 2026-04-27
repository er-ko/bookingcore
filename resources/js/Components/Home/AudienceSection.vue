<script setup>
import AudienceCard from '@/Components/Home/AudienceCard.vue'

defineProps({
    translations: {
        type: Object,
        required: true,
    },
    audiences: {
        type: Array,
        default: () => [],
    },
})
</script>

<template>
    <section class="rounded-4xl border border-black/10 bg-white/72 p-6 backdrop-blur-xl dark:border-white/10 dark:bg-white/4 sm:p-8 lg:p-10">
        <div class="grid gap-8 lg:grid-cols-[0.92fr_1.08fr] lg:gap-12">
            <div class="flex flex-col justify-between gap-8">
                <div class="space-y-4">
                    <div class="text-[11px] font-medium uppercase tracking-[0.24em] text-black/40 dark:text-white/40">
                        {{ translations.eyebrow }}
                    </div>

                    <h2 class="max-w-xl text-3xl font-semibold tracking-[-0.04em] text-black dark:text-white sm:text-4xl">
                        {{ translations.title }}
                    </h2>

                    <p class="max-w-lg text-sm leading-7 text-black/60 dark:text-white/60 sm:text-base">
                        {{ translations.description }}
                    </p>
                </div>

                <div class="grid gap-8 rounded-[1.4rem] border border-dashed border-black/15 px-6 py-7 dark:border-white/15">
                    <div>
                        <div class="text-[11px] font-medium uppercase tracking-[0.22em] text-black/38 dark:text-white/38">
                            {{ translations.insights.daily_reality.title }}
                        </div>

                        <p class="mt-3 text-sm leading-7 text-black/60 dark:text-white/60">
                            {{ translations.insights.daily_reality.description }}
                        </p>
                    </div>

                    <div class="block h-px w-full border-t border-black/5 dark:border-white/5" />

                    <div>
                        <div class="text-[11px] font-medium uppercase tracking-[0.22em] text-black/38 dark:text-white/38">
                            {{ translations.insights.common_thread.title }}
                        </div>

                        <p class="mt-3 text-sm leading-7 text-black/60 dark:text-white/60">
                            {{ translations.insights.common_thread.description }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:gap-5">
                <AudienceCard
                    v-for="audience in audiences"
                    :key="audience.title"
                    :audience="audience"
                />
            </div>
        </div>
    </section>
</template>