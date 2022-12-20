<div>
    <x-admin.elements.dialog-modal wire:model="modal">

        <x-slot name="title">{{ __('Reset stockholders password') }}</x-slot>

        <x-slot name="content">

            {{-- Password --}}
            <div class="flex items-center justify-between mt-4">
                <x-admin.forms.elements.label value="{{ __('Password') }}" />

                <div>
                    <span class="text-xs text-gray-500 hover:text-gray-700 hover:underline hover:cursor-pointer"
                        wire:click='generatePassword'>
                        {{ __('Generate password') }}
                    </span>
                    @if ($password)
                        <span class="text-sm text-gray-400 mt-2 ml-2">
                            {{ $password }}
                        </span>
                    @endif
                </div>
            </div>
            <x-admin.forms.elements.input id="password" wire:model.defer='password' type="password"
                class="mt-1 block w-full" />
            <x-admin.forms.elements.input-error for="password" class="mt-2" />

            {{-- Send password --}}
            <div class="mt-4 flex">
                <x-admin.forms.elements.checkbox wire:model.defer='sendPassword' />
                <x-admin.forms.elements.label value="{{ __('Send email with login details to stockholder') }}"
                    class="ml-4" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button-danger class="ml-2" wire:click="resetPassword" wire:loading.attr="disabled">
                {{ __('Reset') }}
            </x-admin.elements.button-danger>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
