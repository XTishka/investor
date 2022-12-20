<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Mailing') }}" class="mr-4" />

    <x-admin.elements.dialog-modal wire:model="modal">
        <x-slot name="title">{{ __('Send emails to stockholders') }}</x-slot>

        <x-slot name="content">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea veniam eaque aspernatur architecto aperiam
            suscipit eveniet soluta? Odit architecto doloribus, totam culpa corrupti, possimus doloremque explicabo
            perferendis deleniti sit numquam?
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
