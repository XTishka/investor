<div class="py-6">
    <div class="w-full px-8">

        <div class="flex mb-4 justify-between items-center">
            <x-admin.forms.elements.input id="search" name="search" wire:model="search" type="text" class="block"
                autocomplete="name" placeholder="{{ __('admin.search_by_property_name') }}" />

            <div>
                <x-admin.button-link link="{{ route('admin.properties.export') }}">
                    {{ __('Export') }}
                </x-admin.button-link>

                <x-admin.button-link link="{{ route('admin.properties.create') }}">
                    {{ __('Add new') }}
                </x-admin.button-link>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="w-full">
                <thead>
                    <tr class="font-bold text-xs uppercase text-black">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.properties') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.country') }} /
                            {{ __('admin.address') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center tracking-wider">
                        </th>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($properties as $property)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700 flex items-center">
                                <x-admin.icons.house class="h-9 w-9 bg-blue-50 text-blue-300 rounded-full p-2" />

                                <div class="ml-4">
                                    <span class="text-black font-bold break-words">{{ $property->name }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="block">{{ $property->country }}</span>
                                <span class="block text-xs text-gray-400">{{ $property->address }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                <x-admin.tables.action-buttons link="admin.properties" :id="$property" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="bg-gray-50 py-2 px-4">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Delete User Confirmation Modal -->
<x-admin.elements.dialog-modal wire:model="importModal">
    <x-slot name="title">
        {{ __('Import Properties') }}
    </x-slot>

    <x-slot name="content">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-3/4" wire:model.defer="item.name" />
            <x-jet-input-error for="item.name" class="mt-2" />
        </div>

        <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" x-ref="password"
            wire:model.defer="password" wire:keydown.enter="deleteUser" />
        <x-jet-input-error for="password" class="mt-2" />
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="closeImportModal" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-admin.elements.button wire:click="close" class="ml-3">
            {{ __('Cancel') }}
        </x-admin.elements.button>

        <x-admin.elements.button wire:click="import" wire:loading.attr="disabled" class="ml-3">
            {{ __('Import Properties') }}
        </x-admin.elements.button>
    </x-slot>
</x-admin.elements.dialog-modal>


<x-jet-dialog-modal wire:model="confirmingItemAdd">
    <x-slot name="title">
        {{ isset($this->item->id) ? 'Edit Item' : 'Add Item' }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="item.name" />
            <x-jet-input-error for="item.name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="price" value="{{ __('Price') }}" />
            <x-jet-input id="price" type="text" class="mt-1 block w-full" wire:model.defer="item.price" />
            <x-jet-input-error for="item.price" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <label class="flex items-center">
                <input type="checkbox" wire:model.defer="item.status" class="form-checkbox" />
                <span class="ml-2 text-sm text-gray-600">Active</span>
            </label>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingItemAdd', false)" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="saveItem()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
