@props(['groupedRounds', 'stockholder', 'wishes_min', 'wishes_max'])

<x-admin.elements.dialog-modal wire:model="modal_create">
    <x-slot name="title">
        {{ __('Add new stockholder') }}
    </x-slot>

    <x-slot name="content">

        <div class="mt-4">
            <x-admin.forms.elements.label for="round" value="{{ __('Rounds') }}" />

            <select id="round" autocomplete="round" wire:model='stockholder.round'
                class="mt-4 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="" disabled selected>{{ __('Select round') }}</option>
                @foreach ($groupedRounds as $group => $rounds)
                    <optgroup label="{{ __('admin.' . $group . '_rounds') }}" class="font-bold text-gray-600">
                        @foreach ($rounds as $round)
                            <option value="{{ $round['id'] }}">{{ $round['name'] }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            <x-admin.forms.elements.input-error for="stockholder.round" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" />
            <x-admin.forms.elements.input id="name" wire:model.defer='stockholder.name' type="text"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="stockholder.name" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-admin.forms.elements.label for="email" value="{{ __('Email') }}" />
            <x-admin.forms.elements.input id="email" wire:model.defer='stockholder.email' type="email"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="stockholder.email" class="mt-2" />
        </div>

        <div class="mt-4">
            <div class="flex items-center justify-between">
                <x-admin.forms.elements.label for="password" value="{{ __('Password') }}" />
                <span class="text-xs text-gray-500 hover:text-gray-700 hover:underline hover:cursor-pointer"
                    wire:click='generatePassword'>
                    {{ __('Generate password') }}
                </span>
            </div>
            <x-admin.forms.elements.input id="password" wire:model.defer='stockholder.password' type="password"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="stockholder.password" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-admin.forms.elements.label for="wishes" value="{{ __('Available wishes') }}" />
            <x-admin.forms.elements.input id="wishes" name="wishes" wire:model.defer='stockholder.wishes'
                type="number" min="{{ $wishes_min }}" max="{{ $wishes_max }}" class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="stockholder.wishes" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center">
            <x-admin.forms.elements.checkbox id="send_password" name="send_password"
                wire:model.defer='stockholder.sendPassword' />
            <x-admin.forms.elements.label for="send_password"
                value="{{ __('Send email with login details to stockholder') }}" class="ml-4" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('modal_create', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
            {{ __('Import') }}
        </x-jet-danger-button>
    </x-slot>
</x-admin.elements.dialog-modal>
