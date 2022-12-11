@props(['value'])

<p {{ $attributes->merge(['class' => 'text-sm text-gray-500']) }}>
    {{ $value ?? $slot }}
</p>
