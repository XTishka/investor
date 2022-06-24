<div class="card">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
        <x-elements.round-selector :round="$round" :rounds="$rounds" :route="'admin.wishes'" />

        <x-elements.table-search />

        <x-elements.card-action-buttons :buttons="[
            'admin.download_all' => ['icon' => 'download', 'route' => 'admin.wishes.export'],
            'admin.download_round' => ['icon' => 'file-download', 'route' => 'admin.wishes.export'],
        ]" />
    </div>

    <div id="card-stockholders" class="card-body table-responsive p-0">
        <table id="table-stockholders" class="table table-hover text-nowrap table-striped">
            <thead>
                <tr>
                    <th>{{ __('admin.id') }}</th>
                    <th>{{ __('admin.week') }}</th>
                    <th>{{ __('admin.stockholder') }}</th>
                    <th>{{ __('admin.country') }}</th>
                    <th>{{ __('admin.property') }}</th>
                    <th>{{ __('admin.priority') }}</th>
                    <th>{{ __('admin.status') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="wishes-index">
                @foreach ($wishes as $wish)
                    <tr>
                        <td>{{ $wish->id }}</td>
                        <td>
                            <strong>#{{ $wish->week_number }}</strong>
                            <span class="text-sm ml-2">
                                ( {{ date('j F, Y', strtotime($wish->week_start_date)) }}  -
                                {{ date('j F, Y', strtotime($wish->week_end_date)) }} )
                            </span>
                        </td>
                        <td>{{ $wish->stockholder_name }}</td>
                        <td>{{ $wish->property_country }}</td>
                        <td>{{ $wish->property_name }}</td>
                        <td>{{ $priorities->where('user_id', $wish->stockholder_id)->value('priority') }}</td>
                        <td><x-elements.wish-status-badge :status="$wish->status" /></td>
                        <td>
                            <a href="{{ route('admin.wishes.edit', $wish->id) }}" class="btn btn-sm btn-default">
                                <i class="fa fa-edit mr-1"></i>
                                {{ __('Edit') }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>