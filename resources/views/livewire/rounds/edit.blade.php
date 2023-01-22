<div>
    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Edit round') }}</x-slot>

        <x-slot name="content">

            {{-- Name --}}
            <x-admin.forms.elements.label value="{{ __('Name') }}" class="mt-4" />
            <x-admin.forms.elements.input wire:model.defer='name' type="text" class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="name" class="mt-2" />

            <div class="flex gap-2">
                <div class="w-1/2">
                    {{-- Wishes start --}}
                    <x-admin.forms.elements.label value="{{ __('Wishes start date') }}" class="mt-4" />
                    <x-admin.forms.elements.input id="wishes_edit_start" wire:model.lazy='wishes_start' type="text"
                        class="mt-1 block w-full" />
                    <x-admin.forms.elements.input-error for="wishes_edit_start" class="mt-2" />
                </div>

                <div class="w-1/2">
                    {{-- Wishes end --}}
                    <x-admin.forms.elements.label value="{{ __('Wishes stop date') }}" class="mt-4" />
                    <x-admin.forms.elements.input id="wishes_edit_stop" wire:model.lazy='wishes_stop' type="text"
                        class="mt-1 block w-full" />
                    <x-admin.forms.elements.input-error for="wishes_edit_stop" class="mt-2" />
                </div>
            </div>

            <div class="flex gap-2">
                <div class="w-1/2">
                    {{-- Round start --}}
                    <x-admin.forms.elements.label value="{{ __('Round start date') }}" class="mt-4" />
                    <x-admin.forms.elements.input id="round_edit_start" wire:model.lazy='round_start' type="text"
                        class="mt-1 block w-full" />
                    <x-admin.forms.elements.input-error for="round_edit_start" class="mt-2" />
                </div>

                <div class="w-1/2">
                    {{-- Round end --}}
                    <x-admin.forms.elements.label value="{{ __('Round end date') }}" class="mt-4" />
                    <x-admin.forms.elements.input id="round_edit_end" wire:model.lazy='round_end' type="text"
                        class="mt-1 block w-full" />
                    <x-admin.forms.elements.input-error for="round_edit_end" class="mt-2" />
                </div>
            </div>

            {{-- Max wishes --}}
            @php $maxWishesLabel = 'Max available wishes for this round. ( 0 - infinite wishes)'; @endphp
            <x-admin.forms.elements.label class="mt-4" value="{{ __($maxWishesLabel) }}" />
            <x-admin.forms.elements.input wire:model='max_wishes' type="number" class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="max_wishes" class="mt-2" />

            {{-- Overlimit --}}
            <div class="flex items-center mt-4">
                <x-admin.forms.elements.checkbox name="overlimit" wire:model='overlimit' />
                <x-admin.forms.elements.label value="{{ __('Enable overlimit for wishes.') }}" class="ml-4 mt-2"
                    wire:click="$toggle('overlimit')" />
            </div>

            {{-- Publicate --}}
            <div class="flex items-center">
                <x-admin.forms.elements.checkbox name="pulicate" wire:model.defer='publicate' />
                <x-admin.forms.elements.label value="{{ __('Publicate round. Make round visible for stockholders.') }}"
                    class="ml-4 mt-2" wire:click="$toggle('publicate')" />
            </div>

            {{-- Active --}}
            <div class="flex items-center">
                <x-admin.forms.elements.checkbox name="active" wire:model.defer='active' />
                <x-admin.forms.elements.label value="{{ __('Set active round. Only one round can be active.') }}"
                    class="ml-4 mt-2" wire:click="$toggle('active')" />
            </div>

            {{-- Lock --}}
            <div class="flex items-center">
                <x-admin.forms.elements.checkbox name="lock" wire:model.defer='lock' />
                <x-admin.forms.elements.label value="{{ __('Lock round for changes') }}" class="ml-4 mt-2"
                    wire:click="$toggle('lock')" />
            </div>

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


@push('scripts')
    <script>
        let startEditWishesDate = new Pikaday({
            field: document.getElementById('wishes_edit_start'),
            format: 'YYYY-MM-DD',
            showWeekNumber: true,
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

        let stopEditWishesDate = new Pikaday({
            field: document.getElementById('wishes_edit_stop'),
            format: 'YYYY-MM-DD',
            showWeekNumber: true,
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


        let startEditRoundDate = new Pikaday({
            field: document.getElementById('round_edit_start'),
            format: 'YYYY-MM-DD',
            firstDay: 1,
            showWeekNumber: true,
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
            disableDayFn: function(date) {
                return (
                    date.getDay() === 1 ||
                    date.getDay() === 2 ||
                    date.getDay() === 3 ||
                    date.getDay() === 4 ||
                    date.getDay() === 5 ||
                    date.getDay() === 0
                );
            },
        });

        let endEditRoundDate = new Pikaday({
            field: document.getElementById('round_edit_end'),
            format: 'YYYY-MM-DD',
            firstDay: 1,
            showWeekNumber: true,
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
            disableDayFn: function(date) {
                return (
                    date.getDay() === 1 ||
                    date.getDay() === 2 ||
                    date.getDay() === 3 ||
                    date.getDay() === 4 ||
                    date.getDay() === 5 ||
                    date.getDay() === 0
                );
            },
        });
    </script>
@endpush
