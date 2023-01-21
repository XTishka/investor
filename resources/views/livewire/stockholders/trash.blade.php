<div>
    <x-admin.elements.button wire:click='openModal' value="{{ __('Trash') }}" />

    <x-admin.elements.dialog-modal wire:model="modal" maxWidth="6xl">

        <x-slot name="title">{{ __('Stockholders trash') }}</x-slot>

        <x-slot name="content">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr class="font-bold text-xs uppercase text-black">
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                {{ __('Stockholders') }}
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                {{ __('Created') }}
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                {{ __('Updated') }}
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center tracking-wider">
                            </th>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($stockholders as $stockholder)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 flex items-center">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ $stockholder->profile_photo_url }}" alt="{{ $stockholder->name }}" />
                                    <div class="ml-4">
                                        <span class="text-black font-bold block">{{ $stockholder->name }}</span>
                                        <span class="block">
                                            <a href="mailto:{{ $stockholder->email }}"
                                                class="hover:underline hover:text-blue-900">
                                                {{ $stockholder->email }}
                                            </a>
                                        </span>
                                    </div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="block">
                                        {{ date('j F, Y', strtotime($stockholder->created_at)) }}
                                    </span>
                                    <span class="block text-xs text-gray-500">
                                        {{ date('H:i:s', strtotime($stockholder->created_at)) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span
                                        class="block">{{ date('j F, Y', strtotime($stockholder->updated_at)) }}</span>
                                    <span
                                        class="block text-xs text-gray-500">{{ date('H:i:s', strtotime($stockholder->updated_at)) }}</span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                    {{-- Restore button --}}
                                    <x-admin.tables.action-button class="rounded-l-md"
                                        wire:click="restore({{ $stockholder->id }})">
                                        <x-admin.icons.refresh class="w-4 h-4 mr-2" />
                                        {{ __('Restore') }}
                                    </x-admin.tables.action-button>

                                    {{-- Complete delete button --}}
                                    <x-admin.tables.action-button class="rounded-l-md bg-red-500 text-white"
                                        wire:click="delete({{ $stockholder->id }})">
                                        <x-admin.icons.trash class="w-4 h-4 mr-2" />
                                        {{ __('Complete delete') }}
                                    </x-admin.tables.action-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Close') }}
            </x-admin.elements.button-secondary>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
