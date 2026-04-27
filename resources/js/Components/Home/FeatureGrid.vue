<script setup>
defineProps({
    items: {
        type: Array,
        default: () => [],
    },
})
</script>

<template>
    <section class="grid gap-4 md:grid-cols-3 lg:gap-5">
        <article
            v-for="item in items"
            :key="item.title"
            class="rounded-[1.75rem] border border-black/10 bg-white/70 px-5 py-5 backdrop-blur-sm dark:border-white/10 dark:bg-white/4 lg:px-6 lg:py-6"
        >
            <div class="text-[11px] font-medium uppercase tracking-[0.22em] text-black/38 dark:text-white/38">
                {{ item.title }}
            </div>

            <p class="mt-3.5 text-sm leading-7 text-black/62 dark:text-white/62">
                {{ item.description }}
            </p>
        </article>
    </section>
</template>