<x-admin.forms.elements.form-section submit="{{ route('admin.administrators.update', $administrator) }}" method="PUT">
    <x-slot name="title">
        {{ __('Update administrator details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please, fill all neccessary information fields to update admnistrator details.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" />
            <x-admin.forms.elements.input id="name" name="name" type="text" class="mt-1 block w-full"
                value="{{ $administrator->name }}" autocomplete="name" />
            <x-admin.forms.elements.input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="email" value="{{ __('Email') }}" />
            <x-admin.forms.elements.input id="email" name="email" type="email" class="mt-1 block w-full"
                value="{{ $administrator->email }}" autocomplete="email" />
            <x-admin.forms.elements.input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-admin.forms.elements.form-section>
