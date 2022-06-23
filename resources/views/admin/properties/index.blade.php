@extends('layouts.admin.datatables', ['title' => __('admin.properties')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.properties" :breadcrumbs="[ 'admin.properties' => '#']" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @livewire('properties-table')
                    </div>
                </div>
            </div>
        </section>
        
    </div>
@endsection

