@props(['disabled' => false, 'rows' => 3, 'cols' => 47])

{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}> --}}

<textarea {{ $disabled ? 'disabled' : '' }}  rows="{{ $rows }}" cols="{{ $cols }}" {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}></textarea>
