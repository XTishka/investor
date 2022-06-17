<div class="input-group-prepend p-2">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        {{ $round->name }}
    </button>

    <ul class="dropdown-menu" style="">
        @foreach ($rounds as $round)
            <li class="dropdown-item"><a
                    href="{{ route($route, ['round_id' => $round->id]) }}">{{ $round->name }}</a>
            </li>
        @endforeach

        <li class="dropdown-divider"></li>
        <li class="dropdown-item">
            <a href="{{ route($route) }}">{{ __('Current round') }}</a>
        </li>
    </ul>
</div>
