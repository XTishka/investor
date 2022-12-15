<div class="py-6">
    <div class="w-full px-8">

        {{-- Notifications --}}
        <x-admin.elements.notifications />

        <div class="flex mb-4 justify-between items-center">
            <x-admin.forms.elements.input wire:model="search" type="text" class="inline-block w-1/3"
                placeholder="{{ __('Search stockholder') }}" />

            <div>
                <x-admin.elements.button wire:click='sort' value="{{ __('Sort') }}" />
                <x-admin.elements.button wire:click='send_emails' value="{{ __('Send emails') }}" class="mr-4" />

                <x-admin.elements.button wire:click="openModal('export')" value="{{ __('Export') }}" />
                <x-admin.elements.button wire:click="openModal('import')" value="{{ __('Import') }}" class="mr-4" />

                <x-admin.elements.button wire:click="openModal('create')" value="{{ __('Add new') }}" />
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-admin.tables.table>
                <thead>
                    <tr>
                        <x-admin.tables.thead.th value="#" />
                        <x-admin.tables.thead.th>
                            <x-admin.forms.elements.checkbox id="select_all" name="select_all"
                                wire:model='select_all' />
                        </x-admin.tables.thead.th>
                        <x-admin.tables.thead.th value="{{ __('Stockholders') }}" class="tracking-wider" />
                        <x-admin.tables.thead.th value="Rounds" class="tracking-wider" />
                        <x-admin.tables.thead.th value="Actions" class="tracking-wider text-center" />
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockholders as $stockholder)
                        <tr>
                            {{-- Counter --}}
                            <x-admin.tables.tbody.td>
                                {{ ($stockholders->currentpage() - 1) * $perPage + $loop->index + 1 }}
                            </x-admin.tables.tbody.td>

                            {{-- Checkboxes --}}
                            <x-admin.tables.tbody.td class="tracking-wider">
                                <div class="flex items-center">
                                    <x-admin.forms.elements.checkbox id="select_all" name="select_all"
                                        wire:model='select' />
                                    <x-admin.forms.elements.label for="send_password" value="ID: {{ $stockholder->id }}"
                                        class="ml-4 text-xs mb-0 text-gray-500" />
                                </div>
                            </x-admin.tables.tbody.td>

                            {{-- Stockholders --}}
                            <x-admin.tables.tbody.td class="tracking-wider">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ $stockholder->profile_photo_url }}" alt="{{ $stockholder->name }}" />

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
                                    wire:click='view({{ $stockholder->id }})'>
                                    <x-admin.icons.eye class="w-4 h-4 mr-2" />
                                    {{ __('View') }}
                                </x-admin.tables.action-button>

                                <x-admin.tables.action-button wire:click='edit({{ $stockholder->id }})'>
                                    <x-admin.icons.edit class="w-4 h-4 mr-2" />
                                    {{ __('Send password') }}
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
                            </x-admin.tables.tbody.td>
                        </tr>
                    @endforeach
                </tbody>
            </x-admin.tables.table>

            <div class="bg-gray-50 py-2 px-4">
                {{ $stockholders->links() }}
            </div>


            {{-- Modals --}}
            <x-admin.modals.stockholders.export-stockholder :groupedRounds="$groupedRounds" :export="$export" />

            <x-admin.modals.stockholders.create-stockholder :groupedRounds="$groupedRounds" :stockholder="$stockholder" :wishes_min="$wishes_min"
                :wishes_max="$wishes_max" />
        </div>
    </div>
</div>
