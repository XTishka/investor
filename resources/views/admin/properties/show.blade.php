@extends('layouts.admin.datatables', ['title' => __('Property details')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.property_details" :breadcrumbs="['admin.properties' => 'admin.properties', $property->name => '#']" />

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
                                            class="btn btn-primary mr-1 float-right">
                                            <i class="fas fa-edit"></i>
                                            {{ __('admin.edit') }}
                                        </a>
                                    </h4>
                                </div>

                            </div>

                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>{{ __('admin.country') }}</strong><br>
                                        {{ $property->country }}
                                    </address>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <div class="mb-2">
                                        <strong>{{ __('admin.address') }}</strong><br>
                                        {{ $property->address }}
                                    </div>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <strong>{{ __('admin.description') }}</strong><br>
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
                                                href="{{ route('admin.properties.show', [$property, 'round_id' => $round]) }}">{{ $round->name }}</a>
                                        </li>
                                    @endforeach

                                    <li class="dropdown-divider"></li>
                                    <li class="dropdown-item"><a
                                            href="{{ route('admin.properties.show', [$property, $round]) }}">Current
                                            round</a></li>
                                </ul>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">
                                                    {{ __('admin.week_number') }}</th>
                                                <th class="text-center">
                                                    {{ __('admin.week_start_date') }}</th>
                                                <th class="text-center">
                                                    {{ __('admin.week_end_date') }}</th>
                                                <th class="text-right">
                                                    {{ __('admin.status') }}</th>
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
                                                                {{ __('admin.changes_blocked') }}
                                                            </span>
                                                        @endif
                                                        @livewire('switcher', ['week' => $week, 'propertyId' => $property->id])
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
