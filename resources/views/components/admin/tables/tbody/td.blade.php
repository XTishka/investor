<td {{ $attributes->merge(['class' => 'px-6 py-4 text-sm text-gray-700 border-b']) }}>
    {{ $value ?? $slot }}
</td>