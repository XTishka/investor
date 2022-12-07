@if ($week['week_start']['status'] === true and $week['week_end']['status'] === false)
    <x-admin.elements.badge-disabled>
        {{ __('passed') }}
    </x-admin.elements.badge-disabled>
@elseif ($week['week_start']['status'] === true and $week['week_end']['status'] === true)
    <x-admin.elements.badge-success>
        {{ __('current') }}
    </x-admin.elements.badge-success>
@elseif ($week['week_start']['status'] === false and $week['week_end']['status'] === true)
    <x-admin.elements.badge-primary>
        {{ __('waiting') }}
    </x-admin.elements.badge-primary>
@else
    <x-admin.elements.badge-error>
        {{ __('error') }}
    </x-admin.elements.badge-error>
@endif
