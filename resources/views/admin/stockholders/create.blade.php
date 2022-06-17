@extends('layouts.admin.forms')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_create_new_stockholders') }}</h1>
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
                                <a href="{{ route('admin.stockholders') }}">
                                    {{ __('admin.stockholders') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin.create_new') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('admin.card_add_new_stockholder') }}</h3>
                        </div>

                        <form action="{{ route('stockholders.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="name">{{ __('admin.form_stockholder_name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" placeholder="{{ __('admin.form_stockholder_name_placeholder') }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('admin.form_email_address') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="{{ __('admin.form_email_placeholder') }}">

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
                                        placeholder="{{ __('admin.form_password_placeholder') }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="round">{{ __('admin.form_stockholder_round') }}</label>
                                    <select class="custom-select rounded-2 @error('round') is-invalid @enderror" id="round"
                                        name="round">
                                        @foreach ($rounds as $round)
                                            <option value="{{ $round->id }}">{{ $round->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('round')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="available_weeks">{{ __('admin.form_stockholder_available_weeks') }}</label>
                                    <input type="number" min="1" max="5" class="form-control @error('available_weeks') is-invalid @enderror" id="available_weeks"
                                        name="available_weeks" placeholder="{{ __('admin.form_stockholder_available_weeks_placeholder') }}" value="3">

                                    @error('available_weeks')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="send_password" name="send_password">
                                    <label class="form-check-label" for="send_password">
                                        {{ __('admin.form_email_password_to_stockholder') }}
                                    </label>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('admin.form_button_create_stockholder') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('admin.card_upload_csv_stockholders') }}</h3>
                        </div>

                        <form action="{{ route('admin.stockholders.import') }}"  method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="round">{{ __('admin.form_stockholder_round') }}</label>
                                    <select class="custom-select rounded-2 @error('round') is-invalid @enderror" id="round"
                                        name="round">
                                        @foreach ($rounds as $round)
                                            <option value="{{ $round->id }}">{{ $round->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('round')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">{{ __('admin.form_file_input') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                            <label class="custom-file-label"
                                                for="exampleInputFile">{{ __('admin.form_label_choose_file') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label"
                                        for="exampleCheck1">{{ __('admin.form_email_password_to_new_stockholders') }}</label>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit"
                                    class="btn btn-primary">{{ __('admin.button_upload_csv') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
