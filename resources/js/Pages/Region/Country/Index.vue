<script setup>
import { computed, inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import CountryTable from '@/Components/Region/Country/CountryTable.vue'
import Pagination from '@/Components/UI/Pagination.vue'

const route = inject('route')

const props = defineProps({
    countries: {
        type: Object,
        required: true,
    },
})

const items = computed(() => props.countries?.data ?? [])
const links = computed(() => props.countries?.meta?.links ?? [])
const hasPagination = computed(() => (props.countries?.meta?.last_page ?? 1) > 1)
</script>

<template>
    <Head title="Countries" />

    <AppLayout>
        <div class="mx-auto space-y-6 py-6 sm:px-4 md:px-6 xl:px-8">
			<div class="px-3">
				<h1 class="text-2xl font-semibold text-gray-900">
					Countries
				</h1>

				<p class="mt-1 text-sm text-gray-600">
					Manage your countries, including address details, timezone, and active status.
				</p>
			</div>

            <div class="overflow-hidden shadow-sm md:rounded-2xl">
                <div
                    v-if="items.length === 0"
                    class="flex flex-col items-center justify-center px-6 py-16 text-center"
                >
                    <h2 class="text-lg font-semibold text-gray-900">
                        No countries found
                    </h2>

                    <p class="mt-2 max-w-md text-sm text-gray-600">
                        No countries have been added yet. Create your first country to begin organizing your booking structure.
                    </p>

                    <div class="mt-6">
                        <Link
                            :href="route('countries.create')"
                            class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-800"
                        >
                            Create first country
                        </Link>
                    </div>
                </div>

                <template v-else>
                    <CountryTable :countries="items" />
                </template>
            </div>

			<Pagination v-if="hasPagination" :links="links" />
        </div>
    </AppLayout>
</template>