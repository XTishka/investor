<x-admin-layout page_title="Edit property">

    <x-admin.page.header pageTitle="admin.properties" :breadcrumbs="['admin.properties' => 'admin.properties']" />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        @livewire('admin.properties.property-edit-form', ['property' => $property])

    </div>

</x-admin-layout>
