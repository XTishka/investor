<div>
    <x-admin.elements.dialog-modal wire:model="modal" maxWidth="6xl">

        <x-slot name="title">{{ __('Round details') }}</x-slot>

        <x-slot name="content">
            <x-admin.page.details-section>
                <x-slot name="title">
                    <strong>{{ __('Round: ') }}</strong> {{ $roundName }}
                </x-slot>

                <x-slot name="description">
                    {{ $roundDescription }}
                </x-slot>

                <x-slot name="details">
                    <ul class='list-disc ml-4'>
                        <li><strong> {{ __('Stop wishes date') }}: </strong> {{ $roundStopWishesDate }}</li>
                        <li><strong> {{ __('Round start date') }}: </strong> {{ $roundStartDate }}</li>
                        <li><strong> {{ __('Round end date') }}: </strong> {{ $roundEndDate }}</li>
                        <li><strong> {{ __('Total weeks') }}: </strong> {{ count($roundWeeks) }} </li>
                    </ul>
                </x-slot>

                <x-slot name="data">
                    <x-admin.tables.table>
                        <thead>
                            <tr>
                                <x-admin.tables.thead.th value="#" />
                                <x-admin.tables.thead.th value="{{ __('Week') }}"
                                    class="tracking-wider text-center" />
                                <x-admin.tables.thead.th value="{{ __('Dates') }}"
                                    class="tracking-wider text-center" />
                                <x-admin.tables.thead.th value="{{ __('Status') }}" class="tracking-wider" />
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roundWeeks as $week)
                                <tr>

                                    {{-- Counter --}}
                                    <x-admin.tables.tbody.td>
                                        {{ $loop->iteration }}
                                    </x-admin.tables.tbody.td>

                                    {{-- Week --}}
                                    <x-admin.tables.tbody.td class="tracking-wider text-center font-bold">
                                        # {{ $week['week_start']['number'] }}
                                    </x-admin.tables.tbody.td>

                                    {{-- Dates --}}
                                    <x-admin.tables.tbody.td
                                        class="tracking-wider whitespace-nowrap text-xs text-gray-600 ml-4 text-center">
                                        {{ $week['week_start']['human_date'] }} -
                                        {{ $week['week_end']['human_date'] }}
                                    </x-admin.tables.tbody.td>

                                    {{-- Status --}}
                                    <x-admin.tables.tbody.td class="tracking-wider">
                                        @if ($week['week_start']['status'] === true and $week['week_end']['status'] === false)
                                            <x-admin.elements.badge-disabled>passed</x-admin.elements.badge-disabled>
                                        @elseif ($week['week_start']['status'] === true and $week['week_end']['status'] === true)
                                            <x-admin.elements.badge-success>current</x-admin.elements.badge-success>
                                        @elseif ($week['week_start']['status'] === false and $week['week_end']['status'] === true)
                                            <x-admin.elements.badge-primary>waiting</x-admin.elements.badge-primary>
                                        @else
                                            <x-admin.elements.badge-error>error</x-admin.elements.badge-error>
                                        @endif
                                    </x-admin.tables.tbody.td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-admin.tables.table>
                </x-slot>
            </x-admin.page.details-section>
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button-secondary wire:click="closeModal" wire:loading.attr='disabled'>
                {{ __('Cancel') }}
            </x-admin.elements.button-secondary>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>
