@props(['page_title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if ($page_title != '')
            {{ $page_title }} |
        @endif
        Investering & Feriebilig
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-200">
    <div class="flex">
        <aside class="w-72 border-r border-zinc-700 h-screen bg-zinc-700 text-zinc-300 shadow-xl shadow-zinc-600 fixed">
            <section>

                {{-- Page title --}}
                <x-admin.sidebar.app-title />

                {{-- User info --}}
                <x-admin.sidebar.user />

                {{-- Navigation --}}
                <x-admin.sidebar.navigation />

            </section>
        </aside>

        <main class="w-full pl-72">
            {{ $slot }}
        </main>

    </div>

    @stack('modals')

    @livewireScripts

    @stack('scripts')

</body>

</html>
