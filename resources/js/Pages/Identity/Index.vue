<script setup>
import { computed, inject } from 'vue'
import { Head, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import IdentityForm from '@/Components/Identity/IdentityForm.vue'

const route = inject('route')

const props = defineProps({
    identity: {
        type: Object,
        default: () => ({}),
    },
    accountDeletion: {
        type: Object,
        default: () => ({}),
    },
    languages: {
        type: Array,
        default: () => ([]),
    },
    currencies: {
        type: Array,
        default: () => ([]),
    },
    countries: {
        type: Array,
        default: () => ([]),
    },
    translations: {
        type: Object,
        required: true,
    },
})

const hasPendingDeletion = computed(() => Boolean(props.accountDeletion?.has_pending_deletion))
const deletionScheduledFor = computed(() => props.accountDeletion?.deletion_scheduled_for ?? null)
const publicUrlExample = computed(() => {
    const slug = props.identity?.slug || props.translations.form.public_slug_placeholder

    return `${props.translations.form.public_slug_prefix}${slug}`
})

const formattedDeletionScheduledFor = computed(() => {
    if (!deletionScheduledFor.value) {
        return null
    }

    const date = new Date(deletionScheduledFor.value)

    if (Number.isNaN(date.getTime())) {
        return deletionScheduledFor.value
    }

    return new Intl.DateTimeFormat(undefined, {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    }).format(date)
})

function scheduleDeletion() {
    router.post(route('identity.schedule-deletion'), {}, {
        preserveScroll: true,
    })
}

function cancelDeletion() {
    router.post(route('identity.cancel-deletion'), {}, {
        preserveScroll: true,
    })
}
</script>

<template>
    <Head :title="translations.title" />

    <AppLayout>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="space-y-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div class="w-full">
                        <h1 class="text-3xl font-semibold tracking-tight text-black dark:text-white sm:text-4xl">
                            {{ translations.title }}
                        </h1>

                        <p class="mt-3 text-sm leading-6 text-black/55 dark:text-white/55 sm:text-base">
                            {{ translations.description }}
                        </p>
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
                                    {{ translations.overview.brand_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.brand_text }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.public_url_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.public_url_text.replace(':slug', publicUrlExample) }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.defaults_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.defaults_text }}
                                </p>
                            </div>

                            <div>
                                <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                    {{ translations.overview.visibility_title }}
                                </div>

                                <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                    {{ translations.overview.visibility_text }}
                                </p>
                            </div>
                        </div>
                    </aside>

                    <div class="space-y-6">
                        <IdentityForm
                            :identity="identity"
                            :languages="languages"
                            :currencies="currencies"
                            :countries="countries"
                            :translations="translations"
                        />

                        <aside class="overflow-hidden rounded-3xl border border-red-500/15 backdrop-blur-sm dark:border-red-400/15">
                            <div class="border-b border-red-500/15 px-6 py-4 dark:border-red-400/15">
                                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-red-700 dark:text-red-300">
                                    {{ translations.deletion.account_removal_title }}
                                </h2>
                            </div>

                            <div class="space-y-6 px-6 py-6">
                                <div>
                                    <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-red-700/70 dark:text-red-300/70">
                                        {{ translations.deletion.scheduled_deletion_title }}
                                    </div>

                                    <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                        {{ translations.deletion.scheduled_deletion_text }}
                                    </p>
                                </div>

                                <div>
                                    <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-red-700/70 dark:text-red-300/70">
                                        {{ translations.deletion.recovery_period_title }}
                                    </div>

                                    <p class="mt-1 text-sm leading-6 text-black/60 dark:text-white/60">
                                        {{ translations.deletion.recovery_period_text }}
                                    </p>
                                </div>

                                <div
                                    v-if="hasPendingDeletion && formattedDeletionScheduledFor"
                                    class="rounded-2xl border border-red-500/15 px-4 py-4 dark:border-red-400/15"
                                >
                                    <div class="text-[11px] font-medium uppercase tracking-[0.2em] text-red-700/70 dark:text-red-300/70">
                                        {{ translations.deletion.deletion_date_title }}
                                    </div>

                                    <p class="mt-2 text-sm leading-6 text-black/70 dark:text-white/70">
                                        {{ translations.deletion.deletion_date_text.replace(':date', formattedDeletionScheduledFor) }}
                                    </p>
                                </div>

                                <div class="border-t border-red-500/15 pt-6 dark:border-red-400/15">
                                    <button
                                        v-if="!hasPendingDeletion"
                                        type="button"
                                        class="inline-flex items-center justify-center rounded-full border border-red-500/20 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-red-700 transition hover:cursor-pointer hover:border-red-500/40 hover:text-red-800 dark:border-red-400/20 dark:text-red-300 dark:hover:border-red-400/40 dark:hover:text-red-200"
                                        @click="scheduleDeletion"
                                    >
                                        {{ translations.actions.schedule_account_deletion }}
                                    </button>

                                    <button
                                        v-else
                                        type="button"
                                        class="inline-flex items-center justify-center rounded-full border border-black/15 px-5 py-2.5 text-sm font-medium text-nowrap select-none text-black/70 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/35 dark:hover:text-white"
                                        @click="cancelDeletion"
                                    >
                                        {{ translations.actions.cancel_deletion }}
                                    </button>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
