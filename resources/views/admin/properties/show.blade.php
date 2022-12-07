<x-admin-layout page_title="Property details">

    <x-admin.page.header pageTitle="admin.properties" :breadcrumbs="['admin.properties' => 'admin.properties']" />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <x-admin.page.details-section>
            <x-slot name="title">
                <strong>{{ __('Property: ') }}</strong> {{ $property->name }}
            </x-slot>

            <x-slot name="description">
                {{ $property->description }}
            </x-slot>

            <x-slot name="data">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @if ($roundWeeks)
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
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-bold text-center">
                                            # {{ $week['week_start']['number'] }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-600 ml-4 text-center">
                                            {{ $week['week_start']['human_date'] }} -
                                            {{ $week['week_end']['human_date'] }}
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right flex justify-end">

                                            <x-admin.elements.week-badges :week="$week" />

                                            @livewire('admin.properties.property-week-switcher', ['week' => $week, 'roundId' => $roundId, 'property' => $property])

                                            {{-- <div class="flex items-center ml-4 text-xs font-bold text-gray-400">
                                                @if ($week['disabled'])
                                                    <button wire:click="enable({{ $week['code'] }})"
                                                        class="bg-gray-100 px-2 rounded-l-full @if ($week['week_end']['status'] == true) hover:bg-green-100 hover:text-green-400 transition @endif"
                                                        @if ($week['week_end']['status'] == false) disabled @endif>
                                                        {{ __('On') }}
                                                    </button>
                                                @else
                                                    <button class="px-2 rounded-l-full bg-green-100 text-green-400"
                                                        disabled>
                                                        {{ __('On') }}
                                                    </button>
                                                @endif

                                                @if ($week['disabled'])
                                                    <button
                                                        class="px-2 rounded-r-full bg-red-100 text-red-400 transition"
                                                        disabled>
                                                        {{ __('Off') }}
                                                    </button>
                                                @else
                                                    <button wire:click="disable({{ $week['code'] }})"
                                                        class="bg-gray-100 px-2 rounded-r-full @if ($week['week_end']['status'] == true) hover:bg-red-100 hover:text-red-400 transition @endif"
                                                        @if ($week['week_end']['status'] == false) disabled @endif>
                                                        {{ __('Off') }}
                                                    </button>
                                                @endif
                                            </div> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-4">
                            <p class="text-center text-lg italic text-gray-500">
                                {{ __('You must to select round to display data') }}
                            </p>
                        </div>
                    @endif
                </div>
            </x-slot>

            {{-- @livewire('admin.properties.property-details', ['property' => $property]) --}}

        </x-admin.page.details-section>
    </div>

</x-admin-layout>
