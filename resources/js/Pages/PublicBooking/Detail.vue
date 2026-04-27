<script setup>
import { computed, inject } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import PublicLayout from '@/Layouts/PublicLayout.vue'

const route = inject('route')

const props = defineProps({
	page: {
		type: Object,
		required: true,
	},
	booking: {
		type: Object,
		required: true,
	},
	translations: {
		type: Object,
		required: true,
	},
})

const fallback = computed(() => props.translations?.fallback ?? '—')

const formatDateTime = (value) => {
	if (!value) {
		return fallback.value
	}

	return new Intl.DateTimeFormat(undefined, {
		dateStyle: 'medium',
		timeStyle: 'short',
	}).format(new Date(value))
}

const customerName = computed(() => {
	const firstName = props.booking?.customer?.first_name ?? ''
	const lastName = props.booking?.customer?.last_name ?? ''

	return `${firstName} ${lastName}`.trim() || fallback.value
})

const customerPhone = computed(() => {
	const phoneCode = props.booking?.customer?.phone_code ?? ''
	const phone = props.booking?.customer?.phone ?? ''

	return [phoneCode, phone].filter(Boolean).join(' ') || fallback.value
})

const bookingStatus = computed(() => {
	const value = props.booking?.status

	if (!value) {
		return fallback.value
	}

	if (typeof value === 'string') {
		return value.charAt(0).toUpperCase() + value.slice(1)
	}

	return String(value)
})

const publicSlug = computed(() => props.page?.identity?.slug ?? '')

const calendarUrl = computed(() => route('public-booking.booking.calendar', {
	slug: publicSlug.value,
	token: props.booking.public_token,
}))

const branchAddress = computed(() => {
	const branch = props.booking?.branch

	if (!branch) {
		return fallback.value
	}

	const parts = [
		branch.address_line_1,
		branch.address_line_2,
		branch.city,
		branch.postcode,
		branch.country_code,
	].filter(Boolean)

	return parts.join(', ') || fallback.value
})

const printPage = () => {
	window.print()
}
</script>

<template>
	<Head :title="translations.title" />

	<PublicLayout :page="page">
		<section class="mx-auto max-w-4xl pb-10 sm:px-6 lg:px-8">
			<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white/[0.035] shadow-sm backdrop-blur-sm dark:border-white/10 dark:bg-white/[0.035] dark:shadow-[0_30px_90px_-50px_rgba(0,0,0,0.7)]">
				<div class="border-b border-slate-200 bg-transparent px-6 py-6 dark:border-white/10">
					<div class="flex flex-wrap items-center gap-3">
						<div class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300">
							{{ translations.badge_created }}
						</div>

						<div class="inline-flex items-center rounded-full border border-slate-200 bg-white px-3 py-1 text-sm font-medium text-slate-700 dark:border-white/10 dark:bg-white/3 dark:text-white">
							{{ translations.status_label }}: {{ bookingStatus }}
						</div>
					</div>

					<h1 class="mt-4 text-2xl font-semibold text-slate-900 dark:text-white sm:text-3xl">
						{{ translations.heading }}
					</h1>

					<p class="mt-2 max-w-2xl text-sm text-slate-600 dark:text-white/60 sm:text-base">
						{{ translations.description }}
					</p>
				</div>

				<div class="space-y-8 px-6 py-8">
					<div class="grid gap-4 sm:grid-cols-2">
						<div class="space-y-4 rounded-2xl border border-slate-200 bg-white p-5 dark:border-white/10 dark:bg-white/3">
							<h2 class="text-base font-semibold text-slate-900 dark:text-white">
								{{ translations.details_title }}
							</h2>

							<div>
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.branch_label }}
								</p>
								<p class="mt-1 text-sm font-medium text-slate-900 dark:text-white">
									{{ booking.branch?.name ?? fallback }}
								</p>
								<p class="mt-1 text-sm text-slate-600 dark:text-white/60">
									{{ branchAddress }}
								</p>
							</div>

							<div>
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.unit_label }}
								</p>
								<p class="mt-1 text-sm text-slate-900 dark:text-white">
									{{ booking.unit?.name ?? fallback }}
								</p>
							</div>

							<div>
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.activity_label }}
								</p>
								<p class="mt-1 text-sm text-slate-900 dark:text-white">
									{{ booking.activity?.name ?? fallback }}
								</p>
							</div>

							<div>
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.date_time_label }}
								</p>
								<p class="mt-1 text-sm text-slate-900 dark:text-white">
									{{ formatDateTime(booking.starts_at) }}
								</p>
								<p class="mt-1 text-sm text-slate-500 dark:text-white/55">
									{{ translations.to_label }} {{ formatDateTime(booking.ends_at) }}
								</p>
							</div>
						</div>

						<div class="space-y-4 rounded-2xl border border-slate-200 bg-white p-5 dark:border-white/10 dark:bg-white/3">
							<h2 class="text-base font-semibold text-slate-900 dark:text-white">
								{{ translations.customer_title }}
							</h2>

							<div>
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.customer_name_label }}
								</p>
								<p class="mt-1 text-sm text-slate-900 dark:text-white">
									{{ customerName }}
								</p>
							</div>

							<div>
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.customer_email_label }}
								</p>
								<p class="mt-1 break-all text-sm text-slate-900 dark:text-white">
									{{ booking.customer?.email ?? fallback }}
								</p>
							</div>

							<div class="sm:col-span-2">
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.customer_phone_label }}
								</p>
								<p class="mt-1 text-sm text-slate-900 dark:text-white">
									{{ customerPhone }}
								</p>
							</div>

							<div v-if="booking.note">
								<p class="text-xs font-medium uppercase tracking-wide text-slate-500 dark:text-white/40">
									{{ translations.note_label }}
								</p>
								<p class="mt-1 break-all text-sm text-slate-900 dark:text-white">
									{{ booking.note }}
								</p>
							</div>
						</div>
					</div>

					<div class="flex flex-col gap-3 sm:flex-row sm:justify-between">
						<Link
							:href="route('public-booking.show', { slug: publicSlug })"
							class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium select-none text-slate-700 transition hover:bg-slate-50 dark:border-white/10 dark:bg-white/3 dark:text-white dark:hover:bg-white/6"
						>
							<svg
								xmlns="http://www.w3.org/2000/svg"
								class="h-4 w-4"
								viewBox="0 0 24 24"
								fill="none"
								stroke="currentColor"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
							>
								<path d="m15 18-6-6 6-6" />
							</svg>
							<span>{{ translations.actions.back }}</span>
						</Link>

						<div class="flex flex-col gap-3 sm:flex-row">
							<button
								type="button"
								class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium select-none text-slate-700 transition hover:cursor-pointer hover:bg-slate-50 dark:border-white/10 dark:bg-white/3 dark:text-white dark:hover:bg-white/6"
								@click="printPage"
							>
								<svg
									xmlns="http://www.w3.org/2000/svg"
									class="h-4 w-4"
									viewBox="0 0 24 24"
									fill="none"
									stroke="currentColor"
									stroke-width="2"
									stroke-linecap="round"
									stroke-linejoin="round"
								>
									<polyline points="6 9 6 2 18 2 18 9" />
									<path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
									<rect width="12" height="8" x="6" y="14" />
								</svg>
								<span>{{ translations.actions.print }}</span>
							</button>

							<a
								:href="calendarUrl"
								class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-medium select-none text-white transition hover:bg-slate-800 dark:bg-white dark:text-black dark:hover:bg-white/90"
							>
								<svg
									xmlns="http://www.w3.org/2000/svg"
									class="h-4 w-4"
									viewBox="0 0 24 24"
									fill="none"
									stroke="currentColor"
									stroke-width="2"
									stroke-linecap="round"
									stroke-linejoin="round"
								>
									<path d="M8 2v4" />
									<path d="M16 2v4" />
									<rect width="18" height="18" x="3" y="4" rx="2" />
									<path d="M3 10h18" />
									<path d="m9 16 2 2 4-4" />
								</svg>
								<span>{{ translations.actions.calendar }}</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</PublicLayout>
</template>