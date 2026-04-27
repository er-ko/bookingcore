<script setup>
defineProps({
    countries: {
        type: Array,
        required: true,
    },
    selectedIds: {
        type: Array,
        required: true,
    },
    allCurrentPageSelected: {
        type: Boolean,
        required: true,
    },
    translations: {
        type: Object,
        required: true,
    },
})

defineEmits([
    'toggle-select-all-current-page',
    'toggle-selection',
    'activate-one',
    'deactivate-one',
])
</script>

<template>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="border-b border-black/10 dark:border-white/10">
                    <th class="px-4 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        <div class="flex items-center justify-center">
                            <input
                                type="checkbox"
                                class="h-4 w-4 rounded border-black/20 bg-transparent text-black focus:ring-0 dark:border-white/20 dark:text-white"
                                :checked="allCurrentPageSelected"
                                @change="$emit('toggle-select-all-current-page')"
                            >
                        </div>
                    </th>

                    <th class="w-full px-6 py-4 text-start text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.official_name }}
                    </th>

                    <th class="px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.language }}
                    </th>

                    <th class="px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.currency }}
                    </th>

                    <th class="px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-nowrap text-black/40 dark:text-white/40">
                        {{ translations.table.phone_code }}
                    </th>

                    <th class="px-6 py-4 text-center text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.status }}
                    </th>

                    <th class="px-6 py-4 text-end text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.table.action }}
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="country in countries"
                    :key="country.id"
                    class="border-b border-black/6 transition-colors duration-150 last:border-b-0 hover:bg-black/[0.025] dark:border-white/8 dark:hover:bg-white/[0.045]"
                >
                    <td class="px-4 py-2 text-center align-middle">
                        <input
                            type="checkbox"
                            class="h-4 w-4 rounded border-black/20 bg-transparent text-black focus:ring-0 dark:border-white/20 dark:text-white"
                            :checked="selectedIds.includes(country.id)"
                            @change="$emit('toggle-selection', country.id)"
                        >
                    </td>

                    <td class="w-full px-6 py-2 align-middle">
                        <div class="flex items-center space-x-1.5 text-sm font-medium text-nowrap text-black dark:text-white">
                            <span>{{ country.flag_emoji }}</span>
                            <span>{{ country.official_name }}</span>
                        </div>
                    </td>

                    <td class="px-6 py-2 align-middle text-center">
                        <div class="text-sm uppercase text-black/65 dark:text-white/65">
                            {{ country.lang_code }}
                        </div>
                    </td>

                    <td class="px-6 py-2 align-middle text-center">
                        <div class="text-sm text-black/65 dark:text-white/65">
                            {{ country.currency_code }}
                        </div>
                    </td>

                    <td class="px-6 py-2 align-middle text-center">
                        <div class="text-sm text-black/65 dark:text-white/65">
                            +{{ country.phone_code }}
                        </div>
                    </td>

                    <td class="px-6 py-2 align-middle text-center">
                        <span
                            v-if="country.is_active_for_user"
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

                    <td class="px-6 py-2 align-middle text-end">
                        <button
                            v-if="country.is_active_for_user"
                            type="button"
                            class="inline-flex items-center justify-center rounded-full border border-black/15 px-4 py-2 text-xs font-medium text-nowrap select-none text-black/65 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/65 dark:hover:border-white/35 dark:hover:text-white"
                            @click="$emit('deactivate-one', country.id)"
                        >
                            {{ translations.table.deactivate }}
                        </button>

                        <button
                            v-else
                            type="button"
                            class="inline-flex items-center justify-center rounded-full border border-black/15 px-4 py-2 text-xs font-medium text-nowrap select-none text-black/65 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/65 dark:hover:border-white/35 dark:hover:text-white"
                            @click="$emit('activate-one', country.id)"
                        >
                            {{ translations.table.activate }}
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>