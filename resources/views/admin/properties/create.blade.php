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

                    <x-elements.form-card title="Add new property" form="create-property" submitButtonStyle="primary"
                        submitButtonText="Create">

                        <form action="{{ route('admin.properties.store') }}" method="POST" id="create-property">
                            @csrf

                            <x-elements.form-input-field id="name" type="text" name="name" label="Name"
                                placeholder="Enter property name" value="{{ old('name') }}" />

                            <x-elements.form-input-field id="country" type="text" name="country" label="Country"
                                placeholder="Enter property country" value="{{ old('country') }}" />

                            <x-elements.form-input-field id="address" type="text" name="address" label="Address"
                                placeholder="Enter property address" value="{{ old('address') }}" />

                            <x-elements.form-textarea-field id="description" name="description" label="Description"
                                placeholder="Enter property description" rows="3" value="{{ old('description') }}" />

                        </form>

                    </x-elements.form-card>

                </div>

                <div class="col-md-6">

                    <x-elements.form-card title="Upload CSV with properties" form="import-properties"
                        submitButtonStyle="primary" submitButtonText="Upload CSV">

                        <form action="{{ route('admin.properties.import') }}" method="POST" id="import-properties"
                            enctype="multipart/form-data">
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
