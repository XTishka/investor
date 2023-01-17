<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Export XLSX') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Export XLSX') }}</x-slot>

        <x-slot name="content">
            {{ __('Do you want to export current data?') }}
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary class="mr-2" wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button wire:click="export" wire:loading.attr='disabled'>
                {{ __('export') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
