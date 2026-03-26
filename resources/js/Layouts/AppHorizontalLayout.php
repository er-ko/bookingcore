<script setup>
import { computed, inject } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const route = inject('route')
const page = usePage()

const appName = computed(() => page.props.app?.name ?? 'BookingCore')

const navigationGroups = computed(() => [
    {
        label: 'Operations',
        items: [
            {
                label: 'Bookings',
                href: route('bookings.index'),
                active: route().current('bookings.index') || route().current('bookings.create'),
            },
            {
                label: 'Branches',
                href: route('branches.index'),
                active: route().current('branches.index')
                    || route().current('branches.create')
                    || route().current('branches.edit'),
            },
            {
                label: 'Calendars',
                href: route('integrations.calendar.index'),
                active: route().current('integrations.calendar.index'),
            },
        ],
    },
    {
        label: 'Regions',
        items: [
            {
                label: 'Countries',
                href: route('region.countries.index'),
                active: route().current('region.countries.index')
                    // || route().current('countries.create')
                    // || route().current('countries.edit'),
            },
            {
                label: 'Languages',
                href: route('region.countries.index'),
            },
            {
                label: 'Currencies',
                href: route('region.countries.index'),
            },
        ],
    },
])

const mobileNavigation = computed(() =>
    navigationGroups.value.flatMap((group) => group.items)
)
</script>

<template>
    <div class="w-full min-h-dvh flex items-stretch justify-start bg-gray-50 text-gray-900">
        <!-- <header class="bg-white">
            <div class="mx-auto flex items-center justify-between px-4 py-4 sm:px-6 lg:px-7">
                <div>
                    <p class="text-lg font-semibold tracking-tight">
                        {{ appName }}
                    </p>
                </div>

                <div class="flex items-center gap-4">
                    <span class="hidden text-sm text-gray-500 sm:block">
                        Laravel · Inertia · Vue
                    </span>

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white transition hover:cursor-pointer hover:bg-gray-800"
                    >
                        Logout
                    </Link>
                </div>
            </div>
        </header> -->

        <div class="mx-auto w-full flex">
            <aside class="hidden w-72 shrink-0 border-e border-gray-200 bg-white lg:block">
                <div class="px-4 pt-8 pb-2 flex items-center justify-between">
                    <p class="ps-3 text-lg font-semibold tracking-tight">
                        {{ appName }}
                    </p>
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="rounded-lg bg-gray-200 text-gray-500 p-2 transition hover:cursor-pointer hover:bg-gray-900 hover:text-white"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-power-icon lucide-power"><path d="M12 2v10"/><path d="M18.4 6.6a9 9 0 1 1-12.77.04"/></svg>
                    </Link>
                </div>
                <div class="sticky top-0 flex-1 px-4 py-6">
                    <nav class="space-y-8">
                        <div
                            v-for="group in navigationGroups"
                            :key="group.label"
                        >
                            <h2 class="px-3 text-xs font-semibold uppercase tracking-wide text-gray-500">
                                {{ group.label }}
                            </h2>

                            <div class="mt-3 space-y-1">
                                <Link
                                    v-for="item in group.items"
                                    :key="item.label"
                                    :href="item.href"
                                    class="block rounded-lg px-3 py-2 text-sm font-medium transition"
                                    :class="item.active
                                        ? 'bg-gray-900 text-white'
                                        : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'"
                                >
                                    {{ item.label }}
                                </Link>
                            </div>
                        </div>
                    </nav>
                </div>
            </aside>

            <div class="min-w-0 flex-1">
                <div class="border-b border-gray-100 bg-white lg:hidden">
                    <div class="mx-auto flex flex-wrap gap-2 px-4 py-3 sm:px-6 lg:px-8">
                        <Link
                            v-for="item in mobileNavigation"
                            :key="`${item.label}-mobile`"
                            :href="item.href"
                            class="rounded-lg px-3 py-2 text-sm font-medium transition"
                            :class="item.active
                                ? 'bg-gray-900 text-white'
                                : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'"
                        >
                            {{ item.label }}
                        </Link>
                    </div>
                </div>

                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>