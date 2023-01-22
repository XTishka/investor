<div>
    @if ($roundId)
        <x-admin.elements.button wire:click='openModal' value="{{ __('Info') }}" class="mr-4" />
    @endif

    <x-admin.elements.dialog-modal wire:model="modal">
        <x-slot name="title">{{ __('Round info') }}</x-slot>

        <x-slot name="content" class="max-h-3">
            <x-admin.tables.table>
                <thead>
                    <tr>
                        <x-admin.tables.thead.th value="#" />
                        <x-admin.tables.thead.th value="{{ __('Stockholders') }}" class="tracking-wider" />
                        <x-admin.tables.thead.th value="Wishes" class="tracking-wider" />
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockholders as $stockholder)
                        <tr>
                            {{-- Counter --}}
                            <x-admin.tables.tbody.td>
                                {{ $loop->iteration }}
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

                            {{-- Wishes --}}
                            <x-admin.tables.tbody.td class="tracking-wider">
                                {{ $stockholder->wishes }}
                            </x-admin.tables.tbody.td>
                        </tr>
                    @endforeach
                </tbody>
            </x-admin.tables.table>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button wire:click="export" wire:loading.attr='disabled'>
                {{ __('Export') }}
            </x-admin.elements.button>
            <x-admin.elements.button wire:click="$set('modal', false)" wire:loading.attr='disabled'>
                {{ __('Close') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
