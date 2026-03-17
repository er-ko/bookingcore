<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    title: {
        type: String,
        default: 'BookingCore',
    },
    heading: {
        type: String,
        default: 'Welcome',
    },
    description: {
        type: String,
        default: '',
    },
})
</script>

<template>
    <Head :title="title" />

    <div class="flex min-h-screen items-center justify-center bg-gray-50 px-4 py-10">
        <div class="w-full max-w-xl space-y-8">
            <div class="text-center">
                <Link
                    href="/connect"
                    class="inline-flex items-center justify-center text-3xl font-semibold tracking-tight text-gray-900"
                >
                    BookingCore
                </Link>

                <p class="mt-2 text-sm text-gray-600">
                    A modern open source booking engine
                </p>
            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">
                <div class="space-y-3 text-center">
                    <h1 class="text-xl font-semibold text-gray-900">
                        {{ heading }}
                    </h1>

                    <p
                        v-if="description"
                        class="text-sm leading-6 text-gray-600"
                    >
                        {{ description }}
                    </p>
                </div>

                <div class="mt-8">
                    <slot />
                </div>
            </div>

            <div class="text-center text-xs text-gray-500">
                BookingCore • Secure OAuth authentication
            </div>
        </div>
    </div>
</template>