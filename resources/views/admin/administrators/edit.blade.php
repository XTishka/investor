@extends('layouts.admin.forms', ['title' => __('admin.administrator_edit')])

@section('content')
    
    <div class="content-wrapper">

        <x-elements.page-header title="admin.administrator_edit" :breadcrumbs="['admin.administrators' => 'admin.administrators', 'admin.edit' => '#']" />

        <section class="content">

            <div class="row">

                <div class="col-md-6">

                    <x-elements.form-card title="{{ $administrator->name }}" form="administrator-update"
                        submitButtonStyle="primary" submitButtonText="admin.save">

                        <form action="{{ route('admin.administrators.update', $administrator->id) }}" method="POST" id="administrator-update">
                            @csrf
                            @method('PUT')

                            <x-elements.form-input-field id="name" type="text" name="name" label="admin.name"
                                placeholder="{{ __('admin.enter_administrators_name') }}" :value="$administrator->name" />

                            <x-elements.form-input-field id="email" type="email" name="email"
                                label="{{ __('admin.email') }}" placeholder="{{ __('admin.enter_administrators_email') }}"
                                :value="$administrator->email" />
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
