<x-admin-layout page_title="Edit administrator">

    <x-admin.page.header pageTitle="admin.administrators" :breadcrumbs="['admin.administrators' => 'admin.administrators']" />


    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        @livewire('admin.users.admin-details-update-form', ['administrator' => $administrator])

        <x-admin.forms.elements.section-border />

        @livewire('admin.users.admin-password-update-form', ['administrator' => $administrator])

    </div>

</x-admin-layout>
