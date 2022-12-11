<div class="py-6">
    <div class="w-full px-8">

        <div class="flex mb-4 justify-between items-center">
            <x-admin.forms.elements.input id="search" name="search" wire:model="search" type="text" class="block"
                autocomplete="name" placeholder="{{ __('admin.search_by_stockholders_name') }}" />

            <div>
                <x-admin.elements.button wire:click='send_emails'>
                    {{ __('Send emails') }}
                </x-admin.elements.button>

                <x-admin.elements.button wire:click='export'>
                    {{ __('Export') }}
                </x-admin.elements.button>

                <x-admin.elements.button wire:click='import'>
                    {{ __('Import') }}
                </x-admin.elements.button>

                <x-admin.elements.button wire:click="openModal('create')">
                    {{ __('Add new') }}
                </x-admin.elements.button>
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
                                <x-admin.tables.action-button class="rounded-l-md"
                                    wire:click='view({{ $stockholder->id }})'>
                                    <x-admin.icons.eye class="w-4 h-4 mr-2" />
                                    {{ __('View') }}
                                </x-admin.tables.action-button>

                                <x-admin.tables.action-button wire:click='edit({{ $stockholder->id }})'>
                                    <x-admin.icons.edit class="w-4 h-4 mr-2" />
                                    {{ __('Edit') }}
                                </x-admin.tables.action-button>

                                <x-admin.tables.action-button class="rounded-r-md"
                                    wire:click='delete({{ $stockholder->id }})'>
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

            {{-- Modals --}}
            <x-admin.modals.stockholders.create-stockholder :groupedRounds="$groupedRounds" :stockholder="$stockholder" :wishes_min="$wishes_min"
                :wishes_max="$wishes_max" />
        </div>
    </div>
</div>
