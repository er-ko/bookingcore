<script setup>
import { computed, inject, onMounted, onBeforeUnmount, ref, watch } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { useTheme } from '@/Composables/useTheme'

const route = inject('route')
const page = usePage()

const { isDark, toggleTheme } = useTheme()
const mobileMenuOpen = ref(false)
const openDropdown = ref(null)

const appName = computed(() => page.props.app?.name ?? 'BookingCore')
const layoutTranslations = computed(() => page.props.layoutTranslations ?? {})
const flashTranslations = computed(() => layoutTranslations.value.flash ?? {})
const navigationTranslations = computed(() => layoutTranslations.value.navigation ?? {})
const accessibilityTranslations = computed(() => layoutTranslations.value.accessibility ?? {})

const visibleFlash = ref(null)
const flashType = ref('success')
const flashDuration = ref(2000)

let flashTimeout = null

const FLASH_STORAGE_KEY = 'bookingcore.flash'
const FLASH_EVENT_NAME = 'bookingcore:flash'

const clearFlashTimeout = () => {
    if (flashTimeout) {
        clearTimeout(flashTimeout)
        flashTimeout = null
    }
}

const hideFlash = () => {
    visibleFlash.value = null
    flashType.value = 'success'
    sessionStorage.removeItem(FLASH_STORAGE_KEY)
    clearFlashTimeout()
}

const showFlash = (message, type = 'success', duration = 2000) => {
    const expiresAt = Date.now() + duration

    visibleFlash.value = message
    flashType.value = type
    flashDuration.value = duration

    sessionStorage.setItem(FLASH_STORAGE_KEY, JSON.stringify({
        message,
        type,
        expiresAt,
    }))

    clearFlashTimeout()

    flashTimeout = setTimeout(() => {
        hideFlash()
    }, duration)
}

const handleFlashEvent = (event) => {
    const message = event.detail?.message
    const type = event.detail?.type ?? 'success'
    const duration = event.detail?.duration ?? 2000

    if (!message) {
        return
    }

    showFlash(message, type, duration)
}

watch(
    () => page.props.flash,
    (flash) => {
        const success = flash?.success ?? null
        const error = flash?.error ?? null
        const nextMessage = success || error

        if (!nextMessage) {
            return
        }

        showFlash(nextMessage, error ? 'error' : 'success', 2000)
    },
    { immediate: true }
)

const hasCompletedIdentity = computed(() =>
    Boolean(page.props.auth?.onboarding?.identity_completed)
)

const hasCompletedOnboarding = computed(() =>
    Boolean(page.props.auth?.onboarding?.completed)
)

const homeHref = computed(() => {
    if (hasCompletedOnboarding.value) {
        return route('dashboard.index')
    }

    if (hasCompletedIdentity.value) {
        return route('integrations.calendar.index')
    }

    return route('identity.index')
})

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value
}

function closeMobileMenu() {
    mobileMenuOpen.value = false
}

function toggleDropdown(key) {
    openDropdown.value = openDropdown.value === key ? null : key
}

function closeDropdown() {
    openDropdown.value = null
}

function handleClickOutside(event) {
    const dropdown = event.target.closest('[data-dropdown-root]')

    if (!dropdown) {
        closeDropdown()
    }
}

onMounted(() => {
    const persistedFlash = sessionStorage.getItem(FLASH_STORAGE_KEY)

    if (persistedFlash) {
        try {
            const parsed = JSON.parse(persistedFlash)
            const remaining = parsed.expiresAt - Date.now()

            if (parsed.message && remaining > 0) {
                visibleFlash.value = parsed.message
                flashType.value = parsed.type ?? 'success'
                flashDuration.value = remaining

                clearFlashTimeout()

                flashTimeout = setTimeout(() => {
                    hideFlash()
                }, remaining)
            } else {
                sessionStorage.removeItem(FLASH_STORAGE_KEY)
            }
        } catch {
            sessionStorage.removeItem(FLASH_STORAGE_KEY)
        }
    }

    document.addEventListener('click', handleClickOutside)
    window.addEventListener(FLASH_EVENT_NAME, handleFlashEvent)
})

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside)
    window.removeEventListener(FLASH_EVENT_NAME, handleFlashEvent)
    clearFlashTimeout()
})

const flashUi = computed(() => {
    if (flashType.value === 'error') {
        return {
            eyebrow: flashTranslations.value.error_eyebrow ?? 'Request failed',
            title: flashTranslations.value.error_title ?? 'Something needs attention',
            shell: 'border-red-500/20 bg-white/92 shadow-[0_24px_80px_-32px_rgba(220,38,38,0.45)] dark:bg-neutral-950/92',
            iconWrap: 'border-red-500/20 bg-red-500/10 text-red-700 dark:text-red-300',
            iconPath: 'M12 9v4m0 4h.01M10.29 3.86l-7.54 13.08A1 1 0 0 0 3.62 18h16.76a1 1 0 0 0 .87-1.5L13.71 3.86a1 1 0 0 0-1.74 0Z',
            line: 'from-red-500 via-red-400 to-orange-400',
            titleClass: 'text-red-950 dark:text-red-50',
            bodyClass: 'text-red-900/70 dark:text-red-100/70',
        }
    }

    return {
        eyebrow: flashTranslations.value.success_eyebrow ?? 'Saved successfully',
        title: flashTranslations.value.success_title ?? 'Update completed',
        shell: 'border-emerald-500/20 bg-white/92 shadow-[0_24px_80px_-32px_rgba(16,185,129,0.45)] dark:bg-neutral-950/92',
        iconWrap: 'border-emerald-500/20 bg-emerald-500/10 text-emerald-700 dark:text-emerald-300',
        iconPath: 'M20 6 9 17l-5-5',
        line: 'from-emerald-500 via-teal-400 to-cyan-400',
        titleClass: 'text-emerald-950 dark:text-emerald-50',
        bodyClass: 'text-emerald-900/70 dark:text-emerald-100/70',
    }
})

const navigationGroups = computed(() => [
    {
        key: 'booking',
        label: navigationTranslations.value.booking_group ?? 'Booking',
        active: (
            route().current('branches.*')
            || route().current('units.*')
            || route().current('activities.*')
            || route().current('prices.*')
        ),
        items: [
            {
                label: navigationTranslations.value.branches ?? 'Branches',
                href: route('branches.index'),
                active: route().current('branches.*'),
            },
            {
                label: navigationTranslations.value.units ?? 'Units',
                href: route('units.index'),
                active: route().current('units.*'),
            },
            {
                label: navigationTranslations.value.activities ?? 'Activities',
                href: route('activities.index'),
                active: route().current('activities.*'),
            },
            {
                label: navigationTranslations.value.prices ?? 'Prices',
                href: route('prices.index'),
                active: route().current('prices.*'),
            },
        ],
    },
    {
        key: 'integrations',
        label: navigationTranslations.value.integrations_group ?? 'Integration',
        active: route().current('integrations.*'),
        items: [
            {
                label: navigationTranslations.value.calendars ?? 'Calendars',
                href: route('integrations.calendar.index'),
                active: route().current('integrations.calendar.*'),
            },
        ],
    },
    {
        key: 'region',
        label: navigationTranslations.value.region_group ?? 'Region',
        active: (
            route().current('region.countries.*')
            || route().current('region.languages.*')
            || route().current('region.currencies.*')
        ),
        items: [
            {
                label: navigationTranslations.value.countries ?? 'Countries',
                href: route('region.countries.index'),
                active: route().current('region.countries.*'),
            },
            {
                label: navigationTranslations.value.languages ?? 'Languages',
                href: route('region.languages.index'),
                active: route().current('region.languages.*'),
            },
            {
                label: navigationTranslations.value.currencies ?? 'Currencies',
                href: route('region.currencies.index'),
                active: route().current('region.currencies.*'),
            },
        ],
    },
])
</script>

<template>
    <div class="min-h-screen bg-white text-black transition-colors duration-300 dark:bg-black dark:text-white">

        <Transition
            enter-active-class="transition duration-300 ease-out"
            enter-from-class="translate-y-2 opacity-0"
            enter-to-class="translate-y-0 opacity-100"
            leave-active-class="transition duration-200 ease-in"
            leave-from-class="translate-y-0 opacity-100"
            leave-to-class="translate-y-2 opacity-0"
        >
            <div
                v-if="visibleFlash"
                class="pointer-events-none fixed top-5 right-5 z-[100] w-[calc(100vw-2.5rem)] max-w-sm"
            >
                <div
                    class="overflow-hidden rounded-2xl border shadow-[0_18px_60px_-20px_rgba(0,0,0,0.35)] backdrop-blur-xl"
                    :class="flashType === 'error'
                        ? 'border-red-500/25 bg-neutral-950 text-red-50 dark:border-red-400/25 dark:bg-white dark:text-red-950'
                        : 'border-emerald-500/25 bg-neutral-950 text-emerald-50 dark:border-emerald-400/25 dark:bg-white dark:text-emerald-950'"
                >
                    <div class="flex items-center justify-start gap-3 px-5 py-4">
                        <div
                            class="h-2.5 w-2.5 shrink-0 rounded-full"
                            :class="flashType === 'error'
                                ? 'bg-red-500 dark:bg-red-500'
                                : 'bg-green-400 dark:bg-green-600'"
                        />

                        <p
                            class="text-sm font-medium leading-6"
                            :class="flashType === 'error'
                                ? 'text-red-100 dark:text-red-700'
                                : 'text-white dark:text-black'"
                        >
                            {{ visibleFlash }}
                        </p>
                    </div>

                    <div
                        class="h-1 w-full"
                        :class="flashType === 'error'
                            ? 'bg-red-500/10 dark:bg-red-500/10'
                            : 'bg-emerald-500/10 dark:bg-emerald-500/10'"
                    >
                        <div
                            :key="`${flashType}-${visibleFlash}`"
                            class="h-full origin-right animate-toast-progress"
                            :class="flashType === 'error'
                                ? 'bg-gradient-to-l from-red-500 to-red-400 dark:from-red-500 dark:to-red-400'
                                : 'bg-green-400 dark:bg-green-600'"
                        />
                    </div>
                </div>
            </div>
        </Transition>


        <header class="sticky top-0 z-40 border-b border-black/10 bg-white/90 backdrop-blur-xl dark:border-white/10 dark:bg-black/85">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-8">
                    <Link
                        :href="homeHref"
                        class="text-xs font-medium select-none uppercase tracking-[0.25em] text-black/75 transition hover:text-black dark:text-white/75 dark:hover:text-white md:text-sm md:tracking-[0.35em]"
                    >
                        {{ appName }}
                    </Link>

                    <nav
                        v-if="hasCompletedOnboarding"
                        class="hidden items-center gap-2 lg:flex"
                    >
                        <Link
                            :href="route('dashboard.index')"
                            class="inline-flex items-center rounded-full px-4 py-2 text-sm font-medium select-none transition-all duration-150"
                            :class="route().current('dashboard.*')
                                ? 'bg-black text-white dark:bg-white dark:text-black'
                                : 'text-black/50 hover:text-black dark:text-white/50 dark:hover:text-white'"
                        >
                            {{ navigationTranslations.dashboard ?? 'Dashboard' }}
                        </Link>

                        <div
                            v-for="group in navigationGroups"
                            :key="group.key"
                            class="relative"
                            data-dropdown-root
                        >
                            <button
                                type="button"
                                class="inline-flex items-center gap-2 rounded-full ps-4 pe-3 py-2 text-sm font-medium select-none transition-all duration-150 hover:cursor-pointer"
                                :class="group.active || openDropdown === group.key
                                    ? 'bg-black text-white dark:bg-white dark:text-black'
                                    : 'text-black/50 hover:text-black dark:text-white/50 dark:hover:text-white'"
                                @click.stop="toggleDropdown(group.key)"
                            >
                                <span>{{ group.label }}</span>

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="transition-transform duration-150"
                                    :class="openDropdown === group.key ? 'rotate-180' : ''"
                                >
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div
                                v-if="openDropdown === group.key"
                                class="absolute top-full left-0 mt-3 min-w-[220px] overflow-hidden rounded-3xl border border-black/10 bg-white/95 p-2 shadow-lg backdrop-blur-xl dark:border-white/10 dark:bg-black/95"
                            >
                                <Link
                                    v-for="item in group.items"
                                    :key="item.label"
                                    :href="item.href"
                                    class="flex items-center rounded-2xl px-4 py-3 text-sm font-medium select-none transition"
                                    :class="item.active
                                        ? 'bg-black text-white dark:bg-white dark:text-black'
                                        : 'text-black/65 hover:bg-black/[0.04] hover:text-black dark:text-white/65 dark:hover:bg-white/[0.06] dark:hover:text-white'"
                                    @click="closeDropdown"
                                >
                                    {{ item.label }}
                                </Link>
                            </div>
                        </div>

                        <Link
                            :href="route('identity.index')"
                            class="inline-flex items-center rounded-full px-4 py-2 text-sm font-medium select-none transition-all duration-150"
                            :class="route().current('identity.*')
                                ? 'bg-black text-white dark:bg-white dark:text-black'
                                : 'text-black/50 hover:text-black dark:text-white/50 dark:hover:text-white'"
                        >
                            {{ navigationTranslations.identity ?? 'Identity' }}
                        </Link>
                    </nav>
                </div>

                <div class="flex items-center gap-2 sm:gap-3">
                    <button
                        type="button"
                        :aria-label="accessibilityTranslations.toggle_theme ?? 'Toggle theme'"
                        class="inline-flex items-center rounded-full p-2 cursor-pointer text-black/50 transition-all duration-300 ease-in-out hover:text-black dark:text-white/50 dark:hover:text-white"
                        @click="toggleTheme"
                    >
                        <svg
                            v-if="isDark"
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
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
                            width="18"
                            height="18"
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

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="hidden rounded-full border border-black/15 px-4 py-2 text-sm font-medium select-none text-black/70 transition hover:border-black/40 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/40 dark:hover:text-white sm:inline-flex hover:cursor-pointer"
                    >
                        {{ navigationTranslations.logout ?? 'Logout' }}
                    </Link>

                    <button
                        type="button"
                        :aria-label="mobileMenuOpen
                            ? (accessibilityTranslations.close_navigation ?? 'Close navigation')
                            : (accessibilityTranslations.open_navigation ?? 'Open navigation')"
                        class="inline-flex rounded-full p-2 text-black/50 transition hover:text-black dark:text-white/50 dark:hover:text-white lg:hidden"
                        @click="toggleMobileMenu"
                    >
                        <svg
                            v-if="!mobileMenuOpen"
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M4 6h16" />
                            <path d="M4 12h16" />
                            <path d="M4 18h16" />
                        </svg>

                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div
                v-if="mobileMenuOpen"
                class="min-h-full border-t border-black/10 px-4 py-4 dark:border-white/10 lg:hidden overflow-y-auto"
            >
                <div class="flex flex-col gap-4">
                    <template v-if="hasCompletedOnboarding">
                        <div class="space-y-2">
                            <div class="px-1 text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                {{ navigationTranslations.dashboard ?? 'Dashboard' }}
                            </div>

                            <div class="flex flex-col gap-1">
                                <Link
                                    :href="route('dashboard.index')"
                                    class="rounded-2xl px-4 py-3 text-sm font-medium transition"
                                    :class="route().current('dashboard.*')
                                        ? 'bg-black text-white dark:bg-white dark:text-black'
                                        : 'text-black/60 hover:text-black dark:text-white/60 dark:hover:text-white'"
                                    @click="closeMobileMenu"
                                >
                                    {{ navigationTranslations.dashboard ?? 'Dashboard' }}
                                </Link>
                            </div>
                        </div>
                        <div
                            v-for="group in navigationGroups"
                            :key="`${group.key}-mobile`"
                            class="space-y-2"
                        >
                            <div class="px-1 text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                {{ group.label }}
                            </div>

                            <div class="flex flex-col gap-1">
                                <Link
                                    v-for="item in group.items"
                                    :key="`${item.label}-mobile`"
                                    :href="item.href"
                                    class="rounded-2xl px-4 py-3 text-sm font-medium transition"
                                    :class="item.active
                                        ? 'bg-black text-white dark:bg-white dark:text-black'
                                        : 'text-black/60 hover:text-black dark:text-white/60 dark:hover:text-white'"
                                    @click="closeMobileMenu"
                                >
                                    {{ item.label }}
                                </Link>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="px-1 text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                {{ navigationTranslations.identity ?? 'Identity' }}
                            </div>

                            <div class="flex flex-col gap-1">
                                <Link
                                    :href="route('identity.index')"
                                    class="rounded-2xl px-4 py-3 text-sm font-medium transition"
                                    :class="route().current('identity.*')
                                        ? 'bg-black text-white dark:bg-white dark:text-black'
                                        : 'text-black/60 hover:text-black dark:text-white/60 dark:hover:text-white'"
                                    @click="closeMobileMenu"
                                >
                                    {{ navigationTranslations.identity ?? 'Identity' }}
                                </Link>
                            </div>
                        </div>
                    </template>

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="mt-2 rounded-2xl border border-black/15 px-4 py-3 text-left text-sm font-medium text-black/70 transition hover:border-black/40 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/40 dark:hover:text-white"
                        @click="closeMobileMenu"
                    >
                        {{ navigationTranslations.logout ?? 'Logout' }}
                    </Link>
                </div>
            </div>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>
