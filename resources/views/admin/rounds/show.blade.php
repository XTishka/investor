<x-admin-layout page_title="Round details">

    <x-admin.page.header pageTitle="admin.administrators" :breadcrumbs="['admin.administrators' => 'admin.administrators']" />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        @livewire('admin.rounds.round-details', ['round' => $round])

    </div>

</x-admin-layout>
