@extends('layouts.admin.dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blank Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ $round->name }}
                                        </button>

                                        <ul class="dropdown-menu" style="">
                                            @foreach ($rounds as $round)
                                                <li class="dropdown-item"><a
                                                        href="{{ route('admin.dashboard', ['round_id' => $round->id]) }}">{{ $round->name }}</a>
                                                </li>
                                            @endforeach

                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item"><a href="{{ route('admin.stockholders') }}">Current
                                                    round</a></li>
                                        </ul>
                                    </div>

                                    <div>
                                        <a href="#" class="btn btn-secondary btn-sm mr-1">
                                            Upload CSV
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dashboard_distributions" class="table table-bordered table-striped d-block"
                                    style="overflow-x: auto; white-space: nowrap;">
                                    <thead>
                                        <tr class="text-capitalize">
                                            <th width="10"><i class="nav-icon fas fa-arrows-alt-v"></i></th>
                                            <th>{{ __('admin.stockholders') }}</th>
                                            @for ($i = 1; $i <= $round->max_wishes; $i++)
                                                <th>Property #{{ $i }} </th>
                                                <th>Week #{{ $i }} </th>
                                            @endfor
                                        </tr>
                                    </thead>

                                    <tbody id="stockholders-index">

                                        @foreach ($stockholders as $stockholder)
                                            <tr>
                                                <td>{{ $stockholder->priority }}</td>
                                                <td>
                                                    <a href="{{ route('stockholders.show', $stockholder->id) }}">
                                                        {{ $stockholder->name }}
                                                    </a>
                                                </td>
                                                @for ($i = 1; $i <= $round->max_wishes; $i++)
                                                    <td>Property name #{{ $i }} </td>
                                                    <td>Week number #{{ $i }} </td>
                                                @endfor
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="text-capitalize">
                                            <th width="10"><i class="nav-icon fas fa-arrows-alt-v"></i></th>
                                            <th>{{ __('admin.stockholders') }}</th>
                                            @for ($i = 1; $i <= $round->max_wishes; $i++)
                                                <th>Property #{{ $i }} </th>
                                                <th>Week #{{ $i }} </th>
                                            @endfor
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
    <!-- /.content-wrapper -->
@endsection
