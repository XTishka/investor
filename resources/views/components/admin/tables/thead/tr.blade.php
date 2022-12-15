<tr {{ $attributes->merge([ 'class' => '']) }}>
    {{ $value ?? $slot }}
</tr>
