<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-3 col-form-label">{{ __($label) }}</label>
    <div class="col-sm-9">
        <select class="custom-select rounded-2 @error('{{ $name }}') is-invalid @enderror"
            id="{{ $id }}" name="{{ $name }}">
            @foreach ($rounds as $round)
                <option value="{{ $round->id }}">{{ $round->name }}</option>
            @endforeach
        </select>
    </div>

    @error('{{ $name }}')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
