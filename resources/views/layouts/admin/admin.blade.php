<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@isset($title){{ $title }} @endisset | {{ config('app.name', 'Investering') }}</title>

    @livewireStyles
</head>

<body class="bg-gray-200">
    <div class="flex">
        <aside class="w-72 border-r border-zinc-700 h-screen bg-zinc-700 text-zinc-300 shadow-xl shadow-zinc-600">
            <section>

                {{-- Page title --}}
                <x-admin.sidebar.app-title/>

                {{-- User info --}}
                <x-admin.sidebar.user/>

                <ul class="p-2">

                    <li> {{-- Dashboard --}}
                        <x-admin.sidebar.single-link route="admin.dashboard" :text="__('admin.dashboard')">
                            <x-admin.icons.chart-bar class="h-5 w-5"/>
                        </x-admin.sidebar.single-link>
                    </li>

                    <li class="my-2">
                        <x-admin.sidebar.nav-header :text="__('admin.data')"/>
                    </li>

                    <li> {{-- Stockholders --}}
                        <x-admin.sidebar.single-link route="admin.stockholders" :text="__('admin.stockholders')">
                            <x-admin.icons.users class="h-5 w-5"/>
                        </x-admin.sidebar.single-link>
                    </li>

                    <li> {{-- Properties --}}
                        <x-admin.sidebar.single-link route="admin.properties" :text="__('admin.properties')">
                            <x-admin.icons.house class="h-5 w-5"/>
                        </x-admin.sidebar.single-link>
                    </li>

                    <li> {{-- Rounds --}}
                        <x-admin.sidebar.single-link route="admin.rounds" :text="__('admin.rounds')">
                            <x-admin.icons.refresh class="h-5 w-5"/>
                        </x-admin.sidebar.single-link>
                    </li>

                    <li> {{-- Wishes --}}
                        <x-admin.sidebar.single-link route="admin.wishes" :text="__('admin.wishes')">
                            <x-admin.icons.star class="h-5 w-5"/>
                        </x-admin.sidebar.single-link>
                    </li>

                    <li class="my-2">
                        <x-admin.sidebar.nav-header :text="__('admin.settings')"/>
                    </li>

                    <li> {{-- Administrators --}}
                        <x-admin.sidebar.single-link route="admin.administrators" :text="__('admin.administrators')">
                            <x-admin.icons.users class="h-5 w-5"/>
                        </x-admin.sidebar.single-link>
                    </li>

                </ul>
            </section>
        </aside>

        <main class="w-full">
            {{-- Page header --}}
            <x-admin.page.header :pageTitle="$page_title" :breadcrumbs="$breadcrumbs"/>

            {{-- Content --}}
            @yield('content')
        </main>

    </div>

    @livewireScripts

    @stack('scripts')
</body>

</html>