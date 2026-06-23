<script setup>
import { computed, inject } from 'vue'
import { Head } from '@inertiajs/vue3'
import PublicLayout from '@/Layouts/PublicLayout.vue'
import HeroSection from '@/Components/Home/HeroSection.vue'
import OpenAccessSection from '@/Components/Home/OpenAccessSection.vue'
import FeatureGrid from '@/Components/Home/FeatureGrid.vue'
import AudienceSection from '@/Components/Home/AudienceSection.vue'
import ClosingSection from '@/Components/Home/ClosingSection.vue'
import { audienceStyles } from '@/Composables/Home/homePageContent'

const route = inject('route')

const props = defineProps({
    translations: {
        type: Object,
        required: true,
    },
})

const currentYear = computed(() => new Date().getFullYear())
const features = computed(() => Object.values(props.translations.features))
const audiences = computed(() => {
    const items = props.translations.audience.items

    return Object.entries(items).map(([key, item]) => ({
        ...item,
        ...(audienceStyles[key] ?? {}),
    }))
})

const headTitle = computed(() => props.translations.meta.title)
const headDescription = computed(() => props.translations.meta.description)
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
        <div class="w-full max-w-6xl flex flex-col space-y-12 md:space-y-16 pb-12 md:pb-16 select-none">
            <HeroSection
                :connect-url="route('connect.index')"
                :translations="translations.hero"
            />
            <div class="w-full px-3 xl:px-0">
                <OpenAccessSection :translations="translations.open_access" />
            </div>
            <FeatureGrid :items="features" />
            <div class="w-full px-3 xl:px-0">
                <AudienceSection
                    :translations="translations.audience"
                    :audiences="audiences"
                />
            </div>
            <ClosingSection
                :current-year="currentYear"
                :translations="translations.closing"
            />
        </div>
    </PublicLayout>
</template>
