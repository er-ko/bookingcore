<script setup>
import { inject } from 'vue'
import { Link, router } from '@inertiajs/vue3'

const route = inject('route')

const props = defineProps({
    activities: {
        type: Array,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

const destroyActivity = (activityPublicId,) => {
    if (!window.confirm(props.translations.alerts.delete_confirmation)) {
        return
    }

    router.delete(route('api.activities.destroy', activityPublicId), {
        preserveScroll: true,
    })
}
</script>

<template>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        scope="col"
                        class="w-full px-6 py-4 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"
                    >
                        {{ translations.table.name }}
                    </th>

                    <th
                        scope="col"
                        class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500"
                    >
                        {{ translations.table.status }}
                    </th>

                    <th
                        scope="col"
                        class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wide text-gray-500"
                    >
                        {{ translations.table.updated }}
                    </th>

                    <th
                        scope="col"
                        class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wide text-gray-500"
                    >
                        {{ translations.table.actions }}
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                <tr
                    v-for="activity in activities"
                    :key="activity.id"
                    class="align-top"
                >
                    <td class="px-6 py-4 align-middle">
                        <div class="text-sm font-semibold text-nowrap text-gray-900">
                            {{ activity.name }}
                        </div>

                        <div class="mt-0.5 text-xs text-nowrap text-gray-500">
                            {{ translations.table.duration }}: {{ activity.duration_minutes }} {{ translations.table.min}}
                        </div>
                    </td>

                    <td class="px-6 py-4 align-middle text-center">
                        <span
                            v-if="activity.is_active"
                            class="inline-flex items-center select-none rounded-md bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-800 ring-1 ring-inset ring-emerald-600/20"
                        >
                            {{ translations.table.active }}
                        </span>

                        <span
                            v-else
                            class="inline-flex items-center select-none rounded-md bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-300"
                        >
                            {{ translations.table.inactive }}
                        </span>
                    </td>

                    <td class="w-fit min-w-[130px] px-6 py-4 text-center">
                        <div class="text-sm text-gray-700">
                            {{ activity.updated_at ?? '-' }}
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-2">
                            <Link
                                :href="route('activities.edit', activity.public_id)"
                                class="inline-flex items-center justify-center select-none rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                            >
                                {{ translations.actions.edit }}
                            </Link>

                            <button
                                type="button"
                                class="inline-flex items-center justify-center select-none rounded-lg border border-red-300 bg-white px-3 py-2 text-sm font-medium text-red-700 transition hover:bg-red-50 hover:cursor-pointer"
                                @click="destroyActivity(activity.public_id)"
                            >
                                {{ translations.actions.delete }}
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>