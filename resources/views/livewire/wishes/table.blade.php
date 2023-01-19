<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-admin.tables.table>
        <thead>
            <tr class="border-b">
                <th colspan="8" class="px-2 pt-2 pb-4 bg-gray-50" wire:model="filter.show">
                    <div class="flex items-center justify-between ">
                        <div class="flex">
                            <div class="mr-2">
                                <x-admin.forms.elements.select-wish-stockholder model="filter.stockholder" />
                            </div>

                            <div class="mr-2">
                                <x-admin.forms.elements.select-round model="filter.round" />
                            </div>

                            <div class="mr-2">
                                <x-admin.forms.elements.select-property model="filter.property" />
                            </div>

                            <div class="mr-2">
                                <x-admin.forms.elements.select-wish-status model="filter.wish_status" />
                            </div>
                        </div>
                        <div>
                            <x-admin.forms.elements.button class="mt-2" wire:click="resetFilter">
                                {{ __('Reset') }}
                            </x-admin.forms.elements.button>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                {{-- <x-admin.tables.thead.th value="#" /> --}}
                <x-admin.tables.thead.th value="{{ __('Wish') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Stockholder') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Round') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Property') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Status') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Created') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Updated') }}" class="tracking-wider" />
                <x-admin.tables.thead.th class="font-normal text-right">
                    {{-- <x-admin.forms.elements.button>
                        Filter
                    </x-admin.forms.elements.button> --}}
                </x-admin.tables.thead.th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wishes as $wish)
                <tr wire:loading.class='opacity-50'>
                    {{-- Counter --}}
                    {{-- <x-admin.tables.tbody.td>
                        {{ ($wishes->currentpage() - 1) * $perPage + $loop->index + 1 }}
                    </x-admin.tables.tbody.td> --}}

                    {{-- Wish --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $wish->id }}
                    </x-admin.tables.tbody.td>

                    {{-- Stockholder --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $wish->user->name }}
                    </x-admin.tables.tbody.td>

                    {{-- Round --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $wish->round->name }}
                    </x-admin.tables.tbody.td>

                    {{-- Property --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $wish->property->name }}
                    </x-admin.tables.tbody.td>

                    {{-- Status --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $wish->status }}
                    </x-admin.tables.tbody.td>

                    {{-- Created at --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        <span class="block">
                            {{ date('j F, Y', strtotime($wish->created_at)) }}
                        </span>
                        <span class="block text-xs text-gray-500">
                            {{ date('H:i:s', strtotime($wish->created_at)) }}
                        </span>
                    </x-admin.tables.tbody.td>

                    {{-- Updated at --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        <span class="block">
                            {{ date('j F, Y', strtotime($wish->updated_at)) }}
                        </span>
                        <span class="block text-xs text-gray-500">
                            {{ date('H:i:s', strtotime($wish->updated_at)) }}
                        </span>
                    </x-admin.tables.tbody.td>

                    {{-- Actions --}}
                    <x-admin.tables.tbody.td class="tracking-wider text-right">
                        <x-admin.tables.action-button class="rounded-l-md"
                            wire:click="$emit('openEditModal', {{ $wish }})">
                            <x-admin.icons.edit class="w-4 h-4 mr-2" />
                            {{ __('Edit') }}
                        </x-admin.tables.action-button>

                        <x-admin.tables.action-button class="rounded-r-md"
                            wire:click="$emit('openDeleteModal', {{ $wish }})">
                            <x-admin.icons.trash class="w-4 h-4 mr-2" />
                            {{ __('Delete') }}
                        </x-admin.tables.action-button>
                    </x-admin.tables.tbody.td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.tables.table>

    <div class="bg-gray-50 py-2 px-4">
        {{ $wishes->links() }}
    </div>
</div>
