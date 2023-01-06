<div class="flex items-center ml-4 text-xs font-bold text-gray-400">
    <label for="toggle_{{ $week['code'] }}" @class([
        'flex items-center',
        'cursor-pointer' => $week['week_end']['status'],
    ]) @if ($week['week_end']['status'] == true)
        wire:click='switcher({{ $week['code'] }}, {{ $status }})'
        @endif >
        <div class="relative">
            <input type="checkbox" id="toggle_{{ $week['code'] }}" class="sr-only">
            <div @class([
                'block w-10 h-6 rounded-full',
                'bg-gray-200' => $status,
                'bg-green-300' => !$status,
            ])></div>
            <div @class([
                'absolute  top-1 bg-white w-4 h-4 rounded-full transition',
                'dot' => $status,
                'left-1' => $status,
                'right-1' => !$status,
                'bg-white' => $week['week_end']['status'],
                'bg-gray-300' => !$week['week_end']['status'],
            ])></div>
        </div>
    </label>
</div>
