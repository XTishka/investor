@extends('layouts.admin.datatables', ['title' => __('admin.rounds') ])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.rounds" :breadcrumbs="[ 'admin.rounds' => '#']" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        @livewire('rounds-table')

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
