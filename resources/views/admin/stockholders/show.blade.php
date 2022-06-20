@extends('layouts.admin.datatables', ['title' => 'Stockholder details'])

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_show_stockholder') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-capitalize">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="nav-icon fas fa-tachometer-alt text-sm mr-2"></i>
                                    {{ __('admin.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.stockholders') }}">
                                    {{ __('admin.stockholders') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ $stockholder->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        @livewire('stockholder-wishes-table', ['stockholder' => $stockholder])

                        {{-- <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center">
                                    <span>
                                        <i class="fas fa-user-alt mr-2"></i>
                                        <span class="mr-2">{{ $stockholder->name  }}</span>
                                    </span>

                                    <small class="text-md">
                                        <a href="mailto:{{ $stockholder->email }}">< {{ $stockholder->email }} ></a>
                                    </small>
                                </h3>

                                <a href="{{ route('admin.stockholders.edit', $stockholder->id) }}"
                                   class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                    {{ __('admin.button_edit_stockholder') }}
                                </a>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{ __('admin.table_th_wishes_round') }}</th>
                                        <th>{{ __('admin.table_th_wishes_week') }}</th>
                                        <th>{{ __('admin.table_th_wishes_country') }}</th>
                                        <th>{{ __('admin.table_th_wishes_property') }}</th>
                                        <th>{{ __('admin.table_th_wishes_status') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($wishes as $wish)
                                    <tr>
                                        <td>
                                            <a href="{{ route('rounds.show', $wish->week->round->id) }}">
                                                {{ $wish->week->round->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('wish_index.edit', $wish) }}">
                                                <strong>#{{ $wish->week->number }}</strong>
                                                <span class="text-sm">
                                                    ( {{ date('j F, Y', strtotime($wish->week->start_date)) }}  -
                                                    {{ date('j F, Y', strtotime($wish->week->end_date)) }} )
                                                </span>
                                            </a>
                                        </td>
                                        <td>{{ $wish->property->country }}</td>
                                        <td>{{ $wish->property->name }}</td>
                                        <td>
                                            @if ($wish->status === 'Confirmed')
                                                <span class="right badge badge-success">
                                                    {{ __($wish->status) }}
                                                </span>
                                            @elseif ($wish->status === 'Not confirmed')
                                                <span class="right badge bg-lightblue">
                                                    {{ __($wish->status) }}
                                                </span>
                                            @elseif ($wish->status === 'Failed')
                                                <span class="right badge badge-warning">
                                                    {{ __($wish->status) }}
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
                                    <tr>
                                        <th>{{ __('admin.table_th_wishes_round') }}</th>
                                        <th>{{ __('admin.table_th_wishes_week') }}</th>
                                        <th>{{ __('admin.table_th_wishes_country') }}</th>
                                        <th>{{ __('admin.table_th_wishes_property') }}</th>
                                        <th>{{ __('admin.table_th_wishes_status') }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
