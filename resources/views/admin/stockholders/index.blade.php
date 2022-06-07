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
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            {{ $round->name  }}
                                        </button>

                                        <ul class="dropdown-menu" style="">
                                            @foreach ($rounds as $round)
                                                <li class="dropdown-item"><a href="{{ route('admin.stockholders', ['round_id' => $round->id]) }}">{{ $round->name }}</a></li>
                                            @endforeach

                                        <li class="dropdown-divider"></li>
                                        <li class="dropdown-item"><a href="{{ route('admin.stockholders') }}">Current round</a></li>
                                        </ul>
                                    </div>
                                
                                    <div>
                                        <a href="{{ route('stockholders.create') }}" class="btn btn-secondary btn-sm mr-1">
                                            {{ __('admin.button_add_new_stockholders') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="priority_index" class="table table-bordered table-striped">
                                    <thead>
                                    <tr class="text-capitalize">
                                        <th>{{ __('admin.table_th_stockholder_priority') }}</th>
                                        <th>{{ __('admin.stockholders') }}</th>
                                        <th>{{ __('admin.email') }}</th>
                                        <th>{{ __('admin.status') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody id="stockholders-index">

                                    @foreach($stockholders as $stockholder)
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>
                                                        {{  $stockholder->priority }}
                                                    </span>
                                                    <div>
                                                        @if ($stockholder->priority > 1)
                                                        <button class="priority-up btn-sm btn-primary mr-2" 
                                                            data-user_id="{{ $stockholder->id }}" 
                                                            data-round_id="{{ $stockholder->round_id }}">
                                                            <i class="fas fa-arrow-up"></i>
                                                        </button>
                                                        @endif
                                                        
                                                        @if ($stockholder->priority < $maxPriority)
                                                        <button class="priority-down btn-sm btn-primary" 
                                                            data-user_id="{{ $stockholder->id }}" 
                                                            data-round_id="{{ $stockholder->round_id }}">
                                                            <i class="fas fa-arrow-down"></i>
                                                        </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('stockholders.show', $stockholder->id) }}">
                                                    {{ $stockholder->name }}
                                                </a>
                                            </td>
                                            <td>{{ $stockholder->email }}</td>
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
                                        <th>{{ __('admin.table_th_stockholder_priority') }}</th>
                                        <th>{{ __('admin.stockholders') }}</th>
                                        <th>{{ __('admin.email') }}</th>
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
