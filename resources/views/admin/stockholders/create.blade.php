@extends('layouts.admin.forms')

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="{{ __('Create/Import new stockholders') }}" :breadcrumbs="['Stockholders' => 'admin.stockholders', 'Create - Import' => '#']" />

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card title="Add new stockholder" form="create-stockholder" submitButtonStyle="primary"
                        submitButtonText="Create">

                        <form action="{{ route('admin.stockholders.store') }}" method="POST" id="create-stockholder">
                            @csrf

                            <x-elements.form-input-field id="name" type="text" name="name" label="Name"
                                placeholder="Enter stockholders name" value="{{ old('name') }}" />

                            <x-elements.form-input-field id="email" type="email" name="email" label="Email"
                                placeholder="Enter stockholders email" value="{{ old('email') }}" />

                            <x-elements.form-input-field id="password" type="password" name="password" label="Password: {{ $random_password }}"
                                placeholder="Enter stockholders password" value="{{ $random_password }}" />

                            <x-elements.form-checkbox-field id="send_password" name="send_password"
                                label="Send password to stockholder" />

                            <hr class="my-4">

                            <x-elements.form-select-field id="round" name="round" label="Add to round"
                                :rounds="$rounds" />

                            <x-elements.form-number-field id="available_weeks" name="available_weeks"
                                label="Available weeks" placeholder="Enter weeks limit for one property"
                                value="{{ old('available_weeks') }}" min="2" max="5" />
                        </form>

                    </x-elements.form-card>
                </div>

                <div class="col-md-6">
                    <x-elements.form-card title="Add new stockholder" form="upload_csv" submitButtonStyle="primary"
                        submitButtonText="Upload CSV">

                        <form action="{{ route('admin.stockholders.import') }}" id="upload_csv" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <x-elements.form-select-field id="round" name="round" label="Upload to round"
                                :rounds="$rounds" />

                            <x-elements.form-file-field id="file" name="file" label="CSV file"
                                placeholder="Choose file" value="{{ old('name') }}" />

                            <x-elements.form-checkbox-field id="send_password" name="send_password"
                                label="Send password to new stockholders" />
                        </form>

                    </x-elements.form-card>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> {{ __('Alert') }}!</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
