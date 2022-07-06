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
                <a href="#" class="block text-center text-xl py-3 hover:text-white border-b border-zinc-500">
                    <span><strong>Investering</strong> & Feriebolig</span>
                </a>
                <ul class="p-2">

                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center w-full inline-flex py-2 px-4 border-transparent hover:shadow-sm font-medium rounded-md hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <p class="ml-2">
                                {{ __('admin.dashboard') }}
                            </p>
                        </a>
                    </li>

                    <li class="py-2">
                        <span class="uppercase text-xs py-2 px-4">
                            {{ __('admin.data') }}
                        </span>
                    </li>

                    <li>
                        <a href="{{ route('admin.stockholders') }}"
                            class="flex items-center w-full inline-flex py-2 px-4 border-transparent hover:shadow-sm font-medium rounded-md hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <p class="ml-2">
                                {{ __('admin.stockholders') }}
                            </p>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.properties') }}"
                            class="flex items-center w-full inline-flex py-2 px-4 border-transparent hover:shadow-sm font-medium rounded-md hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <p class="ml-2">
                                {{ __('admin.properties') }}
                            </p>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.rounds') }}"
                            class="flex items-center w-full inline-flex py-2 px-4 border-transparent hover:shadow-sm font-medium rounded-md hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <p class="ml-2">
                                {{ __('admin.rounds') }}
                            </p>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.wishes') }}"
                            class="flex items-center w-full inline-flex py-2 px-4 border-transparent hover:shadow-sm font-medium rounded-md hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                            <p class="ml-2">
                                {{ __('admin.wishes') }}
                            </p>
                        </a>
                    </li>

                    <li class="py-2">
                        <span class="uppercase text-xs py-2 px-4">
                            {{ __('admin.settings') }}
                        </span>
                    </li>

                    <li>
                        <a href="{{ route('admin.administrators') }}"
                            class="flex items-center w-full inline-flex py-2 px-4 border-transparent hover:shadow-sm font-medium rounded-md hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <p class="ml-2">
                                {{ __('admin.administrators') }}
                            </p>
                        </a>
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
