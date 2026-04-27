<script setup>
defineProps({
    translations: {
        type: Object,
        required: true,
    },
    branches: {
        type: Array,
        default: () => [],
    },
    defaultCurrencyCode: {
        type: String,
        default: null,
    },
    form: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
        required: true,
    },
    units: {
        type: Array,
        default: () => [],
    },
    activities: {
        type: Array,
        default: () => [],
    },
    loadingUnits: {
        type: Boolean,
        default: false,
    },
    loadingActivities: {
        type: Boolean,
        default: false,
    },
    processing: {
        type: Boolean,
        default: false,
    },
    hasBranches: {
        type: Boolean,
        default: false,
    },
    inputClass: {
        type: Function,
        required: true,
    },
})

const emit = defineEmits(['submit'])
</script>

<template>
    <aside class="h-fit overflow-hidden rounded-3xl border border-black/10 backdrop-blur-sm dark:border-white/10">
        <div class="border-b border-black/10 px-6 py-4 dark:border-white/10">
            <h2 class="text-xs font-medium uppercase tracking-[0.2em] text-black/55 dark:text-white/55">
                {{ translations.form.title }}
            </h2>
        </div>

        <div class="space-y-6 px-6 py-6">
            <div class="rounded-2xl border border-dashed border-black/10 px-4 py-4 dark:border-white/10">
                <p class="text-sm leading-6 text-black/55 dark:text-white/55">
                    <span class="font-medium text-black dark:text-white">
                        {{ translations.form.currency_title }}:
                    </span>
                    {{ defaultCurrencyCode ?? '—' }}
                </p>

                <p class="mt-1 text-sm leading-6 text-black/50 dark:text-white/50">
                    {{ translations.form.currency_text }}
                </p>
            </div>

            <div v-if="hasBranches" class="grid gap-4">
                <div class="space-y-1.5">
                    <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.form.branch_title }}
                    </label>

                    <select v-model="form.branch_id" :class="inputClass('branch_id')">
                        <option value="">{{ translations.form.branch_placeholder }}</option>

                        <option
                            v-for="branch in branches"
                            :key="branch.id"
                            :value="branch.id"
                        >
                            {{ branch.name }}
                        </option>
                    </select>

                    <p v-if="errors.branch_id" class="text-sm text-red-600 dark:text-red-400">
                        {{ errors.branch_id }}
                    </p>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.form.unit_title }}
                    </label>

                    <select
                        v-model="form.unit_id"
                        :disabled="loadingUnits || !form.branch_id"
                        :class="inputClass('unit_id')"
                    >
                        <option value="">{{ translations.form.unit_placeholder }}</option>

                        <option
                            v-for="unit in units"
                            :key="unit.id"
                            :value="unit.id"
                        >
                            {{ unit.name }}
                        </option>
                    </select>

                    <p v-if="errors.unit_id" class="text-sm text-red-600 dark:text-red-400">
                        {{ errors.unit_id }}
                    </p>

                    <p
                        v-else-if="form.branch_id && !loadingUnits && units.length === 0"
                        class="text-sm text-black/45 dark:text-white/45"
                    >
                        {{ translations.states.no_units_text }}
                    </p>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.form.activity_title }}
                    </label>

                    <select
                        v-model="form.activity_id"
                        :disabled="loadingActivities || !form.unit_id"
                        :class="inputClass('activity_id')"
                    >
                        <option value="">{{ translations.form.activity_placeholder }}</option>

                        <option
                            v-for="activity in activities"
                            :key="activity.id"
                            :value="activity.id"
                        >
                            {{ activity.name }}
                        </option>
                    </select>

                    <p v-if="errors.activity_id" class="text-sm text-red-600 dark:text-red-400">
                        {{ errors.activity_id }}
                    </p>

                    <p
                        v-else-if="form.unit_id && !loadingActivities && activities.length === 0"
                        class="text-sm text-black/45 dark:text-white/45"
                    >
                        {{ translations.states.no_activities_text }}
                    </p>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.form.price_title }}
                    </label>

                    <input
                        v-model="form.price"
                        type="number"
                        min="0"
                        step="0.01"
                        :placeholder="translations.form.price_placeholder"
                        :class="inputClass('price')"
                    >

                    <p v-if="errors.price" class="text-sm text-red-600 dark:text-red-400">
                        {{ errors.price }}
                    </p>
                </div>
            </div>

            <div v-else class="rounded-2xl border border-dashed border-black/10 px-4 py-5 dark:border-white/10">
                <h3 class="text-sm font-medium text-black dark:text-white">
                    {{ translations.states.no_branches_title }}
                </h3>

                <p class="mt-2 text-sm leading-6 text-black/55 dark:text-white/55">
                    {{ translations.states.no_branches_text }}
                </p>
            </div>

            <div class="border-t border-black/10 pt-6 dark:border-white/10">
                <div class="flex justify-end">
                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-full border border-black/20 px-5 py-2.5 text-sm font-medium select-none text-black/80 transition hover:cursor-pointer hover:border-black/45 hover:text-black disabled:cursor-not-allowed disabled:opacity-45 dark:border-white/20 dark:text-white/80 dark:hover:border-white/45 dark:hover:text-white"
                        :disabled="processing"
                        @click="emit('submit')"
                    >
                        <span v-if="processing">{{ translations.actions.saving }}</span>
                        <span v-else>{{ translations.actions.save }}</span>
                    </button>
                </div>
            </div>
        </div>
    </aside>
</template>
