<x-admin.forms.elements.form-section submit="{{ route('admin.administrators.store') }}">
    <x-slot name="title">
        {{ __('Create new administrator') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please, fill all neccessary information to add new admnistrator.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="name" value="{{ __('Name') }}" />
            <x-admin.forms.elements.input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" autocomplete="name" />
            <x-admin.forms.elements.input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="email" value="{{ __('Email') }}" />
            <x-admin.forms.elements.input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email') }}" autocomplete="email" />
            <x-admin.forms.elements.input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="password" value="{{ __('Password') }}" />
            <x-admin.forms.elements.input id="password" name="password" type="password" class="mt-1 block w-full"  autocomplete="password" />
            <x-admin.forms.elements.input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="password_confirmation" value="{{ __('Password confirmation') }}" />
            <x-admin.forms.elements.input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full"  autocomplete="password_confirmation" />
            <x-admin.forms.elements.input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-admin.forms.elements.form-section>
