<x-admin-layout page_title="Wishes">

    <x-admin.page.header pageTitle="Dashboard" :breadcrumbs="[]" />

    <div class="py-6">
        <div class="w-full px-8">

            {{-- Action buttons --}}
            <div class="flex mb-4 justify-end items-center">
                @livewire('dashboard.info')

                @livewire('dashboard.legend')

                @livewire('dashboard.reset')
                @livewire('dashboard.distribute')

                {{-- @livewire('dashboard.export-csv') --}}
                @livewire('dashboard.export-excel')
            </div>

            {{-- Table --}}
            @livewire('dashboard.table')
        </div>
    </div>
</x-admin-layout>
