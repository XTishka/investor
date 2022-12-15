@props(['value'])

<x-admin.elements.badge class="bg-red-100 text-red-700">
    {{ $value ?? $slot }}
</x-admin.elements.badge>
