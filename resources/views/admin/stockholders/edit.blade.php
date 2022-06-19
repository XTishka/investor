@extends('layouts.admin.forms')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <x-elements.page-header title="{{ __('Edit stockholder') }}" :breadcrumbs="['Stockholders' => 'admin.stockholders', 'Edit' => '#']" />

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card title="Add new stockholder" form="update-stockholder" submitButtonStyle="primary"
                        submitButtonText="Update">

                        <form action="{{ route('admin.stockholders.update', $stockholder) }}" method="POST" id="update-stockholder">
                            @csrf
                            @method('PUT')

                            <x-elements.form-input-field id="name" type="text" name="name" label="Name"
                                placeholder="Enter stockholders name" value="{{ $stockholder->name }}" />

                            <x-elements.form-input-field id="email" type="email" name="email" label="Email"
                                placeholder="Enter stockholders email" value="{{ $stockholder->email }}" />

                            <hr class="my-4">

                            <x-elements.form-select-field id="round" name="round" label="Add to round"
                                :rounds="$rounds" />

                            <x-elements.form-number-field id="available_weeks" name="available_weeks"
                                label="Available weeks" placeholder="Enter weeks limit for one property"
                                value="{{ old('available_weeks') }}" min="1" max="20" />
                        </form>

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
