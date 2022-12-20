<x-admin-layout page_title="Stockholders">

    <x-admin.page.header pageTitle="admin.stockholders" :breadcrumbs="['admin.stockholders' => '#']" />

    <div class="py-6">
        <div class="w-full px-8">

            {{-- Notifications --}}
            <livewire:stockholders.alerts />

            {{-- Action buttons --}}
            <div class="flex mb-4 justify-end items-center">
                <livewire:stockholders.sort />
                <livewire:stockholders.mailing />

                <livewire:stockholders.export />
                <livewire:stockholders.import />

                <livewire:stockholders.create />
            </div>

            {{-- Table --}}
            <livewire:stockholders.table />

            {{-- Table actions modals --}}
            <livewire:stockholders.edit />
            <livewire:stockholders.delete />
            <livewire:stockholders.reset-password />
        </div>
    </div>
</x-admin-layout>
