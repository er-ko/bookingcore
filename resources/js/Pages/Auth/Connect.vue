<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'

defineProps({
    translations: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <AuthLayout
        :title="translations.meta_title"
        :heading="translations.heading"
        :description="translations.description"
        :meta-description="translations.meta_description"
    >
        <div class="space-y-0 md:space-y-6">
            <div class="mx-auto grid max-w-3xl gap-4 lg:grid-cols-[1.08fr_0.92fr]">
                <div
                    class="group relative overflow-hidden rounded-[1.9rem] border border-black/12 bg-white/85 p-6 text-left transition-all duration-200 ease-out hover:-translate-y-0.5 hover:border-black/25 hover:shadow-[0_18px_40px_-22px_rgba(0,0,0,0.35)] dark:border-white/12 dark:bg-white/4 dark:hover:border-white/22 dark:hover:shadow-[0_18px_40px_-22px_rgba(255,255,255,0.12)] sm:p-7"
                >
                    <div class="absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-black/15 to-transparent dark:via-white/15" />
                    <div class="pointer-events-none absolute right-0 top-0 h-24 w-24 rounded-full bg-black/3 blur-2xl dark:bg-white/5" />

                    <div class="flex h-full flex-col justify-between gap-12">
                        <div class="space-y-6">
                            <div class="flex items-center justify-between gap-4">
                                <div class="inline-flex h-13 w-13 items-center justify-center rounded-full border border-black/8 bg-black/3 dark:border-white/10 dark:bg-white/4">
                                    <svg class="h-5 w-5" viewBox="0 0 533.5 544.3" aria-hidden="true">
                                        <path fill="#4285F4" d="M533.5 278.4c0-18.6-1.5-37.2-4.7-55.3H272v104.8h147.2c-6.3 33.7-25 62.3-53.2 81.4v67h85.9c50.2-46.2 81.6-114.3 81.6-197.9z"/>
                                        <path fill="#34A853" d="M272 544.3c72.8 0 134-24.1 178.7-65.4l-85.9-67c-23.9 16-54.4 25.5-92.8 25.5-71.3 0-131.8-48.1-153.5-112.7H29.9v70.9C74.4 484.7 166.8 544.3 272 544.3z"/>
                                        <path fill="#FBBC05" d="M118.5 324.7c-10.4-30.9-10.4-64.1 0-95l-88.6-70.9C-15.5 214.7-15.5 329.6 29.9 395.6l88.6-70.9z"/>
                                        <path fill="#EA4335" d="M272 107.7c39.6-.6 77.6 14.3 106.5 41.7l79.5-79.5C413.9 24.4 343.4-1.6 272 0 166.8 0 74.4 59.6 29.9 158.8l88.6 70.9C140.2 155.8 200.7 107.7 272 107.7z"/>
                                    </svg>
                                </div>

                                <div class="rounded-full border border-black/8 px-3 py-1 text-[12px] font-light tracking-[0.15em] text-black/85 dark:border-white/10 dark:text-white/85">
                                    {{ translations.provider.google_badge }}
                                </div>
                            </div>

                            <div>
                                <div class="text-lg font-semibold tracking-tight text-black dark:text-white sm:text-[1.15rem]">
                                    {{ translations.provider.title }}
                                </div>

                                <div class="mt-2 max-w-sm text-sm leading-6 text-black/55 dark:text-white/55">
                                    {{ translations.provider.description }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-3">

                            <div class="text-xs uppercase tracking-[0.15em] text-black/35 dark:text-white/36">
                                {{ translations.provider.protocol }}
                            </div>

                            <a
                                :href="route('connect.google.redirect')"
                                class="inline-flex items-center gap-2 text-sm font-medium text-black/70 transition-all duration-150 group-hover:gap-3 group-hover:text-black dark:text-white/70 dark:group-hover:text-white"
                            >
                                <span>{{ translations.provider.action }}</span>
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block rounded-[1.9rem] border border-black/10 bg-black/3 p-6 dark:border-white/10 dark:bg-white/3 sm:p-7">
                    <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.flow.title }} [{{ translations.provider.protocol }}]
                    </div>
                    <!-- <div class="text-xs uppercase tracking-[0.18em] text-black/36 dark:text-white/36">
                        {{ translations.provider.protocol }}
                    </div> -->

                    <div class="mt-5 space-y-3">
                        <div class="rounded-[1.35rem] border border-black/8 bg-white/70 px-4 py-3.5 text-sm text-black/68 dark:border-white/8 dark:bg-white/3 dark:text-white/68">
                            1. {{ translations.flow.step_1 }}
                        </div>

                        <div class="rounded-[1.35rem] border border-black/8 bg-white/70 px-4 py-3.5 text-sm text-black/68 dark:border-white/8 dark:bg-white/3 dark:text-white/68">
                            2. {{ translations.flow.step_2 }}
                        </div>

                        <div class="rounded-[1.35rem] border border-black/8 bg-white/70 px-4 py-3.5 text-sm text-black/68 dark:border-white/8 dark:bg-white/3 dark:text-white/68">
                            3. {{ translations.flow.step_3 }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto max-w-3xl hidden md:flex flex-wrap items-center justify-center gap-x-2.5 gap-y-1 text-center text-xs uppercase tracking-[0.18em] text-black/38 dark:text-white/38">
                <span>{{ translations.tags.google }}</span>
                <span>{{ translations.tags.oauth }}</span>
                <span>{{ translations.tags.calendar_sync }}</span>
                <span>{{ translations.tags.availability }}</span>
                <span class="hidden lg:block">{{ translations.tags.booking_events }}</span>
            </div>
        </div>
    </AuthLayout>
</template>
