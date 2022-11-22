<x-admin.page.details-section>
    <x-slot name="title">
        <strong>{{ __('Round: ') }}</strong> {{ $round->name }}
    </x-slot>

    <x-slot name="description">
        {{ $round->description }}
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

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="w-full">
                <thead>
                    <tr class="font-bold text-xs uppercase text-black">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            #
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 tracking-wider text-center">
                            {{ __('Week') }}
                        </th>


                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider"></th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-right tracking-wider">
                            {{ __('Status') }}
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($roundWeeks as $week)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-bold text-center">
                                # {{ $week['week_start']['number'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-600 ml-4 text-center">
                                {{ $week['week_start']['human_date'] }} - {{ $week['week_end']['human_date'] }}
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                                @if ($week['week_start']['status'] === true and $week['week_end']['status'] === false)
                                    <x-admin.elements.badge-disabled>passed</x-admin.elements.badge-disabled>
                                @elseif ($week['week_start']['status'] === true and $week['week_end']['status'] === true)
                                    <x-admin.elements.badge-success>current</x-admin.elements.badge-success>
                                @elseif ($week['week_start']['status'] === false and $week['week_end']['status'] === true)
                                    <x-admin.elements.badge-primary>waiting</x-admin.elements.badge-primary>
                                @else
                                    <x-admin.elements.badge-error>error</x-admin.elements.badge-error>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </x-slot>
</x-admin.page.details-section>
