<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <x-admin.tables.table class="block overflow-x-auto whitespace-nowrap">
        <thead>
            <tr>
                <x-admin.tables.thead.th value="{{ __('Priority') }}" />
                <x-admin.tables.thead.th value="{{ __('Stockholder') }}" class="tracking-wider" />
                @foreach ($weeks as $week)
                    <x-admin.tables.thead.th class="tracking-wider">
                        <span class="block text-center">
                            {{ __('Week ') }} {{ $week['week_start']['number'] }}
                        </span>
                        <span class="block font-normal text-center text-gray-500 lowercase">
                            {{ $week['week_start']['human_date'] }}
                        </span>
                        <span class="block font-normal text-center text-gray-500 lowercase">
                            {{ $week['week_end']['human_date'] }}
                        </span>
                    </x-admin.tables.thead.th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($stockholders as $stockholder)
                <tr>
                    {{-- User Priority --}}
                    <x-admin.tables.tbody.td>
                        {{ ($stockholders->currentpage() - 1) * $perPage + $loop->index + 1 }}
                    </x-admin.tables.tbody.td>

                    {{-- User Name --}}
                    <x-admin.tables.tbody.td>
                        {{ $stockholder->name }} : {{ $stockholder->pivot->wishes }}
                    </x-admin.tables.tbody.td>


                    {{-- Weeks --}}
                    @foreach ($stockholder->weeks as $week)
                        <x-admin.tables.tbody.td>
                            @foreach ($wishes->where('user_id', $stockholder->id)->where('week_code', $week['code']) as $wish)
                                @if ($wish->status == 'waiting')
                                    <span class="block bg-gray-200 rounded-lg px-2 mb-1">
                                        {{ $wish->property_name }} : {{ $wish->priority }}
                                    </span>
                                @endif
                                @if ($wish->status == 'confirmed')
                                    <span class="block bg-green-200 rounded-lg px-2 mb-1">
                                        {{ $wish->property_name }} : {{ $wish->priority }}
                                    </span>
                                @endif
                                @if ($wish->status == 'failed')
                                    <span class="block bg-red-200 rounded-lg px-2 mb-1">
                                        {{ $wish->property_name }} : {{ $wish->priority }}
                                    </span>
                                @endif
                            @endforeach
                        </x-admin.tables.tbody.td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </x-admin.tables.table>

    <div class="bg-gray-50 py-2 px-4">
        {{ $stockholders->links() }}
    </div>
</div>
