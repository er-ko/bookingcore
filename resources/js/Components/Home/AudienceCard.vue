<script setup>
defineProps({
    audience: {
        type: Object,
        required: true,
    },
})
</script>

<template>
    <article
        :class="audience.cardClass"
        class="rounded-[1.6rem] border px-5 py-5 transition-colors duration-300 lg:px-6 lg:py-6"
    >
        <div
            :class="audience.eyebrowClass"
            class="flex items-center gap-2 text-[11px] font-medium uppercase tracking-[0.22em]"
        >
            <span
                :class="audience.dotClass"
                class="h-1.5 w-1.5 rounded-full"
            />
            {{ audience.eyebrow }}
        </div>

        <h3 class="mt-3 text-base font-semibold tracking-[-0.02em] text-black dark:text-white sm:text-lg">
            {{ audience.title }}
        </h3>

        <p class="mt-3.5 text-sm leading-7 text-black/60 dark:text-white/60">
            {{ audience.description }}
        </p>
    </article>
</template>