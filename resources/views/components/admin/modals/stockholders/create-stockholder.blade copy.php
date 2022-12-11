<x-admin.elements.dialog-modal wire:model="modal_create">
    <x-slot name="title">
        {{ __('Add new stockholder') }}
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="createStockholder">

            <div class="mt-4">
                <x-admin.forms.elements.label for="round" value="{{ __('Rounds') }}" />

                <fieldset>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-center">
                            <x-admin.forms.elements.radio id="all_rounds" value="all"
                                wire:model='stockholders_rounds' />
                            <x-admin.forms.elements.label for="all_rounds"
                                value="{{ __('Add stockholder to all rounds') }}" class="ml-4" />
                        </div>

                        <div class="flex items-center">
                            <x-admin.forms.elements.radio id="selected_rounds" value="selected"
                                wire:model='stockholders_rounds' />
                            <x-admin.forms.elements.label for="selected_rounds"
                                value="{{ __('Select rounds to wich stockholders will be added') }}" class="ml-4" />
                        </div>
                    </div>
                </fieldset>

                {{-- @if ($stockholders_rounds == 'selected') --}}
                    <select id="round" autocomplete="round" wire:model.defer='stockholder.rounds'
                        multiple
                        class="mt-4 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                        @foreach ($groupedRounds as $group => $rounds)
                            <optgroup label="{{ __('admin.' . $group . '_rounds') }}" class="font-bold text-gray-600">
                                @foreach ($rounds as $round)
                                    <option value="{{ $round['id'] }}">{{ $round['name'] }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                {{-- @endif --}}
            </div>

            <div class="mt-4">
                <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" />
                <x-admin.forms.elements.input id="name" name="name" wire:model.defer='stockholder.name'
                    type="text" class="mt-1 block w-full" autocomplete="name" />
                <x-admin.forms.elements.input-error for="name" class="mt-2" />
            </div>

            {{ $stockholder['name'] }}

            <div class="mt-4">
                <x-admin.forms.elements.label for="email" value="{{ __('Email') }}" />
                <x-admin.forms.elements.input id="email" name="email" wire:model.defer='stockholder.email'
                    type="email" class="mt-1 block w-full" autocomplete="email" />
                <x-admin.forms.elements.input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4">
                <div class="flex items-center justify-between">
                    <x-admin.forms.elements.label for="password" value="{{ __('Password') }}" />
                    <span class="text-xs text-gray-500 hover:text-gray-700 hover:underline hover:cursor-pointer"
                        wire:click='generatePassword'>
                        {{ __('Generate password') }}
                    </span>
                </div>
                <x-admin.forms.elements.input id="password" name="password" wire:model.defer='stockholder.password'
                    type="password" class="mt-1 block w-full" autocomplete="password" />
                <x-admin.forms.elements.input-error for="password" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center">
                <x-admin.forms.elements.checkbox id="send_password" name="send_password" wire:model='sendPassword'
                    type="checkbox" />
                <x-admin.forms.elements.label for="send_password"
                    value="{{ __('Send email with login details to stockholder') }}" class="ml-4" />
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('modal_create', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="createStockholder" wire:loading.attr="disabled">
            {{ __('Import') }}
        </x-jet-danger-button>
    </x-slot>
</x-admin.elements.dialog-modal>
