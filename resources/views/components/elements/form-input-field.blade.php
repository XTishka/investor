<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-3 col-form-label">{{ __($label) }}</label>
    <div class="col-sm-9">
        <input type="{{ $type }}"
            class="form-control  @error('{{ $name }}') is-invalid @enderror"
            id="{{ $id }}" name="{{ $name }}" placeholder="{{ __($placeholder) }}" value="{{ $value }}">
    </div>
</div>
