@extends('layouts.admin.datatables')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_show_round') }}</h1>
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
                                <a href="{{ route('admin.rounds') }}">
                                    {{ __('admin.breadcrumbs_rounds_index') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ $round->name }}</li>
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
                                        <i class="fas fa-recycle mr-2"></i> {{ $round->name }}

                                        <a href="{{ route('admin.rounds.edit', $round->id) }}"
                                           class="btn btn-primary btn-sm mr-1 float-right">
                                            <i class="fas fa-edit"></i>
                                            {{ __('admin.button_edit_round') }}
                                        </a>
                                    </h4>
                                </div>

                            </div>

                            <div class="row invoice-info">

                                <div class="col-sm-4 invoice-col">
                                    <strong>Start round
                                        date: </strong>{{ date('j F, Y', strtotime($round->start_round_date)) }}<br>
                                    <strong>End wishes
                                        date: </strong>{{ date('j F, Y', strtotime($round->end_wishes_date)) }}<br>
                                    <strong>End round
                                        date: </strong>{{ date('j F, Y', strtotime($round->end_round_date)) }}<br>
                                    <strong>Weeks QTY: </strong>{{ $weeks->count() }} weeks<br>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <strong>Description</strong><br>
                                    {{ $round->description }}
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

                            <div class="row mt-4">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Week</th>
                                            <th>Week start date</th>
                                            <th>Week end date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($weeks as $week)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $week->number }}</strong></td>
                                                <td>{{ date('j F, Y', strtotime($week->start_date)) }}</td>
                                                <td>{{ date('j F, Y', strtotime($week->end_date)) }}</td>
                                                <td>
                                                    @if ($week->status() === 'passed')
                                                        <span class="right badge bg-gradient-gray">
                                                            {{ $week->status() }}
                                                        </span>
                                                    @elseif($week->status() === 'current')
                                                        <span class="right badge bg-fuchsia">
                                                            {{ $week->status() }}
                                                        </span>
                                                    @elseif($week->status() === 'waiting')
                                                        <span class="right badge badge-info">
                                                            {{ $week->status() }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tr>
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
