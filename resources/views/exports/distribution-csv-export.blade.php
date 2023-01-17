<table>
    <thead>
        <tr>
            <td>Stockholder</td>
            @foreach ($weeks as $week)
                <td>property_{{ $week['week_start']['number'] }}</td>
                <td>status_{{ $week['week_start']['number'] }}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($stockholders as $stockholder)
            <tr>
                <td>{{ $stockholder->name }}</td>
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
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
