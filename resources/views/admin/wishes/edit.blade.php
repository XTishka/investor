@extends('layouts.admin.forms')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_edit_wish') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-capitalize">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="nav-icon fas fa-tachometer-alt text-sm mr-2"></i>
                                    {{ __('admin.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Wish #{{ __('admin.breadcrumbs_edit_wish') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <div class="card card-secondary">

                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title mr-auto pt-1">
                                <i class="fas fa-star-half-alt mr-2"></i>
                                <span>Week: {{ $wish->week->number }}</span>
                            </h3>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-chevron-left"></i>
                                Back
                            </a>
                        </div>


                        <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                        <h5><i class="icon fas fa-ban"></i> ERROR!</h5>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
 
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $wish->user->name }}" disabled>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-arrow-up"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="Priority: {{ $priority->where('user_id', $wish->user->id)->where('round_id', $wish->week->round->id)->value('priority') }}" disabled>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-laptop-house"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $wish->property->name }} ({{ $wish->property->country }})" disabled>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="nav-icon fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ date('j F, Y', strtotime($wish->week->start_date)) }} - {{ date('j F, Y', strtotime($wish->week->end_date)) }}" disabled>
                                </div>
                                <form action="{{ route('wish_index.update', $wish) }}" method="POST" id="wish-edit">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="nav-icon fas fa-calendar-check"></i></span>
                                        </div>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Not confirmed" {{ $wish->status == 'Not confirmed' ? 'selected' : '' }}>{{ __('Not confirmed') }}</option>
                                            <option value="Confirmed" {{ $wish->status == 'Confirmed' ? 'selected' : '' }}>{{ __('Confirmed') }}</option>
                                            <option value="Failed" {{ $wish->status == 'Failed' ? 'selected' : '' }}>{{ __('Failed') }}</option>
                                        </select>
                                    </div>
                                </form>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" form="wish-edit">
                                {{ __('admin.button_save_round') }}
                            </button>

                            <form action="#" method="POST"
                                  class="float-right">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('{{ __('Are you sure?') }}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>


        </section>
    </div>
@endsection
