<x-admin-layout page_title="Wishes">

    <x-admin.page.header pageTitle="Dashboard" :breadcrumbs="[]" />

    <div class="py-6">
        <div class="w-full px-8">

            {{-- Action buttons --}}
            <div class="flex mb-4 justify-end items-center">
                <div class="mr-4 flex">
                    @livewire('dashboard.legend')
                </div>

                <div class="mr-4 flex">
                    @livewire('dashboard.reset')
                    @livewire('dashboard.distribute')
                </div>

                <div class="flex">
                    @livewire('dashboard.export-csv')
                    @livewire('dashboard.export-excel')
                </div>
            </div>

            {{-- Table --}}
            @livewire('dashboard.table')
        </div>
    </div>
</x-admin-layout>
