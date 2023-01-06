@props(['model', 'round' => null])

<select wire:model='{{ $model }}'
    class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
    <option value="">{{ __('Change week') }}</option>
    @foreach ($weeks as $week)
        <option value="{{ $week['code'] }}">
            {{ __('Week:') }} #{{ substr($week['code'], 4) }} ::
            {{ $week['week_start']['human_date'] }} -
            {{ $week['week_end']['human_date'] }}
        </option>
    @endforeach
</select>
