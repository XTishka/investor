@extends('layouts.admin.datatables')

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

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title d-flex align-items-center mr-auto">
                                    <span>
                                        <i class="fas fa-user-alt mr-2"></i>
                                        <span class="mr-2">{{ $stockholder->name  }}</span>
                                    </span>

                                    <small class="text-md">
                                        <a href="mailto:{{ $stockholder->email }}">< {{ $stockholder->email }} ></a>
                                    </small>
                                </h3>

                                <a href="{{ route('stockholders.edit', $stockholder->id) }}"
                                   class="btn btn-primary btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                    {{ __('admin.button_edit_stockholder') }}
                                </a>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Property name</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th>Is available</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($properties as $property)
                                        <tr>
                                            <td>{{ $property->name }}</td>
                                            <td>{{ $property->country }}</td>
                                            <td>{{ $property->address }}</td>
                                            <td>{{ $property->description }}</td>
                                            <td>{{ $property->is_available }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Property name</th>
                                        <th>Country</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th>Is available</th>
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
