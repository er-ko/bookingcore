<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    connectUrl: {
        type: String,
        required: true,
    },
    currentYear: {
        type: [Number, String],
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const copyrightTag = computed(() =>
    props.translations.tags.copyright.replace(':year', props.currentYear)
)
</script>

<template>
    <section class="flex flex-col items-center space-y-10 text-center lg:space-y-12 py-16 px-3">
        <!-- Eyebrow -->
        <div class="flex flex-wrap items-center justify-center gap-3">
            <Link
                href="/"
                class="text-xs font-medium uppercase tracking-[0.3em] text-black/75 transition hover:text-black dark:text-white/75 dark:hover:text-white md:text-sm md:tracking-[0.35em]"
            >
                {{ translations.appName }}
            </Link>
            <span class="h-1 w-1 rounded-full bg-black/20 dark:bg-white/20 hidden sm:block" />
            <div class="rounded-full border border-black/10 bg-white/70 px-3 py-1.5 text-[11px] font-medium uppercase tracking-[0.22em] text-black/55 backdrop-blur-sm dark:border-white/10 dark:bg-white/4 dark:text-white/55">
                {{ translations.badge }}
            </div>
        </div>

        <!-- Headline + description -->
        <div class="max-w-4xl space-y-16">
            <h1 class="text-5xl font-semibold tracking-[-0.04em] sm:text-6xl lg:text-[5.5rem] lg:leading-none">
                {{ translations.title.line_1 }}
                <span class="block text-black/35 dark:text-white/35">{{ translations.title.line_2 }}</span>
                <span class="block">{{ translations.title.line_3 }}</span>
            </h1>
            <p class="mx-auto max-w-xl text-base leading-7 text-black/55 dark:text-white/55 sm:text-lg sm:leading-8">
                {{ translations.description }}
            </p>
        </div>

        <!-- Bridge Visual (desktop) -->
        <!-- Arch: M 80,150 Q 320,15 560,150 — apex at (320, 82.5) -->
        <!-- Hangers at t=0.1…0.4 and 0.6…0.9 (symmetric, skipping apex under badge) -->
        <div class="w-full max-w-2xl select-none" aria-hidden="true">
            <svg viewBox="0 0 640 230" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full overflow-visible">
                <defs>
                    <path id="bridge-arch" d="M 80,150 Q 320,15 560,150"/>
                </defs>

                <!-- Ground line -->
                <line x1="30" y1="205" x2="610" y2="205" stroke-width="1" class="stroke-black/8 dark:stroke-white/8"/>

                <!-- Pier footings -->
                <rect x="60" y="200" width="40" height="6" rx="1.5" class="fill-black/10 dark:fill-white/10"/>
                <rect x="540" y="200" width="40" height="6" rx="1.5" class="fill-black/10 dark:fill-white/10"/>

                <!-- Piers -->
                <rect x="68" y="150" width="24" height="52" rx="2" class="fill-black/7 dark:fill-white/7"/>
                <rect x="548" y="150" width="24" height="52" rx="2" class="fill-black/7 dark:fill-white/7"/>

                <!-- Deck -->
                <line x1="60" y1="150" x2="580" y2="150" stroke-width="2" class="stroke-black/15 dark:stroke-white/15"/>

                <!-- Hangers (arch point → deck at y=150) -->
                <line x1="128" y1="126" x2="128" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>
                <line x1="176" y1="107" x2="176" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>
                <line x1="224" y1="93"  x2="224" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>
                <line x1="272" y1="85"  x2="272" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>
                <line x1="368" y1="85"  x2="368" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>
                <line x1="416" y1="93"  x2="416" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>
                <line x1="464" y1="107" x2="464" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>
                <line x1="512" y1="126" x2="512" y2="150" stroke-width="1" class="stroke-black/10 dark:stroke-white/10"/>

                <!-- Arch -->
                <use href="#bridge-arch" stroke-width="2.5" class="stroke-black/20 dark:stroke-white/20"/>

                <!-- Animated booking dots flowing along the arch -->
                <circle r="3.5" class="fill-black/45 dark:fill-white/45">
                    <animateMotion dur="2.8s" repeatCount="indefinite">
                        <mpath href="#bridge-arch"/>
                    </animateMotion>
                </circle>
                <circle r="2.2" class="fill-black/22 dark:fill-white/22">
                    <animateMotion dur="2.8s" repeatCount="indefinite" begin="-0.18s">
                        <mpath href="#bridge-arch"/>
                    </animateMotion>
                </circle>
                <circle r="1.3" class="fill-black/12 dark:fill-white/12">
                    <animateMotion dur="2.8s" repeatCount="indefinite" begin="-0.32s">
                        <mpath href="#bridge-arch"/>
                    </animateMotion>
                </circle>

                <!-- Customer node (left arch endpoint: 80, 150) -->
                <circle cx="80" cy="150" r="24" stroke-width="1.5" class="fill-white/85 stroke-black/10 dark:fill-white/6 dark:stroke-white/12"/>
                <!-- Person icon -->
                <circle cx="80" cy="144" r="5" class="fill-black/25 dark:fill-white/25"/>
                <path d="M 68,161 C 68,154 92,154 92,161" stroke-width="1.5" stroke-linecap="round" fill="none" class="stroke-black/25 dark:stroke-white/25"/>
                <!-- Label -->
                <text x="80" y="222" text-anchor="middle" font-size="9" font-weight="500" font-family="system-ui,-apple-system,sans-serif" style="text-transform:uppercase;letter-spacing:2px" class="fill-black/38 dark:fill-white/38">{{ translations.bridge.customer }}</text>

                <!-- Calendar node (right arch endpoint: 560, 150) -->
                <circle cx="560" cy="150" r="24" stroke-width="1.5" class="fill-white/85 stroke-black/10 dark:fill-white/6 dark:stroke-white/12"/>
                <!-- Calendar icon -->
                <rect x="549" y="141" width="22" height="19" rx="2.5" stroke-width="1.5" fill="none" class="stroke-black/28 dark:stroke-white/28"/>
                <line x1="549" y1="148" x2="571" y2="148" stroke-width="1" class="stroke-black/20 dark:stroke-white/20"/>
                <line x1="556" y1="139" x2="556" y2="143" stroke-width="1.5" stroke-linecap="round" class="stroke-black/28 dark:stroke-white/28"/>
                <line x1="564" y1="139" x2="564" y2="143" stroke-width="1.5" stroke-linecap="round" class="stroke-black/28 dark:stroke-white/28"/>
                <!-- Label -->
                <text x="560" y="222" text-anchor="middle" font-size="9" font-weight="500" font-family="system-ui,-apple-system,sans-serif" style="text-transform:uppercase;letter-spacing:2px" class="fill-black/38 dark:fill-white/38">{{ translations.bridge.calendar }}</text>

                <!-- BookingCore apex badge (arch apex: 320, 82.5) -->
                <!-- Subtle halo -->
                <circle cx="319" cy="86.5" r="38" class="fill-black/2.5 dark:fill-white/2.5"/>
                <!-- Badge background -->
                <rect x="260" y="66" width="118" height="38" rx="21.5" stroke-width="1" class="fill-white/90 stroke-black/12 dark:fill-white/8 dark:stroke-white/15"/>
                <!-- Engine name -->
                <text x="277" y="85" dominant-baseline="middle" font-size="9" font-weight="600" font-family="system-ui,-apple-system,sans-serif" style="letter-spacing:1.8px" class="fill-black/65 dark:fill-white/65">{{ translations.bridge.engine.toUpperCase() }}</text>
            </svg>
        </div>

        <!-- CTAs -->
        <div class="pt-12 flex flex-col items-center gap-3 sm:flex-row">
            <Link
                :href="connectUrl"
                class="inline-flex items-center justify-center rounded-full border border-black bg-black px-6 py-3 text-sm font-medium uppercase tracking-[0.12em] text-white transition hover:translate-x-0.5 hover:cursor-pointer hover:bg-black/90 dark:border-white dark:bg-white dark:text-black dark:hover:bg-white/90"
            >
                {{ translations.actions.get_started }}
            </Link>
            <a
                href="https://github.com/er-ko/bookingcore"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center justify-center rounded-full border border-black/12 bg-white/70 px-6 py-3 text-sm font-medium uppercase tracking-[0.12em] text-black/70 transition hover:border-black/25 hover:text-black dark:border-white/10 dark:bg-white/4 dark:text-white/70 dark:hover:border-white/25 dark:hover:text-white"
            >
                {{ translations.actions.view_github }}
            </a>
        </div>

        <!-- Tags -->
        <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-xs uppercase tracking-[0.18em] text-black/38 dark:text-white/38 mt-6 md:mt-0">
            <span>{{ translations.tags.mit_license }}</span>
            <span>{{ translations.tags.public_code }}</span>
            <span>{{ copyrightTag }}</span>
        </div>
    </section>
</template>
