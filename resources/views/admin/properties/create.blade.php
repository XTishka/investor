@extends('layouts.admin.forms', ['title' => __('New property')])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_create_new_property') }}</h1>
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
                            <li class="breadcrumb-item active">{{ __('admin.breadcrumbs_create_property') }}</li>
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
                            <h3 class="card-title">{{ __('admin.card_title_add_new_property') }}</h3>
                        </div>

                        <form action="{{ route('admin.properties.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">{{ __('admin.form_field_property_name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}"
                                        placeholder="{{ __('admin.form_field_property_name_placeholder') }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="country">{{ __('admin.form_field_property_country') }}</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror"
                                        id="country" name="country" value="{{ old('country') }}"
                                        placeholder="{{ __('admin.form_field_property_country_placeholder') }}">

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">{{ __('admin.form_field_property_address') }}</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}"
                                        placeholder="{{ __('admin.form_field_property_address_placeholder') }}">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('admin.form_field_property_description') }}</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                        rows="3" placeholder="{{ __('admin.form_field_property_description_placeholder') }}">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('admin.button_create_property') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">

                    <x-elements.form-card title="Upload CSV with properties"
                        form="create-priorities" submitButtonStyle="primary" submitButtonText="Upload CSV">

                        <form action="{{ route('admin.properties.import') }}" method="POST" id="create-priorities" enctype="multipart/form-data">
                            @csrf

                            <x-elements.form-file-field id="file" name="file" label="CSV file"
                            placeholder="Choose file" value="{{ old('name') }}" />

                        </form>

                    </x-elements.form-card>
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
