@extends('layouts.admin.dashboard', ['title' => __('admin.dashboard')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header :title="__('admin.dashboard')" />

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
                                            @foreach ($rounds as $dropdownItem)
                                                <li class="dropdown-item">
                                                    <a
                                                        href="{{ route('admin.dashboard', ['round_id' => $dropdownItem->id]) }}">
                                                        {{ $dropdownItem->name }}
                                                    </a>
                                                </li>
                                            @endforeach

                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item">
                                                <a href="{{ route('admin.dashboard') }}">Current round</a>
                                            </li>
                                        </ul>
                                    </div>


                                    <div id="upload_csv">
                                        <a href="{{ route('admin.dashboard.distribute', $round) }}" class="btn btn-secondary btn mr-1">
                                            {{ __('admin.automatic_distribution') }}
                                        </a>
                                        <a href="{{ route('admin.dashboard.export', ['round_id' => $round->id, 'round_name' => $round->name]) }}" class="btn btn-secondary btn mr-1">
                                            {{ __('admin.download_csv') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dashboard_distributions" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30" >{{ __('admin.priority') }}</th>
                                            <th>{{ __('admin.stockholder') }}</th>
                                            @foreach ($weeks as $week)
                                                <th>{{ __('admin.week') }}&nbsp;{{ $week->number }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($priorities as $priority)
                                            @if ($priority->user->is_admin == 0)
                                                <tr>
                                                    <td>{{ $priority->priority }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.stockholders.show', $priority->user->id) }}">
                                                            {{ $priority->user->name }}
                                                        </a>
                                                    </td>
                                                    @foreach ($weeks as $week)
                                                        <td>
                                                            @php
                                                                $stockholderWishes = $wishes
                                                                    ->where('week_id', $week->id)
                                                                    ->where('user_id', $priority->user->id)
                                                                    ->get();
                                                            @endphp
                                                            @foreach ($stockholderWishes as $wish)
                                                                @php
                                                                    $wishStatus = 'danger';
                                                                    if ($wish->status == 'Not confirmed') {
                                                                        $wishStatus = 'secondary';
                                                                    }
                                                                    if ($wish->status == 'Confirmed') {
                                                                        $wishStatus = 'success';
                                                                    }
                                                                    if ($wish->status == 'Failed') {
                                                                        $wishStatus = 'warning';
                                                                    }
                                                                @endphp

                                                                <a href="{{ route('admin.wishes.edit', $wish->id) }}"
                                                                    class="badge badge-{{ $wishStatus }} w-100">
                                                                    {!! $wish->property->name !!}
                                                                </a>
                                                            @endforeach
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th width="30" >{{ __('admin.priority') }}</th>
                                            <th>{{ __('admin.stockholder') }}</th>
                                            @foreach ($weeks as $week)
                                                <th>{{ __('admin.week') }}&nbsp;{{ $week->number }}</th>
                                            @endforeach
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@push('scripts')
    <script>
        $(function() {
            $('#dashboard_distributions').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "lenght:": false,
                "info": true,
                "autoWidth": false,
                "responsive": false,
                "scrollX": true,
            });
        });
    </script>
@endpush
