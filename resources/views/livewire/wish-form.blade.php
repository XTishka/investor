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

                {{-- <div id="property-selector" class="col-span-6 sm:col-span-3 hidden">
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
                </div> --}}
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
