<table>
    <thead>
        <tr>
            <td rowspan="3">{{ __('Stockholder') }}</td>
            @foreach ($weeks as $week)
                <td colspan="2">{{ __('Week') }} {{ $week['week_start']['number'] }}</td>
            @endforeach
        </tr>
        <tr>
            @foreach ($weeks as $week)
                <td colspan="2">
                    {{ $week['week_start']['human_date'] }} - {{ $week['week_end']['human_date'] }}
                </td>
            @endforeach
        </tr>
        <tr>
            @foreach ($weeks as $week)
                <td>{{ __('Property') }}</td>
                <td>{{ __('Status') }}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($stockholders as $stockholder)
            @for ($i = 1; $i <= $stockholder->rowspan; $i++)
                <tr>
                    @if ($i == 1)
                        <td rowspan="{{ $stockholder->rowspan }}">{{ $stockholder->name }}</td>
                    @endif

                    @foreach ($stockholder['weeks'] as $week)
                        <td>
                            @if (array_key_exists($i - 1, $week['wishes']))
                                {{ $week['wishes'][$i - 1]['property_name'] }}
                            @endif
                        </td>
                        <td>
                            @if (array_key_exists($i - 1, $week['wishes']))
                                {{ $week['wishes'][$i - 1]['status'] }}
                            @endif
                        </td>
                    @endforeach;
                </tr>
            @endfor
        @endforeach
    </tbody>
</table>
