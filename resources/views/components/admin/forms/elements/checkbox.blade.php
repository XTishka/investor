@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500']) !!} type="checkbox">
