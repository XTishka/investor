@extends('layouts.admin.datatables', ['title' => __('admin.wishes')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.wishes" :breadcrumbs="[ 'admin.wishes' => '#']" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @livewire('wishes-table')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
