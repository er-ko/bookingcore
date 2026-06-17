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
        class="relative flex min-h-[430px] w-[86vw] max-w-[980px] flex-shrink-0 snap-center flex-col overflow-hidden rounded-[2rem] shadow-[0_28px_90px_-55px_rgba(0,0,0,0.7)] transition-transform duration-300 hover:scale-[1.01] sm:min-h-[520px] sm:w-[74vw] lg:w-[72vw] xl:w-[980px]"
    >
        <div
            :class="audience.visualClass"
            class="absolute inset-0"
        />

        <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-black/28 to-transparent" />
        <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/82 via-black/36 to-transparent" />

        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div
                :class="audience.orbClass"
                class="absolute -right-20 top-14 h-72 w-72 rounded-full blur-3xl sm:h-96 sm:w-96"
            />

            <div class="absolute left-8 top-1/2 h-24 w-64 -translate-y-1/2 rounded-full bg-white/12 blur-2xl sm:left-16 sm:h-32 sm:w-96" />

            <div class="absolute bottom-24 right-12 hidden h-28 w-56 -rotate-12 rounded-full border border-white/22 sm:block" />
            <div class="absolute bottom-32 right-20 hidden h-16 w-32 -rotate-12 rounded-full border border-white/18 sm:block" />
        </div>

        <div class="relative z-10 flex h-full flex-1 flex-col justify-between p-6 sm:p-8 lg:p-10">
            <div class="flex items-start justify-between gap-4">
                <span class="inline-flex rounded-full px-3.5 py-1.5 text-xs font-semibold shadow-sm backdrop-blur-md bg-white text-black">
                    {{ audience.eyebrow }}
                </span>

                <span class="hidden text-[0.68rem] font-semibold uppercase tracking-[0.18em] text-white/72 sm:inline">
                    BookingCore
                </span>
            </div>

            <div class="max-w-xl">
                <h3 class="text-4xl font-semibold leading-none tracking-[-0.04em] text-white sm:text-5xl lg:text-6xl">
                    {{ audience.title }}
                </h3>

                <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                    <p class="max-w-md text-sm leading-7 text-white/80 sm:text-base">
                        {{ audience.description }}
                    </p>
                </div>
            </div>
        </div>
    </article>
</template>
