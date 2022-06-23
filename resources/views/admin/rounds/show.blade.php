@extends('layouts.admin.datatables', ['title' => __('Round details')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.round_details" :breadcrumbs="['admin.rounds' => 'admin.rounds', $round->name => '#']" />

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
                                            class="btn btn-primary mr-1 float-right">
                                            <i class="fas fa-edit"></i>
                                            {{ __('admin.edit') }}
                                        </a>
                                    </h4>
                                </div>

                            </div>

                            <div class="row invoice-info">

                                <div class="col-sm-4 invoice-col">
                                    <strong>{{ __('admin.end_wishes_date') }}: </strong>
                                    {{ date('j F, Y', strtotime($round->end_wishes_date)) }}<br>

                                    <strong>{{ __('admin.start_round_date') }}: </strong>
                                    {{ date('j F, Y', strtotime($round->start_round_date)) }}<br>

                                    <strong>{{ __('admin.end_round_date') }}: </strong>
                                    {{ date('j F, Y', strtotime($round->end_round_date)) }}<br>

                                    <strong>{{ __('admin.weeks_qty') }}: </strong>
                                    {{ $weeks->count() }} {{ __('admin.weeks') }}<br>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <strong>{{ __('admin.description') }}</strong><br>
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
                                                <th>{{ __('admin.week_number') }}</th>
                                                <th>{{ __('admin.week_start_date') }}</th>
                                                <th>{{ __('admin.week_end_date') }}</th>
                                                <th>{{ __('admin.status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($weeks as $week)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><strong>{{ $week->number }}</strong></td>
                                                    <td>{{ date('j F, Y', strtotime($week->start_date)) }}</td>
                                                    <td>{{ date('j F, Y', strtotime($week->end_date)) }}</td>
                                                    <td>
                                                        @if ($week->status() === 'passed')
                                                            <span class="right badge bg-gradient-gray">
                                                                {{ __('admin.' . $week->status()) }}
                                                            </span>
                                                        @elseif($week->status() === 'current')
                                                            <span class="right badge bg-fuchsia">
                                                                {{ __('admin.' . $week->status()) }}
                                                            </span>
                                                        @elseif($week->status() === 'waiting')
                                                            <span class="right badge badge-info">
                                                                {{ __('admin.' . $week->status()) }}
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
