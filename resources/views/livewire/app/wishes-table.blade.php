<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    {{-- <x-admin.forms.elements.input wire:model="search" type="text" class="inline-block w-2/3"
        placeholder="{{ __('Search') }}" /> --}}
    <x-admin.tables.table>
        <thead>
            <tr>
                <x-admin.tables.thead.th value="#" />
                <x-admin.tables.thead.th value="{{ __('Property') }}" class="tracking-wider" />
                <x-admin.tables.thead.th value="{{ __('Week') }}" class="tracking-wider text-center" />
                <x-admin.tables.thead.th value="{{ __('Status') }}" class="tracking-wider text-center" />
                <x-admin.tables.thead.th class="font-normal text-right">
                </x-admin.tables.thead.th>
            </tr>
        </thead>
        <tbody wire:sortable='updatePriority'>
            @foreach ($wishes as $wish)
                <tr
                    @if ($round->inWishesRange == true) wire:sortable.item="{{ $wish->id }}" wire:key="wish-{{ $wish->id }}" @endif>
                    <x-admin.tables.tbody.td>
                        {{ $loop->iteration }}
                    </x-admin.tables.tbody.td>

                    <x-admin.tables.tbody.td>
                        <span class="text-xs text-gray-500">{{ $wish->property->country }}</span>
                        <span class="block text-sm">{{ $wish->property->name }}</span>
                    </x-admin.tables.tbody.td>

                    <x-admin.tables.tbody.td class="text-center">
                        <strong>#{{ substr($wish->week_code, 4) }}</strong>
                        <span class="block text-xs text-gray-500">{{ $wish->week_start_date }}</span>
                        <span class="block text-xs text-gray-500">{{ $wish->week_end_date }}</span>
                    </x-admin.tables.tbody.td>


                    <x-admin.tables.tbody.td class="text-center">
                        <span class="text-xs text-gray-500">{{ $wish->status }}</span>
                    </x-admin.tables.tbody.td>

                    <x-admin.tables.tbody.td>
                        <span wire:click="$emit('openDeleteModal', {{ $wish->id }})">
                            @if ($round->inWishesRange == true)
                                <x-admin.icons.trash
                                    class="w-4 h-4 mr-2 text-gray-400 hover:text-red-700 transition hover:cursor-pointer" />
                            @endif
                        </span>
                    </x-admin.tables.tbody.td>
                </tr>
            @endforeach
        </tbody>
    </x-admin.tables.table>

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush
