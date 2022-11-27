@props(['text', 'route'])
<a href="{{ route($route) }}"
    class="flex items-center w-full py-2 px-4 border-transparent hover:shadow-sm
    font-medium rounded-md hover:text-white hover:bg-zinc-500 @if (request()->routeIs($route)) bg-indigo-600 @endif">
    {{ $slot }}
    <p class="ml-2">
        {{ $text }}
    </p>
</a>
