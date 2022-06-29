<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="bg-gray-100">

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">

            <nav class="hidden md:flex space-x-10">
                <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    {{ __('front.logged_as') }}: {{ auth()->user()->name }}
                </a>
            </nav>
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                @if (auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}"
                   class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    logged_asConsole </a>
                @endif

                <a href="{{ route('logout') }}"
                   class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   {{ __('front.logout') }} </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

</div>

@yield('content')

@livewireScripts
</body>
</html>
