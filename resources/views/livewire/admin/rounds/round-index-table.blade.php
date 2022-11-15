<div class="py-6">
    <div class="w-full px-8">

        <div class="flex mb-4 justify-between items-center">
            <x-admin.forms.elements.input id="search" name="search" wire:model="search" type="text"
                class="mt-1 block" autocomplete="name" placeholder="{{ __('admin.search_by_round_name') }}" />

            <x-admin.button-link link="{{ route('admin.rounds.create') }}">
                {{ __('Add new') }}
            </x-admin.button-link>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="w-full">
                <thead>
                    <tr class="font-bold text-xs uppercase text-black">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.rounds') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.wishes_stop_date') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.round_start_date') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.round_end_date') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center tracking-wider">
                        </th>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($rounds as $round)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700 flex items-center">
                                <x-admin.icons.arrow-path class="h-9 w-9 bg-blue-50 text-blue-300 rounded-full p-2" />

                                <div class="ml-4">
                                    <span class="text-black font-bold break-words">{{ $round->name }}</span>
                                    <span class="block">
                                        Status: active
                                    </span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="block">{{ \Carbon\Carbon::parse($round->stop_wishes_date)->format('j F, Y')  }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="block">{{ \Carbon\Carbon::parse($round->start_date)->format('j F, Y')  }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="block">{{ \Carbon\Carbon::parse($round->end_date)->format('j F, Y')  }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                <x-admin.tables.action-buttons link="admin.rounds" :id="$round" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="bg-gray-50 py-2 px-4">
                {{ $rounds->links() }}
            </div>
        </div>
    </div>
</div>
