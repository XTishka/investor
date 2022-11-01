@props(['pageTitle', 'breadcrumbs'])
<header class="flex h-14 justify-between items-center px-4 border-b border-zinc-100 bg-zinc-300">
    <h1 class="py-3 text-zinc-500 font-semibold">
        {{ __($pageTitle) }}
    </h1>

    <ul class="flex items-center text-zinc-500 px-4 text-sm">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-700">
                {{ __('admin.dashboard') }}
        </li>
        </a>
        @foreach ($breadcrumbs as $text => $route)
            <li class="px-1">
                <x-admin.icons.chevron-right class="w-4 h-4" />
            </li>
            <li>
                @if ($route === '#')
                    {{ __($text) }}
                @else
                    <a href="{{ $route }}" class="hover:text-zinc-700">
                        {{ __($text) }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</header>
