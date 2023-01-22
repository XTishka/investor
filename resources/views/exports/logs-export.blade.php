<table>
    <thead>
        <tr>
            <td>{{ __('Activity') }}</td>
            <td>{{ __('Description') }}</td>
            <td>{{ __('Created at') }}</td>
            <td>{{ __('Updated at') }}</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
            <tr>
                <td>{{ $log->log_name }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->created_at }}</td>
                <td>{{ $log->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
