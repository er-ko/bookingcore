<script setup>
defineProps({
    translations: {
        type: Object,
        required: true,
    },
    prices: {
        type: Array,
        default: () => [],
    },
    hasPrices: {
        type: Boolean,
        default: false,
    },
    editingId: {
        type: [Number, String, null],
        default: null,
    },
    editForm: {
        type: Object,
        required: true,
    },
    editErrors: {
        type: Object,
        required: true,
    },
    updating: {
        type: Boolean,
        default: false,
    },
    deletingId: {
        type: [Number, String, null],
        default: null,
    },
    editInputClass: {
        type: Function,
        required: true,
    },
    formatPrice: {
        type: Function,
        required: true,
    },
})

const emit = defineEmits([
    'start-edit',
    'cancel-edit',
    'update-price',
    'delete-price',
    'clear-edit-field-error',
])
</script>

<template>
    <section class="h-fit overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
        <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
            <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                {{ translations.table.title }}
            </h2>
        </div>

        <div v-if="hasPrices" class="overflow-x-auto">
            <table class="min-w-full divide-y divide-black/8 dark:divide-white/8">
                <thead>
                    <tr class="text-left">
                        <th class="px-6 py-4 text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.table.branch_title }}
                        </th>
                        <th class="px-6 py-4 text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.table.unit_title }}
                        </th>
                        <th class="px-6 py-4 text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.table.activity_title }}
                        </th>
                        <th class="px-6 py-4 text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.table.price_title }}
                        </th>
                        <th class="px-6 py-4 text-end text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.table.actions_title }}
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-black/8 dark:divide-white/8">
                    <tr
                        v-for="price in prices"
                        :key="price.id"
                        class="align-top"
                    >
                        <template v-if="editingId === price.id">
                            <td class="px-6 py-4 text-nowrap text-sm align-middle text-black/75 dark:text-white/75">
                                {{ price.branch?.name ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-nowrap text-sm align-middle text-black/75 dark:text-white/75">
                                {{ price.unit?.name ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-nowrap text-sm align-middle text-black/75 dark:text-white/75">
                                {{ price.activity?.name ?? '—' }}
                            </td>

                            <td class="px-6 py-4">
                                <input
                                    v-model="editForm.price"
                                    type="number"
                                    min="0"
                                    step="0.01"
                                    :class="editInputClass('price')"
                                    @input="emit('clear-edit-field-error', 'price')"
                                >

                                <p v-if="editErrors.price" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ editErrors.price }}
                                </p>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        type="button"
                                        class="rounded-full border border-black/15 px-3 py-2 text-xs font-medium select-none text-black/70 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/35 dark:hover:text-white"
                                        :disabled="updating"
                                        @click="emit('update-price', price.id)"
                                    >
                                        {{ updating ? translations.actions.updating : translations.actions.update }}
                                    </button>

                                    <button
                                        type="button"
                                        class="rounded-full border border-black/10 px-3 py-2 text-xs font-medium select-none text-black/55 transition hover:cursor-pointer hover:border-black/25 hover:text-black dark:border-white/10 dark:text-white/55 dark:hover:border-white/25 dark:hover:text-white"
                                        :disabled="updating"
                                        @click="emit('cancel-edit')"
                                    >
                                        {{ translations.actions.cancel }}
                                    </button>
                                </div>
                            </td>
                        </template>

                        <template v-else>
                            <td class="px-6 py-4 text-nowrap text-sm align-middle text-black/75 dark:text-white/75">
                                {{ price.branch?.name ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-nowrap text-sm align-middle text-black/75 dark:text-white/75">
                                {{ price.unit?.name ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-nowrap text-sm align-middle text-black/75 dark:text-white/75">
                                {{ price.activity?.name ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-nowrap text-sm font-medium align-middle text-black dark:text-white">
                                {{ formatPrice(price.price) }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        type="button"
                                        class="rounded-full border border-black/15 px-3 py-2 text-xs font-medium select-none text-black/70 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/35 dark:hover:text-white"
                                        @click="emit('start-edit', price)"
                                    >
                                        {{ translations.actions.edit }}
                                    </button>

                                    <button
                                        type="button"
                                        class="rounded-full border border-red-500/20 px-3 py-2 text-xs font-medium select-none text-red-700 transition hover:cursor-pointer hover:border-red-500/40 hover:text-red-800 dark:border-red-400/20 dark:text-red-300 dark:hover:border-red-400/40 dark:hover:text-red-200"
                                        :disabled="deletingId === price.id"
                                        @click="emit('delete-price', price.id)"
                                    >
                                        {{ deletingId === price.id ? translations.actions.deleting : translations.actions.delete }}
                                    </button>
                                </div>
                            </td>
                        </template>
                    </tr>
                </tbody>
            </table>
        </div>

        <div v-else class="px-6 py-12">
            <h3 class="text-lg font-medium text-black dark:text-white">
                {{ translations.states.empty_title }}
            </h3>

            <p class="mt-2 text-sm leading-6 text-black/55 dark:text-white/55">
                {{ translations.states.empty_text }}
            </p>
        </div>
    </section>
</template>