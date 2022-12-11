<div class="py-6">
    <div class="w-full px-8">

        <div class="flex mb-4 justify-between items-center">
            <x-admin.forms.elements.input id="search" name="search" wire:model="search" type="text" class="block"
                autocomplete="name" placeholder="{{ __('admin.search_by_stockholders_name') }}" />

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
                            {{ __('admin.stockholders') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.email') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center tracking-wider">
                        </th>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($stockholders as $stockholder)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700 flex items-center">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ $stockholder->profile_photo_url }}" alt="{{ $stockholder->name }}" />

                                <div class="ml-4">
                                    <span class="text-black font-bold break-words">{{ $stockholder->name }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="mail:{{ $stockholder->email }}"
                                    class="text-blue-500 hover:text-blue--700 hover:underline">
                                    {{ $stockholder->email }}
                                </a>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                <x-admin.tables.action-button class="rounded-l-md">
                                    <x-admin.icons.eye class="w-4 h-4 mr-2" />
                                    {{ __('View') }}
                                </x-admin.tables.action-button>

                                <x-admin.tables.action-button>
                                    <x-admin.icons.edit class="w-4 h-4 mr-2" />
                                    {{ __('Edit') }}
                                </x-admin.tables.action-button>

                                <x-admin.tables.action-button class="rounded-r-md">
                                    <x-admin.icons.trash class="w-4 h-4 mr-2" />
                                    {{ __('Delete') }}
                                </x-admin.tables.action-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="bg-gray-50 py-2 px-4">
                {{ $stockholders->links() }}
            </div>

            <!-- Import Properties Modal Form -->
            <x-admin.elements.dialog-modal wire:model="importModalForm">
                <x-slot name="title">
                    {{ __('Import Properties') }}
                </x-slot>

                <x-slot name="content">
                    <form wire:submit.prevent="importProperties">
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

                    <x-jet-danger-button class="ml-2" wire:click="importProperties" wire:loading.attr="disabled">
                        {{ __('Import') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-admin.elements.dialog-modal>

        </div>
    </div>
</div>
