<div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on"
    style="width: 86px;">

    <div wire:click="switchWeek"
        class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate"
        style="width: 86px;">
        <div class="bootstrap-switch-container"
            style="width: 126px; margin-left: {{ $week->availibility($week->id, $propertyId) == true ? '0' : '-42' }}px;">
            <span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 42px;">{{ __('admin.ON') }}
            </span>

            <span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span>

            <span class="bootstrap-switch-handle-off bootstrap-switch-danger"
                style="width: 42px;">{{ __('admin.OFF') }}
            </span>

            <input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="" data-off-color="danger"
                data-on-color="success">
        </div>
    </a>
</div>
