<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import LocaleSwitcher from '@/Components/LocaleSwitcher.vue'
import { useTheme } from '@/Composables/useTheme'

const page = usePage()
const { isDark, toggleTheme } = useTheme()
const layoutTranslations = computed(() => page.props.layoutTranslations ?? {})
const publicTranslations = computed(() => layoutTranslations.value.public ?? {})
const accessibilityTranslations = computed(() => layoutTranslations.value.accessibility ?? {})
</script>

<template>
    <!-- wrapper -->
    <div class="relative w-full min-h-dvh overflow-x-hidden flex flex-col items-center transition-all duration-300 ease-in-out bg-white text-black dark:bg-black dark:text-white">
        <!-- bg pattern -->
        <div class="z-0 absolute inset-0 pointer-events-none">
            <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-black/10 to-transparent dark:via-white/10" />
            <div class="absolute left-[-8rem] top-[-6rem] h-64 w-64 rounded-full bg-black/[0.035] blur-3xl dark:bg-white/[0.04]" />
            <div class="absolute right-[-10rem] top-[20%] h-72 w-72 rounded-full bg-black/[0.03] blur-3xl dark:bg-white/[0.035]" />
            <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(0,0,0,0.035)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,0.035)_1px,transparent_1px)] bg-[size:40px_40px] dark:bg-[linear-gradient(to_right,rgba(255,255,255,0.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,0.04)_1px,transparent_1px)]" />
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.75),transparent_45%)] dark:bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.05),transparent_40%)]" />
        </div>

        <!-- content -->
        <div class="z-10 flex flex-1 min-h-[calc(100vh-7rem)] items-center justify-center">
            <slot />
        </div>
            
        <!-- footer -->
        <div class="z-10 relative w-full flex items-center justify-center bg-white/50 dark:bg-black/50">
            <div class="w-full max-w-6xl flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 px-3 lg:px-4 xl:px-0 py-6 text-xs select-none border-t border-black/8 dark:border-white/8 xl:border-t-0">
                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-black/65 dark:text-white/65">
                    <Link
                        href="/connect"
                        class="transition hover:text-black dark:hover:text-white"
                    >
                        {{ publicTranslations.connect ?? 'Connect' }}
                    </Link>
                    <span class="h-1 w-1 rounded-full bg-black/20 dark:bg-white/20" />
                    <Link
                        href="/privacy-policy"
                        class="transition hover:text-black dark:hover:text-white"
                    >
                        {{ publicTranslations.privacy_policy ?? 'Privacy Policy' }}
                    </Link>
                    <span class="h-1 w-1 rounded-full bg-black/20 dark:bg-white/20" />
                    <Link
                        href="/terms-of-service"
                        class="transition hover:text-black dark:hover:text-white"
                    >
                        {{ publicTranslations.terms_of_service ?? 'Terms of Service' }}
                    </Link>
                </div>

                <div class="flex items-center gap-2 sm:justify-end justify-between">
                    <LocaleSwitcher />
                    <button
                        type="button"
                        :aria-label="accessibilityTranslations.toggle_theme ?? 'Toggle theme'"
                        class="inline-flex items-center rounded-full p-2 transition-all duration-300 ease-in-out hover:cursor-pointer bg-blue-500 text-white/65 hover:text-white dark:bg-amber-500 dark:text-black/65 dark:hover:text-black"
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
</template>
