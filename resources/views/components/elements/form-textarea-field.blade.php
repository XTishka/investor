<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-3 col-form-label">{{ __($label) }}</label>
    <div class="col-sm-9">
        <textarea id="{{ $id }}" name="{{ $name }}" class="form-control @error('{{ $name }}') is-invalid @enderror"
            rows="{{ $rows }}" placeholder="{{ __($placeholder) }}">{{ $value }}</textarea>
    </div>

    @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
            <strong>{{ __($message) }}</strong>
        </span>
    @enderror
</div>
