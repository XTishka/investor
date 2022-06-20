@extends('layouts.admin.forms', ['title' => 'Edit property'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_edit_property') }}</h1>
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
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.properties.show', [$property, $round]) }}">
                                    {{ $property->name }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin.breadcrumbs_edit_property') }}</li>
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
                                <i class="fas fa-laptop-house mr-2"></i>
                                <span class="mr-2">{{ $property->name  }}</span>
                            </h3>
                            <a href="{{ route('admin.properties.show', [$property, $round]) }}">
                                <i class="fas fa-chevron-left"></i>
                                Back
                            </a>
                        </div>


                        <div class="card-body">
                            <form action="{{ route('admin.properties.update', $property) }}" method="POST" id="property-edit">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">{{ __('admin.form_field_property_name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ $property->name }}"
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
                                           id="country" name="country" value="{{ $property->country }}"
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
                                           id="address" name="address" value="{{ $property->address }}"
                                           placeholder="{{ __('admin.form_field_property_address_placeholder') }}">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('admin.form_field_property_description') }}</label>
                                    <textarea id="description" name="description"
                                              class="form-control @error('description') is-invalid @enderror" rows="3"
                                              placeholder="{{ __('admin.form_field_property_description_placeholder') }}">{{ $property->description }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </form>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" form="property-edit">
                                {{ __('admin.button_save_property') }}
                            </button>

                            <form action="{{ route('admin.properties.delete', $property) }}" method="POST"
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
