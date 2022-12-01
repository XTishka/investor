@props(['rounds' => 'all', 'section' => false])

@if ($section != false)
    <div class="block px-4 py-2 text-xs text-gray-400">
        {{ $section }}
    </div>
@endif

@if ($rounds == 'all')
    <x-jet-dropdown-link href="{{ url()->current() }}?change_round=all">
        {{ __('Show all rounds data') }}
    </x-jet-dropdown-link>
@endif

@if ($rounds != 'all' && is_object($rounds))
    @foreach ($rounds as $round)
        <x-jet-dropdown-link href="{{ url()->current() }}?change_round={{ $round->id }}">
            {{ $round->name }}
        </x-jet-dropdown-link>
    @endforeach
@endif

<div class="border-t border-gray-100"></div>
