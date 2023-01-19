@props(['model'])

<select wire:model='{{ $model }}'
    class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
    <option value="">{{ __('Select property') }}</option>
    @foreach ($properties as $property)
        <option value="{{ $property->id }}">{{ $property->name }}</option>
    @endforeach
</select>
