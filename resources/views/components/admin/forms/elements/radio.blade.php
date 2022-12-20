@props(['disabled' => false, 'id' => false, 'value'])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'h-4 w-4 rounded-full border-gray-300 text-indigo-600 focus:ring-indigo-500',
]) !!} {{ $id ? 'id' : '' }} value="{{ $value }}"
    type="radio">
