<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#ffffff">

    <title inertia>{{ config('app.name', 'Booking Core') }}</title>

    <script>
        (() => {
            const storedTheme = (() => {
                try {
                    return localStorage.getItem('theme');
                } catch {
                    return null;
                }
            })();
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = storedTheme === 'dark' || (storedTheme !== 'light' && prefersDark);
            const backgroundColor = isDark ? '#000000' : '#ffffff';

            document.documentElement.classList.toggle('dark', isDark);
            document.documentElement.style.colorScheme = isDark ? 'dark' : 'light';
            document.documentElement.style.backgroundColor = backgroundColor;
            document.querySelector('meta[name="theme-color"]').setAttribute('content', backgroundColor);
        })();
    </script>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    @vite('resources/js/app.js')
    @inertiaHead

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EVYZXJC011"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-EVYZXJC011');
    </script>
</head>
<body class="antialiased bg-white text-black dark:bg-black dark:text-white">
    @inertia
</body>
</html>
