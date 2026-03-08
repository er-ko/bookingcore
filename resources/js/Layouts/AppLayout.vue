<script setup>
import { computed, inject } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const route = inject('route')
const page = usePage()

const appName = computed(() => page.props.app?.name ?? 'BookingCore')

const navigation = computed(() => [
    {
        label: 'Bookings',
        href: route('bookings.index'),
        active: route().current('bookings.index'),
    },
    {
        label: 'Create booking',
        href: route('bookings.create'),
        active: route().current('bookings.create'),
    },
])
</script>

<template>
    <div class="min-h-screen bg-gray-50 text-gray-900">
        <header class="border-b border-gray-200 bg-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-8">
                    <div>
                        <p class="text-lg font-semibold tracking-tight">
                            {{ appName }}
                        </p>
                    </div>

                    <nav class="hidden items-center gap-2 md:flex">
                        <Link
                            v-for="item in navigation"
                            :key="item.label"
                            :href="item.href"
                            class="rounded-lg px-3 py-2 text-sm font-medium transition"
                            :class="item.active
                                ? 'bg-gray-900 text-white'
                                : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900'"
                        >
                            {{ item.label }}
                        </Link>
                    </nav>
                </div>

                <div class="text-sm text-gray-500">
                    Laravel · Inertia · Vue
                </div>
            </div>

            <div class="border-t border-gray-100 bg-white md:hidden">
                <div class="mx-auto flex max-w-7xl flex-wrap gap-2 px-4 py-3 sm:px-6 lg:px-8">
                    <Link
                        v-for="item in navigation"
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
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>