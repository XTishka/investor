<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Add new') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Add new stockholder') }}</x-slot>

        <x-slot name="content">

            {{-- Name --}}
            <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" class="mt-4" />
            <x-admin.forms.elements.input id="name" wire:model.defer='stockholder.name' type="text"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="stockholder.name" class="mt-2" />

            {{-- Email --}}
            <x-admin.forms.elements.label for="email" value="{{ __('Email') }}" class="mt-4" />
            <x-admin.forms.elements.input id="email" wire:model.defer='stockholder.email' type="email"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="stockholder.email" class="mt-2" />


            {{-- Password --}}
            <div class="flex items-center justify-between mt-4">
                <x-admin.forms.elements.label for="password" value="{{ __('Password') }}" />
                <span class="text-xs text-gray-500 hover:text-gray-700 hover:underline hover:cursor-pointer"
                    wire:click='generatePassword'>
                    {{ __('Generate password') }}
                </span>
            </div>
            <x-admin.forms.elements.input id="password" wire:model.defer='stockholder.password' type="password"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="stockholder.password" class="mt-2" />

            {{-- Send password --}}
            <div class="mt-4 flex">
                <x-admin.forms.elements.checkbox id="send_password" name="send_password"
                    wire:model.defer='stockholder.sendPassword' />
                <x-admin.forms.elements.label for="send_password"
                    value="{{ __('Send email with login details to stockholder') }}" class="ml-4" />
            </div>


            {{-- Rounds --}}
            <table class="table-auto w-full mt-4">
                @foreach ($groupedRounds as $key => $group)
                    <tr class="border-y border-x text-sm bg-gray-100 text-gray-500">
                        <td colspan="2" class="capitalize px-2">{{ $key }} {{ __('round wishes') }}</td>
                    </tr>
                    @foreach ($group as $round)
                        <tr class="border-y border-x">
                            <td class="pl-2 border-r">{{ $round['name'] }}</td>
                            <td class="w-20">
                                <input type="number" class="border-none py-1 w-full" min="1"
                                    max="{{ $round['max_wishes'] }}"
                                    wire:model.defer="stockholder.rounds.{{ $round['id'] }}">
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
