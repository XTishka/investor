<x-app-layout>

    <x-admin.page.header pageTitle="admin.administrators" :breadcrumbs="['admin.administrators' => 'admin.administrators']" />


    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        @livewire('admin.users.admin-details-update-form', ['administrator' => $administrator])

        <x-admin.forms.elements.section-border />

        <x-admin.forms.admin-update-password :administrator="$administrator" />
    </div>

</x-app-layout>
