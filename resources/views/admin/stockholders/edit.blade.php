@extends('layouts.admin.forms', ['title' => __('Stockholder details')])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <x-elements.page-header title="{{ __('Edit stockholder') }}" :breadcrumbs="['Stockholders' => 'admin.stockholders', 'Edit' => '#']" />

        <section class="content">

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

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card title="Add new stockholder" form="update-stockholder" submitButtonStyle="primary"
                        submitButtonText="Update">

                        <form action="{{ route('admin.stockholders.update', $stockholder) }}" method="POST"
                            id="update-stockholder">
                            @csrf
                            @method('PUT')

                            <x-elements.form-input-field id="name" type="text" name="name" label="Name"
                                placeholder="Enter stockholders name" value="{{ $stockholder->name }}" />

                            <x-elements.form-input-field id="email" type="email" name="email" label="Email"
                                placeholder="Enter stockholders email" value="{{ $stockholder->email }}" />
                        </form>

                    </x-elements.form-card>
                </div>

                <div class="col-md-6">

                    <x-elements.form-card title="Available weeks per property" form="update-available-weeks"
                        submitButtonStyle="primary" submitButtonText="Update">

                        <form action="{{ route('admin.stockholders.update-available-weeks', $stockholder) }}" method="POST"
                            id="update-available-weeks">
                            @csrf
                            @method('PUT')

                            <input name="stockholder_id" type="hidden" value="{{ $stockholder->id }}">

                            @foreach ($rounds as $round)
                                @php
                                    $roundEndWishDate = \Carbon\Carbon::parse($round->end_wishes_date);
                                    $today = \Carbon\Carbon::today()->toDateString();
                                    $disabled = $roundEndWishDate->gt($today) == false ? 'true' : 'false';
                                @endphp

                                <x-elements.form-number-field id="{{ 'round_' .$round->id }}" name="{{ 'round_' . $round->id }}"
                                    label="{{ $round->name }}" placeholder="Enter weeks limit for one property"
                                    value="{{ $priorities->where('round_id', $round->id)->value('available_weeks') }}"
                                    min="1" max="{{ $round->max_wishes }}" :disabled="$disabled" />
                            @endforeach
                        </form>

                    </x-elements.form-card>
                </div>
            </div>

        </section>
    </div>
@endsection
