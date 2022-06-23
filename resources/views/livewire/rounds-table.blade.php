<div class="card">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
        <div></div>

        <x-elements.table-search />

        <x-elements.card-action-buttons :buttons="[
            'admin.add_new' => ['icon' => 'recycle', 'route' => 'admin.rounds.create'],
        ]" />
    </div>

    <div id="card-stockholders" class="card-body table-responsive p-0">
        <table id="table-stockholders" class="table table-hover text-nowrap  table-striped">
            <thead>
                <tr>
                    <th>{{ __('admin.id') }}</th>
                    <th>{{ __('admin.name') }}</th>
                    <th>{{ __('admin.description') }}</th>
                    <th>{{ __('admin.end_wishes_date') }}</th>
                    <th>{{ __('admin.start_date') }}</th>
                    <th>{{ __('admin.end_date') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="rounds-index">
                @foreach ($rounds as $round)
                    <tr>
                        <td>{{ $round->id }}</td>
                        <td>{{ $round->name }}</td>
                        <td>{{ $round->description }}</td>
                        <td>{{ date('j F, Y', strtotime($round->end_wishes_date)) }}</td>
                        <td>{{ date('j F, Y', strtotime($round->start_round_date)) }}</td>
                        <td>{{ date('j F, Y', strtotime($round->end_round_date)) }}</td>
                        <td>
                            <x-elements.table-action-buttons :id="$round->id" route="admin.rounds" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
