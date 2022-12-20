<x-admin.elements.dialog-modal wire:model="modal" class="text-left">
    <x-slot name="title">{{ __('Edit stockholder') }}</x-slot>

    <x-slot name="content">
        {{-- Name --}}
        <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" class="mt-4" />
        <x-admin.forms.elements.input id="name" wire:model.defer='name' type="text" class="mt-1 block w-full" />
        <x-admin.forms.elements.input-error for="name" class="mt-2" />

        {{-- Email --}}
        <x-admin.forms.elements.label for="email" value="{{ __('Email') }}" class="mt-4" />
        <x-admin.forms.elements.input id="email" wire:model.defer='email' type="email" class="mt-1 block w-full" />
        <x-admin.forms.elements.input-error for="email" class="mt-2" />

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
                                max="{{ $round['max_wishes'] }}" wire:model.defer="rounds.{{ $round['id'] }}">
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
            {{ __('Save') }}
        </x-admin.elements.button>
    </x-slot>
</x-admin.elements.dialog-modal>
