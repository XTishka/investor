<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-admin.tables.table>
        <thead>
            <tr>
                <x-admin.tables.thead.th value="#" />
                <x-admin.tables.thead.th value="{{ __('Stockholders') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="Rounds" class="tracking-wider" />
                <x-admin.tables.thead.th class="font-normal text-right">
                    <x-admin.forms.elements.input wire:model="search" type="text" class="inline-block w-2/3 font-normal"
                        placeholder="{{ __('Search stockholder') }}" />
                </x-admin.tables.thead.th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stockholders as $stockholder)
                <tr>
                    {{-- Counter --}}
                    <x-admin.tables.tbody.td>
                        {{ ($stockholders->currentpage() - 1) * $perPage + $loop->index + 1 }}
                    </x-admin.tables.tbody.td>

                    {{-- Stockholders --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ $stockholder->profile_photo_url }}"
                                alt="{{ $stockholder->name }}" />

                            <div class="ml-4">
                                <span class="text-black font-bold break-words">{{ $stockholder->name }}</span>
                                <span class="block text-gray-500 text-xs">{{ $stockholder->email }}</span>
                            </div>
                        </div>
                    </x-admin.tables.tbody.td>

                    {{-- Rounds --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        @foreach ($stockholder->rounds as $round)
                            <x-admin.elements.badge-disabled :value="$round->name" />
                        @endforeach
                    </x-admin.tables.tbody.td>

                    {{-- Actions --}}
                    <x-admin.tables.tbody.td class="tracking-wider text-right">
                        <x-admin.tables.action-button class="rounded-l-md"
                            wire:click="$emit('openResetPasswordModal', {{ $stockholder }})">
                            <x-admin.icons.edit class="w-4 h-4 mr-2" />
                            {{ __('Reset password') }}
                        </x-admin.tables.action-button>

                        <x-admin.tables.action-button wire:click="$emit('openEditModal', {{ $stockholder->id }})">
                            <x-admin.icons.edit class="w-4 h-4 mr-2" />
                            {{ __('Edit') }}
                        </x-admin.tables.action-button>

                        <x-admin.tables.action-button class="rounded-r-md"
                            wire:click="$emit('openDeleteModal', {{ $stockholder->id }})">
                            <x-admin.icons.trash class="w-4 h-4 mr-2" />
                            {{ __('Delete') }}
                        </x-admin.tables.action-button>
                    </x-admin.tables.tbody.td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.tables.table>

    <div class="bg-gray-50 py-2 px-4">
        {{ $stockholders->links() }}
    </div>
</div>
