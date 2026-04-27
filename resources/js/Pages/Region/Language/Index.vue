<script setup>
import { computed, inject, ref } from 'vue'
import { Head, Link, router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import LanguageTable from '@/Components/Region/Language/LanguageTable.vue'

const route = inject('route')

const props = defineProps({
    languages: {
        type: Object,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const items = computed(() => props.languages?.data ?? [])
const links = computed(() => props.languages?.meta?.links ?? [])
const hasPagination = computed(() => (props.languages?.meta?.last_page ?? 1) > 1)

const selectedIds = ref([])
const processing = ref(false)

const allCurrentPageSelected = computed(() => {
    if (items.value.length === 0) {
        return false
    }

    return items.value.every(language => selectedIds.value.includes(language.id))
})

const selectedCount = computed(() => selectedIds.value.length)
const hasSelected = computed(() => selectedCount.value > 0)

function toggleSelectAllCurrentPage() {
    const pageIds = items.value.map(language => language.id)

    if (allCurrentPageSelected.value) {
        selectedIds.value = selectedIds.value.filter(id => !pageIds.includes(id))
        return
    }

    selectedIds.value = Array.from(new Set([...selectedIds.value, ...pageIds]))
}

function toggleSelection(languageId) {
    if (selectedIds.value.includes(languageId)) {
        selectedIds.value = selectedIds.value.filter(id => id !== languageId)
        return
    }

    selectedIds.value = [...selectedIds.value, languageId]
}

function updateStatus({ scope, ids = [], isActive }) {
    if (processing.value) {
        return
    }

    processing.value = true

    router.patch(route('region.languages.status'), {
        scope,
        language_ids: ids,
        is_active: isActive,
    }, {
        preserveScroll: true,
        onSuccess: () => {
            selectedIds.value = []
        },
        onFinish: () => {
            processing.value = false
        },
    })
}

function activateSelected() {
    if (!selectedIds.value.length) {
        return
    }

    updateStatus({
        scope: 'selected',
        ids: selectedIds.value,
        isActive: true,
    })
}

function deactivateSelected() {
    if (!selectedIds.value.length) {
        return
    }

    updateStatus({
        scope: 'selected',
        ids: selectedIds.value,
        isActive: false,
    })
}

function activateAll() {
    updateStatus({
        scope: 'all',
        isActive: true,
    })
}

function deactivateAll() {
    updateStatus({
        scope: 'all',
        isActive: false,
    })
}

function activateOne(languageId) {
    updateStatus({
        scope: 'single',
        ids: [languageId],
        isActive: true,
    })
}

function deactivateOne(languageId) {
    updateStatus({
        scope: 'single',
        ids: [languageId],
        isActive: false,
    })
}
</script>

<template>
    <Head :title="translations.title" />

    <AppLayout>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-end">
                <div>
                    <h1 class="text-3xl font-semibold tracking-tight text-black dark:text-white sm:text-4xl">
                        {{ translations.title }}
                    </h1>

                    <p class="mt-3 text-sm leading-6 text-black/55 dark:text-white/55 sm:text-base">
                        {{ translations.description }}
                    </p>
                </div>
            </div>

            <div class="mt-6 rounded-3xl border border-blue-500/15 bg-blue-500/[0.04] px-5 py-4 dark:border-blue-400/15 dark:bg-blue-400/[0.06]">
                <p class="text-center text-sm leading-6 text-black/65 dark:text-white/65">
                    {{ translations.alerts.future_behavior_note }}
                </p>
            </div>

            <div
                v-if="items.length > 0"
                class="mt-8 mb-4 flex flex-col gap-3 rounded-3xl border border-black/10 px-4 py-4 dark:border-white/10 md:flex-row md:items-center md:justify-between"
            >
                <div class="flex items-center">
                    <span class="w-full rounded-full border border-black/10 px-4 py-2 text-center text-xs select-none text-black/45 dark:border-white/10 dark:text-white/45 md:w-fit">
                        {{ selectedCount }} {{ translations.actions.selected }}
                    </span>
                </div>

                <div class="flex flex-col gap-1.5 md:flex-row lg:items-end">
                    <button
                        type="button"
                        class="rounded-full border border-black/15 px-4 py-2 text-xs select-none text-black/70 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/35 dark:hover:text-white disabled:opacity-40"
                        :disabled="!hasSelected || processing"
                        @click="activateSelected"
                    >
                        {{ translations.actions.activate_selected }}
                    </button>

                    <button
                        type="button"
                        class="rounded-full border border-black/15 px-4 py-2 text-xs select-none text-black/70 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/35 dark:hover:text-white disabled:opacity-40"
                        :disabled="!hasSelected || processing"
                        @click="deactivateSelected"
                    >
                        {{ translations.actions.deactivate_selected }}
                    </button>

                    <button
                        type="button"
                        class="rounded-full border border-black/10 px-4 py-2 text-xs select-none text-black/55 transition hover:cursor-pointer hover:border-black/30 hover:text-black dark:border-white/10 dark:text-white/55 dark:hover:border-white/30 dark:hover:text-white disabled:opacity-40"
                        :disabled="processing"
                        @click="activateAll"
                    >
                        {{ translations.actions.set_all_active }}
                    </button>

                    <button
                        type="button"
                        class="rounded-full border border-black/10 px-4 py-2 text-xs select-none text-black/55 transition hover:cursor-pointer hover:border-black/30 hover:text-black dark:border-white/10 dark:text-white/55 dark:hover:border-white/30 dark:hover:text-white disabled:opacity-40"
                        :disabled="processing"
                        @click="deactivateAll"
                    >
                        {{ translations.actions.set_all_inactive }}
                    </button>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
                <LanguageTable
                    :languages="items"
                    :selected-ids="selectedIds"
                    :all-current-page-selected="allCurrentPageSelected"
                    :translations="translations"
                    @toggle-select-all-current-page="toggleSelectAllCurrentPage"
                    @toggle-selection="toggleSelection"
                    @activate-one="activateOne"
                    @deactivate-one="deactivateOne"
                />
            </div>

            <div
                v-if="hasPagination"
                class="mt-6 flex flex-wrap items-center justify-center gap-2 pb-12"
            >
                <template
                    v-for="(link, index) in links"
                    :key="`${index}-${link.label}`"
                >
                    <span
                        v-if="link.url === null"
                        class="rounded-full border border-black/10 px-3 py-2 text-sm text-black/30 dark:border-white/10 dark:text-white/30"
                        v-html="link.label"
                    />

                    <Link
                        v-else
                        :href="link.url"
                        class="rounded-full border px-3 py-2 text-sm transition-all duration-150"
                        :class="link.active
                            ? 'border-black bg-black text-white dark:border-white dark:bg-white dark:text-black'
                            : 'border-black/10 text-black/55 hover:border-black/30 hover:text-black dark:border-white/10 dark:text-white/55 dark:hover:border-white/30 dark:hover:text-white'"
                        v-html="link.label"
                    />
                </template>
            </div>
        </div>
    </AppLayout>
</template>