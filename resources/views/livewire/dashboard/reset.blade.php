<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Reset') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Distribution reset') }}</x-slot>

        <x-slot name="content">

            {{-- Confirm reset --}}
            <div class="mt-4 flex">
                <x-admin.forms.elements.checkbox wire:model='confirmed' />
                <x-admin.forms.elements.label value="{{ __('Confirm distribute reset.') }}" class="ml-4"
                    wire:click="$toggle('confirmed')" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button-danger class="ml-2" wire:click="distributeReset" wire:loading.attr="disabled">
                {{ __('Reset') }}
            </x-admin.elements.button-danger>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
