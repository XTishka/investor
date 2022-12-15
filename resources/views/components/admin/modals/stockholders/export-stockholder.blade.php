@props(['groupedRounds', 'export'])

<x-admin.elements.dialog-modal wire:model="modal_export">
    <x-slot name="title">
        {{ __('Export stockholders') }}
    </x-slot>

    <x-slot name="content">

        <div class="flex items-center mt-4">
            <x-admin.forms.elements.radio id='export_all' value='all' wire:model='export.type' />
            <x-admin.forms.elements.label for="export_all" class="ml-2 mb-0">
                {{ __('Export all stockholders (without priorities)') }}
            </x-admin.forms.elements.label>
        </div>

        <div class="flex items-center mt-4">
            <x-admin.forms.elements.radio id='export_round' value='round' wire:model='export.type' />
            <x-admin.forms.elements.label for="export_round" class="ml-2 mb-0">
                {{ __('Export round stockholders (with priorities)') }}
            </x-admin.forms.elements.label>
        </div>

        @if ($export['type'] == 'round')
            <div class="mt-4">
                <x-admin.forms.elements.label for="round" value="{{ __('Select round to export') }}" />

                <select id="round" autocomplete="round" wire:model='export.round'
                    class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    @foreach ($groupedRounds as $group => $rounds)
                        <optgroup label="{{ __('admin.' . $group . '_rounds') }}" class="font-bold text-gray-600">
                            @foreach ($rounds as $round)
                                <option value="{{ $round['id'] }}">{{ $round['name'] }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <x-admin.forms.elements.input-error for="export.round" class="mt-2" />
            </div>
        @endif

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('modal_export', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="export" wire:loading.attr="disabled">
            {{ __('Export') }}
        </x-jet-danger-button>
    </x-slot>
</x-admin.elements.dialog-modal>
