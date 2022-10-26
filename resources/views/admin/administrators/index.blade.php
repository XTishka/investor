<x-app-layout>

    <x-admin.page.header pageTitle="admin.administrators" :breadcrumbs="['admin.administrators' => '#']" />

    <div class="py-12">
        <div class="w-full px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr class="font-bold text-xs uppercase text-black">
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                Administrator
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                Created
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left tracking-wider">
                                Updated
                            </th>

                            <th scope="col" class="px-6 py-3 bg-gray-50 text-center tracking-wider">
                                Actions
                            </th>
                    </thead>

                    @for ($i = 0; $i <= 20; $i++)
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 flex items-center">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    <div class="ml-4">
                                        <span class="text-black font-bold block">Takhir Berdyiev</span>
                                        <span class="block">
                                            <a href="mailto:takhir.berdyiev@gmail.com"
                                                class="hover:underline hover:text-blue-900">
                                                takhir.berdyiev@gmail.com
                                            </a>
                                        </span>
                                    </div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    2022-10-19
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    2022-10-19
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                    <form class="inline-block" action="#" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="">
                                        <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                            value="Delete">
                                    </form>
                                </td>
                            </tr>
                    @endfor
                    </thead>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
