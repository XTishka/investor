<div>
    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Delete stockholder') }}</x-slot>

        <x-slot name="content">

            @if ($round)
                <div class="flex items-center mt-4">
                    <x-admin.forms.elements.radio value='round' wire:model='type' />
                    <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('type', 'round')">
                        {{ __('Delete from round: ') . $round->name }}
                    </x-admin.forms.elements.label>
                </div>
            @endif

            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='all_rounds' wire:model='type' />
                <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('type', 'all_rounds')">
                    {{ __('Delete from all rounds') }}
                </x-admin.forms.elements.label>
            </div>

            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='account' wire:model='type' />
                <x-admin.forms.elements.label class="ml-2 mb-0 text-red-600" wire:click="$set('type', 'account')">
                    {{ __('Delete account with all relations') }}
                </x-admin.forms.elements.label>
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
