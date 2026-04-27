import { computed, inject, onMounted, ref } from 'vue'

const COPY_FEEDBACK_TIMEOUT = 2000
const THEME_STORAGE_KEY = 'theme'

export function usePublicBooking(options = {}) {
    const route = inject('route')

    const identity = options.identity ?? {}

    const copyState = ref('idle')
    const isDark = ref(true)
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

    function applyTheme() {
        document.documentElement.classList.toggle('dark', isDark.value)
        localStorage.setItem(THEME_STORAGE_KEY, isDark.value ? 'dark' : 'light')
    }

    function toggleTheme() {
        isDark.value = !isDark.value
        applyTheme()
    }

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

    onMounted(() => {
        const savedTheme = localStorage.getItem(THEME_STORAGE_KEY)

        if (savedTheme === 'dark') {
            isDark.value = true
        } else if (savedTheme === 'light') {
            isDark.value = false
        } else {
            isDark.value = window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        applyTheme()
    })

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
