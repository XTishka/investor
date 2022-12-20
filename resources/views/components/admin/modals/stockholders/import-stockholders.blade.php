@props(['import'])

<x-admin.elements.dialog-modal wire:model="modal_import">
    <x-slot name="title">
        {{ __('Import stockholders') }}
    </x-slot>

    <x-slot name="content">

        {{-- Import to --}}
        <x-admin.forms.elements.legend value="Import to round" class="ml-2 mb-0" />
        <x-admin.forms.elements.select-round :groupedRounds="$groupedRounds" model="import.to" />

        {{-- Import from --}}
        <x-admin.forms.elements.legend value="Import type" class="block mb-4" />

        <div class="flex items-center mt-2">
            <x-admin.forms.elements.radio value='round' wire:model='import.from' />
            <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Import stockholders from round') }}" />
        </div>

        @if ($import['from'] == 'round')
            <x-admin.forms.elements.select-round :groupedRounds="$groupedRounds" model="import.from_resource" />
        @endif

        <div class="flex items-center mt-4">
            <x-admin.forms.elements.radio value='all' wire:model='import.from' />
            <x-admin.forms.elements.label class="ml-2 mb-0"
                value="{{ __('Import all stockholders (Priority by stockholder\'s name).') }}" />
        </div>

        <div class="flex items-center mt-4">
            <x-admin.forms.elements.radio value='file' wire:model='import.from' />
            <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Import stockholders from file') }}" />
        </div>

        @if ($import['from'] == 'file')
            <div class="my-4 pl-4">
                <x-admin.forms.elements.input type="file" class="mt-1 shadow-none"
                    wire:model.defer="import.from_resource" />
            </div>

            <div class="mt-4 pl-4">
                <x-admin.forms.elements.legend value="Import options" />
            </div>

            <div class="flex items-center mt-4 pl-4">
                <x-admin.forms.elements.checkbox value='all' wire:model='import.option_remove_all' />
                <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Remove all current options') }}" />
            </div>

            <div class="flex items-center mt-4 pl-4">
                <x-admin.forms.elements.checkbox value='option_update' wire:model='import.option_update' />
                <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Update by field') }}" />
            </div>

            <div class="flex items-center mt-4 pl-8">
                <x-admin.forms.elements.radio value='id' wire:model='import.option_update_by_id' />
                <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Check by ID') }}" />
            </div>

            <div class="flex items-center mt-4 pl-8">
                <x-admin.forms.elements.radio value='email' wire:model='import.option_update_by_email' />
                <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Check by email') }}" />
            </div>

            <div class="flex items-center mt-4 pl-4">
                <x-admin.forms.elements.checkbox value='true' wire:model='import.option_create' />
                <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Create new') }}" />
            </div>

            <div class="flex items-center mt-4 pl-4">
                <x-admin.forms.elements.checkbox wire:model='import.option_create_with_email' />
                <x-admin.forms.elements.label class="ml-2 mb-0"
                    value="{{ __('Send email with account details to new users') }}" />
            </div>
        @endif

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('modal_import', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="import" wire:loading.attr="disabled">
            {{ __('Import') }}
        </x-jet-danger-button>
    </x-slot>
</x-admin.elements.dialog-modal>
