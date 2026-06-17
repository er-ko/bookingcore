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
        <article class="mx-auto w-full max-w-4xl py-12 md:py-16 xl:py-20 2xl:py-24 px-3 md:px-6 lg:px-0 select-text">
            <header class="space-y-6 pb-12 text-center border-b border-dashed border-black/10 dark:border-white/10">
                <Link
                    href="/"
                    class="inline-flex items-center gap-2 text-xs font-medium uppercase tracking-[0.25em] text-black/65 transition-all duration-150 hover:gap-3 hover:text-black dark:text-white/65 dark:hover:text-white md:text-sm md:tracking-[0.35em]"
                >
                    <span aria-hidden="true">←</span>
                    BookingCore
                </Link>

                <div class="mx-auto max-w-3xl">
                    <h1 class="text-4xl font-semibold sm:text-5xl lg:text-6xl">
                        {{ document.title }}
                    </h1>
                    <p class="mx-auto mt-2 md:mt-3 max-w-2xl text-sm uppercase tracking-[0.15em] md:tracking-[0.18rem] text-black/35 dark:text-white/35">
                        {{ document.updated }}
                    </p>
                    <p class="mx-auto mt-6 md:mt-8 max-w-2xl text-base leading-7 text-black/75 dark:text-white/75 sm:text-lg sm:leading-8">
                        {{ document.intro }}
                    </p>
                </div>
            </header>

            <div class="lg:divide-y lg:divide-dashed lg:divide-black/10 lg:dark:divide-white/10">
                <section
                    v-for="section in document.sections"
                    :key="section.title"
                    class="grid gap-3 lg:gap-8 py-10 md:py-12 lg:grid-cols-[14rem_1fr]"
                >
                    <h2 class="text-center lg:text-start text-sm font-semibold uppercase tracking-[0.12em] text-black dark:text-white">
                        {{ section.title }}
                    </h2>

                    <div class="space-y-4 text-center lg:text-start text-base leading-7 text-black/75 dark:text-white/75">
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
