<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Distribute') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Distribute round') }}</x-slot>

        <x-slot name="content">

            {{-- Simple distribution --}}
            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='simple' wire:model='distributionType' />
                <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('distributionType', 'simple')"
                    value="{{ __('Simple distribution') }}" />
            </div>

            {{-- With overlimit distribution --}}
            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='overlimit' wire:model.defer='distributionType' />
                <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('distributionType', 'overlimit')"
                    value="{{ __('Distribution with confirmed wishes limit') }}" />
            </div>

            {{-- Confirm distribution --}}
            <div class="mt-4 flex">
                <x-admin.forms.elements.checkbox wire:model='confirmed' />
                <x-admin.forms.elements.label value="{{ __('Confirm distribute action.') }}" class="ml-4"
                    wire:click="$toggle('confirmed')" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button class="ml-2" wire:click="distribute" wire:loading.attr="disabled">
                {{ __('Run') }}
                </x-admin.elements.button-danger>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
