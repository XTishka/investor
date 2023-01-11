<x-admin-layout page_title="Stockholders">

    <x-admin.page.header pageTitle="Rounds" :breadcrumbs="['Rounds' => '#']" />

    <div class="py-6">
        <div class="w-full px-8">

            {{-- Notifications --}}
            <livewire:rounds.alerts />

            {{-- Action buttons --}}
            <div class="flex mb-4 justify-end items-center">
                <livewire:rounds.create />
            </div>

            {{-- Table --}}
            <livewire:rounds.table />

            {{-- Table actions modals --}}
            <livewire:rounds.view />
            <livewire:rounds.edit />
            <livewire:rounds.delete />
        </div>
    </div>
</x-admin-layout>
