<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Add new') }}" />

    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Add new round') }}</x-slot>

        <x-slot name="content">

            {{-- Name --}}
            <x-admin.forms.elements.label value="{{ __('Name') }}" class="mt-4" />
            <x-admin.forms.elements.input wire:model.defer='name' type="text" class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="name" class="mt-2" />

            {{-- Wishes start --}}
            <x-admin.forms.elements.label value="{{ __('Wishes start date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="wishes_start" wire:model.lazy='wishes_start' type="text"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="wishes_start" class="mt-2" />

            {{-- Wishes end --}}
            <x-admin.forms.elements.label value="{{ __('Wishes stop date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="wishes_stop" wire:model.lazy='wishes_stop' type="text"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="wishes_stop" class="mt-2" />

            {{-- Round start --}}
            <x-admin.forms.elements.label value="{{ __('Round start date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="round_start" wire:model.lazy='round_start' type="text"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="round_start" class="mt-2" />

            {{-- Round end --}}
            <x-admin.forms.elements.label value="{{ __('Round end date') }}" class="mt-4" />
            <x-admin.forms.elements.input id="round_end" wire:model.lazy='round_end' type="text"
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
                {{ __('Create') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <script src="{{ asset('js/pikaday.js') }}"></script>
    <script>
        let startWishesDate = new Pikaday({
            field: document.getElementById('wishes_start'),
            format: 'YYYY-MM-DD',
            minDate: new Date(),
            toString(date, format) {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return `${year}-${month}-${day}`;
            },
            parse(dateString, format) {
                const parts = dateString.split('-');
                const day = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const year = parseInt(parts[2], 10);
                return new Date(year, month, day);
            },
        });

        let stopWishesDate = new Pikaday({
            field: document.getElementById('wishes_stop'),
            format: 'YYYY-MM-DD',
            minDate: new Date(),
            toString(date, format) {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return `${year}-${month}-${day}`;
            },
            parse(dateString, format) {
                const parts = dateString.split('-');
                const day = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const year = parseInt(parts[2], 10);
                return new Date(year, month, day);
            },
        });


        let startRoundDate = new Pikaday({
            field: document.getElementById('round_start'),
            format: 'YYYY-MM-DD',
            minDate: new Date(),
            toString(date, format) {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return `${year}-${month}-${day}`;
            },
            parse(dateString, format) {
                const parts = dateString.split('-');
                const day = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const year = parseInt(parts[2], 10);
                return new Date(year, month, day);
            },
        });

        let endRoundDate = new Pikaday({
            field: document.getElementById('round_end'),
            format: 'YYYY-MM-DD',
            minDate: new Date(),
            toString(date, format) {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return `${year}-${month}-${day}`;
            },
            parse(dateString, format) {
                const parts = dateString.split('-');
                const day = parseInt(parts[0], 10);
                const month = parseInt(parts[1], 10) - 1;
                const year = parseInt(parts[2], 10);
                return new Date(year, month, day);
            },
        });
    </script>
@endpush
