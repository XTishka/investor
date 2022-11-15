<x-admin.forms.elements.form-section submit="storeRound">
    <x-slot name="title">
        {{ __('Edit round') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please, fill all neccessary fields.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" />
            <x-admin.forms.elements.input id="name" name="name" wire:model='name' type="text"
                class="mt-1 block w-full" autocomplete="name" />
            <x-admin.forms.elements.input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="stop_wishes_date" value="{{ __('admin.wishes_stop_date') }}" />
            <x-admin.forms.elements.input id="stop_wishes_date" name="stop_wishes_date"
                wire:model.lazy='stop_wishes_date' type="text" class="mt-1 block w-full" onchange="runTest" />
            <x-admin.forms.elements.input-error for="stop_wishes_date" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="start_date" value="{{ __('Round start date') }}" />
            <x-admin.forms.elements.input id="start_date" name="start_date" wire:model.lazy='start_date' type="text"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="start_date" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="end_date" value="{{ __('Round end date') }}" />
            <x-admin.forms.elements.input id="end_date" name="end_date" wire:model.lazy='end_date' type="text"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="end_date" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="max_wishes" value="{{ __('Max available wishes for this round') }}" />
            <x-admin.forms.elements.input id="max_wishes" name="max_wishes" wire:model='max_wishes' type="number"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="max_wishes" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="description" value="{{ __('Description') }}" />
            <x-admin.forms.elements.textarea id="description" name="description" wire:model='description'
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="description" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="w-full flex justify-between items-center">
            <x-admin.forms.elements.action-message anchor="success" />

            <x-admin.forms.elements.button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-admin.forms.elements.button>
        </div>
    </x-slot>
</x-admin.forms.elements.form-section>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <script src="{{ asset('js/pikaday.js') }}"></script>
    <script>
        let stopWishesDate = new Pikaday({
            field: document.getElementById('stop_wishes_date'),
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
            field: document.getElementById('start_date'),
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

        var endRoundDate = new Pikaday({
            field: document.getElementById('end_date'),
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

