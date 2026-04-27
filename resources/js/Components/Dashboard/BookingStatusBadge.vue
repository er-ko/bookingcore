<script setup>
import { computed } from 'vue'

const { status } = defineProps({
    status: {
        type: String,
        required: true,
    },
})

const statusConfig = Object.freeze({
    pending: {
        label: 'Pending',
        classes: 'bg-amber-100 text-amber-800 ring-amber-600/20',
    },
    confirmed: {
        label: 'Confirmed',
        classes: 'bg-blue-100 text-blue-800 ring-blue-600/20',
    },
    completed: {
        label: 'Completed',
        classes: 'bg-emerald-100 text-emerald-800 ring-emerald-600/20',
    },
    cancelled: {
        label: 'Cancelled',
        classes: 'bg-red-100 text-red-800 ring-red-600/20',
    },
})

const config = computed(() => {
    return statusConfig[status] ?? {
        label: status,
        classes: 'bg-gray-100 text-gray-800 ring-gray-600/20',
    }
})
</script>

<template>
    <span
        class="inline-flex items-center rounded-full px-3 py-1.5 text-xs font-medium text-nowrap ring-1 ring-inset select-none"
        :class="config.classes"
    >
        <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-current"></span>
        {{ config.label }}
    </span>
</template>