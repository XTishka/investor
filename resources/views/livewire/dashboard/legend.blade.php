<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Legend') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Legend') }}</x-slot>

        <x-slot name="content">
            <span class="block bg-gray-200 rounded-lg px-2 mb-2 text-sm">{{ __('Waiting') }}</span>
            <span class="block bg-green-200 rounded-lg px-2 mb-2 text-sm">{{ __('Confirmed') }}</span>
            <span class="block bg-red-200 rounded-lg px-2 mb-2 text-sm">{{ __('Failed') }}</span>
            <span class="block bg-blue-200 rounded-lg px-2 mb-2 text-sm">{{ __('Overlimit confirmed') }}</span>
            <span class="block bg-orange-200 rounded-lg px-2 mb-2 text-sm">{{ __('Overlimit failed') }}</span>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('close') }}
            </x-admin.elements.button-secondary>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
