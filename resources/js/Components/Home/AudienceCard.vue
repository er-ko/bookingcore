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
        class="relative flex min-h-[430px] w-[86vw] max-w-[980px] flex-shrink-0 snap-center flex-col overflow-hidden rounded-[2rem] shadow-[0_28px_90px_-55px_rgba(0,0,0,0.7)] transition-transform duration-300 hover:scale-[1.01] sm:min-h-[520px] sm:w-[74vw] lg:w-[72vw] xl:w-[980px] z-10"
    >
        <div
            :class="audience.visualClass"
            class="absolute inset-0"
        />

        <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-black/28 to-transparent" />
        <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/82 via-black/36 to-transparent" />

        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -right-20 top-24 w-[16rem] -rotate-6 opacity-70 sm:-right-8 sm:top-14 sm:w-[20rem] sm:opacity-80 md:w-[26rem] lg:right-10">
                <div class="relative aspect-[4/3]">
                    <div
                        :class="audience.orbClass"
                        class="absolute inset-x-16 top-6 h-24 rounded-[2rem] blur-2xl"
                    />

                    <svg
                        aria-hidden="true"
                        class="absolute inset-0 h-full w-full"
                        fill="none"
                        viewBox="0 0 520 390"
                    >
                        <rect
                            fill="white"
                            fill-opacity="0.12"
                            height="276"
                            rx="32"
                            stroke="white"
                            stroke-opacity="0.34"
                            stroke-width="2"
                            width="360"
                            x="78"
                            y="58"
                        />
                        <path
                            d="M78 142H438"
                            stroke="white"
                            stroke-opacity="0.3"
                            stroke-width="2"
                        />
                        <path
                            d="M156 58V32M360 58V32"
                            stroke="white"
                            stroke-linecap="round"
                            stroke-opacity="0.58"
                            stroke-width="14"
                        />
                        <path
                            d="M136 188H380M136 240H380M136 284H318M195 166V298M257 166V298M320 166V298"
                            stroke="white"
                            stroke-linecap="round"
                            stroke-opacity="0.2"
                            stroke-width="2"
                        />
                        <rect
                            fill="white"
                            fill-opacity="0.2"
                            height="34"
                            rx="12"
                            width="54"
                            x="136"
                            y="198"
                        />
                        <rect
                            fill="white"
                            fill-opacity="0.15"
                            height="34"
                            rx="12"
                            width="54"
                            x="261"
                            y="244"
                        />
                        <rect
                            fill="white"
                            fill-opacity="0.2"
                            height="34"
                            rx="12"
                            width="54"
                            x="325"
                            y="198"
                        />
                        <path
                            d="M152 217L161 224L176 210"
                            stroke="white"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-opacity="0.72"
                            stroke-width="5"
                        />
                        <path
                            d="M340 216L349 222L364 209"
                            stroke="white"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-opacity="0.72"
                            stroke-width="5"
                        />
                        <path
                            d="M466 174L488 196L466 218"
                            stroke="white"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-opacity="0.38"
                            stroke-width="10"
                        />
                        <path
                            d="M54 232L32 254L54 276"
                            stroke="white"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-opacity="0.22"
                            stroke-width="10"
                        />
                    </svg>
                </div>
            </div>
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
