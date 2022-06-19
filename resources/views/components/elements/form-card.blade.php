<div class="card card-secondary">
    <div class="card-header">
        <h3 class="card-title">{{ __($title) }}</h3>
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-{{ $submitButtonStyle }}" form="{{ $form }}">
            {{ __($submitButtonText) }}
        </button>
    </div>
</div>
