<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-admin.tables.table>
        <thead>
            <tr>
                <x-admin.tables.thead.th value="#" />
                <x-admin.tables.thead.th value="{{ __('Rounds') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Wishes start') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Wishes end') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Round start') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Round end') }}" class="tracking-wider" />
                <x-admin.tables.thead.th class="font-normal text-right">
                    <x-admin.forms.elements.input wire:model="search" type="text" class="inline-block font-normal"
                        placeholder="{{ __('Search') }}" />
                </x-admin.tables.thead.th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rounds as $round)
                <tr wire:loading.class='opacity-50'>

                    {{-- Counter --}}
                    <x-admin.tables.tbody.td>
                        {{ ($rounds->currentpage() - 1) * $perPage + $loop->index + 1 }}
                    </x-admin.tables.tbody.td>

                    {{-- Rounds --}}
                    <x-admin.tables.tbody.td class="tracking-wider flex items-center">
                        <x-admin.icons.arrow-path class="h-9 w-9 bg-blue-50 text-blue-300 rounded-full p-2 mr-4" />
                        <div>
                            <span class="font-bold block">{{ $round->name }}</span>
                            <p class="text-xs">{{ $round->description }}</p>
                        </div>
                    </x-admin.tables.tbody.td>

                    {{-- Wishes start date --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $round->wishes_start }}
                    </x-admin.tables.tbody.td>

                    {{-- Wishes end date --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $round->wishes_stop }}
                    </x-admin.tables.tbody.td>

                    {{-- Round start date --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $round->start }}
                    </x-admin.tables.tbody.td>

                    {{-- Round end date --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $round->stop }}
                    </x-admin.tables.tbody.td>

                    {{-- Actions --}}
                    <x-admin.tables.tbody.td class="tracking-wider text-right">
                        <x-admin.tables.action-button class="rounded-l-md"
                            wire:click="$emit('openViewModal', {{ $round }})">
                            <x-admin.icons.eye class="w-4 h-4 mr-2" />
                            {{ __('View') }}
                        </x-admin.tables.action-button>

                        <x-admin.tables.action-button wire:click="$emit('openEditModal', {{ $round }})">
                            <x-admin.icons.edit class="w-4 h-4 mr-2" />
                            {{ __('Edit') }}
                        </x-admin.tables.action-button>

                        <x-admin.tables.action-button class="rounded-r-md"
                            wire:click="$emit('openDeleteModal', {{ $round }})">
                            <x-admin.icons.trash class="w-4 h-4 mr-2" />
                            {{ __('Delete') }}
                        </x-admin.tables.action-button>
                    </x-admin.tables.tbody.td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.tables.table>

    <div class="bg-gray-50 py-2 px-4">
        {{ $rounds->links() }}
    </div>
</div>
