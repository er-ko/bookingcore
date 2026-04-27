<script setup>
import { computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import PriceForm from '@/Components/Price/PriceForm.vue'
import PriceList from '@/Components/Price/PriceList.vue'
import { usePricePage } from '@/Composables/Price/usePricePage'

const props = defineProps({
    translations: {
        type: Object,
        required: true,
    },
    branches: {
        type: Array,
        default: () => [],
    },
    units: {
        type: Array,
        default: () => [],
    },
    activities: {
        type: Array,
        default: () => [],
    },
    prices: {
        type: Array,
        default: () => [],
    },
    default_currency_code: {
        type: String,
        default: null,
    },
})

const pageTitle = computed(() => props.translations.title)
const hasPrices = computed(() => props.prices.length > 0)

const {
    form,
    errors,
    processing,
    units,
    activities,
    loadingUnits,
    loadingActivities,
    editingId,
    editForm,
    editErrors,
    updating,
    deletingId,
    hasBranches,
    inputClass,
    editInputClass,
    clearEditFieldError,
    formatPrice,
    submit,
    startEdit,
    cancelEdit,
    updatePrice,
    deletePrice,
} = usePricePage({
    translations: props.translations,
    branches: props.branches,
    units: props.units,
    activities: props.activities,
    defaultCurrencyCode: props.default_currency_code,
})
</script>

<template>
    <Head :title="pageTitle" />

    <AppLayout>
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="space-y-8">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                    <div class="w-full">
                        <h1 class="text-3xl font-semibold tracking-tight text-black dark:text-white sm:text-4xl">
                            {{ translations.title }}
                        </h1>

                        <p class="mt-3 max-w-3xl text-sm leading-6 text-black/55 dark:text-white/55 sm:text-base">
                            {{ translations.description }}
                        </p>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[0.55fr_1.05fr]">
                    <PriceForm
                        :translations="translations"
                        :branches="branches"
                        :default-currency-code="default_currency_code"
                        :form="form"
                        :errors="errors"
                        :units="units"
                        :activities="activities"
                        :loading-units="loadingUnits"
                        :loading-activities="loadingActivities"
                        :processing="processing"
                        :has-branches="hasBranches"
                        :input-class="inputClass"
                        @submit="submit"
                    />

                    <PriceList
                        :translations="translations"
                        :prices="prices"
                        :has-prices="hasPrices"
                        :editing-id="editingId"
                        :edit-form="editForm"
                        :edit-errors="editErrors"
                        :updating="updating"
                        :deleting-id="deletingId"
                        :edit-input-class="editInputClass"
                        :format-price="formatPrice"
                        @start-edit="startEdit"
                        @cancel-edit="cancelEdit"
                        @update-price="updatePrice"
                        @delete-price="deletePrice"
                        @clear-edit-field-error="clearEditFieldError"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
