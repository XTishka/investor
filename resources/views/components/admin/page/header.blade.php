@props([
    'pageTitle',
    'breadcrumbs'
])
<header class="flex justify-between items-center px-4 border-b border-zinc-400 bg-zinc-300">
    <h1 class="text-xl py-3 text-zinc-500 font-semibold">
        {{ $pageTitle }}
    </h1>

    <ul class="flex items-center text-zinc-500 px-4 ">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-700">
                {{ __('admin.dashboard') }}</li>
            </a>
        @foreach ($breadcrumbs as $text => $route)
        <li class="px-1">
            <x-admin.icons.chevron-right class="w-4 h-4" />
        </li>
        <li>
            @if ($route === '#')
                {{ $text }}
            @else
                <a href="{{ $route }}" class="hover:text-zinc-700">
                    {{ $text }}
                </a>
            @endif
        </li>
        @endforeach
    </ul>
</header>