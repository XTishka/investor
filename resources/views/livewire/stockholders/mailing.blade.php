<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Mailing') }}" class="mr-4" />

    <x-admin.elements.dialog-modal wire:model="modal">
        <x-slot name="title">{{ __('Send emails to stockholders') }}</x-slot>

        <x-slot name="content">
            <i class="text-lg text-gray-500 font-bold">Sorry, this option is not ready yet.</i>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="$set('modal', false)" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button class="ml-2" wire:click="sendEmail" wire:loading.attr="disabled">
                {{ __('Send emails') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
