<div class="py-6">
    <div class="w-full px-8">

        <div class="flex mb-4 justify-between items-center">
            <x-admin.forms.elements.input id="search" name="search" wire:model="search" type="text" class="block"
                autocomplete="name" placeholder="{{ __('admin.search_by_property_name') }}" />

            <x-admin.button-link link="{{ route('admin.properties.create') }}">
                {{ __('Add new') }}
            </x-admin.button-link>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="w-full">
                <thead>
                    <tr class="font-bold text-xs uppercase text-black">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.properties') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                            {{ __('admin.country') }} /
                            {{ __('admin.address') }}
                        </th>

                        <th scope="col" class="px-6 py-3 bg-gray-50 text-center tracking-wider">
                        </th>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($properties as $property)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700 flex items-center">
                                <x-admin.icons.arrow-path class="h-9 w-9 bg-blue-50 text-blue-300 rounded-full p-2" />

                                <div class="ml-4">
                                    <span class="text-black font-bold break-words">{{ $property->name }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="block">{{ $property->country }}</span>
                                <span class="block text-xs text-gray-400">{{ $property->address }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                <x-admin.tables.action-buttons link="admin.properties" :id="$property" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="bg-gray-50 py-2 px-4">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</div>
