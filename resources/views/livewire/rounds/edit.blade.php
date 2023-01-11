<div>
    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Edit round') }}</x-slot>

        <x-slot name="content">

            {{-- Name --}}
            <x-admin.forms.elements.label value="{{ __('Name') }}" class="mt-4" />
            <x-admin.forms.elements.input wire:model.defer='name' type="text" class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="name" class="mt-2" />

            {{-- Wishes start --}}
            <x-admin.forms.elements.label value="{{ __('Wishes start date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="wishes_start_edit" wire:model.lazy='wishes_start' type="date"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="wishes_start" class="mt-2" />

            {{-- Wishes end --}}
            <x-admin.forms.elements.label value="{{ __('Wishes stop date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="wishes_stop" wire:model.lazy='wishes_stop' type="date"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="wishes_stop" class="mt-2" />

            {{-- Round start --}}
            <x-admin.forms.elements.label value="{{ __('Round start date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="round_start" wire:model.lazy='round_start' type="date"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="round_start" class="mt-2" />

            {{-- Round end --}}
            <x-admin.forms.elements.label value="{{ __('Round end date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="round_end" wire:model.lazy='round_end' type="date"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="round_end" class="mt-2" />

            {{-- Max wishes --}}
            @php $maxWishesLabel = 'Max available wishes for this round. ( 0 - infinite wishes)'; @endphp
            <x-admin.forms.elements.label class="mt-4" value="{{ __($maxWishesLabel) }}" />
            <x-admin.forms.elements.input wire:model='max_wishes' type="number" class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="max_wishes" class="mt-2" />

            {{-- Description --}}
            <x-admin.forms.elements.label value="{{ __('Description') }}" class="mt-4" />
            <x-admin.forms.elements.textarea wire:model='description' class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="description" class="mt-2" />
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>