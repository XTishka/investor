<x-app-layout>

    <x-admin.page.header pageTitle="admin.administrators" :breadcrumbs="['admin.administrators' => '#']" />

    <div class="py-6">
        <div class="w-full px-8">

            <div class="flex mb-4 justify-end py-1">
                <x-admin.button-link link="{{ route('admin.administrators.create') }}">
                    {{ __('Add new') }}
                </x-admin.button-link>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr class="font-bold text-xs uppercase text-black">
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                {{ __('admin.administrators') }}
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                {{ __('Created') }}
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                {{ __('Updated') }}
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center tracking-wider">
                            </th>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($administrators as $administrator)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 flex items-center">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ $administrator->profile_photo_url }}"
                                        alt="{{ $administrator->name }}" />
                                    <div class="ml-4">
                                        <span class="text-black font-bold block">{{ $administrator->name }}</span>
                                        <span class="block">
                                            <a href="mailto:{{ $administrator->email }}"
                                                class="hover:underline hover:text-blue-900">
                                                {{ $administrator->email }}
                                            </a>
                                        </span>
                                    </div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span
                                        class="block">{{ date('j F, Y', strtotime($administrator->created_at)) }}</span>
                                    <span
                                        class="block text-xs text-gray-500">{{ date('H:i:s', strtotime($administrator->created_at)) }}</span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span
                                        class="block">{{ date('j F, Y', strtotime($administrator->updated_at)) }}</span>
                                    <span
                                        class="block text-xs text-gray-500">{{ date('H:i:s', strtotime($administrator->updated_at)) }}</span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-right">
                                    <x-admin.tables.action-buttons link="admin.administrators" :id="$administrator" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-gray-50 py-2 px-4">
                    {{ $administrators->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
