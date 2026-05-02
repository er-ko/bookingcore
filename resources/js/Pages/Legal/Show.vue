<script setup>
import { computed } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import PublicLayout from '@/Layouts/PublicLayout.vue'

const props = defineProps({
    document: {
        type: Object,
        required: true,
    },
})

const headTitle = computed(() => props.document.meta?.title ?? props.document.title)
const headDescription = computed(() => props.document.meta?.description ?? props.document.intro)
</script>

<template>
    <Head :title="headTitle">
        <meta
            head-key="description"
            name="description"
            :content="headDescription"
        >
    </Head>

    <PublicLayout>
        <article class="mx-auto w-full max-w-4xl py-10 select-text sm:py-14 lg:py-16">
            <header class="space-y-7 border-b border-black/10 pb-10 text-center dark:border-white/10">
                <Link
                    href="/"
                    class="inline-flex items-center gap-2 text-xs font-medium uppercase tracking-[0.25em] text-black/75 transition-all duration-150 hover:gap-3 hover:text-black dark:text-white/75 dark:hover:text-white md:text-sm md:tracking-[0.35em]"
                >
                    <span aria-hidden="true">←</span>
                    BookingCore
                </Link>

                <div class="mx-auto max-w-3xl space-y-5">
                    <h1 class="text-4xl font-semibold sm:text-5xl lg:text-6xl">
                        {{ document.title }}
                    </h1>
                    <p class="mx-auto max-w-2xl text-sm uppercase tracking-[0.18em] text-black/40 dark:text-white/40">
                        {{ document.updated }}
                    </p>
                    <p class="mx-auto max-w-2xl text-base leading-7 text-black/60 dark:text-white/60 sm:text-lg sm:leading-8">
                        {{ document.intro }}
                    </p>
                </div>
            </header>

            <div class="divide-y divide-black/8 dark:divide-white/10">
                <section
                    v-for="section in document.sections"
                    :key="section.title"
                    class="grid gap-5 py-8 sm:grid-cols-[14rem_1fr] sm:gap-8"
                >
                    <h2 class="text-sm font-semibold uppercase tracking-[0.18em] text-black/55 dark:text-white/55">
                        {{ section.title }}
                    </h2>

                    <div class="space-y-4 text-base leading-7 text-black/65 dark:text-white/65">
                        <p
                            v-for="paragraph in section.body"
                            :key="paragraph"
                        >
                            {{ paragraph }}
                        </p>
                    </div>
                </section>
            </div>
        </article>
    </PublicLayout>
</template>
