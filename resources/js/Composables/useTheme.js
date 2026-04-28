import { onBeforeUnmount, onMounted, ref } from 'vue'

export const THEME_STORAGE_KEY = 'theme'

function systemPrefersDark() {
    return window.matchMedia('(prefers-color-scheme: dark)').matches
}

function storedTheme() {
    const theme = localStorage.getItem(THEME_STORAGE_KEY)

    return theme === 'dark' || theme === 'light' ? theme : null
}

function resolveTheme() {
    const theme = storedTheme()

    if (theme) {
        return theme === 'dark'
    }

    return systemPrefersDark()
}

function applyTheme(isDark) {
    const backgroundColor = isDark ? '#000000' : '#ffffff'
    const textColor = isDark ? '#ffffff' : '#000000'

    document.documentElement.classList.toggle('dark', isDark)
    document.documentElement.style.colorScheme = isDark ? 'dark' : 'light'
    document.documentElement.style.backgroundColor = backgroundColor

    if (document.body) {
        document.body.style.backgroundColor = backgroundColor
        document.body.style.color = textColor
    }

    document
        .querySelector('meta[name="theme-color"]')
        ?.setAttribute('content', backgroundColor)
}

export function useTheme() {
    const isDark = ref(
        typeof document !== 'undefined'
            ? document.documentElement.classList.contains('dark')
            : false
    )

    let mediaQuery = null

    function syncTheme() {
        isDark.value = resolveTheme()
        applyTheme(isDark.value)
    }

    function handleSystemThemeChange() {
        if (storedTheme()) {
            return
        }

        syncTheme()
    }

    function toggleTheme() {
        isDark.value = !isDark.value
        localStorage.setItem(THEME_STORAGE_KEY, isDark.value ? 'dark' : 'light')
        applyTheme(isDark.value)
    }

    onMounted(() => {
        syncTheme()

        mediaQuery = window.matchMedia('(prefers-color-scheme: dark)')
        mediaQuery.addEventListener('change', handleSystemThemeChange)
    })

    onBeforeUnmount(() => {
        mediaQuery?.removeEventListener('change', handleSystemThemeChange)
    })

    return {
        isDark,
        toggleTheme,
    }
}
