@extends('layouts.admin.forms', ['title' => __('admin.administrator_create')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.administrator_create" :breadcrumbs="['admin.administrators' => 'admin.administrators', 'admin.create' => '#']" />

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card title="{{ 'admin.add_new_administrator' }}" form="administrator-create"
                        submitButtonStyle="primary" submitButtonText="admin.create">

                        <form action="{{ route('admin.administrators.store') }}" method="POST" id="administrator-create">
                            @csrf

                            <x-elements.form-input-field id="name" type="text" name="name" label="admin.name"
                                placeholder="{{ __('admin.enter_stockholders_name') }}" value="{{ old('name') }}" />

                            <x-elements.form-input-field id="email" type="email" name="email"
                                label="{{ __('admin.email') }}" placeholder="{{ __('admin.enter_stockholders_email') }}"
                                value="{{ old('email') }}" />

                            <x-elements.form-input-field id="password" type="text" name="password"
                                label="{{ __('admin.password') }}"
                                placeholder="{{ __('admin.enter_stockholders_password') }}Enter stockholders password"
                                value="{{ $random_password }}" />

                            <x-elements.form-checkbox-field id="send_password" name="send_password"
                                label="{{ __('admin.send_password_to_user') }}" />
                    </x-elements.form-card>
                </div>

                <div class="col-md-6">
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
