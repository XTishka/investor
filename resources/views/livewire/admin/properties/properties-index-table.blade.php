<div class="py-6">
    <div class="w-full px-8">

        <div class="flex mb-4 justify-between items-center">
            <x-admin.forms.elements.input id="search" name="search" wire:model="search" type="text" class="block"
                autocomplete="name" placeholder="{{ __('admin.search_by_property_name') }}" />

            <div>
                <x-admin.button-link link="{{ route('admin.properties.export') }}">
                    {{ __('Export') }}
                </x-admin.button-link>

                <x-admin.elements.button wire:click='importModal'>
                    {{ __('Import') }}
                </x-admin.elements.button>

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

            <!-- Import Properties Modal Form -->
            <x-admin.elements.dialog-modal wire:model="importModalForm">
                <x-slot name="title">
                    {{ __('Import Properties') }}
                </x-slot>

                <x-slot name="content">
                    <form wire:submit.prevent="importProperties" >
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="file" value="{{ __('Select file to import') }}" class="mb-4" />
                            <x-jet-input id="file" type="file" class="mt-1 block w-3/4"
                                wire:model.defer="file" />
                            <x-jet-input-error for="file" class="mt-2" />
                        </div>
                    </form>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$set('importModalForm', false)" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2"  wire:click="importProperties" wire:loading.attr="disabled">
                        {{ __('Import') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-admin.elements.dialog-modal>

        </div>
    </div>
</div>
