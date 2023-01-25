<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-admin.tables.table>
        <thead>
            <tr class="border-b">
                <th colspan="5" class="px-4 pt-2 pb-4 bg-gray-50">
                    <div class="flex items-center justify-between ">
                        <div class="flex">
                            <div class="mr-2">
                                <x-admin.forms.elements.input wire:model="activity" type="text"
                                    class="inline-block w-full font-normal" placeholder="{{ __('Activity') }}" />
                            </div>

                            <div class="mr-2">
                                <x-admin.forms.elements.input wire:model="description" type="text"
                                    class="inline-block w-full font-normal" placeholder="{{ __('Description') }}" />
                            </div>
                        </div>
                        <div>
                            <x-admin.forms.elements.button class="mt-2 mr-4" wire:click="resetFilter">
                                {{ __('Reset') }}
                            </x-admin.forms.elements.button>

                            <x-admin.forms.elements.button class="mt-2" wire:click="export">
                                {{ __('Export') }}
                            </x-admin.forms.elements.button>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <x-admin.tables.thead.th value="#" />
                <x-admin.tables.thead.th value="{{ __('Activity') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Description') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Created at') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Updated at') }}" class="tracking-wider" />
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    {{-- Counter --}}
                    <x-admin.tables.tbody.td>
                        {{ ($logs->currentpage() - 1) * $perPage + $loop->index + 1 }}
                    </x-admin.tables.tbody.td>

                    {{-- Activity --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $log->log_name }}
                    </x-admin.tables.tbody.td>

                    {{-- Description --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $log->description }}
                    </x-admin.tables.tbody.td>

                    {{-- Created at --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $log->created_at }}
                    </x-admin.tables.tbody.td>

                    {{-- Updated at --}}
                    <x-admin.tables.tbody.td class="tracking-wider">
                        {{ $log->updated_at }}
                    </x-admin.tables.tbody.td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.tables.table>

    <div class="bg-gray-50 py-2 px-4">
        {{ $logs->links() }}
    </div>
</div>
