@props(['model'])

<select wire:model='{{ $model }}'
    class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
    <option value="">{{ __('Select round') }}</option>
    @foreach ($groupedRounds as $group => $rounds)
        <optgroup label="{{ __('admin.' . $group . '_rounds') }}" class="font-bold text-gray-600">
            @foreach ($rounds as $round)
                <option value="{{ $round['id'] }}">{{ $round['name'] }}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>
