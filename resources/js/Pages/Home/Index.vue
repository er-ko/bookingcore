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
        <div class="space-y-12 select-none lg:space-y-16">
            <HeroSection
                :connect-url="route('connect.index')"
                :current-year="currentYear"
                :translations="translations.hero"
            />
            <OpenAccessSection :translations="translations.open_access" />
            <FeatureGrid :items="features" />
            <AudienceSection
                :translations="translations.audience"
                :audiences="audiences"
            />
            <ClosingSection :translations="translations.closing" />
        </div>
    </PublicLayout>
</template>
