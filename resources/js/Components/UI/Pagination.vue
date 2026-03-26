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
    <div class="flex flex-wrap items-center justify-center gap-0.5 px-2 md:px-0 pb-6 sm:justify-end">
        <template v-for="(link, index) in links" :key="`${index}-${link.label}`">
            <span
                v-if="link.url === null"
                class="rounded-lg border border-gray-200 px-3 py-1.5 text-sm select-none text-gray-400"
                v-html="link.label"
            />

            <Link
                v-else
                :href="link.url"
                class="rounded-lg border py-1.5 px-2 text-sm select-none transition"
                :class="link.active
                    ? 'border-gray-900 bg-gray-900 text-white'
                    : 'border-gray-200 bg-white text-gray-700 hover:bg-gray-50'"
                v-html="link.label"
            />
        </template>
    </div>
</template>