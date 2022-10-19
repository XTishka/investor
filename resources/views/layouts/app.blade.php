<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

                <ul class="p-2">
                    <li> {{-- Dashboard --}}
                        <x-admin.sidebar.single-link route="admin.dashboard" :text="__('admin.dashboard')">
                            <x-admin.icons.chart-bar class="h-5 w-5" />
                        </x-admin.sidebar.single-link>
                    </li>

                </ul>

            </section>
        </aside>

        <main class="w-full pl-72">
            {{ $slot }}
        </main>

    </div>
    {{-- <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}

    @stack('modals')

    @livewireScripts
</body>

</html>
