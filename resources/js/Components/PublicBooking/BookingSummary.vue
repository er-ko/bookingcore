<script setup>
defineProps({
    translations: {
        type: Object,
        required: true,
    },
    compactSummary: {
        type: Object,
        required: true,
    },
    selectionCount: {
        type: Number,
        default: 0,
    },
    customerCount: {
        type: Number,
        default: 0,
    },
    branchStatusText: {
        type: String,
        required: true,
    },
    serviceStatusText: {
        type: String,
        required: true,
    },
    scheduleStatusText: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <aside class="space-y-4 xl:sticky xl:top-8 xl:self-start xl:space-y-6">
        <div class="overflow-hidden rounded-4xl border border-black/10 bg-white/75 backdrop-blur-sm dark:border-white/10 dark:bg-white/4.5">
            <div class="border-b border-black/10 px-5 py-4 dark:border-white/10 sm:px-7 sm:py-5">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-semibold tracking-[-0.02em] text-black dark:text-white">
                            {{ translations.content.summary_progress }}
                        </h2>
                        <p class="mt-1 text-sm text-black/50 dark:text-white/50">
                            {{ translations.content.review_live_text
                                .replace(':selection', selectionCount)
                                .replace(':customer', customerCount) }}
                        </p>
                    </div>

                    <div class="inline-flex items-center gap-2 rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1.5 text-[0.65rem] font-medium tracking-widest uppercase text-nowrap text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300">
                        <span class="h-2 w-2 rounded-full bg-emerald-600 dark:bg-emerald-300" />
                        {{ translations.content.summary_badge }}
                    </div>
                </div>
            </div>

            <div class="space-y-3 px-5 py-5 sm:px-7 sm:py-6">
                <div class="flex items-start justify-between gap-4 border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.branch_label }}
                    </p>

                    <div class="max-w-[72%] text-right">
                        <p class="text-sm font-medium text-black dark:text-white">
                            {{ compactSummary.branch_name || translations.content.summary_empty_selection }}
                        </p>
                        <p
                            v-if="compactSummary.branch_address"
                            class="mt-1 text-sm leading-5 text-black/55 dark:text-white/55"
                        >
                            {{ compactSummary.branch_address }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start justify-between gap-4 border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.unit_label }}
                    </p>

                    <div class="max-w-[72%] text-right">
                        <p class="text-sm font-medium text-black dark:text-white">
                            {{ compactSummary.unit_name || translations.content.summary_empty_selection }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start justify-between gap-4 border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.activity_label }}
                    </p>

                    <div class="max-w-[72%] flex flex-col items-end justify-center gap-1">
                        <p class="text-sm font-medium text-black dark:text-white">
                            {{ compactSummary.activity_name || translations.content.summary_empty_selection }}
                        </p>
                        <div
                            v-if="compactSummary.activity_price"
                            class="rounded-full border border-emerald-500/20 bg-emerald-500/10 px-2.5 py-1 text-xs font-semibold text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300"
                        >
                            {{ compactSummary.activity_price }}
                        </div>
                    </div>
                </div>

                <div class="flex items-start justify-between gap-4 border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.date_time_label }}
                    </p>

                    <div class="max-w-[72%] text-right">
                        <p class="text-sm font-medium text-black dark:text-white">
                            {{ compactSummary.date || translations.content.summary_empty_selection }}
                        </p>
                        <p
                            v-if="compactSummary.time"
                            class="mt-1 text-sm text-black/55 dark:text-white/55"
                        >
                            {{ compactSummary.time }}
                        </p>
                    </div>
                </div>

                <div class="flex items-start justify-between gap-4 border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.customer_label }}
                    </p>

                    <p class="max-w-[72%] text-right text-sm font-medium text-black dark:text-white">
                        {{ compactSummary.customer_name || translations.content.summary_empty_customer }}
                    </p>
                </div>

                <div class="flex items-start justify-between gap-4 border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.email_label }}
                    </p>

                    <p class="max-w-[72%] text-right text-sm font-medium text-black dark:text-white">
                        {{ compactSummary.customer_email || translations.content.summary_empty_customer }}
                    </p>
                </div>

                <div class="flex items-start justify-between gap-4">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.phone_label }}
                    </p>

                    <p class="max-w-[72%] text-right text-sm font-medium text-black dark:text-white">
                        {{ compactSummary.customer_phone || translations.content.summary_empty_customer }}
                    </p>
                </div>

                <div v-if="compactSummary.note" class="border-t border-black/8 pt-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.content.note_label }}
                    </p>
                    <p class="mt-2 text-sm leading-6 text-black/55 dark:text-white/55">
                        {{ compactSummary.note }}
                    </p>
                </div>
            </div>
        </div>

        <div class="rounded-[1.75rem] border border-black/10 bg-white/65 p-5 backdrop-blur-sm dark:border-white/10 dark:bg-white/3">
            <div class="space-y-4">
                <div class="border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-black/40 dark:text-white/40">
                        {{ translations.content.branch_status_title }}
                    </p>
                    <p class="mt-2 text-sm leading-6 text-black/60 dark:text-white/60">
                        {{ branchStatusText }}
                    </p>
                </div>

                <div class="border-b border-black/8 pb-3 dark:border-white/10">
                    <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-black/40 dark:text-white/40">
                        {{ translations.content.service_status_title }}
                    </p>
                    <p class="mt-2 text-sm leading-6 text-black/60 dark:text-white/60">
                        {{ serviceStatusText }}
                    </p>
                </div>

                <div>
                    <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-black/40 dark:text-white/40">
                        {{ translations.content.schedule_status_title }}
                    </p>
                    <p class="mt-2 text-sm leading-6 text-black/60 dark:text-white/60">
                        {{ scheduleStatusText }}
                    </p>
                </div>
            </div>
        </div>
    </aside>
</template>
