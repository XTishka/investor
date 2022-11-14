<x-admin.forms.elements.form-section submit="updateUserPassword">
    <x-slot name="title">
        {{ __('Update password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure. ') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="password" value="{{ __('Password') }}" />
            <x-admin.forms.elements.input id="password" name="password" wire:model='password' type="password" class="mt-1 block w-full"  autocomplete="password" />
            <x-admin.forms.elements.input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-admin.forms.elements.label for="password_confirmation" value="{{ __('Password confirmation') }}" />
            <x-admin.forms.elements.input id="password_confirmation" name="password_confirmation" wire:model='password_confirmation' type="password" class="mt-1 block w-full"  autocomplete="password_confirmation" />
            <x-admin.forms.elements.input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="w-full flex justify-between items-center">
            <x-admin.forms.elements.action-message anchor="user_password_update__success" />

            <x-admin.forms.elements.button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-admin.forms.elements.button>
        </div>
    </x-slot>
</x-admin.forms.elements.form-section>
