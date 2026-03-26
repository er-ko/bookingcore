<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
    countries: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-900">
                <tr>
                    <th
                        scope="col"
                        class="w-full px-4 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-50"
                    >
                        Official name
                    </th>

					<th
                        scope="col"
                        class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-nowrap text-gray-50"
                    >
                        ISO ALPHA 2
                    </th>

                    <th
                        scope="col"
                        class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-50"
                    >
                        Language
                    </th>

                    <th
                        scope="col"
                        class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-50"
                    >
                        Currency
                    </th>

                    <th
                        scope="col"
                        class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-nowrap text-gray-50"
                    >
                        Phone code
                    </th>

                    <th
                        scope="col"
                        class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-50"
                    >
                        Status
                    </th>

                    <th
                        scope="col"
                        class="px-4 py-4 text-right text-xs font-semibold uppercase tracking-wide text-gray-50"
                    >
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 bg-white">
                <tr
                    v-for="country in countries"
                    :key="country.id"
                    class="align-top hover:bg-gray-50"
                >
					<td class="px-4 py-2 align-middle">
                        <div class="text-sm text-nowrap text-gray-700">
                            {{ country.flag_emoji }} {{ country.official_name }}
                        </div>
                    </td>

					<td class="px-4 py-2 align-middle text-center">
                        <div class="text-sm uppercase text-gray-700">
                            {{ country.code }}
                        </div>
                    </td>

					<td class="px-4 py-2 align-middle text-center">
                        <div class="text-sm uppercase text-gray-700">
                            {{ country.lang_code }}
                        </div>
                    </td>

					<td class="px-4 py-2 align-middle text-center">
                        <div class="text-sm text-gray-700">
                            {{ country.currency_code }}
                        </div>
                    </td>

					<td class="px-4 py-2 align-middle text-center">
                        <div class="text-sm text-gray-700">
                            +{{ country.phone_code }}
                        </div>
                    </td>

                    <td class="px-4 py-2 align-middle text-center">
                        <span
                            v-if="country.is_active"
                            class="inline-flex items-center select-none rounded-md bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-800 ring-1 ring-inset ring-emerald-600/20"
                        >
                            Active
                        </span>

                        <span
                            v-else
                            class="inline-flex items-center select-none rounded-md bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-300"
                        >
                            Inactive
                        </span>
                    </td>

                    <td class="px-4 py-2">
                        <div class="flex justify-end gap-2">
                            <Link
                                class="inline-flex items-center justify-center select-none rounded-lg border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 transition hover:bg-gray-50"
                            >
                                Edit
                            </Link>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>