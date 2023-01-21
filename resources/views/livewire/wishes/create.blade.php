<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Add new') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Add new wish') }}</x-slot>

        <x-slot name="content">

            {{-- Round --}}
            <x-admin.forms.elements.label value="{{ __('Round') }}" class="mt-4" />
            <x-admin.forms.elements.select-round model="wish.round_id" />
            <x-admin.forms.elements.input-error for="wish.round_id" class="mt-2" />

            {{-- Stockholder --}}
            @if ($field['stockholder'] === true)
                <x-admin.forms.elements.label class="mt-4">
                    {{ __('Stockholder') }}
                    @if ($wish['used'] != null and $wish['limit'] != null)
                        <span class="text-blue-500 ml-2 text-xs">
                            ({{ $wish['used'] }} {{ __('from') }} {{ $wish['limit'] }}
                            {{ __(' wishes') }})
                        </span>
                    @endif
                </x-admin.forms.elements.label>
                <x-admin.forms.elements.select-stockholder model="wish.stockholder_id" :round="$wish['round_id']" />
                <x-admin.forms.elements.input-error for="wish.stockholder_id" class="mt-2" />
            @endif

            {{-- Property --}}
            @if ($field['property'] === true)
                <x-admin.forms.elements.label value="{{ __('Property') }}" class="mt-4" />

                {{-- TODO: Make component --}}
                <select wire:model='wish.property_id'
                    class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">{{ __('Select property') }}</option>
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                    @endforeach
                </select>
                <x-admin.forms.elements.input-error for="property" class="mt-2" />
            @endif

            {{-- Week --}}
            @if ($field['week'] === true)
                <x-admin.forms.elements.label value="{{ __('Week') }}" class="mt-4" />
                <x-admin.forms.elements.select-week model="wish.week_code" :round="$wish['round_id']" :property="$wish['property_id']"
                    :stockholder="$wish['stockholder_id']" />
                <x-admin.forms.elements.input-error for="wish.week_code" class="mt-2" />
            @endif

            @if ($field['status'] === true)
                {{-- Status --}}
                <x-admin.forms.elements.label value="{{ __('Status') }}" class="mt-4" />
                <select wire:model='wish.status'
                    class="mt-2 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">{{ __('Select status') }}</option>
                    <option value="confirmed">{{ __('Confirmed') }}</option>
                    <option value="waiting">{{ __('Waiting') }}</option>
                    <option value="failed">{{ __('Failed') }}</option>
                </select>
            @endif

            @if (!empty($warnings))
                <ul>
                    @foreach ($warnings as $warning)
                        <li>{{ $warning }}</li>
                    @endforeach
                </ul>
            @endif
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
