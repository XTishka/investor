<x-admin.forms.elements.form-section submit="storeProperty">
    <x-slot name="title">
        {{ __('Register new property') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please, fill all neccessary fields to add new property.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" />
            <x-admin.forms.elements.input id="name" name="name" wire:model='name' type="text"
                class="mt-1 block w-full" autocomplete="name" />
            <x-admin.forms.elements.input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="country" value="{{ __('Country') }}" />
            <x-admin.forms.elements.input id="country" name="country" wire:model='country' type="text"
                class="mt-1 block w-full" autocomplete="country" />
            <x-admin.forms.elements.input-error for="country" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="address" value="{{ __('Address') }}" />
            <x-admin.forms.elements.input id="address" name="address" wire:model='address' type="text"
                class="mt-1 block w-full" autocomplete="address" />
            <x-admin.forms.elements.input-error for="address" class="mt-2" />
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
