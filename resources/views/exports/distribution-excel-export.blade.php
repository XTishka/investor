<table>
    <thead>
        <tr>
            <td rowspan="3">Stockholder</td>
            @foreach ($weeks as $week)
                <td colspan="2">Week {{ $week['week_start']['number'] }}</td>
            @endforeach
        </tr>
        <tr>
            @foreach ($weeks as $week)
                <td>{{ $week['week_start']['human_date'] }}</td>
                <td>{{ $week['week_end']['human_date'] }}</td>
            @endforeach
        </tr>
        <tr>
            @foreach ($weeks as $week)
                <td>Property</td>
                <td>Status</td>
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

                    @foreach ($weeks as $week)
                        @php
                            $wish = $wishes
                                ->where('user_id', $stockholder->id)
                                ->where('week_code', $week['code'])
                                ->first();
                        @endphp
                        @if ($wish)
                            <td>{{ $wish->property_name }}</td>
                            <td>{{ $wish->status }}</td>
                        @else
                            <td></td>
                            <td></td>
                        @endif
                    @endforeach;
                </tr>
            @endfor
        @endforeach
    </tbody>
</table>
