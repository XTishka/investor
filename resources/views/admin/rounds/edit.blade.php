@extends('layouts.admin.forms', ['title' => __('Edit round')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.round_edit" :breadcrumbs="['admin.rounds' => 'admin.rounds', 'admin.edit' => '#']" />

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card :title="$round->name" form="round-edit" submitButtonStyle="primary"
                        submitButtonText="admin.save">

                        <form action="{{ route('admin.rounds.update', $round) }}" method="POST" id="round-edit">
                            @csrf
                            @method('PUT')

                            <x-elements.form-input-field id="name" type="text" name="name" label="admin.name"
                                placeholder="{{ __('admin.enter_round_name') }}" :value="$round->name" />

                            <div class="form-group row">
                                <label for="end_wishes_date" class="col-sm-3 col-form-label">
                                    {{ __('admin.end_wishes_date') }}
                                </label>

                                <div class="input-group date col-sm-9" id="end_wishes_date" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#end_wishes_date"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-calendar-times"></i></div>
                                    </div>
                                    <input type="text" id="end_wishes_date" name="end_wishes_date"
                                        value="{{ $round->end_wishes_date }}"
                                        class="form-control datetimepicker-input"
                                        data-target="#end_wishes_date"
                                        placeholder="{{ __('admin.enter_wishes_end_date') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">{{ __('admin.round_range') }}</label>
                                <div class="input-group  date col-sm-9">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>

                                    <input type="hidden" id="start_round_date" name="start_round_date"
                                        value="{{ $round->start_round_date }}">

                                    <input type="hidden" id="end_round_date" name="end_round_date"
                                        value="{{ $round->end_round_date }}">

                                    <input type="text" id="round_range" name="round_range"
                                        value="{{ $round->start_round_date }} - {{ $round->end_round_date }}"
                                        class="form-control float-right"
                                        onchange="getRangeDates()">
                                </div>
                            </div>

                            <x-elements.form-input-field id="max_wishes" type="text" name="max_wishes" label="admin.max_wishes"
                                placeholder="{{ __('admin.enter_max_wishes_for_round') }}" :value="20" />

                            <x-elements.form-textarea-field id="description" name="description" label="admin.description"
                                placeholder="{{ __('admin.enter_property_descriprion') }}" rows="3"
                                :value="$round->description" />

                        </form>

                    </x-elements.form-card>

                </div>

                <div class="col-md-6">
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
                </div>

            </div>

        </section>
    </div>
@endsection

@push('scripts')
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
@endpush