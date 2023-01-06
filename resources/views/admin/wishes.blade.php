<x-admin-layout page_title="Wishes">

    <x-admin.page.header pageTitle="Wishes" :breadcrumbs="['Wishes' => '#']" />

    <div class="py-6">
        <div class="w-full px-8">

            {{-- Notifications --}}
            <livewire:wishes.alerts />

            {{-- Action buttons --}}
            <div class="flex mb-4 justify-end items-center">
                <livewire:wishes.create />
            </div>

            {{-- Table --}}
            <livewire:wishes.table />

            {{-- Table actions modals --}}
            <livewire:wishes.edit />
            <livewire:wishes.delete />
        </div>
    </div>
</x-admin-layout>
