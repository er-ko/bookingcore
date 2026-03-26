<script setup>
import { computed, inject, ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const route = inject('route')
const page = usePage()

const appName = computed(() => page.props.app?.name ?? 'BookingCore')
const mobileMenuOpen = ref(false)

const navigation = computed(() => [
    {
        label: 'Bookings',
        href: route('bookings.index'),
        active: route().current('bookings.index') || route().current('bookings.create'),
    },
    {
        label: 'Branches',
        href: route('branches.index'),
        active: route().current('branches.index') || route().current('branches.create') || route().current('branches.edit'),
    },
    {
        label: 'Units',
        href: route('units.index'),
        active: route().current('units.index') || route().current('units.create') || route().current('units.edit'),
    },
    {
        label: 'Activities',
        href: route('activities.index'),
        active: route().current('activities.index') || route().current('activities.create') || route().current('activities.edit'),
    },
    {
        label: 'Calendars',
        href: route('integrations.calendar.index'),
        active: route().current('integrations.calendar.index'),
    },
])

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value
}

function closeMobileMenu() {
    mobileMenuOpen.value = false
}
</script>

<template>
    <div class="min-h-screen bg-gray-50 text-gray-900">
        <header class="sticky top-0 z-40 border-b border-gray-200 bg-white/95 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-8">
                    <div>
                        <Link
                            :href="route('bookings.index')"
                            class="text-lg font-semibold tracking-tight"
                        >
                            {{ appName }}
                        </Link>
                    </div>

                    <nav class="hidden items-center gap-2 md:flex">
                        <Link
                            v-for="item in navigation"
                            :key="item.label"
                            :href="item.href"
                            class="rounded-lg px-3 py-2 text-sm font-medium select-none transition"
                            :class="item.active
                                ? 'bg-gray-900 text-white'
                                : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'"
                        >
                            {{ item.label }}
                        </Link>
                    </nav>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden items-center gap-4 sm:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github text-gray-600" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                        </svg>

                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium select-none text-white transition hover:cursor-pointer hover:bg-gray-800"
                        >
                            Logout
                        </Link>
                    </div>

                    <button
                        type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 text-gray-700 transition hover:bg-gray-100 md:hidden"
                        @click="toggleMobileMenu"
                    >
                        <svg
                            v-if="!mobileMenuOpen"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg
                            v-else
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6l-12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <Transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="opacity-0 -translate-y-2"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition duration-150 ease-in"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 -translate-y-2"
            >
                <div
                    v-if="mobileMenuOpen"
                    class="border-t border-gray-200 bg-white md:hidden"
                >
                    <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                        <nav class="space-y-2">
                            <Link
                                v-for="item in navigation"
                                :key="`${item.label}-mobile`"
                                :href="item.href"
                                class="block rounded-xl px-4 py-3 text-sm font-medium transition"
                                :class="item.active
                                    ? 'bg-gray-900 text-white'
                                    : 'text-gray-700 hover:bg-gray-100'"
                                @click="closeMobileMenu"
                            >
                                {{ item.label }}
                            </Link>
                        </nav>

                        <div class="mt-4 border-t border-gray-200 pt-4">
                            <div class="mb-4 flex items-center gap-3 text-sm text-gray-500">
                                <span>Laravel · Inertia · Vue</span>
                            </div>

                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="inline-flex w-full items-center justify-center rounded-xl bg-gray-900 px-4 py-3 text-sm font-medium text-white transition hover:bg-gray-800"
                                @click="closeMobileMenu"
                            >
                                Logout
                            </Link>
                        </div>
                    </div>
                </div>
            </Transition>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>