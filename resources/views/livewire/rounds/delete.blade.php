<div>
    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Delete round') }}</x-slot>

        <x-slot name="content">
            <div class="mt-4 flex">
                <x-admin.forms.elements.checkbox wire:model.defer='confirm' />
                <x-admin.forms.elements.label value="{{ __('Confirm delete action.') }}" class="ml-4" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button-danger class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-admin.elements.button-danger>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
