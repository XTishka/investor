<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-3 col-form-label">{{ __($label) }}</label>
    <div class="col-sm-9">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>

            <input type="hidden" id="{{ $start_date_id }}" name="{{ $start_date_name }}"
                   value="{{ old($start_date_name) }}">

            <input type="hidden" id="{{ $end_date_id }}" name="{{ $end_date_name }}"
                   value="{{ old($end_date_name) }}">

            <input type="text"
                   id="{{ $range_id }}"
                   name="{{ $range_name }}"
                   value="{{ old($range_name) }}"
                   class="form-control float-right"
                   onchange="getRangeDates()">
        </div>
    </div>
</div>