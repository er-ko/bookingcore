<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
</script>

<template>
    <AuthLayout
        title="Connect to BookingCore"
        heading="Connect your account"
        description="Sign in using your Google account to start managing bookings. BookingCore uses secure OAuth authentication and never stores your Google password."
    >
        <div class="space-y-3">
            <a
                :href="route('connect.google.redirect')"
                class="flex w-full items-center justify-center gap-3 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
            >
                <svg class="h-5 w-5" viewBox="0 0 533.5 544.3" aria-hidden="true">
                    <path fill="#4285F4" d="M533.5 278.4c0-18.6-1.5-37.2-4.7-55.3H272v104.8h147.2c-6.3 33.7-25 62.3-53.2 81.4v67h85.9c50.2-46.2 81.6-114.3 81.6-197.9z"/>
                    <path fill="#34A853" d="M272 544.3c72.8 0 134-24.1 178.7-65.4l-85.9-67c-23.9 16-54.4 25.5-92.8 25.5-71.3 0-131.8-48.1-153.5-112.7H29.9v70.9C74.4 484.7 166.8 544.3 272 544.3z"/>
                    <path fill="#FBBC05" d="M118.5 324.7c-10.4-30.9-10.4-64.1 0-95l-88.6-70.9C-15.5 214.7-15.5 329.6 29.9 395.6l88.6-70.9z"/>
                    <path fill="#EA4335" d="M272 107.7c39.6-.6 77.6 14.3 106.5 41.7l79.5-79.5C413.9 24.4 343.4-1.6 272 0 166.8 0 74.4 59.6 29.9 158.8l88.6 70.9C140.2 155.8 200.7 107.7 272 107.7z"/>
                </svg>

                Continue with Google
            </a>

            <div class="pt-2 text-center text-xs text-gray-500">
                More providers coming soon: Apple and Microsoft
            </div>
        </div>
    </AuthLayout>
</template>