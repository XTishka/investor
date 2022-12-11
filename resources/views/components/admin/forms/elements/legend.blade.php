@props(['value'])

<legend {{ $attributes->merge(['class' => 'contents text-base font-medium text-gray-900']) }} >
    {{ $value ?? $slot }}
</legend>
