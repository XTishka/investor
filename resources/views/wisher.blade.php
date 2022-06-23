@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('front.available_wishes') }}: {{ $availableWishes }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('front.available_wishes_description') }}
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger my-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('wish.store') }}" method="POST">
                        @csrf

                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country"
                                               class="block text-sm font-medium text-gray-700">{{ __('front.country') }}</label>
                                        <select id="country" name="country" autocomplete="country-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">{{ __('front.select_country') }}</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->country }}">{{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="property-selector" class="col-span-6 sm:col-span-3 hidden">
                                        <label for="property_id"
                                               class="block text-sm font-medium text-gray-700">{{ __('front.property') }}</label>
                                        <select id="property_id" name="property_id" autocomplete="property-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">{{ __('front.select_property') }}</option>
                                        </select>
                                    </div>

                                    <div id="week-selector" class="col-span-6 sm:col-span-3 hidden">
                                        <label for="week_id" class="block text-sm font-medium text-gray-700">
                                            {{ __('front.week') }}
                                        </label>
                                        <select id="week_id" name="week_id" autocomplete="week-name"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="" selected>{{ __('front.select_week') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('front.button_send_wish') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">

                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('front.sent_wishes') }}</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('front.sent_wishes_description') }}
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 w-full">
                                        <thead>
                                        <tr>
                                            <th scope="col" width="50"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('front.wishes') }}
                                            </th>
                                            <th scope="col" width="50"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('front.week') }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ __('front.property') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50" width="50">

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                        @foreach( $usedWishes as $wish )
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <strong>#{{ $wish->week_number }}</strong><br>
                                                <span class="text-xs">
                                                    {{ date('j F, Y', strtotime($wish->week_start_date)) }} -
                                                    {{ date('j F, Y', strtotime($wish->week_end_date)) }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <strong>{{ $wish->property_name }}</strong> {{ $wish->property_country}}<br>
                                                <span class="text-xs">{{ $wish->property_address }}</span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <form class="inline-block" action="{{ route('wish.delete', $wish->wish_id) }}" method="POST"
                                                      onsubmit="return confirm('{{ __('admin.are_you_sure') }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit"
                                                           class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                           value="{{ __('front.delete') }}">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
@endsection
