<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Import') }}" class="mr-4" />

    <x-admin.elements.dialog-modal wire:model="modal">
        <x-slot name="title">{{ __('Import stockholders') }}</x-slot>

        <x-slot name="content">


            {{-- Import from round --}}
            <x-admin.forms.elements.legend value="Import from" class="block mb-4" />

            <div class="flex items-center mt-2">
                <x-admin.forms.elements.radio value='round' wire:model='importResource' />
                <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Import stockholders from round') }}"
                    wire:click="$set('importResource', 'round')" />
            </div>

            {{-- Import from round --}}
            @if ($importResource == 'round')
                <select wire:model='importFromRound'
                    class="mt-2 mb-4 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">{{ __('Select round') }}</option>
                    @foreach ($groupedRounds as $group => $rounds)
                        <optgroup label="{{ __('admin.' . $group . '_rounds') }}" class="font-bold text-gray-600">
                            @foreach ($rounds as $round)
                                <option value="{{ $round['id'] }}">{{ $round['name'] }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <x-admin.forms.elements.input-error for="importFromRound" class="mt-0" />
            @endif

            {{-- Import all --}}
            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='all' wire:model='importResource' />
                <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('importResource', 'all')"
                    value="{{ __('Import all stockholders (Priority by stockholder`s name).') }}" />
            </div>

            {{-- Import from file --}}
            <div class="flex items-center mt-4">
                <x-admin.forms.elements.radio value='file' wire:model='importResource' />
                <x-admin.forms.elements.label class="ml-2 mb-0" wire:click="$set('importResource', 'file')"
                    value="{{ __('Import stockholders from file') }}" />
            </div>

            {{-- Import from file options --}}
            @if ($importResource == 'file')
                <div class="my-4 pl-4">
                    <x-admin.forms.elements.input type="file" class="mt-1 shadow-none"
                        wire:model.defer="importFromFile.resource" />
                </div>

                <div class="mt-4 pl-4">
                    <x-admin.forms.elements.legend value="Import options" />
                </div>

                <div class="flex items-center mt-4 pl-4">
                    <x-admin.forms.elements.checkbox wire:model='importFromFile.clean_round' />
                    <x-admin.forms.elements.label class="ml-2 mb-0"
                        value="{{ __('Remove all current stockholders from round') }}" />
                </div>




                <div class="flex items-center mt-4 pl-4">
                    <x-admin.forms.elements.checkbox wire:model='importFromFile.update_name' />
                    <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Update names') }}" />
                </div>

                {{-- <div class="flex items-center mt-4 pl-8">
                    <x-admin.forms.elements.radio value='id' wire:model='importFromFile.option_update_by_id' />
                    <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Check by ID') }}" />
                </div>

                <div class="flex items-center mt-4 pl-8">
                    <x-admin.forms.elements.radio value='email' wire:model='importFromFile.option_update_by_email' />
                    <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Check by email') }}" />
                </div>

                <div class="flex items-center mt-4 pl-4">
                    <x-admin.forms.elements.checkbox value='true' wire:model='importFromFile.option_create' />
                    <x-admin.forms.elements.label class="ml-2 mb-0" value="{{ __('Create new') }}" />
                </div> --}}

                <div class="flex items-center mt-4 pl-4 mb-4">
                    <x-admin.forms.elements.checkbox wire:model='importFromFile.option_create_with_email' />
                    <x-admin.forms.elements.label class="ml-2 mb-0"
                        value="{{ __('Send email with account details to new users') }}" />
                </div>
            @endif

            <hr class="mt-4">

            {{-- Import to --}}
            <div class="mt-4">
                <x-admin.forms.elements.legend value="Import to round" class="ml-2 mb-0 mt-4" />

                <select wire:model='importToRound'
                    class="mt-2 mb-4 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="">{{ __('Select round') }}</option>
                    @foreach ($groupedRounds as $group => $rounds)
                        <optgroup label="{{ __('admin.' . $group . '_rounds') }}" class="font-bold text-gray-600">
                            @foreach ($rounds as $round)
                                @if ($importFromRound != $round['id'])
                                    <option value="{{ $round['id'] }}">{{ $round['name'] }}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <x-admin.forms.elements.input-error for="importToRound" class="mt-0" />
            </div>
        </x-slot>

        <x-slot name="footer" class="items-center">
            @if ($importResource == 'round' or $importResource == 'all')
                <p class="pt-2 px-6 text-xs text-red-600">
                    {{ __('This action will remove current stockholders in round') }}
                </p>
            @endif
            <x-admin.elements.button-secondary wire:click="$set('modal', false)" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>

            <x-admin.elements.button class="ml-2" wire:click="import" wire:loading.attr="disabled">
                {{ __('Import') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
