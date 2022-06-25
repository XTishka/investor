<div class="card">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
        <x-elements.round-selector :round="$round" :rounds="$rounds" :route="'admin.stockholders'" />

        <x-elements.table-search />

        <x-elements.card-action-buttons :buttons="[
            'admin.download_all' => ['icon' => 'download', 'route' => 'admin.stockholders.full-export', 'params' => null],
            'admin.download_round' => [
                'icon' => 'file-download',
                'route' => 'admin.stockholders.round-export',
                'params' => 'round_id=' . $round->id,
            ],
            'admin.add_new' => ['icon' => 'user-plus', 'route' => 'admin.stockholders.create', 'params' => null],
        ]" />
    </div>

    <div id="card-stockholders" class="card-body table-responsive p-0">
        <table id="table-stockholders" class="table table-hover text-nowrap  table-striped">
            <thead>
                <tr>
                    <th>{{ __('admin.stockholder') }}</th>
                    <th>{{ __('admin.email') }}</th>
                    <th class="text-center">{{ __('admin.available_weeks') }}</th>
                </tr>
            </thead>
            <tbody id="stockholders-index">
                @foreach ($stockholders as $stockholder)
                    <tr id="priority-{{ $stockholder->priority_id }}">

                        <td>{{ $stockholder->name }}</td>

                        <td>
                            <a href="mailto:{{ $stockholder->email }}">{{ $stockholder->email }}</a>
                        </td>

                        <td class="text-center">
                            {{ $stockholder->available_weeks }}
                        </td>

                        <td>
                            <x-elements.table-action-buttons :id="$stockholder->id" route="admin.stockholders" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
