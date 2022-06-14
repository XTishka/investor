@extends('layouts.admin.datatables')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_show_property') }}</h1>
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
                                <a href="{{ route('admin.properties') }}">
                                    {{ __('admin.properties') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ $property->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="invoice p-3 mb-3">

                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-home mr-2"></i> {{ $property->name }}

                                        <a href="{{ route('admin.properties.edit', $property->id) }}"
                                            class="btn btn-primary btn-sm mr-1 float-right">
                                            <i class="fas fa-edit"></i>
                                            {{ __('admin.button_edit_property') }}
                                        </a>
                                    </h4>
                                </div>

                            </div>

                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>Country</strong><br>
                                        {{ $property->country }}
                                    </address>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <div class="mb-2">
                                        <strong>Address</strong><br>
                                        {{ $property->address }}
                                    </div>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <strong>Description</strong><br>
                                    {{ $property->description }}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="invoice p-3 mb-3">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ $round->name }}
                                </button>

                                <ul class="dropdown-menu" style="">
                                    @foreach ($rounds as $round)
                                        <li class="dropdown-item"><a
                                                href="{{ route('admin.properties.show', [$property, $round]) }}">{{ $round->name }}</a>
                                        </li>
                                    @endforeach

                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a href="{{ route('admin.properties.show', [$property, $round]) }}">Current
                                            round</a></li>
                                </ul>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">
                                                    {{ __('admin.table_th_availability_week_number') }}</th>
                                                <th class="text-center">
                                                    {{ __('admin.table_th_availability_week_start_date') }}</th>
                                                <th class="text-center">
                                                    {{ __('admin.table_th_availability_week_end_date') }}</th>
                                                <th class="text-right">
                                                    {{ __('admin.table_th_availability_week_status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($weeks as $week)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-center"><strong>{{ $week->number }}</strong></td>
                                                    <td class="text-center">
                                                        {{ date('j F, Y', strtotime($week->start_date)) }}</td>
                                                    <td class="text-center">
                                                        {{ date('j F, Y', strtotime($week->end_date)) }}</td>
                                                    <td class="text-right">
                                                        @if ($week->hasWishes($week->id, $property->id) == true)
                                                            <span class="right badge badge-danger">
                                                                {{ __('admin.table_availability_badge_blocked') }}
                                                            </span>
                                                        @endif
                                                        <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on"
                                                            style="width: 86px;">
                                                            @if ($week->availibility($week->id, $property->id) == true)
                                                                <a href="{{ route('admin.disable_week', ['week_id' => $week->id, 'property_id' => $property->id]) }}"
                                                                    class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate"
                                                                    style="width: 86px;">
                                                                    <div class="bootstrap-switch-container"
                                                                        style="width: 126px; margin-left: 0px;"><span
                                                                            class="bootstrap-switch-handle-on bootstrap-switch-success"
                                                                            style="width: 42px;">ON</span><span
                                                                            class="bootstrap-switch-label"
                                                                            style="width: 42px;">&nbsp;</span><span
                                                                            class="bootstrap-switch-handle-off bootstrap-switch-danger"
                                                                            style="width: 42px;">OFF</span><input
                                                                            type="checkbox" name="my-checkbox" checked=""
                                                                            data-bootstrap-switch="" data-off-color="danger"
                                                                            data-on-color="success"></div>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('admin.enable_week', ['week_id' => $week->id, 'property_id' => $property->id]) }}"
                                                                    class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off"
                                                                    style="width: 86px;">
                                                                    <div class="bootstrap-switch-container"
                                                                        style="width: 126px; margin-left: -42px;"><span
                                                                            class="bootstrap-switch-handle-on bootstrap-switch-success"
                                                                            style="width: 42px;">ON</span><span
                                                                            class="bootstrap-switch-label"
                                                                            style="width: 42px;">&nbsp;</span><span
                                                                            class="bootstrap-switch-handle-off bootstrap-switch-danger"
                                                                            style="width: 42px;">OFF</span><input
                                                                            type="checkbox" name="my-checkbox" checked=""
                                                                            data-bootstrap-switch="" data-off-color="danger"
                                                                            data-on-color="success"></div>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
