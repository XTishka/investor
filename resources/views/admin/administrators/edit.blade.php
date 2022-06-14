@extends('layouts.admin.forms')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_edit_administrator') }}</h1>
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
                                <a href="{{ route('admin.administrators') }}">
                                    {{ __('admin.administratrators') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.administrators') }}">
                                    {{ $administrator->name }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin.breadcrumbs_edit_administrator') }}</li>
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
                                <i class="fas fa-user-alt mr-2"></i>
                                <span class="mr-2">{{ $administrator->name  }}</span>
                            </h3>
                            <a href="{{ route('admin.administrators') }}">
                                <i class="fas fa-chevron-left"></i>
                                Back
                            </a>
                        </div>


                        <div class="card-body">
                            <form id="administrator-form" action="{{ route('administrators.update', $administrator->id) }}"
                                  method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">{{ __('admin.form_administrator_name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name"
                                           placeholder="{{ __('admin.form_administrator_name_placeholder') }}"
                                           value="{{ $administrator->name }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('admin.form_email_address') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email"
                                           placeholder="{{ __('admin.form_email_placeholder') }}"
                                           value="{{ $administrator->email }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('admin.form_password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password"
                                           placeholder="{{ __('admin.form_password_placeholder') }}"
                                           value="{{ $administrator->password }}">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="send_password"
                                           name="send_password">
                                    <label class="form-check-label" for="send_password">
                                        {{ __('admin.form_email_password_to_administrator') }}
                                    </label>
                                </div>

                            </form>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" form="administrator-form">
                                {{ __('admin.form_button_save') }}
                            </button>

                            <form action="{{ route('administrators.destroy', $administrator) }}" method="POST" class="float-right">
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
