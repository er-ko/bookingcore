<script setup>
const emit = defineEmits(['submit', 'update:selectedDate'])

defineProps({
    translations: {
        type: Object,
        required: true,
    },
    branches: {
        type: Array,
        default: () => [],
    },
    form: {
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
    slots: {
        type: Array,
        default: () => [],
    },
    selectedDate: {
        type: [String, Object],
        required: true,
    },
    loadingUnits: {
        type: Boolean,
        default: false,
    },
    loadingActivities: {
        type: Boolean,
        default: false,
    },
    loadingSlots: {
        type: Boolean,
        default: false,
    },
    canSubmit: {
        type: Boolean,
        default: false,
    },
    completedCount: {
        type: Number,
        default: 0,
    },
    completedBadgeClass: {
        type: [String, Array, Object],
        required: true,
    },
    inputClass: {
        type: Function,
        required: true,
    },
    nestedInputClass: {
        type: Function,
        required: true,
    },
    clearFieldError: {
        type: Function,
        required: true,
    },
    clearNestedFieldError: {
        type: Function,
        required: true,
    },
    slotValue: {
        type: Function,
        required: true,
    },
    slotLabel: {
        type: Function,
        required: true,
    },
})
</script>

<template>
    <section class="overflow-hidden rounded-4xl border border-black/10 bg-white/75 shadow-[0_30px_90px_-50px_rgba(0,0,0,0.22)] backdrop-blur-sm dark:border-white/10 dark:bg-white/4.5 dark:shadow-[0_30px_90px_-50px_rgba(0,0,0,0.7)]">
        <div class="border-b border-black/10 px-6 py-5 dark:border-white/10 sm:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <h2 class="text-xl font-semibold tracking-[-0.03em] text-black dark:text-white">
                    {{ translations.content.form_title }}
                </h2>

                <div
                    :class="completedBadgeClass"
                    class="inline-flex items-end justify-center gap-1.5 rounded-2xl border px-3 py-1.5 text-xs font-semibold text-nowrap transition-colors duration-200"
                >
                    <span>{{ completedCount }} / 3</span>
                    <span class="text-[0.7rem] font-medium tracking-widest uppercase">{{ translations.content.ready }}</span>
                </div>
            </div>
        </div>

        <div class="space-y-8 px-6 py-6 sm:px-8 sm:py-8">
            <section class="space-y-5">
                <div class="flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-black/10 bg-black/3 text-sm font-semibold text-black/70 dark:border-white/10 dark:bg-white/3 dark:text-white/70">
                        01
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-lg font-semibold tracking-[-0.02em] text-black dark:text-white">
                            {{ translations.content.appointment_title }}
                        </h3>

                        <p class="text-sm leading-6 text-black/55 dark:text-white/55">
                            {{ translations.content.appointment_text }}
                        </p>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.branch_title }}
                        </label>

                        <select
                            v-model="form.branch_public_id"
                            :class="inputClass('branch_public_id')"
                            @change="clearFieldError('branch_public_id')"
                        >
                            <option value="">
                                {{ translations.form.branch_placeholder }}
                            </option>

                            <option
                                v-for="branch in branches"
                                :key="branch.public_id"
                                :value="branch.public_id"
                            >
                                {{ branch.name }}
                            </option>
                        </select>

                        <p
                            v-if="form.errors.branch_public_id"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors.branch_public_id }}
                        </p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.unit_title }}
                        </label>

                        <select
                            v-model="form.unit_public_id"
                            :disabled="loadingUnits || !form.branch_public_id"
                            :class="inputClass('unit_public_id')"
                            @change="clearFieldError('unit_public_id')"
                        >
                            <option value="">
                                {{ translations.form.unit_placeholder }}
                            </option>

                            <option
                                v-for="unit in units"
                                :key="unit.public_id"
                                :value="unit.public_id"
                            >
                                {{ unit.name }}
                            </option>
                        </select>

                        <p
                            v-if="form.errors.unit_public_id"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors.unit_public_id }}
                        </p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.activity_title }}
                        </label>

                        <select
                            v-model="form.activity_public_id"
                            :disabled="loadingActivities || !form.unit_public_id"
                            :class="inputClass('activity_public_id')"
                            @change="clearFieldError('activity_public_id')"
                        >
                            <option value="">
                                {{ translations.form.activity_placeholder }}
                            </option>

                            <option
                                v-for="activity in activities"
                                :key="activity.public_id"
                                :value="activity.public_id"
                            >
                                {{ activity.name }}
                            </option>
                        </select>

                        <p
                            v-if="form.errors.activity_public_id"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors.activity_public_id }}
                        </p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.date_title }}
                        </label>

                        <input
                            :value="selectedDate"
                            type="date"
                            class="block w-full rounded-2xl border border-black/10 bg-white/65 px-4 py-3 text-sm text-black transition-all duration-200 focus:border-black/30 focus:outline-none dark:border-white/10 dark:bg-white/3 dark:text-white dark:focus:border-white/30"
                            @input="emit('update:selectedDate', $event.target.value)"
                        >
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.form.slot_title }}
                    </label>

                    <select
                        v-model="form.starts_at"
                        :disabled="loadingSlots || !selectedDate || !form.activity_public_id"
                        :class="inputClass('starts_at')"
                        @change="clearFieldError('starts_at')"
                    >
                        <option value="">
                            {{ translations.form.slot_placeholder }}
                        </option>

                        <option
                            v-for="slot in slots"
                            :key="slotValue(slot)"
                            :value="slotValue(slot)"
                        >
                            {{ slotLabel(slot) }}
                        </option>
                    </select>

                    <p
                        v-if="form.errors.starts_at"
                        class="text-sm text-red-600 dark:text-red-400"
                    >
                        {{ form.errors.starts_at }}
                    </p>
                </div>
            </section>

            <div class="border-t border-black/10 dark:border-white/10" />

            <section class="space-y-5">
                <div class="flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-black/10 bg-black/3 text-sm font-semibold text-black/70 dark:border-white/10 dark:bg-white/3 dark:text-white/70">
                        02
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-lg font-semibold tracking-[-0.02em] text-black dark:text-white">
                            {{ translations.content.customer_title }}
                        </h3>

                        <p class="text-sm leading-6 text-black/55 dark:text-white/55">
                            {{ translations.content.customer_text }}
                        </p>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.first_name_title }}
                        </label>

                        <input
                            v-model="form.customer.first_name"
                            type="text"
                            :placeholder="translations.form.first_name_placeholder"
                            :class="nestedInputClass('customer', 'first_name')"
                            @input="clearNestedFieldError('customer', 'first_name')"
                        >

                        <p
                            v-if="form.errors['customer.first_name']"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors['customer.first_name'] }}
                        </p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.last_name_title }}
                        </label>

                        <input
                            v-model="form.customer.last_name"
                            type="text"
                            :placeholder="translations.form.last_name_placeholder"
                            :class="nestedInputClass('customer', 'last_name')"
                            @input="clearNestedFieldError('customer', 'last_name')"
                        >

                        <p
                            v-if="form.errors['customer.last_name']"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors['customer.last_name'] }}
                        </p>
                    </div>

                    <div class="space-y-1.5 md:col-span-2">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.email_title }}
                        </label>

                        <input
                            v-model="form.customer.email"
                            type="email"
                            :placeholder="translations.form.email_placeholder"
                            :class="nestedInputClass('customer', 'email')"
                            @input="clearNestedFieldError('customer', 'email')"
                        >

                        <p
                            v-if="form.errors['customer.email']"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors['customer.email'] }}
                        </p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.phone_code_title }}
                        </label>

                        <input
                            v-model="form.customer.phone_code"
                            type="text"
                            :placeholder="translations.form.phone_code_placeholder"
                            :class="nestedInputClass('customer', 'phone_code')"
                            @input="clearNestedFieldError('customer', 'phone_code')"
                        >

                        <p
                            v-if="form.errors['customer.phone_code']"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors['customer.phone_code'] }}
                        </p>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                            {{ translations.form.phone_title }}
                        </label>

                        <input
                            v-model="form.customer.phone"
                            type="text"
                            :placeholder="translations.form.phone_placeholder"
                            :class="nestedInputClass('customer', 'phone')"
                            @input="clearNestedFieldError('customer', 'phone')"
                        >

                        <p
                            v-if="form.errors['customer.phone']"
                            class="text-sm text-red-600 dark:text-red-400"
                        >
                            {{ form.errors['customer.phone'] }}
                        </p>
                    </div>
                </div>
            </section>

            <div class="border-t border-black/10 dark:border-white/10" />

            <section class="space-y-5">
                <div class="flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl border border-black/10 bg-black/3 text-sm font-semibold text-black/70 dark:border-white/10 dark:bg-white/3 dark:text-white/70">
                        03
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-lg font-semibold tracking-[-0.02em] text-black dark:text-white">
                            {{ translations.content.note_title }}
                        </h3>

                        <p class="text-sm leading-6 text-black/55 dark:text-white/55">
                            {{ translations.content.note_text }}
                        </p>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[11px] font-medium uppercase tracking-[0.2em] text-black/40 dark:text-white/40">
                        {{ translations.form.note_title }}
                    </label>

                    <textarea
                        v-model="form.note"
                        rows="4"
                        :placeholder="translations.form.note_placeholder"
                        :class="inputClass('note')"
                        @input="clearFieldError('note')"
                    />

                    <p
                        v-if="form.errors.note"
                        class="text-sm text-red-600 dark:text-red-400"
                    >
                        {{ form.errors.note }}
                    </p>
                </div>
            </section>

            <div class="rounded-[1.75rem] border border-black/10 bg-black/2.5 p-4 dark:border-white/10 dark:bg-white/2.5 sm:p-5">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="space-y-1">
                        <p class="text-sm font-medium text-black dark:text-white">
                            {{ translations.content.review_title }}
                        </p>

                        <p class="text-sm text-black/55 dark:text-white/55">
                            {{ translations.content.review_text }}
                        </p>
                    </div>

                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-2xl border border-black/20 bg-black px-5 py-3 text-sm font-medium text-white transition hover:cursor-pointer hover:border-black hover:bg-black/90 disabled:cursor-not-allowed disabled:border-black/10 disabled:bg-black/20 disabled:text-black/45 dark:border-white/20 dark:bg-white dark:text-black dark:hover:border-white dark:hover:bg-white/90 dark:disabled:border-white/10 dark:disabled:bg-white/10 dark:disabled:text-white/35"
                        :disabled="form.processing || !canSubmit"
                        @click="emit('submit')"
                    >
                        <span v-if="form.processing">
                            {{ translations.actions.submitting }}
                        </span>

                        <span v-else>
                            {{ translations.actions.submit }}
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
