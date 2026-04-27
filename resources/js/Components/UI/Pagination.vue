<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    links: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <div class="flex flex-wrap items-center justify-center gap-2 px-2 pb-6 md:px-0 sm:justify-end">
        <template
            v-for="(link, index) in links"
            :key="`${index}-${link.label}`"
        >
            <span
                v-if="link.url === null"
                class="rounded-full border border-black/10 px-3 py-2 text-sm select-none text-black/30 dark:border-white/10 dark:text-white/30"
                v-html="link.label"
            />

            <Link
                v-else
                :href="link.url"
                class="rounded-full border px-3 py-2 text-sm select-none transition-all duration-150"
                :class="link.active
                    ? 'border-black bg-black text-white dark:border-white dark:bg-white dark:text-black'
                    : 'border-black/10 text-black/55 hover:border-black/30 hover:text-black dark:border-white/10 dark:text-white/55 dark:hover:border-white/30 dark:hover:text-white'"
                v-html="link.label"
            />
        </template>
    </div>
</template>