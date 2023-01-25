@if ($roundsQty)
    <div>
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="flex w-full text-sm border-2 border-transparent rounded-full focus:outline-none transition">
                    <div class="w-full text-sm text-gray-500 mx-2 flex items-center justify-between ml-7">
                        <strong class="mr-4">{{ __('Round') }}: </strong>
                        @if ($activeRound)
                            {{ $activeRound->name }}
                        @else
                            {{ __('All rounds data') }}
                        @endif
                        <x-admin.icons.chevron-down class="h-4 w-4 ml-4 text-zinc-500 hover:text-white transition" />
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">

                {{-- No round selected --}}
                <x-admin.elements.round-switcher-list-element :section="__('No rounds')" />

                {{-- Running rounds --}}
                <x-admin.elements.round-switcher-list-element :rounds="$runningRounds" :section="__('Running rounds')" />

                {{-- Future round --}}
                <x-admin.elements.round-switcher-list-element :rounds="$futureRounds" :section="__('Future rounds')" />

                {{-- Passed rounds --}}
                <x-admin.elements.round-switcher-list-element :rounds="$passedRounds" :section="__('Passed rounds')" />

            </x-slot>
        </x-jet-dropdown>
    </div>
@endif
