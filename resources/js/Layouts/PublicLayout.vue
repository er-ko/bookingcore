<script setup>
import { onMounted, ref } from 'vue'

const isDark = ref(true)

function applyTheme() {
    document.documentElement.classList.toggle('dark', isDark.value)
    localStorage.setItem('theme', isDark.value ? 'dark' : 'light')
}

function toggleTheme() {
    isDark.value = !isDark.value
    applyTheme()
}

onMounted(() => {
    const savedTheme = localStorage.getItem('theme')

    if (savedTheme === 'dark') {
        isDark.value = true
    } else if (savedTheme === 'light') {
        isDark.value = false
    } else {
        isDark.value = window.matchMedia('(prefers-color-scheme: dark)').matches
    }

    applyTheme()
})
</script>

<template>
    <div class="relative min-h-screen overflow-hidden bg-stone-50 px-6 text-black transition-colors duration-300 dark:bg-neutral-950 dark:text-white md:px-8 lg:px-12 xl:px-0">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-black/10 to-transparent dark:via-white/10" />
            <div class="absolute left-[-8rem] top-[-6rem] h-64 w-64 rounded-full bg-black/[0.035] blur-3xl dark:bg-white/[0.04]" />
            <div class="absolute right-[-10rem] top-[20%] h-72 w-72 rounded-full bg-black/[0.03] blur-3xl dark:bg-white/[0.035]" />
            <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(0,0,0,0.035)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,0.035)_1px,transparent_1px)] bg-[size:40px_40px] dark:bg-[linear-gradient(to_right,rgba(255,255,255,0.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.04)_1px,transparent_1px)]" />
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.75),transparent_45%)] dark:bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.05),transparent_40%)]" />
        </div>

        <div class="relative mx-auto flex min-h-screen w-full max-w-6xl flex-col">
            <div class="flex-1 py-8 sm:py-10 lg:py-14">
                <div class="flex min-h-[calc(100vh-7rem)] items-center justify-center">
                    <div class="w-full max-w-6xl">
                        <slot />
                    </div>
                </div>
            </div>

            <div class="relative border-t border-black/8 py-5 dark:border-white/10">
                <div class="flex flex-col gap-3 text-xs select-none text-black/45 dark:text-white/45 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
                        <span>Built for independent teams</span>
                        <span class="hidden h-1 w-1 rounded-full bg-black/20 dark:bg-white/20 sm:block" />
                        <span>Public code</span>
                        <span class="hidden h-1 w-1 rounded-full bg-black/20 dark:bg-white/20 sm:block" />
                        <span>MIT licensed</span>
                    </div>

                    <div class="flex items-center justify-between gap-3 sm:justify-end">
                        <div class="text-black/35 dark:text-white/35">
                            Theme
                        </div>

                        <button
                            type="button"
                            class="inline-flex items-center rounded-full border border-black/10 bg-white/70 px-3 py-1.5 text-black/55 transition-all duration-300 ease-in-out hover:cursor-pointer hover:border-black/25 hover:text-black dark:border-white/10 dark:bg-white/[0.04] dark:text-white/55 dark:hover:border-white/25 dark:hover:text-white"
                            @click="toggleTheme"
                        >
                            <svg
                                v-if="isDark"
                                xmlns="http://www.w3.org/2000/svg"
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle cx="12" cy="12" r="4" />
                                <path d="M12 2v2" />
                                <path d="M12 20v2" />
                                <path d="m4.93 4.93 1.41 1.41" />
                                <path d="m17.66 17.66 1.41 1.41" />
                                <path d="M2 12h2" />
                                <path d="M20 12h2" />
                                <path d="m6.34 17.66-1.41 1.41" />
                                <path d="m19.07 4.93-1.41 1.41" />
                            </svg>

                            <svg
                                v-else
                                xmlns="http://www.w3.org/2000/svg"
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M20.985 12.486a9 9 0 1 1-9.473-9.472c.405-.022.617.46.402.803a6 6 0 0 0 8.268 8.268c.344-.215.825-.004.803.401" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
