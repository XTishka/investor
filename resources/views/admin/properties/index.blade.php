@extends('layouts.admin.datatables')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_property_index') }}</h1>
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
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('properties.create') }}" class="btn btn-secondary btn-sm mr-1">
                                        {{ __('admin.button_add_new_properties') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="property_index" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{ __('admin.table_th_property_name') }}</th>
                                        <th>{{ __('admin.table_th_property_country') }}</th>
                                        <th>{{ __('admin.table_th_property_address') }}</th>
                                        <th>{{ __('admin.table_th_property_description') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($properties as $property)
                                    <tr>
                                        <td>
                                            <a href="{{ route('properties.show', $property->id) }}">
                                                {{ $property->name }}
                                            </a>
                                        </td>
                                        <td>{{ $property->country }}</td>
                                        <td>{{ $property->address }}</td>
                                        <td>{{ $property->description }}</td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>{{ __('admin.table_th_property_name') }}</th>
                                        <th>{{ __('admin.table_th_property_country') }}</th>
                                        <th>{{ __('admin.table_th_property_address') }}</th>
                                        <th>{{ __('admin.table_th_property_description') }}</th>
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
