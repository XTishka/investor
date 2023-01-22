<table>
    <thead>
        <tr>
            <td>{{ __('Stockholder') }}</td>
            <td>{{ __('Wishes') }}</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($stockholders as $stockholder)
            <tr>
                <td>{{ $stockholder->name }}</td>
                <td>{{ $stockholder->wishes }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
