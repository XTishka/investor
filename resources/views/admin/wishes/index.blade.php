@extends('layouts.admin.datatables')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_wishes_index') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-capitalize">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="nav-icon fas fa-tachometer-alt text-sm mr-2"></i>
                                    {{ __('admin.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin.page_title_wishes_index') }}</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="text-capitalize">
                                        <th>{{ __('admin.table_th_wishes_round') }}</th>
                                        <th>{{ __('admin.table_th_wishes_week') }}</th>
                                        <th>{{ __('admin.table_th_wishes_stockholder') }}</th>
                                        <th>{{ __('admin.table_th_wishes_country') }}</th>
                                        <th>{{ __('admin.table_th_wishes_property') }}</th>
                                        <th>{{ __('admin.table_th_wishes_priority') }}</th>
                                        <th>{{ __('admin.table_th_wishes_status') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($wishes as $request)
                                        <tr>
                                            <td>{{ $request->week->round->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.wish_index.edit', $request) }}">
                                                    <strong>#{{ $request->week->number }}</strong>
                                                    <span class="text-sm">
                                                        ( {{ date('j F, Y', strtotime($request->week->start_date)) }}  -
                                                        {{ date('j F, Y', strtotime($request->week->end_date)) }} )
                                                    </span>
                                                </a>
                                            </td>
                                            <td>{{ $request->user->name }}</td>
                                            <td>{{ $request->property->country }}</td>
                                            <td>{{ $request->property->name }}</td>
                                            <td>
                                                {{ $priorities->where('round_id', $request->week->round->id)->where('user_id', $request->user->id)->value('priority') }}
                                            </td>
                                            <td>
                                                @if ($request->status === 'Confirmed')
                                                    <span class="right badge badge-success">
                                                        {{ __($request->status) }}
                                                    </span>
                                                @elseif ($request->status === 'Not confirmed')
                                                    <span class="right badge bg-lightblue">
                                                        {{ __($request->status) }}
                                                    </span>
                                                @elseif ($request->status === 'Failed')
                                                    <span class="right badge badge-warning">
                                                        {{ __($request->status) }}
                                                    </span>
                                                @else
                                                    <span class="right badge badge-danger">
                                                        {{ __('Error!') }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr class="text-capitalize">
                                        <th>{{ __('admin.table_th_wishes_round') }}</th>
                                        <th>{{ __('admin.table_th_wishes_week') }}</th>
                                        <th>{{ __('admin.table_th_wishes_stockholder') }}</th>
                                        <th>{{ __('admin.table_th_wishes_country') }}</th>
                                        <th>{{ __('admin.table_th_wishes_property') }}</th>
                                        <th>{{ __('admin.table_th_wishes_priority') }}</th>
                                        <th>{{ __('admin.table_th_wishes_status') }}</th>
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
