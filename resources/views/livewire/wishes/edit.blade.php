<div>
    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Edit wish') }}</x-slot>

        <x-slot name="content">

            {{-- Round --}}
            <x-admin.forms.elements.label for="round" value="{{ __('Round') }}" class="mt-4" />
            <x-admin.forms.elements.select-round model="round" />
            <x-admin.forms.elements.input-error for="round" class="mt-2" />

            {{-- Stockholder --}}
            @if ($round !== null)
                <x-admin.forms.elements.label for="stockholder" value="{{ __('Stockholder') }}" class="mt-4" />
                <x-admin.forms.elements.select-stockholder model="stockholder" :round="$round" />
                <x-admin.forms.elements.input-error for="stockholder" class="mt-2" />
            @endif

            {{-- Property --}}
            @if ($round !== null and $stockholder !== null)
                <x-admin.forms.elements.label for="property" value="{{ __('Property') }}" class="mt-4" />

                {{-- TODO: Broken $property variable, needs refactoring --}}
                @php $propertyId = $property; @endphp

                {{-- TODO: Make component --}}
                <select wire:model='property'
                    class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">{{ __('Select property') }}</option>
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </select>
                <x-admin.forms.elements.input-error for="property" class="mt-2" />
            @endif

            {{-- Week --}}
            @if ($round !== null and $stockholder !== null and $propertyId !== null)
                <x-admin.forms.elements.label for="week"
                    value="{{ __('Week') }} ({{ __('Current: ') }} #{{ substr($week, 4) }})" class="mt-4" />
                <x-admin.forms.elements.select-week model="week" :round="$round" :property="$propertyId"
                    :stockholder="$stockholder" />
                <x-admin.forms.elements.input-error for="week" class="mt-2" />
            @endif

            {{-- Status --}}
            <x-admin.forms.elements.label for="status" value="{{ __('Status') }}" class="mt-4" />
            <select wire:model='status'
                class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="">{{ __('Select property') }}</option>
                <option value="confirmed">{{ __('Confirmed') }}</option>
                <option value="waiting">{{ __('Waiting') }}</option>
                <option value="failed">{{ __('Failed') }}</option>
            </select>

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
</div>
