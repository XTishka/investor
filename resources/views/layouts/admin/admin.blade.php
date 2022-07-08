<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body class="bg-gray-200">
    <div class="flex">
        <aside class="w-72 border-r border-zinc-700 h-screen bg-zinc-700 text-zinc-300 shadow-xl shadow-zinc-600">
            <section>
                <x-admin.sidebar.app-title/>

                <div class="flex items-center justify-between text-center px-3 py-3 hover:text-white border-b border-zinc-500">
                    <img src=" {{ asset('dist/img/user-avatar-160x160.jpg') }}" class="w-8 rounded-full drop-shadow-2xl shadow-zinc-800"
                        alt="{{ __('admin.user_image_alt') }}">
                    <a href="#" class="text-lg mx-2 hover:text-white">{{ auth()->user()->name }}</a>
                    <a href="{{ route('logout') }}" class="text-zinc-500 hover:text-zinc-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>

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
            <header class="flex justify-between items-center px-4 border-b border-zinc-400 bg-zinc-300">
                <h1 class="text-xl py-3 text-zinc-500 font-semibold">
                    Dashboard
                </h1>

                <ul class="flex items-center text-zinc-500 px-4 ">
                    <li>Dashboard</li>
                    <li class="px-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li>Stockholders</li>
                </ul>
            </header>
            @yield('content')
        </main>

    </div>



    @livewireScripts

    @stack('scripts')
</body>

</html>