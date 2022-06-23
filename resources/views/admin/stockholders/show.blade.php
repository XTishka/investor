@extends('layouts.admin.datatables', ['title' => __('admin.stockholder_details')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="{{ __('admin.stockholder_details') }}" :breadcrumbs="['admin.stockholders' => 'admin.stockholders', $stockholder->name => '#']" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        @livewire('stockholder-wishes-table', ['stockholder' => $stockholder])

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
