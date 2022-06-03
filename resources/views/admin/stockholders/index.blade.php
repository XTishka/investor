@extends('layouts.admin.datatables')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_stockholders_index') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-capitalize">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="nav-icon fas fa-tachometer-alt text-sm mr-2"></i>
                                    {{ __('admin.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin.stockholders') }}</li>
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2>{{ __('admin.header_all_stockholders') }}</h2>
                                    <div>
                                        <a href="{{ route('stockholders.create') }}" class="btn btn-secondary btn-sm mr-1">
                                            {{ __('admin.button_add_new_stockholders') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="text-capitalize">
                                        <th>{{ __('admin.stockholders') }}</th>
                                        <th>{{ __('admin.email') }}</th>
                                        <th>{{ __('admin.user_type') }}</th>
                                        <th>{{ __('admin.status') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($stockholders as $stockholder)
                                        <tr>
                                            <td>
                                                <a href="{{ route('stockholders.show', $stockholder->id) }}">
                                                    {{ $stockholder->name }}
                                                </a>
                                            </td>
                                            <td>{{ $stockholder->email }}</td>
                                            <td>
                                                @if ($stockholder->is_admin === 1)
                                                    {{ __('admin.administrator') }}
                                                @else
                                                    {{ __('admin.stockholder') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($stockholder->status === 1)
                                                    <span class="right badge badge-success">
                                                        {{ __('admin.active') }}
                                                    </span>
                                                @else
                                                    <span class="right badge badge-danger">
                                                        {{ __('admin.deactivated') }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr class="text-capitalize">
                                        <th>{{ __('admin.stockholders') }}</th>
                                        <th>{{ __('admin.email') }}</th>
                                        <th>{{ __('admin.user_type') }}</th>
                                        <th>{{ __('admin.status') }}</th>
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
