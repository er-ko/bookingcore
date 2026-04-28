<script setup>
import { computed } from 'vue'
import { Head, Link, usePage } from '@inertiajs/vue3'
import PublicLayout from '@/Layouts/PublicLayout.vue'

const page = usePage()
const layoutTranslations = computed(() => page.props.layoutTranslations ?? {})
const authTranslations = computed(() => layoutTranslations.value.auth ?? {})
const appName = computed(() => page.props.app?.name ?? authTranslations.value.default_title ?? 'BookingCore')

const props = defineProps({
    title: {
        type: String,
        default: '',
    },
    heading: {
        type: String,
        default: '',
    },
    description: {
        type: String,
        default: '',
    },
    metaDescription: {
        type: String,
        default: '',
    },
})

const pageTitle = computed(() => props.title || authTranslations.value.default_title || 'BookingCore')
const pageHeading = computed(() => props.heading || authTranslations.value.default_heading || 'Connect')
const oauthNotice = computed(() => authTranslations.value.oauth_notice ?? 'Secure OAuth connection. No password is stored by BookingCore.')
</script>

<template>
    <Head :title="pageTitle">
        <meta
            v-if="metaDescription"
            head-key="description"
            name="description"
            :content="metaDescription"
        >
    </Head>

    <PublicLayout>
        <div class="mx-auto w-full max-w-4xl">
            <div class="select-none text-center">
                <Link
                    href="/"
                    class="inline-flex items-center gap-2 text-xs font-medium uppercase tracking-[0.25em] text-black/75 transition-all duration-150 hover:gap-3 hover:text-black dark:text-white/75 dark:hover:text-white md:text-sm md:tracking-[0.35em]"
                >
                    <span aria-hidden="true">←</span>
                    {{ appName }}
                </Link>

                <h1 class="mt-6 text-4xl font-semibold tracking-[-0.04em] sm:text-5xl lg:text-6xl">
                    {{ pageHeading }}
                </h1>

                <p
                    v-if="description"
                    class="mx-auto mt-4 max-w-2xl text-base leading-7 text-black/55 dark:text-white/55 sm:text-lg"
                >
                    {{ description }}
                </p>
            </div>

            <div class="mx-auto mt-10 max-w-4xl rounded-[2rem] border border-black/10 bg-black/[0.025] p-6 backdrop-blur-sm dark:border-white/10 dark:bg-white/[0.03] sm:p-8 md:p-9">
                <slot />
            </div>

            <div class="mx-auto mt-6 max-w-2xl text-center text-xs leading-5 select-none text-black/35 dark:text-white/35">
                {{ oauthNotice }}
            </div>
        </div>
    </PublicLayout>
</template>
