@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('front.available_wishes') }}:
                            {{ $availableWishes }}</h3>
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
                    @if ($availableWishes > 0 )
                        @livewire('wish-form', ['userId' => $userId, 'roundId' => $roundId])
                    @endif
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
                                    @livewire('stockholder-wishes')
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
