<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-3 col-form-label">{{ __($label) }}</label>
    <div class="col-sm-9">
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="{{ $id }}" name="{{ $name }}">
                <label class="custom-file-label"
                    for="{{ $name }}">{{ __($placeholder) }}</label>
            </div>
        </div>
    </div>

    @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
            <strong>{{ __($message) }}</strong>
        </span>
    @enderror
</div>
