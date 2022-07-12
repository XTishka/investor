@extends('layouts.admin.forms', ['title' => __('admin.new_stockholder')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="{{ __('admin.new_stockholder') }}" :breadcrumbs="['admin.stockholders' => 'admin.stockholders', 'admin.add_new' => '#']" />

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card title="Add new stockholder" form="create-stockholder" submitButtonStyle="primary"
                        submitButtonText="admin.create">

                        <form action="{{ route('admin.stockholders.store') }}" method="POST" id="create-stockholder">
                            @csrf

                            <x-elements.form-input-field id="name" type="text" name="name" label="admin.name"
                                placeholder="admin.enter_stockholders_name" value="{{ old('name') }}" />

                            <x-elements.form-input-field id="email" type="email" name="email" label="admin.email"
                                placeholder="admin.enter_stockholders_email" value="{{ old('email') }}" />

                            <x-elements.form-input-field id="password" type="text" name="password" label="admin.password"
                                placeholder="admin.enter_stockholders_password" value="{{ $random_password }}" />

                            <x-elements.form-checkbox-field id="send_password" name="send_password"
                                label="admin.send_password_to_stockholder" />

                            <hr class="my-4">

                            <x-elements.form-select-field id="round" name="round" label="admin.add_to_round"
                                :rounds="$rounds" />

                            <x-elements.form-number-field id="available_wishes" name="available_wishes"
                                label="admin.available_wishes" placeholder="admin.enter_wishes_limit"
                                value="{{ old('available_wishes') }}" min="1" max="{{ $propertyQty }}" />
                        </form>

                    </x-elements.form-card>
                </div>

                <div class="col-md-6">
                    <x-elements.form-card title="{{ __('admin.upload_stockholders') }}" form="upload_csv" submitButtonStyle="primary"
                        submitButtonText="admin.upload_csv">

                        <form action="{{ route('admin.stockholders.import') }}" id="upload_csv" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <x-elements.form-select-field id="round" name="round" label="{{ __('admin.upload_to_round') }}"
                                :rounds="$rounds" />

                            <x-elements.form-file-field id="file" name="file" label="{{ __('admin.csv_file') }}"
                                placeholder="{{ __('admin.choose_file') }}" value="{{ old('name') }}" />

                            <x-elements.form-checkbox-field id="send_emails" name="send_emails"
                                label="{{ __('admin.send_emails_to_new_stockholders') }}" />
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
