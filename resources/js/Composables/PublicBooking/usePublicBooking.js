import { computed, inject, ref } from 'vue'
import { useTheme } from '@/Composables/useTheme'

const COPY_FEEDBACK_TIMEOUT = 2000

export function usePublicBooking(options = {}) {
    const route = inject('route')

    const identity = options.identity ?? {}

    const copyState = ref('idle')
    const { isDark, toggleTheme } = useTheme()
    let copyStateTimeoutId = null

    const pageName = computed(() => {
        return identity?.brand_name?.trim() || 'Public booking'
    })

    const publicPageUrl = computed(() => {
        if (!identity?.slug) {
            return ''
        }

        return route('public-booking.show', identity.slug)
    })

    const homeUrl = computed(() => {
        return route('home')
    })

    const publicPageDisplay = computed(() => {
        if (!publicPageUrl.value) {
            return ''
        }

        try {
            const url = new URL(publicPageUrl.value)

            return `${url.host}${url.pathname}`
        } catch {
            return publicPageUrl.value
        }
    })

    async function copyPublicPageUrl() {
        if (!publicPageUrl.value || !navigator?.clipboard?.writeText) {
            copyState.value = 'error'
            return false
        }

        try {
            await navigator.clipboard.writeText(publicPageUrl.value)
            copyState.value = 'copied'

            if (copyStateTimeoutId) {
                window.clearTimeout(copyStateTimeoutId)
            }

            copyStateTimeoutId = window.setTimeout(() => {
                copyState.value = 'idle'
            }, COPY_FEEDBACK_TIMEOUT)

            return true
        } catch {
            copyState.value = 'error'
            return false
        }
    }

    return {
        copyState,
        isDark,
        homeUrl,
        pageName,
        publicPageUrl,
        publicPageDisplay,
        copyPublicPageUrl,
        toggleTheme,
    }
}
