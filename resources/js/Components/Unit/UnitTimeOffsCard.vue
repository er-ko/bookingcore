<script setup>
import { inject } from 'vue'
import { useUnitTimeOffsForm } from '@/Composables/Unit/useUnitTimeOffsForm'

const route = inject('route')

const props = defineProps({
    unit: {
        type: Object,
        required: true,
    },
    timeOffs: {
        type: Array,
        default: () => ([]),
    },
    translations: {
        type: Object,
        required: true,
    },
})

const {
    state,
    hasChanges,
    addItem,
    removeItem,
    submit,
} = useUnitTimeOffsForm({
    route,
    unit: props.unit,
    timeOffs: props.timeOffs,
    translations: props.translations.time_offs_form,
})
</script>

<template>
    <section class="overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
        <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
            <div class="flex items-center justify-between gap-3">
                <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                    {{ translations.time_offs_form.title }}
                </h2>

                <span class="text-xs text-black/35 dark:text-white/35">
                    {{ translations.time_offs_form.subtitle }}
                </span>
            </div>
        </div>

        <div class="space-y-6 px-6 py-6">
            <p class="text-sm leading-6 text-black/55 dark:text-white/55">
                {{ translations.time_offs_form.description }}
            </p>

            <div class="space-y-4">
                <div
                    v-for="(item, index) in state.items"
                    :key="`${item.id ?? 'new'}-${index}`"
                    class="space-y-4 rounded-2xl border border-black/8 p-4 dark:border-white/8"
                >
                    <div class="grid gap-3 md:grid-cols-2">
                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                {{ translations.time_offs_form.starts_at_title }}
                            </label>

                            <input
                                v-model="item.starts_at"
                                type="datetime-local"
                                required
                                class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                                {{ translations.time_offs_form.ends_at_title }}
                            </label>

                            <input
                                v-model="item.ends_at"
                                type="datetime-local"
                                required
                                class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:focus:border-white/30"
                            >
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.time_offs_form.reason_title }}
                        </label>

                        <input
                            v-model="item.reason"
                            type="text"
                            maxlength="255"
                            :placeholder="translations.time_offs_form.reason_placeholder"
                            class="block w-full rounded-2xl border border-black/10 bg-transparent px-4 py-3 text-sm text-black transition-all duration-150 placeholder:text-black/30 focus:border-black/30 focus:outline-none dark:border-white/10 dark:text-white dark:placeholder:text-white/30 dark:focus:border-white/30"
                        >
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="button"
                            class="inline-flex items-center justify-center rounded-full border border-red-500/20 px-4 py-2 text-sm font-medium select-none text-red-700 transition hover:cursor-pointer hover:border-red-500/40 hover:text-red-800 dark:border-red-400/20 dark:text-red-300 dark:hover:border-red-400/40 dark:hover:text-red-200"
                            @click="removeItem(index)"
                        >
                            {{ translations.time_offs_form.remove }}
                        </button>
                    </div>
                </div>

                <div
                    v-if="state.items.length === 0"
                    class="rounded-2xl border border-dashed border-black/10 px-4 py-4 dark:border-white/10"
                >
                    <p class="text-sm leading-6 text-black/50 dark:text-white/50">
                        {{ translations.time_offs_form.empty }}
                    </p>
                </div>
            </div>

            <div>
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-full border border-black/15 px-4 py-2 text-sm font-medium select-none text-black/70 transition hover:cursor-pointer hover:border-black/35 hover:text-black dark:border-white/15 dark:text-white/70 dark:hover:border-white/35 dark:hover:text-white"
                    @click="addItem"
                >
                    {{ translations.time_offs_form.add }}
                </button>
            </div>

            <p
                v-if="state.error"
                class="text-sm text-red-600 dark:text-red-400"
            >
                {{ state.error }}
            </p>

            <div class="border-t border-black/10 pt-6 dark:border-white/10">
                <div class="flex justify-end">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-full border border-black/20 px-5 py-2.5 text-sm font-medium select-none text-black/80 transition hover:border-black/45 hover:text-black dark:border-white/20 dark:text-white/80 dark:hover:border-white/45 dark:hover:text-white disabled:cursor-not-allowed disabled:opacity-45"
                        :disabled="state.processing || !hasChanges"
                        @click="submit"
                    >
                        <span v-if="state.processing">{{ translations.time_offs_form.saving }}</span>
                        <span v-else>{{ translations.time_offs_form.save }}</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
