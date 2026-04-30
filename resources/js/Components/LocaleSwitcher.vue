<script setup>
import { computed, inject, ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'

const route = inject('route')
const page = usePage()
const processing = ref(false)

const locale = computed(() => page.props.locale ?? {})
const currentLocale = computed(() => locale.value.current ?? 'en')

const locales = computed(() => Object.entries(locale.value.supported ?? {}).map(([code, details]) => ({
    code,
    label: [
        details.flag_emoji,
        details.local_name ?? details.native_name ?? details.name ?? code.toUpperCase(),
    ].filter(Boolean).join(' '),
})))

function updateLocale(event) {
    const nextLocale = event.target.value

    if (!nextLocale || nextLocale === currentLocale.value || processing.value) {
        return
    }

    processing.value = true

    router.post(route('locale.update'), {
        locale: nextLocale,
    }, {
        preserveScroll: true,
        onFinish: () => {
            processing.value = false
        },
    })
}
</script>

<template>
    <label
        v-if="locales.length > 1"
        class="relative inline-flex items-center"
    >
        <span class="sr-only">Language</span>

        <select
            :value="currentLocale"
            :disabled="processing"
            class="h-9 appearance-none rounded-full border border-black/10 bg-white/70 py-1.5 ps-3 pe-8 text-xs font-medium text-black/60 outline-none transition hover:cursor-pointer hover:border-black/25 hover:text-black disabled:cursor-wait disabled:opacity-60 dark:border-white/10 dark:bg-white/[0.04] dark:text-white/60 dark:hover:border-white/25 dark:hover:text-white"
            @change="updateLocale"
        >
            <option
                v-for="item in locales"
                :key="item.code"
                :value="item.code"
            >
                {{ item.label }}
            </option>
        </select>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="14"
            height="14"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="pointer-events-none absolute right-3 text-black/35 dark:text-white/35"
        >
            <path d="m6 9 6 6 6-6" />
        </svg>
    </label>
</template>
