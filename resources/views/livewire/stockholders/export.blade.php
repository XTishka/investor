<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Export') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">
        <x-slot name="title">{{ __('Export stockholders') }}</x-slot>

        <x-slot name="content">

            {{-- Export all --}}
            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='all' wire:model='export' />
                <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('export', 'all')">
                    {{ __('Export all stockholders (without priorities)') }}
                </x-admin.forms.elements.label>
            </div>

            {{-- Export round --}}
            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='round' wire:model='export' />
                <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('export', 'round')">
                    {{ __('Export round stockholders (with priorities)') }}
                </x-admin.forms.elements.label>
            </div>

            {{-- Export round select --}}
            @if ($export == 'round')
                <div class="mt-4">
                    <x-admin.forms.elements.label for="round" value="{{ __('Select round to export') }}" />

                    <select id="roundId" name="roundId" wire:model='roundId'
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
                    <x-admin.forms.elements.input-error for="roundId" class="mt-2" />
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="$set('modal', false)" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button class="ml-2" wire:click="export" wire:loading.attr="disabled">
                {{ __('Export') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
