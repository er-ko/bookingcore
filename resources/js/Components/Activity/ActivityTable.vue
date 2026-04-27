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

const destroyActivity = (activityPublicId) => {
    if (!window.confirm(props.translations.alerts.delete_confirmation)) {
        return
    }

    router.delete(route('activities.destroy', activityPublicId), {
        preserveScroll: true,
    })
}
</script>

<template>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="border-b border-black/10 dark:border-white/10">
                    <th class="w-full px-6 py-4 text-start text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.name }}
                    </th>

                    <th class="px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.status }}
                    </th>

                    <th class="min-w-32.5 px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.updated }}
                    </th>

                    <th class="px-6 py-4 text-end text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.actions }}
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="activity in activities"
                    :key="activity.id"
                    class="border-b border-black/6 transition-colors duration-150 last:border-b-0 hover:bg-black/2.5 dark:border-white/8 dark:hover:bg-white/4.5"
                >
                    <td class="w-full px-6 py-5 align-middle">
                        <div class="text-sm font-medium text-black dark:text-white">
                            {{ activity.name }}
                        </div>

                        <div class="mt-1 text-xs text-black/45 dark:text-white/45">
                            {{ translations.table.duration }}: {{ activity.duration_minutes }} {{ translations.table.min }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle text-center">
                        <span
                            v-if="activity.is_active"
                            class="inline-flex items-center rounded-full border border-emerald-500/20 bg-emerald-500/10 px-3 py-1 text-xs font-medium text-nowrap select-none text-emerald-700 dark:border-emerald-400/20 dark:bg-emerald-400/10 dark:text-emerald-300"
                        >
                            {{ translations.table.active }}
                        </span>

                        <span
                            v-else
                            class="inline-flex items-center rounded-full border border-amber-500/20 bg-amber-500/10 px-3 py-1 text-xs font-medium text-nowrap select-none text-amber-700 dark:border-amber-400/20 dark:bg-amber-400/10 dark:text-amber-300"
                        >
                            {{ translations.table.inactive }}
                        </span>
                    </td>

                    <td class="px-6 py-5 align-middle text-center">
                        <div class="text-sm text-black/65 dark:text-white/65">
                            {{ activity.updated_at ?? '-' }}
                        </div>
                    </td>

                    <td class="px-6 py-5 align-middle text-end">
                        <div class="flex justify-end gap-2">
                            <Link
                                :href="route('activities.edit', activity.public_id)"
                                class="inline-flex items-center justify-center rounded-full border border-black/15 px-4 py-2 text-sm font-medium text-nowrap select-none text-black/65 transition hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/65 dark:hover:border-white/35 dark:hover:text-white"
                            >
                                {{ translations.actions.edit }}
                            </Link>

                            <button
                                type="button"
                                class="inline-flex items-center justify-center rounded-full border border-black/15 px-4 py-2 text-sm font-medium text-nowrap select-none text-black/45 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/45 dark:hover:border-white/35 dark:hover:text-white"
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