<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-admin.tables.table>
        <thead>
            <tr>
                <x-admin.tables.thead.th value="#" />
                <x-admin.tables.thead.th value="{{ __('Wish') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Stockholder') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Round') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Property') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Status') }}" class="tracking-wider" />
                <x-admin.tables.thead.th class="font-normal text-right">
                    {{-- <x-admin.forms.elements.input wire:model="search" type="text" class="inline-block w-2/3"
                        placeholder="{{ __('Search stockholder') }}" /> --}}
                </x-admin.tables.thead.th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wishes as $wish)
                <tr wire:loading.class='opacity-50'>
                    {{-- Counter --}}
                    <x-admin.tables.tbody.td>
                        {{ ($wishes->currentpage() - 1) * $perPage + $loop->index + 1 }}
                    </x-admin.tables.tbody.td>

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
