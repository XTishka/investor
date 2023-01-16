<div class="my-4">

    <div class="mt-1 text-sm text-gray-600">
        {{ __('Used wishes: ') }} {{ $usedWishes }}
        @if ($round->max_wishes != 0)
            / {{ $maxWishes }}
        @endif
    </div>

    @if ($addWishButton == true)
        <div class="my-4">
            <x-admin.elements.button wire:model='button' wire:click='openModal' value="{{ __('Add new') }}" />
        </div>
    @endif

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ $round->name }} </x-slot>

        <x-slot name="content">

            {{-- Property --}}
            <x-admin.forms.elements.label for="property" value="{{ __('Property') }}" class="mt-4" />
            <x-front.form.select-property />
            <x-admin.forms.elements.input-error for="property" class="mt-2" />

            {{-- Week --}}
            @if ($property !== null)
                <x-admin.forms.elements.label for="week" value="{{ __('Week') }}" class="mt-4" />
                <x-admin.forms.elements.select-week model="week" :round="$round->id" :property="$property"
                    :stockholder="$stockholder" />
                <x-admin.forms.elements.input-error for="week" class="mt-2" />
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ __('Add wish') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
