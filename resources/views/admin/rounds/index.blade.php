@extends('layouts.admin.datatables')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_round_index') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-capitalize">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="nav-icon fas fa-tachometer-alt text-sm mr-2"></i>
                                    {{ __('admin.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin.breadcrumbs_rounds_index') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('rounds.create') }}" class="btn btn-secondary btn-sm mr-1">
                                        {{ __('admin.button_add_new_rounds') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{ __('admin.table_th_round_name') }}</th>
                                        <th>{{ __('admin.table_th_round_description') }}</th>
                                        <th>{{ __('admin.table_th_round_start_date') }}</th>
                                        <th>{{ __('admin.table_th_round_end_wishes_date') }}</th>
                                        <th>{{ __('admin.table_th_round_end_date') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($rounds as $round)
                                    <tr>
                                        <td>
                                            <a href="{{ route('rounds.show', $round->id) }}">
                                                {{ $round->name }}
                                            </a>
                                        </td>
                                        <td>{{ $round->description }}</td>
                                        <td>{{ date('j F, Y', strtotime($round->start_round_date)) }}</td>
                                        <td>{{ date('j F, Y', strtotime($round->end_wishes_date)) }}</td>
                                        <td>{{ date('j F, Y', strtotime($round->end_round_date)) }}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>{{ __('admin.table_th_round_name') }}</th>
                                        <th>{{ __('admin.table_th_round_description') }}</th>
                                        <th>{{ __('admin.table_th_round_start_date') }}</th>
                                        <th>{{ __('admin.table_th_round_end_wishes_date') }}</th>
                                        <th>{{ __('admin.table_th_round_end_date') }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
