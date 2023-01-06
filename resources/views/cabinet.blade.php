<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cabinet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            {{ __('Round: ') }}: {{ $round->name }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Used wishes: ') }} {{ $usedWishes }} / {{ $maxWishes }}
                        </p>

                        <div class="my-4">
                            <livewire:app.add-wish :round="$round" :stockholder="$stockholder" />
                        </div>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <livewire:app.wishes-table :round="$round" :stockholder="$stockholder" />
                    <livewire:app.delete-wish />
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
