<script setup>
import { ref } from 'vue'
import AudienceCard from '@/Components/Home/AudienceCard.vue'

const props = defineProps({
    translations: {
        type: Object,
        required: true,
    },
    audiences: {
        type: Array,
        default: () => [],
    },
})

const cardsSlider = ref(null)
const activeAudienceIndex = ref(0)

function setActiveAudience(index) {
    activeAudienceIndex.value = index
}

function updateActiveAudience() {
    const slider = cardsSlider.value

    if (!slider) {
        return
    }

    const cards = Array.from(slider.querySelectorAll('article'))
    const sliderCenter = slider.scrollLeft + (slider.clientWidth / 2)
    const closest = cards.reduce((activeIndex, card, index) => {
        const currentCard = cards[activeIndex]
        const cardCenter = card.offsetLeft + (card.offsetWidth / 2)
        const currentCenter = currentCard.offsetLeft + (currentCard.offsetWidth / 2)

        return Math.abs(cardCenter - sliderCenter) < Math.abs(currentCenter - sliderCenter)
            ? index
            : activeIndex
    }, 0)

    setActiveAudience(closest)
}

function scrollToAudience(index) {
    const slider = cardsSlider.value
    const card = slider?.querySelectorAll('article')[index]

    if (!slider || !card) {
        return
    }

    const scrollLeft = card.offsetLeft - ((slider.clientWidth - card.offsetWidth) / 2)
    slider.scrollTo({ left: Math.max(0, scrollLeft), behavior: 'smooth' })
    setActiveAudience(index)
}
</script>

<template>
    <section class="relative left-1/2 w-screen -translate-x-1/2 py-16 lg:py-20 overflow-hidden bg-[#f5f5f7] text-black dark:bg-black dark:text-white">
        <div class="mx-auto max-w-5xl px-6 text-center">
            <div class="mx-auto mb-10 max-w-4xl lg:mb-12">
                <span class="mb-4 inline-block text-[0.65rem] font-semibold uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                    {{ translations.eyebrow }}
                </span>

                <h2 class="text-4xl sm:text-5xl lg:text-7xl font-semibold leading-none tracking-[-0.04em] text-black dark:text-white">
                    {{ translations.title }}
                </h2>

                <p class="mx-auto mt-7 max-w-2xl text-sm sm:text-lg leading-6 sm:leading-7 text-black/65 dark:text-white/65">
                    {{ translations.description }}
                </p>
            </div>
        </div>

        <div class="relative">
            <div
                id="audience-cards"
                ref="cardsSlider"
                class="audience-cards flex snap-x snap-mandatory gap-4 py-2 overflow-x-auto px-[max(1rem,calc((100vw-72rem)/2))] sm:gap-5"
                @scroll.passive="updateActiveAudience"
            >
                <AudienceCard
                    v-for="audience in audiences"
                    :key="audience.title"
                    :audience="audience"
                />
            </div>

            <div
                class="mt-7 flex items-center justify-center gap-3"
                aria-hidden="true"
            >
                <button
                    v-for="(_, index) in props.audiences"
                    :key="index"
                    type="button"
                    class="h-2 rounded-full transition-all duration-300"
                    :class="activeAudienceIndex === index ? 'w-7 bg-black/60 dark:bg-white/60' : 'w-2 bg-black/22 dark:bg-white/22'"
                    tabindex="-1"
                    @click="scrollToAudience(index)"
                />
            </div>
        </div>

        <div class="flex items-center justify-center mt-12 md:mt-16 px-3 xl:px-0">
            <div class="w-fit xl:pt-6 text-center xl:text-start xl:border-t xl:border-black/8 xl:dark:border-red-600/50">
                <div class="text-sm font-semibold uppercase tracking-[0.20em] text-black dark:text-white">
                    {{ translations.insights.daily_reality.title }}
                </div>

                <p class="mt-3 text-xs leading-5 text-black/65 dark:text-white/65">
                    {{ translations.insights.daily_reality.description }}
                </p>
            </div>
        </div>
    </section>
</template>

<style scoped>
.audience-cards::-webkit-scrollbar {
    display: none;
}
</style>
