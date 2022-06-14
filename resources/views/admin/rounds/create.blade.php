@extends('layouts.admin.forms')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_create_new_round') }}</h1>
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
                                <a href="{{ route('admin.rounds') }}">
                                    {{ __('admin.breadcrumbs_rounds_index') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin.breadcrumbs_create_round') }}</li>
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
                            <h3 class="card-title">{{ __('admin.card_title_add_new_round') }}</h3>
                        </div>

                        <form action="{{ route('rounds.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                        </button>
                                        <h5><i class="icon fas fa-ban"></i> ERROR!</h5>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="name">{{ __('admin.form_field_round_name') }}</label>
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('admin.form_field_round_name_placeholder') }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('admin.form_field_round_range') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>

                                        <input type="hidden" id="start_round_date" name="start_round_date"
                                               value="{{ old('start_round_date') }}">

                                        <input type="hidden" id="end_round_date" name="end_round_date"
                                               value="{{ old('end_round_date') }}">

                                        <input type="text"
                                               id="round_range"
                                               name="round_range"
                                               value="{{ old('round_range') }}"
                                               class="form-control float-right
                                                   @error('round_range') is-invalid @enderror
                                                   @error('start_round_date') is-invalid @enderror
                                                   @error('end_round_date') is-invalid @enderror"
                                               onchange="getRangeDates()">
                                    </div>

                                    @error('round_range')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @error('start_round_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @error('end_round_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <script>
                                    getRangeDates();

                                    function getRangeDates() {
                                        let date_range_input = document.getElementById("round_range");
                                        let date_range = date_range_input.value.split(' - ');
                                        console.log(date_range);

                                        let start_date = date_range[0];
                                        let end_date = date_range[1];
                                        console.log(start_date);
                                        console.log(end_date);

                                        document.getElementById('start_round_date').value = start_date;
                                        document.getElementById('end_round_date').value = end_date;
                                    }
                                </script>

                                <div class="form-group">
                                    <label
                                        for="end_wishes_date">{{ __('admin.form_field_round_end_wishes_date') }}</label>
                                    <div class="input-group date" id="end_wishes_date" data-target-input="nearest">
                                        <div class="input-group-prepend" data-target="#end_wishes_date"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-calendar-times"></i></div>
                                        </div>
                                        <input type="text"
                                               id="end_wishes_date"
                                               name="end_wishes_date"
                                               value="{{ old('end_wishes_date') }}"
                                               class="form-control datetimepicker-input @error('end_wishes_date') is-invalid @enderror"
                                               data-target="#end_wishes_date"
                                               placeholder="{{ __('admin.form_field_round_end_wishes_date_placeholder') }}">
                                    </div>

                                    @error('end_wishes_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="max_wishes">{{ __('admin.form_field_round_max_wishes') }}</label>
                                    <input type="text"
                                           id="max_wishes"
                                           name="max_wishes"
                                           value="{{ old('max_wishes') }}"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('admin.form_field_round_max_wishes_placeholder') }}">

                                    @error('max_wishes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('admin.form_field_round_description') }}</label>
                                    <textarea id="description" name="description"
                                              class="form-control @error('description') is-invalid @enderror" rows="3"
                                              placeholder="{{ __('admin.form_field_round_description_placeholder') }}">{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('admin.button_create_round') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </section>
    </div>
@endsection
