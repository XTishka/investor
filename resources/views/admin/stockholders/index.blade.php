<x-admin-layout page_title="Stockholders">

    <x-admin.page.header pageTitle="admin.stockholders" :breadcrumbs="['admin.stockholders' => '#']" />

    <div class="py-6">
        <div class="w-full px-8">
            {{-- @livewire('admin.stockholders-page') --}}

            @livewire('admin.stockholders.index')
        </div>
    </div>

</x-admin-layout>
