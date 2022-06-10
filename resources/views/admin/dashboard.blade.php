@extends('layouts.admin.dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
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
                                            @foreach ($rounds as $dropdownItem)
                                                <li class="dropdown-item"><a
                                                        href="{{ route('admin.dashboard', ['round_id' => $dropdownItem->id]) }}">{{ $dropdownItem->name }}</a>
                                                </li>
                                            @endforeach

                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item">
                                                <a href="{{ route('admin.dashboard') }}">Current round</a>
                                            </li>
                                        </ul>
                                    </div>


                                    <div id="upload_csv">
                                        <a href="#" class="btn btn-secondary btn mr-1">
                                            Upload CSV
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dashboard_distributions_alt" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30">{{ __('admin.table_th_dashboard_priority') }}</th>
                                            <th>{{ __('admin.table_th_dashboard_stockholders') }}</th>
                                            @foreach ($weeks as $week)
                                                <th>Week&nbsp;{{ $week->number }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($priorities as $priority)
                                            @if ($priority->user->is_admin == 0)
                                                <tr>
                                                    <td>{{ $priority->priority }}</td>
                                                    <td>
                                                        <a href="{{ route('stockholders.show', $priority->user->id) }}">
                                                            {{ $priority->user->name }}
                                                        </a>
                                                    </td>
                                                    @foreach ($weeks as $week)
                                                        <td>
                                                            @foreach ($wishes->query()
                                                                        ->where('week_id', $week->id)
                                                                        ->where('user_id', $priority->user->id)
                                                                        ->get() as $wish)
                                                                
                                                                @php
                                                                    $wishStatus = 'danger';
                                                                    if ($wish->status == 'Not confirmed') $wishStatus = 'secondary';
                                                                    if ($wish->status == 'Confirmed') $wishStatus = 'success';
                                                                    if ($wish->status == 'Failed') $wishStatus = 'warning';
                                                                @endphp

                                                                <a href="{{ route('wish_index.edit', $wish->id) }}" class="badge badge-{{ $wishStatus }} w-100">
                                                                    {{ $wish->property->name }}
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
                                            <th width="30">{{ __('admin.table_th_dashboard_priority') }}</th>
                                            <th>{{ __('admin.table_th_dashboard_stockholders') }}</th>
                                            @foreach ($weeks as $week)
                                                <th>Week&nbsp;{{ $week->number }}</th>
                                            @endforeach
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
                                                <li class="dropdown-item"><a
                                                        href="{{ route('admin.dashboard', ['round_id' => $dropdownItem->id]) }}">{{ $dropdownItem->name }}</a>
                                                </li>
                                            @endforeach

                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item">
                                                <a href="{{ route('admin.dashboard') }}">Current round</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-flex bg-gray rounded-sm" style="align-items: center;">
                                        <span class="mx-4 text-mutted"
                                            style="color: rgba(255, 255, 255, 0.75);">Download:</span>
                                        <div id="downloads" class="bg-gray mr-2 pl-2"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dashboard_distributions" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                            Rendering engine</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Browser: activate to sort column ascending">Browser</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">Platform(s)</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Engine version: activate to sort column ascending">Engine version</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="CSS grade: activate to sort column ascending">CSS grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td>1.9</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Camino 1.5</td>
                                        <td>OSX.3+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Netscape 7.2</td>
                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Netscape Browser 8</td>
                                        <td>Win 98SE+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Netscape Navigator 9</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1 dtr-control">Gecko</td>
                                        <td>Mozilla 1.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1</td>
                                        <td>A</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Rendering engine</th>
                                        <th rowspan="1" colspan="1">Browser</th>
                                        <th rowspan="1" colspan="1">Platform(s)</th>
                                        <th rowspan="1" colspan="1">Engine version</th>
                                        <th rowspan="1" colspan="1">CSS grade</th>
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
                "buttons": ["copy", "csv", "excel"]
            }).buttons().container().appendTo('#downloads');

            $('#dashboard_distributions_alt').DataTable({
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
