@props(['value'])

<x-admin.elements.badge class="bg-blue-100 text-blue-700">
    {{ $value ?? $slot }}
</x-admin.elements.badge>
