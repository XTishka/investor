@props(['value'])

<th {{ $attributes->merge(['class' => 'px-6 py-2 bg-gray-50 font-bold text-xs uppercase text-black text-left']) }}>
    {{ $value ?? $slot }}
</th>
