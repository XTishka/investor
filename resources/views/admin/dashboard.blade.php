<x-admin-layout page_title="Wishes">

    <x-admin.page.header pageTitle="Dashboard" :breadcrumbs="[]" />

    <div class="py-6">
        <div class="w-full px-8">

            {{-- Notifications --}}
            {{-- <livewire:dashboard.alerts /> --}}

            {{-- Action buttons --}}
            <div class="flex mb-4 justify-end items-center">
                <livewire:dashboard.distribute />
            </div>

            {{-- Table --}}
            <livewire:dashboard.table />

            {{-- Table actions modals --}}
            {{-- <livewire:wishes.edit />
            <livewire:wishes.delete /> --}}
        </div>
    </div>
</x-admin-layout>
