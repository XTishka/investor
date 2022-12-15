@props(['value'])

<x-admin.elements.badge class="bg-gray-100 text-gray-700">
    {{ $value ?? $slot }}
</x-admin.elements.badge>
